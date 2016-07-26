@extends('layouts.main')
@section('content')
        
<div class="row">
    	<div class="col-sm-12">
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
	</div>
	<div class="col-sm-12 center-block">
     Pagina principal
  	</div>
</div>
@stop