@extends('layouts.layout')
@section('content')
<div style="margin-top:100px"></div>
<div class="container">
  @if(Session::has('message'))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>  {{ Session::get('message') }}</strong><strong><a  href="{{url('/cart/checkout/')}}"> Go to Checkout</a></strong>
  </div>
  @endif
<h3>PC's & LAPTOPS</h3>
<br><br>
<div class="row">
  <!-- BEGIN PRODUCTS -->
  @foreach($data as $key => $pro)
  <?php
  $img1 = explode(",", $pro->image);
  ?>

  <div class="col-md-3">
  	<figure class="card card-product">
  		<div class="img-wrap">
        <a href="{{url('products/details',[$pro->id])}}">
          <img src="image/{{$img1[0]}}" alt="..." width="180px" height="200px"></a>
  		</div>
  		<figcaption class="info-wrap">
  		<a href="{{url('products/details',[$pro->id])}}">{{$pro->title}}</a>
  			<div class="action-wrap">
          <a href="{{url('products/add-to-cart',[$pro->id])}}" class="btn btn-info btn-sm float-right"> Add to cart </a>
  				<div class="price-wrap h5">
  					<span class="price-new">${{$pro->price}}</span>
  					<!-- PROMOTION <del class="price-old">$1980</del>-->
  				</div> <!-- price-wrap.// -->
  			</div> <!-- action-wrap -->
  		</figcaption>
  	</figure> <!-- card // -->
  </div> <!-- col // -->



<!-- END PRODUCTS -->
@endforeach

</div>


</div>
<!--container----->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

@endsection
