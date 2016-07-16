@extends('login.login_layout')
@section('content')
  		<div class="col-xs-5 center-block placeholder no-float" ng-app="loginAngular" style="margin-top: 3em;"> 
          @if(Session::has('message'))  
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
          <!--los campos pasan al home control dnd seran validados  y en usuario.php son ingresados ala bd-->
           {{ Form::open(['url'=>'/signup','method'=>'post']) }} <!--formulario de usuario registrarse-->
          <div class="form-group">
              {{ Form::label('credential','Cedula') }}
              {{ Form::number('credential',Input::old('credential') ,['class'=>'form-control', 'placeholder'=>'Ingrese  Cedula'] ) }}
          </div >
          <div class="form-group">
              {{ Form::label('names','Nombre Completo') }}
              {{ Form::text('names',Input::old('names') ,['class'=>'form-control', 'placeholder'=>'Ingrese  Nombre completo'] ) }}
          </div >
          <div class="form-group">
              {{ Form::label('surnames','Apellidos') }}
              {{ Form::text('surnames',Input::old('surnames') ,['class'=>'form-control', 'placeholder'=>'Ingrese  Apellidos'] ) }}
          </div >
          <div class="form-group">
              {{ Form::label('email',' Email') }}
						{{ Form::email('email',Input::old('email') ,['class'=>'form-control', 'placeholder'=>'Ingrese su email'] ) }}	
					</div>
          <div class="form-group">
              {{ Form::label('tlf','Telefono') }}
              {{ Form::number('tlf',Input::old('tlf') ,['class'=>'form-control', 'placeholder'=>'Ingrese  Telefono'] ) }}
          </div >
          <div class="form-group" ng-controller="Login_Controller_GetStates">
          {{ Form::label('states','Estado') }}
            <select name="state_id" id="state_select" class="form-control">
              <option selected  value="">Elija un Estado</option>
              @foreach ($states as $S)
                <option value="{{$S->id}}">{{$S->name}}</option>
              @endforeach
            </select>
          </div >
          <div class="form-group">
          {{ Form::label('minicipalities','Municipio') }}
            <select name="municipality_id" id="select_municipalities" class="form-control">
              <option selected  value="">Elija un municipio</option>
            </select>
          </div >
          <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Ingrese  Contrasena')); }}
          </div>
          <div class="form-group">
            {{ Form::label('password', 'Repita Contraseña') }}
            {{ Form::password('cpassword', array('class' => 'form-control', 'placeholder'=>'Repita  Contrasena')); }}
          </div>
          <div class="text-center">
              {{ Form::submit('Registrar',['class'=>'btn btn-success'] )}}
               <a href="{{URL::to('/')}}/login" class="btn btn-primary">Login</a>
          </div>
			      {{ Form::close() }}
           <br>    
  		</div>

    </div>
@stop

