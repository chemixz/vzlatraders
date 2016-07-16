@extends('layout')
@section('content')
     <div class="row">
        <div class="col-xs-5 center-block no-float" ng-app="angularVzla">
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
                            <div id="target">
                              @if ($user->photo == "default_image.jpg")
                                    <img width="500" height="500" src="{{URL::to('/')}}/uploads/images/profiles/{{$user->photo}}" class="img-responsive">
                              @else
                                    <img  width="500" height="500" src="{{URL::to('/')}}/uploads/images/profiles/user_{{$user->id}}/{{$user->photo}}" class="img-responsive">
                              @endif
                            </div>
                            <br>
                            <input type="file" name="photo" class="picture"  >    
                          </div>
                        </div>
                      </div>
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
                    <div class="form-group" ng-controller="getstates">
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
                         <a href="{{URL::to('/')}}/login" class="btn btn-primary">Login</a>
                    </div>
					
	               
				          {{ Form::close() }}
                <br>    
    		</div>
      </div>
@stop