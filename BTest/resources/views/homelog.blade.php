<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/index.css">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
    <header class="main-header clearfix">
        <div class="container">
            <div class="brand">
                <a href="" class="logo" class="icon-list">Wat-izz-Dis</a>
            </div>
            <nav class="main-nav">
                <ul class="menu">
                    <li><a href=""><span class="menu-title">Classement</span></a></li>
                    <li><a href=""><span class="menu-title">Créer un quiz</span></a></li>
                    <li><a href=""><span class="menu-title">Mes quiz</span></a></li>
                    <li><a href=""><span class="menu-title">Déconnexion</span></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container-fluid">
        <h1>Bonjour Benjamin !</h1>
        <h2>Venez essayer les derniers quizz ajouté sur le site</h2>
        <table id="ver-minimalist">
            <th>Quiz</th>
            <th>Auteur</th>
            <th>Nombre de questions</th>
            <th>Points maximum</th>
            <th>Lancer</th>
            @foreach($ltest as $item)
                <tr>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getName() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getFirstname() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getNbQuestion() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getNbPoints() }}</a></td>
                    <td><a href="{{URL::to('/start/' . $item->getId())}}"><div class="arrow">Go !</div></a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>