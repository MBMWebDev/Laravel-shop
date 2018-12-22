
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>MBM Laravel Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/produits.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
  </head>
  <body>
    @include('inc.navbar')
    <main role="main">

      @yield('content')



      <!-- FOOTER -->
        @include('inc.footer')
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{asset('js/holder.min.js')}}"></script>
  </body>
</html>
