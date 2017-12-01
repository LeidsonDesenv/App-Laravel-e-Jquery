<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">          
          
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>    
  </head>
  <body>      
      <div class="container">
  <nav class="navbar navbar-default">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }} ">Rede Social</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
     
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
          <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          
          @if( Auth::check() )  
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
             aria-haspopup="true" aria-expanded="false">             
              {{ Auth::user()->name }} <span class="caret"></span></a>              
          <ul class="dropdown-menu">
            <li><a href="{{ route('user.account') }}">Perfil</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>                        
          </ul>
          @else
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
             aria-haspopup="true" aria-expanded="false">             
              Acessar <span class="caret"></span></a>  
              <ul class="dropdown-menu">
                <li><a href="{{ route('welcome') }}">Logar</a></li>
                <li><a href="{{ route('welcome') }}">Registrar</a></li>
              </ul>
          @endif
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  
</nav>  
          
          @yield('content')
      </div>
      
  <!-- Jquery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="{{ url('js/myscript.js') }}">  </script>
          <script src="{{ asset('js/app.js') }}"></script>     
  </body>
</html>

