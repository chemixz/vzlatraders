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
                    {{ Form::open(['url'=>'/galleries/store/','method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}
                     <div class="form-group">
                      <div class="" style="padding-left:0">
                        <label for="picture"></label>
                        <div class="">
                          <div class="thumbnail" style="overflow:hidden;">
                            <div id="target">
                            </div>
                            <br>
                            <input type="file" name="picture"  class="picture" >    
                          </div>
                        </div>
                      </div>
                   </div>
                    <div class="col-xs-12 text-center">
                        {{ Form::submit('Guardar',['class'=>'btn btn-success'] )}}
                         <a href="{{URL::to('/')}}/galleries" class="btn btn-primary">Atras</a>
                    </div>
	               
				     {{ Form::close() }}
                <br>    
               
    		</div>
      </div>
@stop