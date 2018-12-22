@extends('layouts.layout')
@section('content')
<div style="padding-top:100px"></div>
<div class="container">
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2">Name : {{$data->name}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>E-mail Adress</h6>
                            <p>{{$data->email}}
                            </p>
                        </div>
                     </div>
                     <div class="row">
                       <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Orders details &nbsp; &nbsp; Total orders : {{$c}}</h4><br>
                       <div class="col-md-12">
                        @foreach($orders as $order)
                        @if($order->etat=="En cours")
                        <div class="card">
                      <div class="card-header bg-warning text-white">
                        State : {{$order->etat}}
                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Delivery Adress : {{ $order->adresse}}</li>
                          @foreach($order->cart->items as $o)
                        <li class="list-group-item">Product Name : <strong>{{ $o['item']['title']}}</strong></li>
                        <li class="list-group-item">Single Product Price : $ {{ $o['item']['price']}}</li>
                        <li class="list-group-item">Quantity : {{ $o['qty']}}</li>
                        @endforeach
                        <li class="list-group-item"><strong>Total Price : $ {{ $order->cart->totalPrice}} </strong></li>
                      </ul>
                      </div>
                      <div class="card-footer text-muted">
                        Ordered At : {{$order->created_at}}
                      </div>
                    </div><br>
                    @else
                    <div class="card ">
                    <div class="card-header bg-success text-white">
                    State : {{$order->etat}}
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Delivery Adress : {{ $order->adresse}}</li>
                        @foreach($order->cart->items as $o)
                      <li class="list-group-item">Product Name : <strong>{{ $o['item']['title']}}</strong></li>
                      <li class="list-group-item">Single Product Price : $ {{ $o['item']['price']}}</li>
                      <li class="list-group-item">Quantity : {{ $o['qty']}}</li>
                      @endforeach
                      <li class="list-group-item"><strong>Total Price : $ {{ $order->cart->totalPrice}} </strong></li>
                    </ul>
                    </div>
                    <div class="card-footer text-muted">
                    Ordered At : {{$order->created_at}}
                    </div>
                    </div><br>
                    @endif
                    @endforeach
                    {{$orders->links()}}
                    </div>
                  </div>
                    <!--/row-->
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>

</div>
</div>
<hr>
    @endsection('content')
