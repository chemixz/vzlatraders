@extends('layouts.main')
@section('content')
	<div class="row">
		
		<h1>Agregar Categorias</h1>

		<div class="col-sm-4 col-md-offset-4"><!--parte IZQUIERDA-->
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
			  <!--los campos pasan al home control dnd seran validados  y en usuario.php son ingresados ala bd-->

		     {{ Form::open(['url'=>'/categories/store','method'=>'post']) }} <!--formulario de usuario registrarse-->
			<div class="form-group">
                    {{ Form::label('nombre','Nombre') }}
					{{ Form::text('name',Input::old('name') ,['class'=>'form-control', 'placeholder'=>'Ingrese nombre de la categoria'] ) }}
			</div >
			<div class="form-group">
                    {{ Form::label('codecolor','Color') }}
					{{ Form::text('codecolor',Input::old('codecolor') ,['class'=>'form-control', 'placeholder'=>'Ingrese  codigo de color'] ) }}
			</div >
	        {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/categories' , '<<Atras',['class'=>'btn btn-danger'] ) }}
			
			{{ Form::close() }}
		</div>
	</div>



@stop