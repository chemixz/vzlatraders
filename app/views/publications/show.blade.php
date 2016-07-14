@extends('layout')
@section('content')
		<div class="row">
			<div class="col-xs-12 center-block no-float">
        
  			 <div class="text-center thumbnail">
               <img width="100%" height="500px" src="{{URL::to('/')}}/uploads/images/publications/{{$publication->user->id}}/{{$publication->picture}}">
         </div>
         <h2 class="text-center"> {{$publication->product_name}} </h2>
         <div class="text-justify">
            <p>
              <strong>Autor:</strong>
                {{$publication->user->names}}
            </p>
          	<p>
          		<strong>Descripcion: </strong><br>
             		{{$publication->description}}
           	</p>
           	<p>
           		<strong>Valorado en: </strong>
      					{{$publication->value}}</p>
         </div>
         <hr style="color: black;">
        	<div class="text-center">
              <a class="btn btn-danger" href="{{URL::to('/')}}/" data-toggle="tooltip" data-placement="top" title="Atras"><span class=" glyphicon glyphicon-arrow-left"></span></a>
        	   @if (Auth::user()->id == $publication->user->id)
              <a class="btn btn-success" href="{{URL::to('/')}}/publications/edit/{{$publication->id}}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
             @endif
              
         </div>
          <br>
         <div class="text-center">
            <h3 >Comentarios</h3>
         </div>
        
          <div class="c_box"> <!--Contiene todo Imagen y Texto-->
            @if (count($comments)>0)
              @foreach ($comments as $C)
               <div class="c_content">
                  <div class="img"> <!--Contiene Imagen-->
                    @if ($C->user->photo == "default_image.jpg")
                      <img style="width:100%; height:100% "  src="{{URL::to('/')}}/uploads/images/profiles/{{$C->user->photo}}" alt="" height="60">
                    @else
                      <img style="width:100%; height:100% "  src="{{URL::to('/')}}/uploads/images/profiles/{{$C->user->id}}/{{$C->user->photo}}"  alt="" height="60">
                    @endif
                  </div>
                   <div class="c_text">
                      <label class="c_label" for="">{{$C->user->email}}</label><i> ( {{date("d-m-Y H:i:s a", strtotime($C->created_at)); }})</i> Dijo:
                      <p class="c_parraph">{{$C->comment}}</p> <!--Contiene Texto-->
                   </div>
                </div>
              @endforeach
              @else
                No hay comentarios
              @endif
           </div>
         <br>
         <hr>
         <div class="comment_box">
            @if($errors->has())               
                <div class="alert alert-danger fade in">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  @foreach($errors->all() as $error)
                      <p>{{ $error  }}</p>
                  @endforeach

                 </div>
            @endif
          
            {{ Form::open(['url'=>'/comments/store/'.$publication->id,'method'=>'post']) }}
            <div class="comment_box_text_name" >
              <label for="" class="comment_box_label">{{Auth::user()->email}}</label>
            </div>
            <div class="comment_box_text">
              <textarea name="comment" id="" cols="" rows="4" class="form-control"></textarea>
            </div>
            <div><br> 
               {{ Form::submit('Comentar',['class'=>'btn btn-primary'] )}}
            </div>
           {{ Form::close() }}
         </div>
        
      </div>
		</div>
@stop