<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="{{asset('image/me.png')}}" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      <h1 class="h4">{{ Auth::user()->name}}</h1>
      <p>Web Developer</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
  <ul class="list-unstyled">
            <li ><a href="{{asset('admin/')}}"> <i class="icon-home"></i>Dashboard </a></li>
            <li><a href="{{asset('admin/products')}}"> <i class="icon-padnote"></i>Products</a></li>
  </ul>
</nav>
