@extends('layouts.layout')
@section('content')
  <div class="container">
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Delivery</h6>
                <small class="text-muted">Free !</small>
              </div>
              <span class="text-muted">$0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong style="color:red">$ {{$totalPrice}}</strong>
            </li>
          </ul>
        </div>

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form method="post"  action="{{ url('orders/validate') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Your name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="{{$data->name}}" disabled="disabled" required="">
                <input type="hidden" name="user_id" class="form-control" id="user_id" value="{{$data['id']}}" />
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="adresse">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
                </div>
                </div>
            <button onclick="return confirm('Are you sure to comfirm your order?')" class="btn btn-primary btn-lg btn-block" type="submit">Order now !</button>
          </form>

      </div>
      </div>
    </div>
    <br><br><br><br>
@endsection
