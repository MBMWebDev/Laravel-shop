<!DOCTYPE html>
<html>
@include('admin.inc.header')
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Administration</h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" action="{{ route('admin.login.submit') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="login-username" type="email" name="email" value="{{ old('email') }}" required data-msg="Please enter your e-mail" class="input-material">
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                      <label for="login-username" class="label-material">E-mail</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">
                        Login
                    </button>
                  </form>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Developed by <a href="https://maherbenmchichi.000webhostapp.com/" class="external">Maher Ben mchichi</a>
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.inc.script')
  </body>
</html>
