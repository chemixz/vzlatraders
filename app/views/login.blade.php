@extends('login_layout')
@section('content')
           <div class="loginmodal-container" style="margin-top: 3em;">
                 <legend>Iniciar sesión</legend>
           @if(Session::has('message'))  <!--muestra mesaje de suceso que viene del homecontrol-->
              <div class="alert alert-{{ Session::get('class') }} fade in">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  <p>  {{ Session::get('message') }} </p>
              </div>
              @endif

            @if($errors->has())               
                <div class="alert alert-danger fade in">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  @foreach($errors->all() as $error)
                      <p>{{ $error  }}</p>
                    @endforeach

                 </div>
            @endif

            {{ Form::open(array('url' => '/login')) }}
                <div class="form-group">
                  {{ Form::label('usuario', 'Nombre de usuario') }}
                  {{ Form::text('email', Input::old('email'), array('class' => 'form-control')); }}
                </div>
                <div class="form-group">
                  {{ Form::label('contraseña', 'Contraseña') }}
                  {{ Form::password('password', array('class' => 'form-control')); }}
                </div>
                <div class="form-group">
                {{ Form::label('states','Estado') }}
                  <select name="state_id" class="form-control">
                    <option selected  value="">Elija un Estado</option>
                    @foreach ($states as $S)
                      <option value="{{$S->id}}">{{$S->name}}</option>
                    @endforeach
                  </select>
                </div >
                <div class="checkbox">
                  <label>
                      Recordar contraseña
                      {{ Form::checkbox('rememberme', true) }}
                  </label>
                </div>
                  {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
             {{ Form::close() }}
             <div>
               <a href="{{URL::to('/')}}/signup" style="color: blue;">Registrate</a>
             </div>
            <div class="login-help">
              <a href="#">Forgot Password</a>
            </div>
          </div>
           
        {{ HTML::script('assets/js/jquery.min.js'); }}
        {{ HTML::script('assets/js/bootstrap.js'); }}
@stop