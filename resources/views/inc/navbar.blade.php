<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="{{asset('/')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{asset('/')}}" >Home <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link " href="{{asset('pc-laptops')}}">Laptops & PC'S</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{asset('smartphones')}}">Smartphones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{asset('/dslr')}}">DSLR Cameras</a>
      </li>
        <li class="nav-item">
          <a class="nav-link " href="{{asset('/#about')}}">About</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0" action="{{ url('/products/search')}}" method="GET">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s"  value="{{isset($s) ? $s : '' }}" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
           &nbsp; &nbsp;
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="{{asset('cart')}}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="hidden-xs">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span></a>
          </li> &nbsp; &nbsp; &nbsp;


          @guest
          <li class=" mt-2 mt-md-0 nav-item">
            <a class="nav-link " href="{{ route('login') }}"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
          </li>
          <li class=" mt-2 mt-md-0 nav-item">
            <a class="nav-link " href="{{ route('register') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
          </li>
          @else
              <li class="dropdown">
                  <a  class="nav-link " href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ asset('/profile') }}">Profile
                        </a>
                    </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
      </ul>
    </div>
  </nav>
</header>
