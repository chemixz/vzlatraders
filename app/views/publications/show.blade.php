@extends('layout')
@section('content')
		<div class="row" ng-app="angularFront">
			<div class="col-xs-8 center-block no-float">
        
  			 <div class="text-center thumbnail">
               <img width="100%" height="500px" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture}}">
         </div>
        
         <div class="text-justify">
            <p>
              <strong>Autor:</strong>
                {{$publication->user->names}}
            </p>
            <?php $desc = explode("/", $publication->description); ?>
          	<p>
          		<strong>Cambio: </strong><br>
            </p>
           	<ul>
             @foreach ($desc as $D)
              <li style="color: blue"><strong>{{$D}}</strong></li>
             @endforeach
            </ul>
         

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
           @if(Session::has('message_proposal'))  <!--muestra mesaje de suceso que viene del homecontrol-->
            <div class="alert alert-{{ Session::get('class') }} fade in">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                <p>  {{ Session::get('message_proposal') }} </p>
            </div>
          @endif
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
          <hr>
          <div class="bootstrap_proposal_box" >
            @if (count($publication->proposals)>0)
                @foreach ($publication->proposals as $Pro)
                  <div class="col-md-12 bootstrap_proposal_box_content" >
                      <div class="col-md-5" ng-controller="OpenImageController">
                          <a href="" ng-click="openImage('pro_image_'+{{$Pro->id}})" >
                              <img width="100%" height="150" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->id}}/proposals/{{$Pro->picture}}" id="pro_image_{{$Pro->id}}"  alt="">
                          </a>
                      </div>
                      <div class="col-md-7 bootstrap_comment_box_parraph">
                          <h4>{{$Pro->user->names}} Dijo:</h4> 
                          <p>{{$Pro->description}}</p>
                         <div class="text-right  ">
                            <i >( {{date("d-m-Y H:i:s a", strtotime($Pro->created_at)); }})</i>
                             
                         </div>

                      </div>
                      @if ($Pro->user->id == Auth::user()->id  )
                      <div class="text-left " ng-controller="Modal_Edit_Proposer_Controller" >
                              <a class="btn btn-danger" href="{{URL::to('/')}}/proposals/destroy/{{$Pro->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                              <a class="btn btn-success" ng-click="getProposal({{$Pro->id}})"><span class="glyphicon glyphicon-edit"></span></a>
                      </div>
                      @endif
                  </div>
                  @if ($publication->user->id == Auth::user()->id )
                   <div class="text-left bootstrap_cooment_box_actions"  >
                      <a class="btn btn-success" href="#">Aceptar</a>
                      <a class="btn btn-danger" href="{{URL::to('/')}}/proposals/destroy/{{$Pro->id}}">Rechazar</a>
                  </div>
                  @endif
               @endforeach
            @else
              No hay Propuestas
            @endif
         </div>
         <div class="text-left" ng-controller="Modal_New_Proposer_Controller">
            <a class="btn btn-primary" href="#" style="margin-top: 1em;" ng-click="openNewModal({{$publication->id}})" data-toggle="modal" data-target="#modalproposal" >Nueva Propuesta </a>
         </div>
        <br><br>
         <div class="text-center">
            <h3 >Comentarios</h3>
         </div>
        @if(Session::has('message_comment'))  <!--muestra mesaje de suceso que viene del homecontrol-->
          <div class="alert alert-{{ Session::get('class') }} fade in">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
              <p>  {{ Session::get('message_comment') }} </p>
          </div>
        @endif
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
                  </div>
                 <div class=" text-left bootstrap_cooment_box_actions" style="margin-top: 1.3em;" >
                    <a class="btn btn-danger" href="{{URL::to('/')}}/comments/destroy/{{$C->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
              </div>
             @endforeach
            @else
              No hay comentarios
            @endif
         </div>
        <div class="text-left">
            <a class="btn btn-primary" href="#" style="margin-top: 1em;"  data-toggle="modal" data-target="#modalcomment" >Nuevo Comentario </a>
         </div>
           <div class="modal fade" id="modalproposal" role="dialog" aria-labelledby="myModalLabel" ng-controller="Modal_New_Proposer_Controller">
            <div class="modal-dialog" role="document" >
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Propuesta</h4>
                </div>
                <div class="modal-body">
                   <form id="form_new_proposal"  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                        <div class="" style="padding-left:0">
                          <label for="picture"></label>
                          <div class="">
                            <div class="thumbnail" style="overflow:hidden;">
                              <div id="target_new_proposal">
                                
                              </div>
                              <br>
                              <input type="file" ng-model="picture" name="picture" onchange="angular.element(this).scope().onFileLoad(this)" class="picture"  >    
                            </div>
                          </div>
                        </div>
                     </div>

                      <div class="form-group"> 
                        <label for="">Te cambio por :</label>
                         <textarea name="description" id="" cols="" rows="4" class="form-control"></textarea>
                      </div> 
                       
                       <div class="text-center">
                        <input type="submit"  ng-click="submit()" class="btn btn-primary" value="Crear Propuesta">
                        <button type="button" ng-click="" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modaleditproposal" role="dialog" aria-labelledby="myModalLabel3"  ng-controller="Modal_Edit_Proposer_Controller">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Editar Propuesta</h4>
                </div>
                <div class="modal-body">
                   <form id="form_edit_proposal"  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                        <div class="" style="padding-left:0">
                          <label for="picture"></label>
                          <div class="">
                            <div class="thumbnail" style="overflow:hidden;">
                              <div id="target_edit_proposal">
                              </div>
                              <br>
                              <input type="file" ng-model="picture" name="picture" onchange="angular.element(this).scope().onFileLoad(this)" id="file_picture" class="picture"    >
                            </div>
                          </div>
                        </div>
                     </div>
                      <div class="form-group"> 
                        <label for="">Te cambio por :</label>
                         <textarea name="description" id="description_proposal" cols="" rows="4" class="form-control"></textarea>
                      </div> 
                       
                       <div class="text-center">
                        <input type="submit"  ng-click="submit()" class="btn btn-primary" value="Guardar">
                        <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                    </form>
                    
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalcomment" role="dialog" aria-labelledby="myModalLabel2" ng-controller="Modal_Comment_Controller">
            <div class="modal-dialog" role="document" >
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Comentar</h4>
                </div>
                <div class="modal-body">
                   {{ Form::open(['url'=>'/comments/store/'.$publication->id,'method'=>'post']) }}
                      <div class="form-group"> 
                         <textarea name="comment" id="text_comment_modal" cols="" rows="4" class="form-control"></textarea>
                      </div> 
                      <div class="text-center">

                        {{ Form::submit('Comentar',['class'=>'btn btn-primary '] )}}
                        <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      </div>
                    {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalImage"  tabindex="-1" role="dialog" aria-labelledby="myModalLabelImage">
          <div class="modal-dialog"  role="document"  >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <br>
              </div>
              <div class="modal-body text-center">
                 <div id="targetViewImage">
                 </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
            
      </div>
		</div>
@stop