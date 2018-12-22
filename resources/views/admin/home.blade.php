@extends('admin.index')
@section('contenu')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Dashboard</h2>
  </div>
</header>
<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
      <!-- Item -->
      <div class="col-xl-6 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="icon-padnote"></i></div>
          <div class="title"><a href="{{asset('admin/products')}}">Products</a>
          </div>
          <div class="number"><strong></strong></div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
