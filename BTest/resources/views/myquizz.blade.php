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
                    <td>{{$item->getName()}}</td>

                    <td>{{$item->getNbQuestion()}}</td>

                    <td>{{$item->getNbPoints()}}</td>

                    <td>
                        <div onclick="deletePost({{$item->getId()}})" class="btn btn-danger">
                            Delete
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
<script>
    function deletePost(id) {
        var ask = window.confirm("Are you sure you want to delete this test?");
        if (ask) {
            document.location.href = "myquizz/delete/" + id;
        }
    }
</script>
</html>