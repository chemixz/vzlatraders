@extends('layout')
@section('content')
     <div class="row" ng-app="angularFront">
        <div class="col-xs-12 col-md-6 center-block no-float" ng-controller="Profile_Controller">
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
                    {{ Form::open(['url'=>'/profile/update/'.$user->id,'method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}
                     <div class="form-group">
                      <div class="" style="padding-left:0">
                        <label for="photo"></label>
                        <div class="">
                          <div class="thumbnail" style="overflow:hidden;">
                            <div id="targetprofile">
                                <img width="100%" height="500" src="{{URL::to('/')}}/uploads/images/galleries/{{$user->photo}}" class="imythumb">
                            </div>
                            <br>
                            <input type="button" name="buttonImg" ng-click="openGalleries()" value="Agregar Imagen" >    
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="form-grou">
                     <input type="hidden" id="photo">
                   </div>
                    <div class="form-group">
                        {{ Form::label('credential','Cedula') }}
                        {{ Form::number('credential',$user->credential ,['class'=>'form-control', 'placeholder'=>'Ingrese  Cedula'] ) }}
                    </div >
                    <div class="form-group">
                        {{ Form::label('names','Nombre Completo') }}
                        {{ Form::text('names',$user->names ,['class'=>'form-control', 'placeholder'=>'Ingrese  Nombre completo'] ) }}
                    </div >
                    <div class="form-group">
                        {{ Form::label('surnames','Apellidos') }}
                        {{ Form::text('surnames',$user->surnames ,['class'=>'form-control', 'placeholder'=>'Ingrese  Apellidos'] ) }}
                    </div >
                    <div class="form-group">
                        {{ Form::label('email','Correo Electronico') }}
						            {{ Form::email('email',$user->email ,['class'=>'form-control', 'placeholder'=>'Ingrese su email'] ) }}	
				          	</div>
                    <div class="form-group">
                        {{ Form::label('tlf','Telefono') }}
                        {{ Form::number('tlf',$user->tlf ,['class'=>'form-control', 'placeholder'=>'Ingrese  Telefono'] ) }}
                    </div >
                    <div class="form-group" >
                    {{ Form::label('states','Estado') }}
                      <select name="state_id" id="state_select" class="form-control">
                        <option selected  value="">Elija un Estado</option>
                        @foreach ($states as $S)
                         <option  @if( $S->id == $user->municipality->state->id  ) selected @endif value="{{$S->id}}">{{$S->name}}</option>
                        @endforeach
                      </select>
                    </div >
                    <div class="form-group">
                    {{ Form::label('minicipalities','Municipio') }}
                      <select name="municipality_id" id="select_municipalities" class="form-control">
                        <option selected  value="">Elija un municipio</option>
                        @foreach  ($municipalities as $Mu)
                         <option  @if( $Mu->id == $user->municipality->id  ) selected @endif value="{{$Mu->id}}">{{$Mu->name}}</option>
                        @endforeach
                      </select>
                    </div >
                    <div class="text-center">
                        {{ Form::submit('Actualizar',['class'=>'btn btn-success'] )}}
                         <a href="{{URL::to('/')}}/profile" class="btn btn-primary">Atras</a>
                    </div>
	               
				          {{ Form::close() }}
                <br>    
                <div class="modal fade" id="modalgallery" role="dialog" aria-labelledby="myModalLabelgallery" >
                  <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Galeria de imagenes</h4>
                      </div>
                      <div class="modal-body">
                     
                      <div class="" id="targe_gallery"> 
                        <p ng-repeat=" picture in gall_pictures">
                           <img src="{{URL::to('/')}}/uploads/images/galleries/@{{picture.picture}}" alt="" width="100" height="100">
                        </p>
                        
                      </div> 
                      <div class="text-center">
                        <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                 
                      </div>
                    </div>
                  </div>
                </div>
    		</div>
      </div>
@stop