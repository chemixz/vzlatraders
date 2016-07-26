  <div class="col-xs-6 col-sm-3 col-md-2  sidebar sidebar-right sidebar-animate">
        <ul class="nav nav-pills nav-stacked">
            <h4 class="text-center">Conectado como:</h4>
              @if (Auth::check() )
              <div class="col-md-12 center-block no-float">
                <img width="100%" src="{{URL::to('/')}}/uploads/images/galleries/{{Auth::user()->photo}}" alt="">
              </div>
               <p class="text-center">
                  <span class="text-muted">{{ Auth::user()->email; }}</span>
              </p>
              <li><a href="{{URL::to('/')}}/profile">Mi Perfil </a></li>
              <li><a href="{{URL::to('/')}}/userpublications">Mis publicaciones</a></li>
              <li><a href="{{URL::to('/')}}/exchanges">Mis Intercambios</a></li>
              <li> {{ HTML::link('/publications/new' , ' Nueva Publicacion' ) }}</li>
                @if (Auth::user()->level > 1)
                   <li class="text-left">
                     {{ HTML::link('/categories' , 'Categorias') }}
                   </li>
                    <li class="text-left">
                     <a href="{{URL::to('/')}}/states">Estados</a>
                   </li>
                   <li class="text-left">
                     <a href="{{URL::to('/')}}/galleries">Galerias</a>
                   </li>
                @endif
                <br>
                 <li class="text-center">
                  {{ HTML::link('/logout', 'Cerrar sesión.') }}
                </li>
              @else
                <span class="text-muted">Visitor</span>
              @endif
        </ul>
        
     </div>