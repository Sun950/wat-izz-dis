<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/index.css") }}">
    <link rel="stylesheet" href="{{ asset("../bootstrap/css/result.css") }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Wat-izz-Dis - welcome</title>
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
                        <div class="answer_title" style="width: 400px;">Bonne réponse :</div>
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