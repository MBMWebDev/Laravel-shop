<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Cart;
use App\Order;
use App\User;;
use Session;
use Auth;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_smartphones()
    {
        $data=Product::where('category', 'smartphones')->paginate(10);
        return view('shop.smartphones')->withData ($data);
    }

    public function index_dslr()
    {
        $data=Product::where('category', 'dslr')->paginate(10);
        return view('shop.dslr')->withData ($data);
    }

    public function index_pclaptops()
    {
        $data=Product::where('category', 'pc and laptops')->paginate(10);
        return view('shop.pclaptops')->withData ($data);
    }

    public function products_admin()
    {
      $data=Product::paginate(10);
      return view('admin.products')->withData ($data);
    }

    public function add()
    {
        return view('admin.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
      $images=array();
    if($files=$r->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$name);
            $images[]=$name;

        }
    }
    else{
      return 'Erreur veillez remplir tout les champs :)';
     }

      Product::insert([ 'image'=>implode(",",$images),
                        'description'=>$r->description,
                        'title'=>$r->title,
                        'category'=>$r->category,
                        'price'=>$r->price]);
      Session::flash('message', 'Product has been added!');
      return redirect('/admin/add');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produits=Product::find($id);
        return view('shop.products.details',compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $products=Product::find($id);
      return view('admin.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $p=Product::find($id);
      $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$name);
            $images[]=$name;

        }
        $filename=implode(",",$images);
    }
    else{
      $filename=$p->image;
     }
      $p->title=$request->title;
      $p->category=$request->category;
      $p->image=$filename;
      $p->description=$request->description;
      $p->price=$request->price;
      $p->save();
      Session::flash('message', 'Product has been edited!');
      return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $products=Product::where('id',$id)->delete();
      Session::flash('message', 'Product has been deleted!');
      return back();
    }





    public function search(Request $request)
        {
         $s = $request->input('s');
        // Return an array of articles that have the query string located somewhere within our article titles
        // Paginate them so we can break up lots of search results
      if(isset($s)){
      $products = Product::where('title','like','%'.$s.'%')->paginate(12);
      }
        // Return a view and passes the view the list of articles and the original query
        return view('shop.search', compact('products', 's'));
        }


    public function getAddToCart(Request $r, $id){
      $products=Product::find($id);
      $oldCart=Session::has('cart') ? Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->add($products,$products->id);
      $r->session()->put('cart',$cart);
      Session::flash('message', 'Product added to cart!');
    return back();
    }



    public function getAddByOne($id){
      $oldCart=Session::has('cart') ? Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->addByOne($id);
      Session::put('cart',$cart);
      return redirect('/cart');
    }
    public function getReduceByOne($id){
      $oldCart=Session::has('cart') ? Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->reduceByOne($id);
      if(count($cart->items ) > 0){
        Session::put('cart',$cart);
        }
        else{Session::forget('cart');}
      return redirect('/cart');
    }

    public function getRemoveItem($id){
      $oldCart=Session::has('cart') ? Session::get('cart'):null;
      $cart=new Cart($oldCart);
      //dd($cart->items[$id]['price']);
      $cart->removeItem($id);
      if(count($cart->items ) > 0){
        Session::put('cart',$cart);
        }
        else{Session::forget('cart');}
      return redirect('/cart');

    }

    public function viderPanier(){
      Session::forget('cart');
      return redirect('/cart');

    }




    public function getCart(){
      if(!Session::has('cart')){
        return view('shop.cart');
      }
      $oldCart=Session::get('cart');
      $cart= new Cart($oldCart);
      return view('shop.cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }


    public function getCommande(Request $r)
    {
      if(!Session::has('cart')){
        return view('shop.cart');
      }
      $oldCart=Session::get('cart');
      $cart= new Cart($oldCart);
      $data=Auth::user();
      return view('shop.checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice])->withData($data);
    }

    public function postCommande(Request $r)
    {
    if(!Session::has('cart')){
      return view('cart');
    }
    $oldCart=Session::get('cart');
    $cart= new Cart($oldCart);
    $order= new Order();
    $order->user_id=$r->user_id;
    $order->cart= serialize($cart);
    $order->adresse=$r->adresse;
    $order->save();
    Session::forget('cart');
    return redirect('profile');

  }

  public function mesCommandes()
  {
    $data=Auth::user();
    $orders=Order::where('user_id','=',$data->id)->paginate(5);
    $orders->map(function($order){
      $order->cart=unserialize($order->cart);
      return $order->cart;
    });
    $c=Order::where('user_id','=',$data->id)->count();
    return view('user.profile',compact('orders','data','c'));
  }


  public function DeleteMesCommandes($id)
  {
    $orders=Order::find($id)->delete();
    return back();
  }

  public function Commande()
  {
    $data=User::all();

      return view('commandes.lister',['data'=>$data]);
  }

  public function CommandUser(){

   $user=Input::get('user');

   $orders=Order::join('Users','Orders.user_id','=','Users.id')
                          ->select('Orders.*','Users.nom as UserID')
                          ->where('user_id','=',$user)
                          ->paginate(5);
  $orders->map(function($order){
    $order->cart=unserialize($order->cart);
    return $order->cart;
  });
  $c=Order::count();
  return view('commandes.CommandeUser',['orders'=>$orders,'c',$c]);
}


}
