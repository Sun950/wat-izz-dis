<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
<h1 class="text-center">Leaderboard : Select the test</h1>

<div class="container">
    @foreach($list_tests as $test)

        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <a href={{URL::to('/leaderboard/'. $test->getTestId())}}>
                    {{$test->getTestName()}}
                </a>
            </div>
        </div>

    @endforeach
</div>

</body>
</html>