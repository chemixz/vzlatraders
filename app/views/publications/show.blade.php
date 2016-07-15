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
           <br>
           <div class="text-center">
              <h3 >Propuestas</h3>
           </div>
          <hr>
          <div class="">
               @if($errors->has())               
                <div class="alert alert-danger fade in">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  @foreach($errors->all() as $error)
                      <p>{{ $error  }}</p>
                  @endforeach

                 </div>
            @endif
          </div>
          <div class="bootstrap_proposal_box">
            @if (count($publication->proposals)>0)
                @foreach ($publication->proposals as $Pro)
              <div class="col-md-12 bootstrap_comment_box_content" >
                  <div class="col-md-5"">
                      <a href="#">
                          <img width="100%" height="150" src="{{URL::to('/')}}/uploads/images/publications/{{$publication->id}}/proposals/{{$Pro->picture}}"  alt="">
                      </a>
                  </div>
                  <div class="col-md-7 bootstrap_comment_box_parraph">
                      <h4>{{$Pro->user->names}} Dijo:</h4> 
                      <p>{{$Pro->description}}</p>
                     <div class="text-right  ">
                      <i >( {{date("d-m-Y H:i:s a", strtotime($Pro->created_at)); }})</i>
                         
                     </div>
                  </div>
              </div>
               <div class="text-left bootstrap_cooment_box_actions" >
                  <a class="btn btn-success" href="#">Aceptar</a>
                  <a class="btn btn-danger" href="#">Rechazar</a>
              </div>
             @endforeach
            @else
              No hay Propuestas
            @endif
         </div>
         <div class="text-left">

            <a class="btn btn-success" href="#" style="margin-top: 1em;"  data-toggle="modal" data-target="#modalproposal" >Nueva Propuesta </a>
         </div>
         <br>
         <div class="text-center">
            <h3 >Comentar</h3>
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
         <hr>
         <div class="bootstrap_comment_box">
            @if (count($comments)>0)
                @foreach ($comments as $C)
              <div class="col-md-12 bootstrap_comment_box_content" >
                  <div class="col-md-3"">
                      <a href="#">
                           @if ($C->user->photo == "default_image.jpg")
                          <img width="100%" height="150" src="{{URL::to('/')}}/uploads/images/profiles/{{$C->user->photo}}"  alt="">
                          @else
                          <img width="100%" height="150" src="{{URL::to('/')}}/uploads/images/profiles/{{$C->user->id}}/{{$C->user->photo}}"  alt="">

                          @endif
                      </a>
                  </div>
                  <div class="col-md-9 bootstrap_comment_box_parraph">
                      <h4>{{$C->user->email}} Dijo:</h4> 
                      <p>{{$C->comment}}</p>
                     <div class="text-right  ">
                      <i >( {{date("d-m-Y H:i:s a", strtotime($C->created_at)); }})</i>
                         
                     </div>
                   <div class="text-left bootstrap_cooment_box_actions" >
                      <a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </div>
                  </div>
              </div>
             @endforeach
            @else
              No hay comentarios
            @endif
         </div>
           <div class="modal fade" id="modalproposal" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" ng-controller="">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                   {{ Form::open(['url'=>'/proposals/store/'.$publication->id,'method'=>'post', 'file'=>true, 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                        <div class="" style="padding-left:0">
                          <label for="picture"></label>
                          <div class="">
                            <div class="thumbnail" style="overflow:hidden;">
                              <div id="target">
                                
                              </div>
                              <br>
                              <input type="file" name="picture" class="picture"  >    
                            </div>
                          </div>
                        </div>
                     </div>

                      <div class="form-group"> 
                        <label for="">Te cambio por :</label>
                         <textarea name="description" id="" cols="" rows="4" class="form-control"></textarea>
                      </div> 
                       
                       <div class="text-center">
                        {{ Form::submit('Crear Propuesta',['class'=>'btn btn-primary '] )}}
                        <button type="button" ng-click="" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                    {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
            
      </div>
		</div>
@stop