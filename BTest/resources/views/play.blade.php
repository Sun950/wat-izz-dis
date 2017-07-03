<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Wat-izz-Dis - welcome</title>
    <style>
        #video_overlays {
            position:absolute;
            float:left;
            width:640px;
            height:400px;
            z-index:300000;
        }

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
</head>
<body>
<div class="container-fluid">
    <div class="title">
        <h1>Wat-izz-Dis</h1>
    </div>
    <a href="http://localhost/wat-izz-dis/BTest/public/logoff">Log off</a>
    <div class="row">
        <div class="col-sm-7">
            <div class="table-quizz-container">
                <div class="item html">
                    <div id="countdown">0</div>
                    <svg width="160" height="160" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <title>Layer 1</title>
                            <circle id="circle" class="circle_animation" r="49.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
                        </g>
                    </svg>
                </div>
                <h2 class="marged">{{ $question->getName() }}</h2>
                <div class="table-container">
                    <div id="video_overlays"></div>
                    <div id="howToVideo"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <input id="search_input" type="text" name="city">
            <div id="results">
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="application/javascript">

    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = false;
    ga.src = 'http://www.youtube.com/player_api';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);

    var player;

    function onYouTubePlayerAPIReady() {
        player = new YT.Player('howToVideo', {
            height: '390',
            width: '640',
            videoId: '{{ $question->getYoutubeUrl() }}',
            playerVars: {
                'autoplay': 1,
                'controls': 0,
                'rel' : 0,
                'showinfo':0,
            },
        });
        window.setInterval(function(){
            var time = 30;
            var i = 30 - Math.floor(player.getCurrentTime());
            var initialOffset = '440';
            $('.circle_animation').css('stroke-dashoffset', initialOffset-(i*(initialOffset/time)));
            $('#countdown').text(i);
        }, 1000);
    }

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
        $("#results").load( "../search/" + value.replace(/ /g,"+") + "" );
    }

    var time = 10; /* how long the timer runs for */
    var initialOffset = '440';
    /*var i = 1
    var interval = setInterval(function() {
        $('.circle_animation').css('stroke-dashoffset', initialOffset-(i*(initialOffset/time)));
        $('h2').text(i);
        if (i == time) {
            clearInterval(interval);
        }
        i++;
    }, 1000);*/

</script>