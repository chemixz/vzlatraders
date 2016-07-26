@extends('layouts.main')
@section('content')
	<div class="row" ng-app="angularFront">

		<h2>Editar Publicacion</h2>
		<br>
		<div class="col-sm-6 center-block no-float"  ng-controller="Publication_Create_Edit_Controller"><!--parte IZQUIERDA-->
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


			 <div class="col-xs-12 col-sm-4" style="padding: 0.3em;">
	            <div class="form-group">
			        <div class="text-center" style="padding-left:0">
			        	<label for="picture">Imagen 1</label>
			          <div class="">
			            <div class="thumbnail" style="overflow:hidden;">
			              <div id="target_create_1">
                			<img width="100%" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture1}}" class="img-responsive">
			              </div>
			              <br>
                            <input type="file" ng-model="picture1" name="picture1" onchange="angular.element(this).scope().onFileLoad(this,1)" id="file_picture1"     >
			            </div>
			          </div>
			        </div>
		     	 </div>
			 </div>
			 <div class="col-xs-12 col-sm-4" style="padding: 0.3em;">
	            <div class="form-group">
			        <div class="text-center" style="padding-left:0">
			        	<label for="picture">Imagen 2</label>
			          <div class="">
			            <div class="thumbnail" style="overflow:hidden;">
			              <div id="target_create_2">
                			<img width="100%" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture2}}" class="img-responsive">
			              </div>
			              <br>
                            <input type="file" ng-model="picture2" name="picture2" onchange="angular.element(this).scope().onFileLoad(this,2)" id="file_picture2"     >
			            </div>
			          </div>
			        </div>
		     	 </div>
			 </div>
			 <div class="col-xs-12 col-sm-4" style="padding: 0.3em;">
	            <div class="form-group">
			        <div class="text-center" style="padding-left:0">
			        	<label for="picture">Imagen 3</label>
			          <div class="">
			            <div class="thumbnail" style="overflow:hidden;">
			              <div id="target_create_3">
                			<img width="100%" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture3}}" class="img-responsive">
			              </div>
			              <br>
                            <input type="file" ng-model="picture3" name="picture3" onchange="angular.element(this).scope().onFileLoad(this,3)" id="file_picture3"     >

			            </div>
			          </div>
			        </div>
		     	 </div>
			 </div>
			<div class="col-xs-12" style="padding: 0;">
				<label for="">Portada</label>
			</div>
			<div class="col-xs-12 form-group  ">

				<div class="col-xs-4 text-center">
					<label for="">Imagen 1</label>
					<input type="radio" value="1" @if ($publication->cover ==  1) checked @endif name="cover">
				</div>
				<div class="col-xs-4 text-center">
					<label for="">Imagen 2</label>
					<input type="radio" value="2" @if ($publication->cover == 2) checked @endif  name="cover">
				</div>
				<div class="col-xs-4 text-center">
					<label for="">Imagen 3</label>
					<input type="radio" value="3" @if ($publication->cover ==  3) checked @endif  name="cover">
				</div>
			</div>

			<div class="form-group">
                {{ Form::label('description','Descripcion') }}
	             <textarea name="description" id="" cols="" rows="4" class="form-control" placeholder="Ingrese descripcion">{{$publication->description}}</textarea>
			</div>
			<div class="form-group">
                {{ Form::label('changeoptions','Cambio Por:') }}&nbsp; Ejemplo:&nbsp; Crea una lista utilizando /  <br> 
                <i> producto1 y proucto2 / producto3 / producto 1 producto 2 y producto 3 </i>
	            <input type="text" name="changeoptions" placeholder="Ingrese los productos" class="form-control" value="{{$publication->changeoptions}}">
					
			</div>
			<div class="form-group">
				<label for="">Cantidad</label>
				<input type="number" min="0" name="stock" class="form-control" value="{{$publication->stock}}">
			</div>
			<div class="form-group" >
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
			<div class="col-xs-12 text-center">
			{{ Form::hidden('user_id' ,Auth::user()->id ) }}
            {{ Form::submit('Guardar',['class'=>'btn btn-primary'] )}}
           	 <a href="{{URL::previous()}}" class="btn btn-danger"> Atras</a>
			</div>
			
			{{ Form::close() }}
	
		</div>
		
	</div>



@stop