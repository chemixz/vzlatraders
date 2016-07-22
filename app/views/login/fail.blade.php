@extends('login.login_layout')
@section('content')
        <div class="row">
           <div class="col-xs-5 center-block placeholder no-float"  style="margin-top: 3em;">
                 <legend>Error</legend>
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
               <a href="{{URL::to('/')}}/signup" style="color: blue;">Registrate</a>
              </div>
             
          </div>
       </div>    
@stop