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
    <a href="logoff">Log off</a>
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
                                        <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getName() }}</a></td>
                                        <td><a href="{{URL::to('/start/' . $item->getId())}}"> {{ $item->getOwnerId() }}</a></td>
                                    </tr>
                                @endforeach
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