@extends('layout')
@section('content')
	<div class="row">

		<h2>Editar Publicacion</h2>
		<br>
		<div class="col-sm-6 center-block no-float" ng-app="angularFront"><!--parte IZQUIERDA-->
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
			 {{ Form::open(['url'=>'/publications/update/'.$publication->id,'method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}

            <div class="form-group">
		        <div class="" style="padding-left:0">
		        	<label for="picture"></label>
		          <div class="">
		            <div class="thumbnail" style="overflow:hidden;">
		              <div id="target">
                		<img src="{{URL::to('/')}}/uploads/images/publications/{{Auth::user()->id}}/{{$publication->picture}}" class="img-responsive">
		              </div>
		              <br>
            			<input type="file" name="picture" class="picture"  >    
		            </div>
		          </div>
		        </div>
	     	 </div>

			<div class="form-group">
                {{ Form::label('description','Descripcion') }}
				{{ Form::textarea('description',$publication->description ,['class'=>'form-control', 'placeholder'=>'Ingrese la marca del producto'] ) }}	
			</div>
			<div class="form-group">
                {{ Form::label('changeoptions','Cambio Por:') }}&nbsp; Ejemplo:&nbsp; Crea una lista utilizando /  <br> 
                <i> producto1 y proucto2 / producto3 / producto 1 producto 2 y producto 3 </i>
				<textarea name="changeoptions"  cols="30" rows="5" class="form-control">{{$publication->changeoptions}}</textarea>
					
			</div>
			<div class="form-group" ng-controller="Publication_Controller_Create_Edit_GetStates">
            {{ Form::label('states','Estado') }}
              <select name="state_id" id="state_select" class="form-control">
                <option selected  value="">Elija un Estado</option>
                @foreach ($states as $S)
                 <option  @if( $S->id == $publication->municipality->state->id  ) selected @endif value="{{$S->id}}">{{$S->name}}</option>
                @endforeach
              </select>
            </div >
            <div class="form-group">
            {{ Form::label('minicipalities','Municipio') }}
              <select name="municipality_id" id="select_municipalities" class="form-control">
                <option selected  value="">Elija un municipio</option>
                @foreach  ($municipalities as $Mu)
                 <option  @if( $Mu->id == $publication->municipality->id  ) selected @endif value="{{$Mu->id}}">{{$Mu->name}}</option>
                @endforeach
              </select>
            </div >
			<div class="form-group">
                {{ Form::label('category','Categoria') }}
				<select name="category_id" class="form-control">
					@foreach ($categories as $C)
						<option  @if( $publication->category->id == $C->id  ) selected @endif value="{{$C->id}}">{{$C->name}}</option>
					@endforeach
				</select>
			</div >
         	{{ Form::hidden('user_id' ,Auth::user()->id ) }}
            {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
			{{ HTML::link('/' , 'Atras',['class'=>'btn btn-warning'] ) }}
			
			{{ Form::close() }}
	
		</div>
		
	</div>



@stop