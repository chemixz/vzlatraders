 @if (count($municipalities)>0)
      @foreach ($municipalities as $Mu)
          @foreach ($Mu->publications as $P )
            @if ($P->category_id == Session::get('category_id'))
             <div class="panel panel-custom  public_box"  style="border-color: {{$P->category->codecolor}}"> 
                <div class="panel-heading-custom " style="background-color: {{$P->category->codecolor}}"> 
                    <h4 class="panel-title text-center">{{ $P->user->names}}</h4>
                </div> 
                <div class="contenido public_box_content" id="">
                  <div class="text-center">
                       <?php  $mivar = 'picture'.$P->cover; ?>
                      <img width="100%" height="200" src="{{URL::to('/')}}/uploads/images/publications/user_{{$P->user->id}}/{{$P->$mivar}} ">
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
                    <a href="#" class="btn btn-warning "  data-toggle="tooltip" data-placement="top" title="Intercambios"><span class="glyphicon glyphicon-refresh" style="font-size: 15px; color: gray;"></span> <span class="badge"><span style="color: black;">{{ count($P->exchanges) }} </span></span></a>
                    <span class="btn btn-info " style="float: right; margin-right: 1em;" data-toggle="tooltip" data-placement="top" title="Comentarios"><span class="glyphicon glyphicon-envelope" style="font-size: 15px; color: #FAFAD2;"></span> <span class="badge"><span style="color: black;">{{ count($P->comments) }}</span></span></span>
                   </p>
                </div>
               
             </div> 
            @endif
          @endforeach
      @endforeach
    @endif