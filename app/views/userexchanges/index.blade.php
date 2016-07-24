@extends('layout')
@section('content')
        
<div class="row">
  <div class="col-xs-12 col-md-10 center-block no-float">
    <h1 class="text-center"> Mis Intercambios</h1>
    <strong> Cantidad: {{ count($exchanges) }}</strong>
    <br>
    <div class="table-responsive "  style="padding-left:0;">
      <table class="table">
        <thead>
          <tr>
            <th width="45%" class="text-center">Mi producto</th>
            <th width="10%" class="text-center">Accion</th>
            <th width="45%" class="text-center">Produto Objectivo</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($exchanges as $Ex)
            <tr>
              <?php  $myvar = 'picture'.$Ex->publication->cover; ?>
              @if ($Ex->publication->user->id == Auth::user()->id )
                 <td class="text-center"> <img  width="200px" height="200px;" class="mythumb" src="{{URL::to('/')}}/uploads/images/publications/user_{{$Ex->publication->user->id}}/{{$Ex->publication->$myvar}}"></td>
                 <td class="text-center"><p><span class="glyphicon glyphicon-transfer blue" style="font-size: 3em; margin-top: 1.5em;"></span></p></td>
                 <td class="text-center"><img  width="200px" height="200px;" class="mythumb" src="{{URL::to('/')}}/uploads/images/publications/user_{{$Ex->publication->user->id}}/exchanges/{{$Ex->proposal_picture}}"></td>
              @else
                <td class="text-center"><img  width="200px" height="200px;" class="mythumb" src="{{URL::to('/')}}/uploads/images/publications/user_{{$Ex->publication->user->id}}/exchanges/{{$Ex->proposal_picture}}"></td>
                <td class="text-center"><p><span class="glyphicon glyphicon-transfer blue" style="font-size: 3em; margin-top: 1.5em;"></span></p></td>
                <td class="text-center"> <img  width="200px" height="200px;" class="mythumb" src="{{URL::to('/')}}/uploads/images/publications/user_{{$Ex->publication->user->id}}/{{$Ex->publication->$myvar}}"></td>
              @endif
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
