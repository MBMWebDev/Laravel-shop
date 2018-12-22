<!DOCTYPE html>
<html>
@include('admin.inc.header')
  <body>
    <div class="page">
      <!-- Main Navbar-->
      @include('admin.inc.navbar')

      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        @include('admin.inc.sidebar')

        <div class="content-inner">
          <!-- Page Header-->

        @yield('contenu')


          <!-- Page Footer-->
          @include('admin.inc.footer')

        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.inc.script')
  </body>
</html>
