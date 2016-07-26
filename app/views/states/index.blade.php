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
      {{ HTML::link('/states/new' , ' Nueva Estado',['class'=>'btn btn-success'] ) }}
            @if (count($states)>0)
            <table class="table table">
               <thead>
                  <tr>
                     <th width="25%">ID</th>
                     <th width="25%">Nombre</th>
                     <th width="25%" class="text-right">Acciones</th>
                  </tr>
               </thead> 
            @foreach ($states as $S)
               <tbody>
               <tr>
                  <td width="25%">{{$S->id}}</td>
                  <td width="25%">{{$S->name}}</td>
                  <td width="25%" class="text-right">
                     <a href="{{URL::to('/states/edit') }}/{{ $S->id }}" class="btn btn-primary" alt="Modificar" title="Modificar" id="modificar" >
                        <span class="glyphicon glyphicon-edit"></span>
                     </a>
                     <a href="{{URL::to('/states/destroy') }}/{{ $S->id }}" class="btn btn-danger eliminar" alt="Eliminar" title="Eliminar" >
                        <span class="glyphicon glyphicon-trash"></span>
                     </a>
                  </td>
               </tr>
               
            @endforeach
               </tbody>
            </table>
            @else
               <h3>No hay Estados Registrados</h3>
            @endif
      </div>
   </div>
</div>
@stop