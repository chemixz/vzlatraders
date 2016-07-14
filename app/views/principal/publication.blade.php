 @if (count($municipalities)>0)
      @foreach ($municipalities as $Mu)
          @foreach ($Mu->publications as $P )
             <div class="panel panel-primary   public_box" > 
                <div class="panel-heading "> 
                    <h4 class="panel-title text-center">{{ $P->product_name}}</h4>
                </div> 
                <div class="contenido public_box_content" id="">
                  <div class="text-center">
                      <img width="100%" height="200" src="{{URL::to('/')}}/uploads/images/publications/{{$P->user->id}}/{{$P->picture}}">
                  </div>
                  <div class="public_box_content_description">
                    <p class="text-justify ">
                    {{ str_limit($P->description, $limit = 100, $end = '...') }}
                    </p>
                  </div>
                </div>
                <br>
                 <div style="margin-left: 1em;">
                  municipio: {{$Mu->name}}
                </div>
                <br>
                <div class=" public_box_actions">
                   <p>
                    <a class="btn btn-primary" href="{{URL::to('/')}}/publications/show/{{$P->id}}" data-toggle="tooltip" data-placement="top" title="Ver"><span class="glyphicon glyphicon-eye-open"></span></a>
                    @if (Auth::user()->id == $P->user->id)
                    <a class="btn btn-success" href="{{URL::to('/')}}/publications/edit/{{$P->id}}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                    @endif
                    <a href="#" class="btn btn-warning "  data-toggle="tooltip" data-placement="top" title="Intercambios"><span class="glyphicon glyphicon-refresh" style="font-size: 15px; color: gray;"></span> <span class="badge"><span style="color: black;"> 0 </span></span></a>
                    <span class="btn btn-info " style="float: right; margin-right: 1em;" data-toggle="tooltip" data-placement="top" title="Comentarios"><span class="glyphicon glyphicon-envelope" style="font-size: 15px; color: #FAFAD2;"></span> <span class="badge"><span style="color: black;">{{ count($P->comments) }}</span></span></span>
                   </p>
                </div>
               
             </div> 
          @endforeach
      @endforeach
    @endif