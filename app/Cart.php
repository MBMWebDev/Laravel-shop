<?php

namespace App;


class Cart
{
  public $items; /*******groupe de produits********/
  public $totalQty = 0;
  public $totalPrice = 0;


  public function __construct($oldCart){

    if($oldCart){
      $this->items=$oldCart->items;
      $this->totalQty=$oldCart->totalQty;
      $this->totalPrice=$oldCart->totalPrice;
    }
  }

  public function add($item, $id){
    $storedItem =['qty' => 0,'promo'=>$item->promo, 'price' => $item->price, 'item' => $item]; /**assosiative array pour identifier le groupe d'items**/
    if($this->items){
      if(array_key_exists($id,$this->items)){
        $storedItem=$this->items[$id];
      }
    }

    /****discount if available****/
    if($item->promo>0)
    {
      $storedItem['qty']++;
      $storedItem['price'] = ($item->price-(($item->price*$item->promo)/100)) * $storedItem['qty'];
      $this->items[$id] = $storedItem;
      $this->totalQty++;
    $this->totalPrice += $item->price-(($item->price*$item->promo)/100);
  }else{
    $storedItem['qty']++;
    $storedItem['price'] = $item->price * $storedItem['qty'];
    $this->items[$id] = $storedItem;
    $this->totalQty++;
    $this->totalPrice += $item->price;
  }
  }

  public function reduceByOne($id){
    /****discount if available****/
    if($this->items[$id]['item']['promo']>0)
    {
      $this->items[$id]['qty']--;
      $this->items[$id]['price'] -= $this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100);
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100);
      if($this->items[$id]['qty']<=0){
        unset($this->items[$id]);
      }
    }else{
      $this->items[$id]['qty']--;
      $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
      $this->totalQty--;
      $this->totalPrice -=$this->items[$id]['item']['price'];
      if($this->items[$id]['qty']<=0){
        unset($this->items[$id]);
      }
    }
  }

  public function addByOne($id){
    /****discount if available****/
    if($this->items[$id]['item']['promo']>0)
    {
      $this->items[$id]['qty']++;
      $this->items[$id]['price'] += $this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100);
      $this->totalQty++;
      $this->totalPrice +=$this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100);
    }else{
    $this->items[$id]['qty']++;
    $this->items[$id]['price'] += $this->items[$id]['item']['price'];
    $this->totalQty++;
    $this->totalPrice +=$this->items[$id]['item']['price'];
    }
  }

  public function removeItem($id){
    /****discount if available****/
    if($this->items[$id]['item']['promo']>0){
      $this->totalQty -=$this->items[$id]['qty'];
      $this->items[$id]['price']=($this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100)*$this->items[$id]['qty']);
      $this->totalPrice -= $this->items[$id]['item']['price']-(($this->items[$id]['item']['price'] * $this->items[$id]['item']['promo'])/100);
      unset($this->items[$id]);
    }else{
      $this->totalQty -=$this->items[$id]['qty'];
      $this->items[$id]['price']=($this->items[$id]['item']['price']*$this->items[$id]['qty']);
      $this->totalPrice -= $this->items[$id]['price'];
      unset($this->items[$id]);
    }

  }

}
