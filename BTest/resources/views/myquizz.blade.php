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

    <div class="container-fluid">
        <h1>Mes Quizz</h1>
        <table id="ver-minimalist">
            <th>Quiz</th>
            <th>Nombre de questions</th>
            <th>Points maximum</th>
            @foreach($ltest as $item)
                <tr>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getName() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getNbQuestion() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getNbPoints() }}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>