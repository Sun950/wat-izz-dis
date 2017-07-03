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
                echo '<label>Error: invalid email</label>';
        }
        else if ($error_code === 2)
        {
            echo '<label>Error: invalid password (min 1 letter up, 1 letter down and 1 number)</label>';
        }
        else if ($error_code === 3)
        {
            echo '<label>Error: invalid password (8-20 characteres)</label>';
        }
        else if ($error_code === 4)
        {
            echo '<label>Error: this email is already choose</label>';
        }

     }?>
    <form action="register" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        FIRSTNAME : <input type="text" name="firstname"><br/>
        LASTNAME : <input type="text" name="lastname"><br/>
        EMAIL : <input type="text" name="email"><br/>
        PASSWORD : <input type="password" name="password"><br/>
        <input type="submit" name="login" value="Register">
    </form>
</center>
</body>
</html>