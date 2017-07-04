<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
    <form action="loginme" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        EMAIL : <input type="text" name="email"><br/>
        PASSWORD : <input type="password" name="password"><br/>
        <input type="submit" name="login" value="Login">
    </form>
</center>
</body>
</html>