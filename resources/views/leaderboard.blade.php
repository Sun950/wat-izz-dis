<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
@include('layout.header')

    <h1 class="text-center">Top des joueurs du test <i>{{ $test_name  }}</i></h1>

    <table id="ver-minimalist">
        <th>Utilisateur</th>
        <th>Score</th>
        <th>Bonnes réponses</th>
        @foreach($list_row as $row)
            <tr>
                <td>{{$row->getUserName()}}</td>
                <td>{{$row->getScore()}}</td>
                <td>{{$row->getQuestionSucceed()}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>