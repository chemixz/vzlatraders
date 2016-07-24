@extends('layout')
@section('content')
        
<div class="row">
  <div class="col-xs-12">
    <h1 class="text-center">Mis Publicaciones </h1>
    <strong> Cantidad: {{ count($publications) }}</strong>
    <br>
    <div class="table-responsive "  style="padding-left:0;">
      <table class="table">
        <thead>
          <tr>
            <th class="col-sm-2">Imagen</th>
            <th class="col-sm-3">Descripcion</th>
            <th class="col-sm-1">Propuestas</th>
            <th class="col-sm-1">Comentarios</th>
            <th class="col-sm-1 text-center">Ver</th>
            <th class="col-sm-1 text-center">Editar</th>
            <th class="col-sm-1 text-center">Eliminar</th>    

          </tr>
        </thead>
        <tbody>
        @foreach ($publications as $P)
            <tr>
              <?php  $mivar = 'picture'.$P->cover; ?>
              <td><img  width="100%" class="img-responsive thumbnail" src="{{URL::to('/')}}/uploads/images/publications/user_{{$P->user->id}}/{{$P->$mivar}}"></td>
              <td class="text-left"><p>{{$P->description}}</p></td>
              <td class="text-center"><p><span class="badge" style="background:#2aabd2;">{{count($P->proposals) }}</span></p></td>
              <td class="text-center"><p><span class="badge" style="background:green;">{{count($P->comments)}}</span></p></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/show/{{$P->id}}" ><span class="glyphicon glyphicon-search"></span></a></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/edit/{{$P->id}}" ><span class="glyphicon glyphicon-pencil darkgreen"></span></a></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/destroy/{{$P->id}}" onclick="return confirm('Esta seguro de borrar esta publicacion?')" ><span class="glyphicon glyphicon-trash red"></span></a></td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
