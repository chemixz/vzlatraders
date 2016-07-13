@extends('layout')
@section('content')
		<div class="row">
			<div class="col-xs-12 center-block no-float">

  			 <div class="text-center thumbnail">
			     	@if ($user->photo == "default_image.jpg")
               		<img width="500" height="500" src="{{URL::to('/')}}/uploads/images/profiles/{{$user->photo}}">
        	 	@else
               		<img width="500" height="500" src="{{URL::to('/')}}/uploads/images/profiles/{{$user->id}}/{{$user->photo}}">
        	 	@endif
        	 </div>
        	 <h2 class="text-center"> {{$user->product_name}} </h2>
	         <div class="text-justify">
	          	<p>
	          		<strong>Email: </strong><br>{{$user->email}}
	           	</p>
	           	<p>
	           		<strong>Estado : </strong>{{ $user->municipality->name }}
	      		</p>
	         </div>
        	<div class="text-center">
        	@if (Auth::user()->id == $user->id)
              		{{ HTML::link('/profile/edit/'.$user->id , 'Editar',['class'=>'btn btn-success'] ) }}
            @endif
             {{ HTML::link('/', 'Atras',['class'=>'btn btn-danger'] ) }}
        	 </div>
      </div>
	</div>
@stop