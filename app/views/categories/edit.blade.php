@extends('layout')
@section('content')
	<div class="row">
		<h2>Editar Categorias</h2>
		<br>
		<div class="col-sm-4 center-block no-float"><!--parte IZQUIERDA-->
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
		    {{ Form::open(['url'=>'/categories/update/'.$category->id,'method'=>'post']) }} <!--formulario de usuario registrarse-->
        	 <div class="form-group">  
             {{ Form::label('name','Nombre de la categoria') }}
             {{ Form::text('name',$category->name ,['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la categoria'] ) }}
        	 </div>
        	 <div class="form-group">  
             {{ Form::label('codecolor','Color') }}
             {{ Form::text('codecolor',$category->codecolor ,['class'=>'form-control', 'placeholder'=>'Ingrese codigo de color'] ) }}
        	 </div>
            {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
				{{ HTML::link('/categories' , 'Atras',['class'=>'btn btn-warning'] ) }}
			{{ Form::close() }}
		</div>
		
	</div>



@stop