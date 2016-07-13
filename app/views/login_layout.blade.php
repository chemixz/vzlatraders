<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        {{ HTML::style('assets/css/bootstrap.css'); }}
        {{ HTML::style('assets/css/formstyle.css'); }}
        {{ HTML::style('assets/css/form.css'); }}
    </head>
    <body>
    	<div class="container">
    		
    	</div>
    	  @yield('content')

        {{ HTML::script('assets/js/angular.min.js') }}
        {{ HTML::script('assets/js/jquery.min.js') }}
        {{ HTML::script('assets/js/bootstrap.js') }}
        {{ HTML::script('assets/js/signup-angular.js') }}
        {{ HTML::script('assets/js/myjs.js') }}

   </body>
</html>

