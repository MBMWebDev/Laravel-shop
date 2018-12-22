@extends('layouts.layout')
@section('content')
<link rel="canonical" href="https://codepen.io/ArnoldsK/pen/vXYGap?depth=everything&order=popularity&page=9&q=product&show_forks=false" />
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link href="{{asset('css/single-product.css')}}" rel="stylesheet">
<div style="margin-top:100px"></div>
@if(Session::has('message'))
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>  {{ Session::get('message') }}</strong><strong><a  href="{{url('/cart/checkout/')}}"> Go to Checkout</a></strong>
</div>
@endif
<?php
$img1 = explode(",", $produits->image);
?>


<main>
    <div class="section section-gray">
        <div class="section-content">
            <div class="product-details">
                <ul class="product-images">
                    <li class="preview">
                      <img src="../../image/{{$img1[0]}}" alt="">
                    </li>

                    <!-- Don't show small pictures if there's only 1 -->

                  @foreach(explode(',',$produits->image) as $images)
                    <li>
                        <a href="javascript:void(0)">  <img src="../../image/{{$images}}"></a>
                    </li>
                      @endforeach
                </ul>
                <ul class="product-info">
                    <li class="product-name">{{$produits->title}}</li>
                    <li class="product-price" ><span>{{$produits->price}}</span><span> DT</span></li>
                    <li class="product-addtocart">
                     <a href="{{url('products/add-to-cart',[$produits->id])}}" class="btn btn-info btn-md "> Add to cart </a>
                    </li>
                    <li class="product-description">
                        <p>Description</p>
                        <p>{{$produits->description}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="{{asset('js/single-product.js')}}"></script>
@endsection
