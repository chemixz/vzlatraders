@extends('layouts.main')
@section('content')
		<div class="row">
			<div class="col-xs-6 center-block no-float">
			<h2 class="text-center">Mi Perfil</h2>
  			 <div class="text-center thumbnail">
               		<img width="100%" height="500" src="{{URL::to('/')}}/uploads/images/galleries/{{$user->photo}}">
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