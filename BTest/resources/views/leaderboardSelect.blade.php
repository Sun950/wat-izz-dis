<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
@include('layout.header')

<h1 class="text-center">Top des joueurs par test</h1>

<h2>Sélectionnez le test :</h2>

<div class="container">
    @foreach($list_tests as $test)

        <div class="row">
            <div class="col-sm-offset-4 col-sm-4" style="padding: 5px;">
                <a href="{{URL::to('/leaderboard/'. $test->getTestId())}}" style="color: white;">
                    {{$test->getTestName()}}
                </a>
            </div>
        </div>

    @endforeach
</div>

</body>
</html>