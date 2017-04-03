<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Own style -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
    <div class="container">
        <div id="logoDiv"></div>
        <h1>Four In A Line Game</h1>
        <form name="loginForm" method="POST">
            <fieldset>
                <div class="form-group row">
                    <label for="userInput" class="col-sm-2 col-form-label">Usuario/Correo</label>
                    <input type="text" class="form-control col-sm-10" id="userInput" name="username">
                </div>
                <div class="form-group row">
                    <label for="passInput" class="col-sm-2 col-form-label">Contraseña</label>
                    <input type="password" class="form-control col-sm-10" id="passInput" name="password">
                </div>
                <button class="btn btn-default" type="submit">Entrar</button>
                <hr>
                <a href="/auth/facebook" class="btn btn-info" role="button" id="facebookButton"><b>Facebook Login</b></a>
            </fieldset>
        </form>
    </div>
    </body>
</html>
