    <nav class="navbar navbar-static-default navbar-inverse navbar-fixed-top">
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
                <li><a href="{{URL::to('/')}}/publications/">Publicaciones</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi menu <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{URL::to('/')}}/profile">Mi Perfil </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{URL::to('/')}}/userpublications">Mis publicaciones</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{URL::to('/')}}/exchanges">Mis Intercambios</a></li>
                    <li role="separator" class="divider"></li>
                     <li><a href="{{URL::to('/')}}/proposals">Mis Propuestas</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
         </div><!-- /.container -->
        </nav>