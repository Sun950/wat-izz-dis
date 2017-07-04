<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/play.css") }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Wat-izz-Dis - Play</title>
</head>
<body>
<div class="container-fluid">
    <div class="timer">
        <div class="item">
            <div id="countdown">0</div>
            <svg width="240" height="240" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <title>Layer 1</title>
                    <circle id="circle" class="circle_animation" r="80" cy="121" cx="121" stroke-width="14" stroke="#6fdb6f" fill="none"/>
                </g>
            </svg>
        </div>
    </div>
    <div class="title">
        <h1>{{ $question->getName() }}</h1>
    </div>
    <div class="progression">
        {{ $question->getNumber() }}/{{ $question->getTotal() }}
    </div>
    <div class="row">
        <div class="col-sm-6" style="padding: 0 !important;">
            <div class="table-quizz-container">
                <div class="table-container">
                    <div id="video_overlays"></div>
                    <div id="howToVideo" style="float: right"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="padding: 0 !important;">
            <input id="search_input" type="text" placeholder="Entrez la réponse ici" name="city">
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
        var redirect = false;
        window.setInterval(function(){
            var time = 30;
            var i = 30 - Math.floor(player.getCurrentTime());
            if (i < 0)
                i = 0;
            var initialOffset = '500';
            $('.circle_animation').css('stroke-dashoffset', initialOffset-(i*(initialOffset/time)));
            $('#countdown').text(i);

            if (30 - Math.floor(player.getCurrentTime()) < 0 && !redirect)
            {
                document.location.href = "{{ URL::to('/play/tt0000000') }}";
                redirect = true;
            }
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