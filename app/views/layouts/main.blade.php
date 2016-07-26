<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!--adapta la pantalla-->
<title>VzlaTraders</title>
  {{ HTML::style ('assets/css/bootstrap.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/bootstrap-theme.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/sidebar.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/mystyle.css', array ('media'=>'screen')) }}

</head>
<body>
  <div class="cabecera">
     <header >  <!--un header o titulo 12 columna -->
        @include('layouts.navbar')
    </header>
  </div>
    <div class="container container-body">
        @yield('content') 
   </div> 
  <aside>
      @include('layouts.sidebar')
  </aside>
   
   <br><br><br>
   <div class="container footer">
      @include('layouts.footer')
   </div>

  {{ HTML::script('assets/js/jquery.min.js') }}
  {{ HTML::script('assets/js/bootstrap.js') }}
  {{ HTML::script('assets/js/angular.min.js') }}
  {{ HTML::script('assets/js/angularFront.js') }}
  {{ HTML::script('assets/js/sidebar.js') }}
  {{ HTML::script('assets/js/myjs.js') }}

  
</body>
</html>
