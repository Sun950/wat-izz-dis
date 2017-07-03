<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/index.css">
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="title">
        <h1>Wat-izz-Dis</h1>
    </div>
    <a href="http://localhost/wat-izz-dis/BTest/public/logoff">Log off</a>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="left-panel col-md-7">
                    <div class="table-quizz-container">
                        <h2 class="marged">{{ $question->getName() }}</h2>
                        <div class="table-container">
                            <div id="video_overlays"></div>
                            <div id="howToVideo"></div>
                            <div id="timer"></div>
                        </div>
                        <input type="text" name="city" oninput="update(this.value)">
                        <div id="cityname">
                        </div>
                    </div>
                </div>
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

    var done = false;
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
            document.getElementById("timer").innerHTML = player.getCurrentTime();
        }, 1000);
    }

    function update(value)
    {
        $( "#cityname" ).load( "../search/" + value.replace(/ /g,"+") + "" );
        $( "#cityname" ).size = $( "#cityname" ).length;
    }


</script>