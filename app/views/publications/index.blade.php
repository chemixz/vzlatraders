@extends('layout')
@section('content')
        

<div class="row">
   <div class="col-xs-12  ">
    <div class="center-block" style="width: 320px; ">
      <div class="form-group " style=" width: 150px; float:left;">
        <label style="float:left">Estado</label>
        <form action="{{URL::to('/')}}/select_state" method="POST" id="state_form">
            <select name="state_id" id="state_select" onchange="this.form.submit()" class="form-control">
               @foreach ($states as $S)
                <option  @if( Session::get('state_id') == $S->id  ) selected @endif value="{{$S->id}}">{{$S->name}}</option>
              @endforeach
             
          </select>
        </form>
      </div>
      <div class="form-group " style=" width: 150px; float:left; margin-left: 11px; ">
        <label style="float:left">Categoria</label>
        <form action="{{URL::to('/')}}/select_cat" method="POST" >
            <select name="category_id" id="state_select" onchange="this.form.submit()" class="form-control">
              <option selected value="">Todas</option>
              @foreach ($categories as $Cat)
                <option  @if( Session::get('category_id') == $Cat->id  ) selected @endif value="{{$Cat->id}}">{{$Cat->name}}</option>
              @endforeach
             
          </select>
        </form>
      </div>
      
    </div>
  </div>
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
  <div class="col-sm-12 center-block" style="padding: 0;">
    @if ( Session::has('category_id') &&  Session::get('category_id') != "" )
       @include('publications.publication_category')
    @else
       @include('publications.publication')
    @endif
  </div>
</div>
@stop