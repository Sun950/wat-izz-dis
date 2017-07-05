<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wat-izz-Dis - Inscription</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">    

</head>

<style>
  .pad-form {
    width: 80%;
    margin: auto;
  }
</style>

<body>
    @include('layout.header_not_connected')
<center>

     <h1 class="text-center">S'inscrire</h1>
     <div class="text-center">
         <?php if (isset($error_code))
         {
             if ($error_code === 1)
             {
                 echo '<div class="alert alert-danger">Erreur : email invalide</div>';
             }
             else if ($error_code === 2)
             {
                 echo '<div class="alert alert-danger">Erreur: mot de passe invalide (au moins 1 lettre minuscule, 1 lettre majuscule et 1 chiffre)</div>';
             }
             else if ($error_code === 3)
             {
                 echo '<div class="alert alert-danger">Erreur: mot de passe invalide (8 à 20 caractères)</div>';
             }
             else if ($error_code === 4)
             {
                 echo '<div class="alert alert-danger">Erreur: cet email est déjà pris</div>';
             }
             else if ($error_code === 5)
             {
                 echo '<div class="alert alert-danger">Error: field password and confirm password does not match.</div>';
             }

         }?>
         <div class="row">
         </div>
         <br />
         <div>
             <div class="col-md-offset-2 col-md-8">
                 <form action="register" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="row">
                         <div class="col-md-offset-2 col-md-8">
                             Prenom : <input placeholder="Prenom..." class="form-control pad-form" type="text" name="firstname"><br/>
                             Nom de famille : <input placeholder="Nom de famille..." class="form-control pad-form" type="text" name="lastname"><br/>
                             Email : <input placeholder="Email..." class="form-control pad-form" type="text" name="email"><br/>
                             Mot de passe : <input placeholder="Mot de passe..." class="search_input form-control pad-form" type="password" name="password" /></br>
                             Confirmer le mot de passe : <input placeholder="Re-entrez le mot de passe..." class="search_input form-control pad-form" type="password" name="conf_password" /></br>
                         </div>
                     </div>
                     <br />
                     <input class="btn btn-success btn-lg" type="submit" name="login" value="S'inscrire">
                 </form>
             </div>
         </div>
     </div>
</center>
</body>
</html>
