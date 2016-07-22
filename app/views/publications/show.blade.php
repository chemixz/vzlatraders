@extends('layout')
@section('content')
		<div class="row" ng-app="angularFront">
			<div class="col-xs-12 col-md-8 center-block no-float" ng-controller="Publication_Show_Controller">

        
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
  			 <div>
            <div class="col-xs-12 col-md-3">
              <div  class="col-xs-4 col-sm-4 col-md-12" style="margin-top: 0.7em;" >
               <a href="">
                  <img width="100%" ng-click="setCover(1)" id="cover_picture_1" height="90px" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture1}}" class="img-responsive mythumb "  >
               </a>
              </div>
              <div  class="col-xs-4 col-sm-4 col-md-12" style="margin-top: 0.7em;">
                <a href="">
                  <img width="100%" ng-click="setCover(2)" id="cover_picture_2" height="90px" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture2}}" class="img-responsive mythumb "  >
                </a>
              </div>
              <div  class="col-xs-4 col-sm-4 col-md-12" style="margin-top: 0.7em;">
                <a href="">
                  <img width="100%" ng-click="setCover(3)" id="cover_picture_3" height="90px" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture3}}" class="img-responsive mythumb "  >
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-md-1">
              
            </div>
            <div class="col-xs-12 col-md-8">
             <img width="100%" height="400px" id="cover" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->picture1}}" class=" mythumb" >
            </div>
         </div>
         
          <div class="col-md-12 "  style="padding-left: 0; padding-right: 0; margin-top: 1em; ">
              <div class="col-xs-12 col-md-4 "  >
                  <a href=""  >
                    @if ($publication->user->photo == "default_image.jpg")
                          <img width="100%" height="180" src="{{URL::to('/')}}/uploads/images/profiles/{{$publication->user->photo}}" class="mythumb">
                    @else
                          <img width="100%" height="180" src="{{URL::to('/')}}/uploads/images/profiles/user_{{$publication->user->id}}/{{$user->photo}}" class="mythumb">
                    @endif
                  </a>
              </div>
              <div class="col-xs-12 col-md-8 ">

                 <div class="text-justify" style="padding-left: 10%;">
                    <p>
                      <strong>Autor:</strong>
                      <strong style="font-size: 1.3em;">{{$publication->user->names}} </strong> 
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
                 <?php $options = explode("/", $publication->changeoptions); ?>
                  <strong>Por estas opciones:</strong>
                  <ol>
                   @foreach ($options as $O)
                    <li style="color: blue"><strong>{{$O}}</strong></li>
                   @endforeach
                   </ol>
                 
                 </div>
                 
              </div>
          </div>
          <div class="col-xs-12 text-center" style="margin-top: 1em;">
              <a class="btn btn-danger" href="{{URL::to('/')}}/" data-toggle="tooltip" data-placement="top" title="Atras"><span class=" glyphicon glyphicon-arrow-left"></span></a>
             @if (Auth::user()->id == $publication->user->id)
              <a class="btn btn-success" href="{{URL::to('/')}}/publications/edit/{{$publication->id}}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
             @endif
         </div>
         @if ( count( $exchanges) > 0 )
         <div class="col-xs-12 text-center">
           <h3>En Intercambio  ({{count( Exchange::where(''))}})</h3>
         </div>
         <hr>
             <div class="col-md-12" style="margin-bottom: 5em; margin-top: 3em;">
                 <div class="col-md-5" >
                    <div class="col-md-12 " >
                        <a href="">
                        <?php $mivar = 'picture'.$publication->cover ?>
                            <img width="100%" height="200" class="thumbnail" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/{{$publication->$mivar}}" alt="">
                        </a>
                        <strong>Autor :</strong> {{$exchanges[0]->publication_autor_names}}
                    </div>
                    
                    @if ($exchanges[0]->complete < 1 && $exchanges[0]->user_id == Auth::user()->id )
                     <div class="col-xs-12">
                      <a class="btn btn-success" href="{{URL::to('/')}}/exchanges/complete/{{$publication->id}}" data-toggle="tooltip" data-placement="top" title="Completar"><span class="glyphicon glyphicon-ok"></span></a>
                    </div>
                    @endif
                    </div>
                    <div class="col-md-2 text-center middle">
                        <span class="glyphicon glyphicon-transfer" style="margin-top: 1.5em; font-size: 3em; color:blue;"></span>
                    </div>
                  <div class="col-md-5">
                    <div class="col-md-12 ">
                      <a href="">
                           <img width="100%" height="200" class="thumbnail" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/exchanges/{{$exchanges[1]->proposal_picture}}" alt="">
                      </a>
                      <strong>Autor :</strong> {{$exchanges[1]->proposal_autor_names}}

                    </div>
                     
                     @if ($exchanges[1]->complete < 1  && $exchanges[1]->user_id == Auth::user()->id)
                    <div class="col-xs-12">
                      <a class="btn btn-success" href="{{URL::to('/')}}/exchanges/complete/{{$publication->id}}" data-toggle="tooltip" data-placement="top" title="Completar"><span class="glyphicon glyphicon-ok"></span></a>
                    </div>
                    @endif
                 </div>
             </div>
         @endif
        <br>
         <div class=" col-xs-12 text-center">
          <h3 >Propuestas ({{count($publication->proposals)}})</h3>
        </div>

        <hr>
        <div class="bootstrap_proposal_box" >
            @if (count($publication->proposals)>0)
                @foreach ($publication->proposals as $Pro)
                  @if ($publication->user->id == Auth::user()->id || $Pro->user->id == Auth::user()->id || Auth::user()->level > 1 )
                    <div class="col-md-12 bootstrap_proposal_box_content" >
                        <div class="col-md-4" >
                            <a href="" ng-click="openImage({{$Pro->id}})" >
                                <img width="100%" height="150" src="{{URL::to('/')}}/uploads/images/publications/user_{{$publication->user->id}}/proposals/{{$Pro->picture}}" id="pro_image_{{$Pro->id}}"  alt="">
                            </a>
                        </div>
                        <div class="col-md-8 bootstrap_comment_box_parraph">
                            <h4>{{$Pro->user->names}} Propone:</h4> 
                            <p>{{$Pro->description}}</p>
                           <div class="text-right  ">
                              <i >( {{date("d-m-Y H:i:s a", strtotime($Pro->created_at)); }})</i>
                               
                           </div>

                        </div>
                        @if ($Pro->user->id == Auth::user()->id  || Auth::user()->level == 2 )
                        <div class="text-left "  >
                             <a class="btn btn-danger" href="{{URL::to('/')}}/proposals/destroy/{{$Pro->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                            @if ($Pro->user->id == Auth::user()->id )
                              <a class="btn btn-success" ng-click="editProposal({{$Pro->id}})"><span class="glyphicon glyphicon-edit"></span></a>
                            @endif
                        </div>
                        @endif
                    </div>
                  @if ($publication->user->id == Auth::user()->id  && count( $exchanges) < $publication->stock )
                      
                       <div class="text-left bootstrap_cooment_box_actions"  >
                          <a class="btn btn-success" href="{{URL::to('/')}}/exchanges/new/{{$Pro->id}}">Aceptar</a>
                          <a class="btn btn-danger" href="{{URL::to('/')}}/proposals/destroy/{{$Pro->id}}">Rechazar</a>
                      </div>
                  @endif
                @endif
              @endforeach
            @else
              No hay Propuestas
            @endif
         </div>
         <div >
         @if ( count( $exchanges) < 1)
            @if ($publication->user->id != Auth::user()->id &&  count( Proposal::where('publication_id','=',$publication->id)->where('user_id','=',Auth::user()->id)->get() ) < 3 )
             <div class="text-left" >
                <a class="btn btn-primary" href="" style="margin-top: 1em;" ng-click="newProposal({{$publication->id}})" data-toggle="modal" data-target="#modalproposal" >Nueva Propuesta </a>
             </div>
             @else
             <div class="text-left">
              @if ($publication->user->id != Auth::user()->id )
               <p>Ya Tienes tres propuetas </p>
              @endif
             </div>
            @endif
        @elseif ($publication->user->id != Auth::user()->id )

        <div class="text-left">
          <p> Ya esta en progreso el intercambio </p>
        </div>
        @endif
              <div class="modal fade" id="modalproposal" role="dialog" aria-labelledby="myModalLabel3"  >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Propuesta</h4>
                    </div>
                    <div class="modal-body">
                       <form id="form_proposal"  method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                            <div class="" style="padding-left:0">
                              <label for="picture"></label>
                              <div class="">
                                <div class="thumbnail" style="overflow:hidden;">
                                  <div id="target_proposal_img">
                                  </div>
                                  <br>
                                  <input type="file" ng-model="picture" name="picture" onchange="angular.element(this).scope().onFileLoad(this,2)" id="file_picture" class="picture"    >
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
         </div>

        <br><br>


         <div class="text-center">
            <h3 >Comentarios</h3>
         </div>

         <hr>
         <div class="bootstrap_comment_box">
            @if (count($publication->comments)>0)
                @foreach ($publication->comments as $C)
              <div class="col-md-12 bootstrap_comment_box_content" >
                  <div class="col-md-3"">
                      <a href="">
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
                @if ($C->user->id == Auth::user()->id  || Auth::user()->level == 2 )
                 <div class=" text-left bootstrap_cooment_box_actions" style="margin-top: 1.3em;" >
                    <a class="btn btn-danger" href="{{URL::to('/')}}/comments/destroy/{{$C->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                    @if ($C->user->id == Auth::user()->id )
                     <a class="btn btn-success" href="" ng-click="editComment({{$C->id}})"><span class="glyphicon glyphicon-edit"></span></a>
                    @endif
                </div>
                @endif
              </div>
             @endforeach
            @else
              No hay comentarios
            @endif
         </div>
         <div >
            <div class="text-left">
              <a class="btn btn-primary" href="" ng-click="newComment({{$publication->id}})" style="margin-top: 1em;"  >Nuevo Comentario </a>
            </div>
            <div class="modal fade" id="modalcomment" role="dialog" aria-labelledby="myModalLabel2" >
              <div class="modal-dialog" role="document" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Comentar</h4>
                  </div>
                  <div class="modal-body">
                    <form id="form_comment"  method="post"  >
                        <div class="form-group"> 
                           <textarea name="comment" id="text_comment_modal" cols="" rows="4" class="form-control"></textarea>
                        </div> 
                        <div class="text-center">
                          <input type="submit" ng-click="submitcoment()" value="Comentar" class="btn btn-primary">
                          <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                  </div>
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