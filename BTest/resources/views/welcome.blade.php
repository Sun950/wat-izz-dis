<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../bootstrap/css/index.css">

        <title>Wat-izz-Dis - Welcome</title>
    </head>
    <body>
    <div class="container-fluid">
        <div class="title">
            <h1>Wat-izz-Dis</h1>
        </div>
        <div class="login-container">
            <h2 class="marged">Sign-in and start now !</h2>
            <div class="login-container-forms">
                <form class="login-form" action="loginme" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>
                    <input type="submit" class="submit-button btn btn-default" value="Connect">
                </form>
                <a href="http://localhost/php-project/projet-php/BTest/public/register">Register</a>
            </div>
        </div>
    </div>
    </body>
</html>
