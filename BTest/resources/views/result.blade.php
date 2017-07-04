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

        #navbar-suggestionsearch a.highlighted {
            background-color: white;
            width: 400px;
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

        #checkmark {
            display:inline-block;
            width: 22px;
            height:22px;
            background: green;
            border-radius:50%;
            -ms-transform: rotate(45deg); /* IE 9 */
            -webkit-transform: rotate(45deg); /* Chrome, Safari, Opera */
            transform: rotate(45deg);
        }

        #checkmark:before{
            content:"";
            position: absolute;
            width:3px;
            height:9px;
            background-color:#fff;
            left:11px;
            top:6px;
        }

        #checkmark:after{
            content:"";
            position: absolute;
            width:3px;
            height:3px;
            background-color:#fff;
            left:8px;
            top:12px;
        }

        #wrong {
            display:inline-block;
            width: 22px;
            height:22px;
            background: red;
            border-radius:50%;
            transform: rotate(45deg);
        }

        #wrong:before{
            content:"";
            position: absolute;
            width:4px;
            height:12px;
            background-color:#fff;
            left:9.5px;
            top:5.5px;
        }

        #wrong:after{
            content:"";
            position: absolute;
            width:12px;
            height:4px;
            background-color:#fff;
            left:5.5px;
            top:9.5px;
        }

        .float_right
        {
            float: right;
        }
        
        .answer_title
        {
            text-align: center;
        }
    </style>
</head>
<body>
    @include('layout.header')
    <div class="container-fluid">
        <div class="title">
            <h1>Resultats du quiz test</h1>
        </div>
        <div class="row">
            <div class="table-container">
                @foreach($result->getResultDetails() as $answer)
                <h2>
                    @if($answer->IsCorrect())
                        <span id="checkmark"></span>
                    @else
                        <span id="wrong"></span>
                    @endif
                     Question {{ $answer->getNumber() }}
                </h2>
                 <div id="navbar-suggestionsearch">
                    <div class="col-sm-6">
                        <div class="float_right">
                            <div class="answer_title">Votre réponse :</div>
                            <a class="poster highlighted">
                                @if($answer->getAnswer() != null)
                                    <img src="{{ $answer->getAnswer()->poster }}" style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40" height="54">
                                    <div class="suggestionlabel">
                                        <span class="title">
                                            {{ $answer->getAnswer()->title }}
                                        </span>
                                        <span class="year">{{ $answer->getAnswer()->year }}</span>
                                        <div class="detail">{{ $answer->getAnswer()->type }}</div>
                                    </div>
                                @else
                                    <img src="" style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40" height="54">
                                    <div class="suggestionlabel">
                                        <span class="title">
                                            Temps écoulé
                                        </span>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="answer_title">Bonne réponse :</div>
                        <a class="poster highlighted">
                            @if($answer->getCorrection() != null)
                                <img src="{{ $answer->getCorrection()->poster }}" style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40" height="54">
                                <div class="suggestionlabel">
                                    <span class="title">
                                        {{ $answer->getCorrection()->title }}
                                    </span>
                                    <span class="year">{{ $answer->getCorrection()->year }}</span>
                                    <div class="detail">{{ $answer->getCorrection()->type }}</div>
                                </div>
                            @else
                                <img src="" style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40" height="54">
                                <div class="suggestionlabel">
                                    <span class="title">
                                        Temps écoulé
                                    </span>
                                </div>
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </body>
</html>