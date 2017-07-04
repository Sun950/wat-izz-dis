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
        <h1>Bonjour {{ $user->firstname }} !</h1>
        <h2>Venez essayer les derniers quizz ajoutés sur le site</h2>
        <table id="ver-minimalist">
            <th>Quiz</th>
            <th>Auteur</th>
            <th>Nombre de questions</th>
            <th>Points maximum</th>
            <th>Lancer</th>
            @foreach($ltest as $item)
                <tr>
                    <td>{{ $item->getName() }}</td>
                    <td>{{ $item->getFirstname() }}</td>
                    <td>{{ $item->getNbQuestion() }}</td>
                    <td>{{ $item->getNbPoints() }}</td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"><div class="arrow">Go !</div></a></td>
                </tr>
            @endforeach
        </table>
    </div>

</body>
</html>