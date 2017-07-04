<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">

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
@include('layout.header')

    <h1 class="text-center">Créer un quizz</h1>

    <div class="text-center">

        <div class="row">
                <div class="col-md-offset-4 col-md-4">
                <br/>
                <h4>
                    <b>
                        <div id="question_number">
                            Nombre de questions : 1
                        </div>
                        <button class="btn btn-primary" id="remove_question" name="remove_question">
                            <div>
                                <span style="font-size:1em;" class="glyphicon glyphicon-minus"></span>
                            </div>
                        </button>
                        <button class="btn btn-primary" id="add_question" name="add_question">
                            <div>
                                <span style="font-size:1em;" class="glyphicon glyphicon-plus"></span>
                            </div>
                        </button>
                    </b>
                </h4>
            </div>
        </div>
        <div class="row">

        </div>
        <br />
        <div>
            <div class="col-md-offset-2 col-md-8">
                <form class="form-group" action="create-quizz" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            Quizz name : <input class="form-control" type="text" name="test_name"><br/>
                        </div>
                    </div>

                    <br />

                    <div id="questions">
                        <div id="Q1">
                            <div class="row">
                                <div class="col-md-1">
                                    <h4>Q1</h4>
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="URL Video" class="form-control" name="url_1" />
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Réponse" class="search_input form-control" name="imdb_1" />
                                </div>
                                <div class="col-md-2">
                                    <input placeholder="Points" class="form-control" type="number" min="0" max="99999" name="points_1" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="row">
                        <div class="col-md-offset-3">
                            <div id="results">
                            </div>
                        </div>
                    </div>

                    <br />
                    <br />

                    <input class="btn btn-success btn-lg" type="submit" name="CreateTest" value="Créer quizz">
                </form>

            </div>


        </div>

    </div>

</body>

<script type="application/javascript">
    var nb = 1;

    $("#add_question").click(function () {
        nb += 1;
        $('#question_number').html('Nombre de questions : '+ nb);
        //$("#questions").append('<div id="Q' + nb + '">Q' + nb + ' - Video url : <input name="url_' + nb + '" /> Answer : <input class="search_input" name="imdb_' + nb + '"/> points: <input type="number" min="0" max="99999" name="points_' + nb + '"/></div>');
        $("#questions").append(
        '<div id="Q' + nb + '">' +
            '<div class="row">' +
                '<div class="col-md-1">' +
                    '<h4>Q' + nb + '</h4>' +
                '</div>' +
                '<div class="col-md-4">' +
                    '<input placeholder="URL Video" class="form-control" name="url_' + nb + '" />' +
                '</div>' +
                '<div class="col-md-4">' +
                    '<input placeholder="Réponse" class="search_input form-control" name="imdb_' + nb + '" />' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<input placeholder="Points" class="form-control" type="number" min="0" max="99999" name="points_' + nb + '" />' +
                '</div>' +
            '</div>' +
        '</div>'
        )

        ini_search_input();
    })

    $("#remove_question").click(function () {
        if (nb > 1)
        {
            $("#Q" + nb).remove();
            ini_search_input();
            nb -= 1;
            $('#question_number').html('Nombre de questions : ' + nb);
        }
    })


    var timeout = null;

    function ini_search_input()
    {
        $('.search_input').on('keyup', function () {
            var that = this;
            if ($(that).val() == "")
                $("#results").html('');
            else
            {
                $("#results").html('<div class="loader col-md-offset-4"></div>');

                if (timeout !== null) {
                    clearTimeout(timeout);
                }
                timeout = setTimeout(function () {
                    update($(that).val(), $(that).attr('name'));
                }, 500);
            }
        });
    }

    ini_search_input();

    function update(value, id)
    {
        var splitted = id.split("_");
        var true_id = splitted[1];
        $("#results").load( "search_select/" + value.replace(/ /g,"+") + "/" + true_id );
    }

    function fill_answer(value, question_number)
    {
        debugger;
        //$('#imdb_' + question_number).val(value);
        //$("#results").html('');
        var search_div = "input[name = 'imdb_" + question_number + "']";
        $( search_div ).val( value );
        $("#results").html('');
    }
</script>

</html>

