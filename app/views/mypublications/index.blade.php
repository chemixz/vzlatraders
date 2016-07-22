@extends('layout')
@section('content')
        
<div class="row">
  <div class="col-xs-12">
    <strong> Mis Publicaciones  {{ count($publications) }}</strong>
    <br>
    <div class="table-responsive "  style="padding-left:0;">
      <table class="table">
        <thead>
          <tr>
            <th class="col-sm-2">Imagen</th>
            <th class="col-sm-3">Descripcion</th>
            
            <th class="col-sm-1 text-center">Ver</th>
            <th class="col-sm-1 text-center">Editar</th>
            <th class="col-sm-1 text-center">Eliminar</th>    

          </tr>
        </thead>
        <tbody>
        @foreach ($publications as $P)
            <tr>
              <?php  $mivar = 'picture'.$P->cover; ?>
              <td><img  width="80%" class="img-responsive thumbnail" src="{{URL::to('/')}}/uploads/images/publications/user_{{$P->user->id}}/{{$P->$mivar}}"></td>
              <td><p>{{$P->description}}</p></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/show/{{$P->id}}" ><span class="glyphicon glyphicon-search"></span></a></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/edit/{{$P->id}}" ><span class="glyphicon glyphicon-pencil darkgreen"></span></a></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/destoy/{{$P->id}}" onclick="return confirm('Esta seguro de borrar esta publicacion?')" ><span class="glyphicon glyphicon-trash red"></span></a></td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
