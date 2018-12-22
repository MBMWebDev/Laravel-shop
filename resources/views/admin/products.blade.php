@extends('admin.index')
@section('contenu')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Products</h2>
  </div>
</header>
@if(Session::has('message'))
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>  {{ Session::get('message') }}</strong>
</div>
@endif
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <!-- Item -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-close">
              <a href="{{asset('admin/add')}}"> <button class="btn btn-info"><i class="fa fa-plus"></i> Add new product</button></a>
          </div>
          <br>
          <br>
          <div class="card-body">
            <div class="table-responsive table-hover">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $a)
                  <tr>
                    <th scope="row">{{ $a->id}}</th>
                    <td>{{ $a->title}}</td>
                    <td>{{ $a->category}}</td>
                    <td>{{ str_limit($a->description, $limit = 50, $end = '...') }}</td>
                    <td>{{ $a->created_at }}</td>
                    <td>{{ $a->updated_at }}</td>
                    <td><a href="{{url('admin/products/edit',[$a->id])}}"><button type="button" class="btn btn-warning">Edit</button></td></a>
                       &nbsp; &nbsp; <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer cet article?')" href="{{url('admin/products/delete',[$a->id])}}"><button type="button" data-artid="{{$a->id}}" data-toggle="modal" data-target="#myModaldel" class="btn btn-primary">Delete</button></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <nav class="d-flex justify-content-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <ul class="pagination pg-blue">
                    <li class="page-item">
                        {{$data->links()}}
                    </li>
                </ul>
            </nav>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@stop
