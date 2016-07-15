@extends('layout')
@section('content')
		<div class="row">
			<div class="col-xs-8 center-block no-float">
        
  			 <div class="text-center thumbnail">
               <img width="100%" height="500px" src="{{URL::to('/')}}/uploads/images/publications/{{$publication->user->id}}/{{$publication->picture}}">
         </div>
        
         <div class="text-justify">
            <p>
              <strong>Autor:</strong>
                {{$publication->user->names}}
            </p>
            <?php $desc = explode("/", $publication->description); ?>
          	<p>
          		<strong>Cambio: </strong><br>
             	<ul>
               @foreach ($desc as $D)
                <li style="color: blue"><strong>{{$D}}</strong></li>
               @endforeach
              </ul>
           	</p>

         </div>
         <?php $options = explode("/", $publication->changeoptions); ?>
         <div>
          <strong>Por estas opciones:</strong>
          <ol>
           @foreach ($options as $O)
            <li style="color: blue"><strong>{{$O}}</strong></li>
           @endforeach
           </ol>
         </div>
          <div class="text-center">
              <a class="btn btn-danger" href="{{URL::to('/')}}/" data-toggle="tooltip" data-placement="top" title="Atras"><span class=" glyphicon glyphicon-arrow-left"></span></a>
             @if (Auth::user()->id == $publication->user->id)
              <a class="btn btn-success" href="{{URL::to('/')}}/publications/edit/{{$publication->id}}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
             @endif
         </div>
         <div class="proposals_box">
           
         </div>
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
            <div class="text-center">
              <br> 
               {{ Form::submit('Comentar',['class'=>'btn btn-primary '] )}}
            </div>
           {{ Form::close() }}
         </div>
          <br>
         <div class="text-center">
            <h3 >Comentarios</h3>
         </div>
         <hr ;">
        
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
        
      </div>
		</div>
@stop