@extends('layouts.layout')

@section('content')

<br><br><br>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-black mb-4">User Register Form</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="POST" action="{{ route('register') }}">
                              {{ csrf_field() }}
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="uname1">Name</label>
                                  <input id="name" type="text" class="form-control form-control form-control-lg rounded-0" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="uname1">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control form-control form-control-lg rounded-0" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control form-control-lg rounded-0" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Comfirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control form-control-lg rounded-0"name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-info btn-md float-right" id="btnLogin">Register</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
@endsection
