@extends('layouts.main')
@section('content')
        
<div class="row">
  <div class="col-xs-12">
    <h1 class="text-center">Mis Propuestas Activas  {{ count($proposals) }} </h1> 
    <br>
    <div class="table-responsive "  style="padding-left:0;">
      <table class="table">
        <thead>
          <tr>
            <th class="col-sm-2">Imagen</th>
            <th class="col-sm-3">Descripcion</th>
            <th class="col-sm-1 text-center">Ver</th>
            <th class="col-sm-1 text-center">Eliminar</th>    

          </tr>
        </thead>
        <tbody>
        @foreach ($proposals as $Pro)
            <tr>
              <td><img  width="100%" class="img-responsive thumbnail" src="{{URL::to('/')}}/uploads/images/publications/user_{{$Pro->publication->user->id}}/proposals/{{$Pro->picture}}"></td>
              <td class="text-left"><p>{{$Pro->description}}</p></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/publications/show/{{$Pro->publication->id}}" ><span class="glyphicon glyphicon-search"></span></a></td>
              <td class="text-center" ><a href="{{URL::to('/')}}/proposals/destroy/{{$Pro->id}}" onclick="return confirm('AL eliminar la propuesta se cancela el intercambio pendiente deseas elimilarna?')" ><span class="glyphicon glyphicon-trash red"></span></a></td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
