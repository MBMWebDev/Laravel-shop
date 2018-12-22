@extends('admin.index')
@section('contenu')
<div class="container" style="margin-top:100px">
  @if(Session::has('message'))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>  {{ Session::get('message') }}</strong>
  </div>
  @endif
  <div class="card">
    <div class="card-body">
<form class="form-horizontal" action="{{ url('admin/store') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <fieldset>
    <legend>Add New Product</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="Titre" type="text" name="title" required>
      </div>
    </div>
    <div class="form-group">
  <div class="col-lg-10">
    <label for="sel1">Select Category:</label>
  <select class="form-control" id="inputCategory" name="category" required>
    <option>smartphones</option>
    <option>dslr</option>
    <option>pc and laptops</option>
  </select>
</div>
</div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Image(s)</label>
      <div class="col-lg-10">
        <input type="file" multiple name="images[]"  required>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="description" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Price</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputNumber" pattern="[0-9]{6}" type="number" name="price" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-info">Add</button>
        <button type="reset" class="btn btn-default">Cancel</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>
  </div>
  <br><br>
@endsection
