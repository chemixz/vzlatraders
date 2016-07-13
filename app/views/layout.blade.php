<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!--adapta la pantalla-->
<title>VzlaTraders</title>
  {{ HTML::style ('assets/css/bootstrap-theme.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/bootstrap.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/sidebar.css', array ('media'=>'screen')) }}
  {{ HTML::style ('assets/css/mystyle.css', array ('media'=>'screen')) }}

</head>
<body>
  <div class="cabecera">
     <header >  <!--un header o titulo 12 columna -->
       
        <nav class="navbar navbar-static-default navbar-inverse navbar-static-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle toggle-left collapsed" data-toggle="collapse" data-target="#collapse1vz">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                
                {{ HTML::link('/' , 'VzlaTraders',['class'=>'navbar-brand'] ) }}
              </div>
              <button type="button" class="navbar-toggle navbar-btn toggle-right" data-toggle="sidebar" data-target=".sidebar-right">
                  <span class="glyphicon glyphicon-user white" aria-hidden="true"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapse1vz">
              <ul class="nav navbar-nav">
                <li class=""><a href="{{URL::to('/')}}/profile/{{Auth::user()->id}}">Perfil </a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
         </div><!-- /.container -->
        </nav>
        
        <div class="col-xs-7 col-sm-2 col-md-2  sidebar sidebar-right sidebar-animate">
            <ul class="nav nav-pills nav-stacked">
              
              <div class="placeholder">
                <h4 class="text-center">Conectado como:</h4>
                  @if (Auth::check() )
                   <p class="text-center">
                      <span class="text-muted">{{ Auth::user()->email; }}</span>
                  </p>
                  <li> {{ HTML::link('/publications/new' , ' Nueva Publicacion' ) }}</li>
                    @if (Auth::user()->level > 1)
                       <li class="text-left">
                         {{ HTML::link('/categories' , 'Categorias') }}
                       </li>
                        <li class="text-left">
                         {{ HTML::link('/states' , 'Estados') }}
                       </li>
                    @endif
                    <br>
                    {{ HTML::link('/logout', 'Cerrar sesión.') }}
                  @else
                    <span class="text-muted">Visitor</span>
                  @endif

              </div>
            </ul>
            
         </div>
      </header>
  </div>
    <div class="container container-body"> <!--contenedor principal -->
    @yield('content')  {{-- LLama al index.blade.php--}}
   </div> 
   <br><br><br>
   <div class="container footer">
       <footer class="col-sm-12 floating-bottom">  {{--pie de pagina--}}
          <p>
          Desarrollado por: <a href="http://facebook.com/garces.jme.b" target="_blank">Garcés José Miguel</a>
          </p>
      </footer>
   </div>

  {{ HTML::script('assets/js/jquery.min.js') }}
  {{ HTML::script('assets/js/angular.min.js') }}
  {{ HTML::script('assets/js/signup-angular.js') }}
  {{ HTML::script('assets/js/bootstrap.js') }}
  {{ HTML::script('assets/js/sidebar.js') }}
  {{ HTML::script('assets/js/myjs.js') }}

  
</body>
</html>
