@extends('layouts.main')
@section('content')
        
<div class="row">
	<div class="col-sm-12">
    	<div class="col-sm-12">
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

    	</div>
      <div class="col-sm-12">
      {{ HTML::link('/categories/new' , ' Nueva Categoria',['class'=>'btn btn-success'] ) }}
            @if (count($categories)>0)
            <table class="table table">
               <thead>
                  <tr>
                     <th width="25%">ID</th>
                     <th width="25%">Nombre</th>
                     <th width="25%" class="text-right">Acciones</th>
                  </tr>
               </thead> 
            @foreach ($categories as $C)
               <tbody>
               <tr>
                  <td width="25%">{{$C->id}}</td>
                  <td width="25%">{{$C->name}}</td>
                  <td width="25%" class="text-right">
                     <a href="{{URL::to('/categories/edit') }}/{{ $C->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" id="modificar" >
                        <span class="glyphicon glyphicon-edit"></span>
                     </a>
                     <a href="{{URL::to('/categories/destroy') }}/{{ $C->id }}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar" >
                        <span class="glyphicon glyphicon-trash"></span>
                     </a>
                  </td>
               </tr>
               
            @endforeach
               </tbody>
            </table>
            @else
               <h3>No hay categories Registradas</h3>
            @endif
      </div>
   </div>
</div>
@stop