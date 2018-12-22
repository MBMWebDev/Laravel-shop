@extends('layouts.layout')
@section('content')
<br><br><br>
<div class="container">
@if (Session::has('cart'))
                <div class="col-md-9" id="basket">
                    <div class="box">
                        <form method="post">
                          {{ csrf_field() }}
                            <h1>Panier</h1>
                            <p class="text-muted">You have<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span> element(s) in your shopping cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produit</th>
                                            <th>Quantité</th>
                                            <th >Prix unitaire</th>
                                            <th >Prix total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($products as $product)
                                      @if($product['qty']>5)
                                      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
                                      <SCRIPT LANGUAGE="JavaScript">
                                       alert('Warning :Maximum quantity reached !');
                                       $(function(){
                                         $("#submit").attr("disabled", "disabled");
                                          });
                                        </SCRIPT>
                                        @endif
                                        <tr>
                                            <td>
                                            </td>
                                            <td><a href="#">{{$product['item']['title']}}</a>
                                            </td>
                                            <td>
                                                <input type="text" value="{{$product['qty']}}" class="form-control" disabled="disabled">
                                            </td>
                                            <td>
                                              @if($product['item']['promo']>0)
                                                {{ $product['item']['prix'] -  (($product['item']['prix']* $product['item']['promo']) /100 )}} DT
                                            @else {{$product['item']['price']}} DT</td>
                                            @endif
                                            <td>@php
                                           $total=($product['item']['price'] -  (($product['item']['price']* $product['item']['promo']) /100 )) *$product['qty'];
                                           echo $total;
                                          @endphp</td>
                                            <td><a href="{{url('/cart/add',[$product['item']['id']])}}"><i class="fa fa-plus-square"></i></a>
                                            <a href="{{url('/cart/reduce',[$product['item']['id']])}}"><i class="fa fa-minus-square"></i></a></td>
                                            <td><a onclick="return confirm('Are you sure you want to delete this item?')" href="{{url('/cart/delete',[$product['item']['id']])}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">{{$totalPrice}} DT</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                            <div class="row">
                                <div class="float-left">
                                    <a href="{{asset('/')}}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                                </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <div class="float-right">
                                  <a onclick="return confirm('Are you sure you want to clear cart?')" href="{{url('/cart/clear')}}" type="submit" class="btn btn-danger">Clear Cart</a>
                                  <a href="{{url('cart/checkout')}}" class="btn btn-success">Check out! <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </form>


                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->


                <!-- /.col-md-3 -->

                @else
                <div class="box">
                  <center>
                  <span> <img src="{{asset('image/panier.png')}}" width="250px" height="250px"/></span>
                  <h1><p class="text-muted"> Your Shopping Cart is empty !</p></h1>
                  <p class="text-muted">Click <a href="{{url('/')}}">here</a> to continue shopping.</p>
                </center>
                </div>

                @endif

            </div>
            <br><br><br>

@endsection
