<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/index.css">

    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>

    <title>Wat-izz-Dis - welcome</title>
</head>
<body>
    <h1 class="text-center">Create your test</h1>

    <button id="add_question" name="add_question">
        Ajouter une question
    </button>
    <button id="remove_question" name="remove_question">
        Enlever une question
    </button>
    <br />
    <br />

    <form action="create-quizz" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Quizz name : <input type="text" name="test_name"><br/>

        <div id="questions">
            <div id="q1">
                Q1 - IMDB : <input name="imdb_1" /> points: <input type="number" name="points_1" />
            </div>
        </div>


        <input type="submit" name="CreateTest" value="create-quizz">
    </form>



</body>

<script>
    var nb = 1;

    $("#add_question").click(function () {
    nb += 1;
    $("#questions").append('<div id="Q' + nb + '">Q' + nb + ' - IMDB : <input name="imdb_' + nb + '"/> points: <input type="number" name="points_' + nb + '"/></div>');
    })

    $("#remove_question").click(function () {
    $("#Q" + nb).remove();
    if (nb > 1)
    nb -= 1;
    })
</script>

</html>

