<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="ressources/css/bootstrap.min.css">
    <link rel="stylesheet" href="ressources/css/index.css">

    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>

    <title>Wat-izz-Dis - Connexion</title>
</head>
<body>
  @include('layout.header')

    <h1 class="text-center">Se connecter</h1>
    <div class="text-center">
        <div class="row">
        </div>
        <br />
        <div>
            <div class="col-md-offset-2 col-md-8">
                <form class="form-group" action="create-quizz" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            Email : <input placeholder="Email..." class="form-control" type="text" name=""><br/>
                            Mot de passe : <input placeholder="Mot de passe..." class="search_input form-control" name="" />
                        </div>
                    </div>
                    <br />
                    <br />
                    <input class="btn btn-success btn-lg" type="submit" name="Connexion" value="Créer quizz">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
