<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/index.css">

    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>

    <style>

        #navbar-suggestionsearch a.highlighted {
            background-color: #F8F1BE;
        }
        #navbar-suggestionsearch a:visited {
            color: #70579D;
        }
        #navbar-suggestionsearch a {
            display: block;
            clear: both;
            border-bottom: 1px solid #efefef;
            color: #136CB2;
            max-height: 100px;
            overflow: hidden;
            text-decoration: none;
        }
        #nb_search a {
            color: #fff;
            font-weight: normal;
            text-decoration: none;
            vertical-align: middle;
        }

        #navbar-suggestionsearch a.poster>img {
            float: left;
            margin: 4px;
        }

        #navbar-suggestionsearch .suggestionlabel {
            padding: 6px 4px 5px 50px;
        }

        #navbar-suggestionsearch a .title {
            font-weight: bold;
            line-height: 110%;
        }
        #navbar-suggestionsearch a:visited {
            color: #70579D;
        }
        #navbar-suggestionsearch a {
            display: block;
            clear: both;
            border-bottom: 1px solid #efefef;
            color: #136CB2;
            max-height: 100px;
            overflow: hidden;
            text-decoration: none;
        }

        #navbar-suggestionsearch a .extra {
            font-weight: normal;
        }

        #navbar-suggestionsearch a .detail {
            color: #666666;
            text-decoration: none;
            font-size: 11px;
            margin-top: 2px;
        }

        .item {
            position: relative;
            float: left;
            left: -45px;
            top: -45px;
        }

        .item #countdown {
            text-align:center;
            position: absolute;
            line-height: 155px;
            width: 100%;
            text-align: center;
            font-size: 32px;
        }

        svg {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        .circle_animation {
            stroke-dasharray: 440; /* this value is the pixel circumference of the circle */
            stroke-dashoffset: 440;
            transition: all 1s linear;
        }

        .loader {
            border: 8px solid transparent; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

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
                Q1 - Video url : <input name="url_1" /> Answer : <input name="imdb_1" /> points: <input type="number" name="points_1" />
            </div>
        </div>


        <input type="submit" name="CreateTest" value="create-quizz">
    </form>

    <div class="col-sm-5">
        <input id="search_input" type="text" name="city">
        <div id="results">
        </div>
    </div>


</body>

<script type="application/javascript">
    var nb = 1;

    $("#add_question").click(function () {
    nb += 1;
    $("#questions").append('<div id="Q' + nb + '">Q' + nb + ' - Video url : <input name="url_' + nb + '" /> Answer : <input name="imdb_' + nb + '"/> points: <input type="number" name="points_' + nb + '"/></div>');
    })

    $("#remove_question").click(function () {
    $("#Q" + nb).remove();
    if (nb > 1)
    nb -= 1;
    })


    var timeout = null;
    $('#search_input').on('keyup', function () {
        var that = this;
        if ($(that).val() == "")
            $("#results").html('');
        else
        {
            $("#results").html('<div class="loader"></div>');

            if (timeout !== null) {
                clearTimeout(timeout);
            }
            timeout = setTimeout(function () {
                update($(that).val());
            }, 500);
        }
    });

    function update(value)
    {
        $("#results").load( "search/" + value.replace(/ /g,"+") + "" );
    }
</script>

</html>

