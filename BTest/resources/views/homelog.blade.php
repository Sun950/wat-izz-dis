<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/index.css">
    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
<div class="container-fluid">
    <div class="title">
        <h1>Wat-izz-Dis</h1>
    </div>
    <a href="http://localhost/php-project/projet-php/BTest/public/logoff">Log off</a>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="left-panel col-md-7">
                    <div class="table-quizz-container">
                        <h2 class="marged">Here some quizz...</h2>
                        <div class="table-container">
                            <table>
                                <th>Quizz</th>
                                <th>Author</th>
                                @foreach($ltest as $item)
                                    <tr>
                                        <td><a href="nothing"> {{ $item->getName() }}</a></td>
                                        <td><a href="nothing"> {{ $item->getOwnerId() }}</a></td>
                                    </tr>
                                @endforeach
                                <!--<tr>
                                    <td><a href="link.php">Les musiques de papy</a></td>
                                    <td><a href="link_author.php">Brazy</a></td>
                                </tr>
                                <tr>
                                    <td><a href="link.php">Brasegajames le bandit de la MTI</a></td>
                                    <td><a href="link_author.php">Le wanski</a></td>
                                </tr>
                                <tr>
                                    <td><a href="link.php">Les musiques de papy</a></td>
                                    <td><a href="link_author.php">Brazy</a></td>
                                </tr>
                                <tr>
                                    <td><a href="link.php">Brasegajames le bandit de la MTI</a></td>
                                    <td><a href="link_author.php">Le wanski</a></td>
                                </tr>-->
                            </table>
                        </div>
                    </div>
                </div>
                <div class="right-pannel col-md-5">
                    <div class="button-container">
                        <form action="create-quizz.php" role="form">
                            <button type="submit" class="btn btn-default">Create new</button>
                        </form>
                        <form action="my-quizzes.php" role="form">
                            <button type="submit" class="button btn btn-default">My quizzes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>