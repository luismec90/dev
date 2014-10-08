<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Gracias por crear su cuenta en nuestra red LinkingShops.
            Por favor haga click en el link a continuación para verificar su dirección de correo.
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>