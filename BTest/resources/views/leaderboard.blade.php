<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
    <h1 class="text-center">Leaderboard</h1>

    <div class="container text-center">
        <div class="row">
            <div class="col-sm-3">
                <h4>Nom du test</h4>
            </div>
            <div class="col-sm-3">
                <h4>Utilisateur</h4>
            </div>
            <div class="col-sm-3">
                <h4>Score</h4>
            </div>
            <div class="col-sm-3">
                <h4>Bonnes réponses</h4>
            </div>
        </div>
        @foreach($list_row as $row)
            <div class="col-sm-3">
                {{$row->getTestName()}}
            </div>
            <div class="col-sm-3">
                {{$row->getUserName()}}
            </div>
            <div class="col-sm-3">
                {{$row->getScore()}}
            </div>
            <div class="col-sm-3">
                {{$row->getQuestionSucceed()}}
            </div>
        @endforeach
    </div>
</body>
</html>