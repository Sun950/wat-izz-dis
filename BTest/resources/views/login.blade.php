<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wat-izz-Dis - Connexion</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
</head>
<body>
<center>
    <?php if (isset($error_code))
    {
        if ($error_code === 1)
        {
            echo '<label>Error: invalid identifier</label>';
        }
    }?>
    <h1 class="text-center">Se connecter</h1>
    <div class="text-center">
        <div class="row">
        </div>
        <br />
        <div>
            <div class="col-md-offset-2 col-md-8">
                <form action="loginme" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                          Email : <input style="width: 80%; margin: auto" placeholder="Email..." class="form-control" type="text" name="email"><br/>
                          Mot de passe : <input style="width: 80%; margin: auto" placeholder="Mot de passe..." class="search_input form-control" type="password" name="password" /></br>
                        </div>
                    </div>
                    <br />
                    <input class="btn btn-success btn-lg" type="submit" name="login" value="Login">
                </form>
            </div>
        </div>
    </div>
</center>
</body>
</html>
