<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifica tu cuenta</h2>

        <div>
            <strong>Hola {{$names}}</strong>.
            Has creado una cuenta en vzlatraders con el siguiente email {{$email}}. <br>
            Para confirmar y activar tu cuenta has click en el siguiente enlace. <br>
            {{ URL::to('http://vzlatraders/confirm/account/'. $confirmation_code) }}.<br/>

        </div>

    </body>
</html>