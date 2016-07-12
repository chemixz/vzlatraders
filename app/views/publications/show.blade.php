@extends('layout')
@section('content')
		<div class="row">
			<div class="col-xs-12 center-block no-float">
        
  			 <div class="text-center thumbnail">
               <img width="500" height="500" src="{{URL::to('/')}}/uploads/images/publications/{{$publication->user->id}}/{{$publication->picture}}">
         </div>
         <h2 class="text-center"> {{$publication->product_name}} </h2>
         <div class="text-justify">
          	<p>
          		<strong>Descripcion: </strong><br>
             		{{$publication->description}}
           	</p>
           	<p>
           		<strong>Valorado en: </strong>
      					{{$publication->value}}</p>
         </div>
        	<div class="text-center">
        	   @if (Auth::user()->id == $publication->user->id)
              {{ HTML::link('/publications/edit/'.$publication->id , 'Editar',['class'=>'btn btn-success'] ) }}
            @endif
              {{ HTML::link('/', 'Atras',['class'=>'btn btn-danger'] ) }}
         </div>
          <br>
         <hr>
         <div class="text-center">
            <h3 >Comentarios</h3>
         </div>
         <div class="comments_list ">
            <div class="comment_list_child">
                @if (count($comments)>0)
                  @foreach ($comments as $C)
                  <div class="thumbnail comment_list_content">
                      <label for="">{{$C->user->email}}</label><i>({{$C->created_at }})</i> Dijo:
                      <p class="text-justify comment_list_description">
                        {{$C->comment}}
                      </p>
                   
                  </div>
                  @endforeach
                
                @else
                  No hay comentarios
                @endif
              
            </div>
         </div>
         <hr>
         <div class="comment_box">
          <div>
            @if($errors->has())               
                <div class="alert alert-danger fade in">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  @foreach($errors->all() as $error)
                      <p>{{ $error  }}</p>
                  @endforeach

                 </div>
            @endif
          </div>
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
         <hr>
      </div>
		</div>
@stop