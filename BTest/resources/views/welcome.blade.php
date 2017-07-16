<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/index.css">

        <title>Wat-izz-Dis - Welcome</title>

        <style>
            #banner {
                background-image: url(https://templated.co/items/demos/transit/images/dark_tint.png), url(http://celinealbarracin.com/wp-content/uploads/2015/10/Question-marks-1.jpg);
                background-position: center center;
                background-size: cover;
                color: #ffffff;
                padding: 14em 0em 14em;
                text-align: center;
                margin-top: -20px;
            }

            #banner h2 {
                color: #ffffff;
                font-size: 4em;
                line-height: 1.25em;
                margin: 0 0 0.5em 0;
                padding: 0;
            }

            #banner p {
                font-size: 1.5em;
                margin-bottom: 1.75em;
            }

            #banner :last-child {
                margin-bottom: 0;
            }

            ul.actions {
                cursor: default;
                list-style: none;
                padding-left: 0;
            }

            .btn {
                border: none;
                font-family: inherit;
                font-size: inherit;
                color: inherit;
                background: none;
                cursor: pointer;
                padding: 25px 80px;
                display: inline-block;
                margin: 15px 30px;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: 700;
                outline: none;
                position: relative;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                transition: all 0.3s;
            }

            .btn-1 {
                border: 3px solid #fff;
                color: #fff;
                background-color: #0e83cd;
            }

            .btn-1a:hover,
            .btn-1a:active {
                color: #0e83cd;
                background: #fff;
            }

            .wrapper.style1 {
                background-color: #F5F5F5;
                border-bottom: 1px solid rgba(144, 144, 144, 0.25);
                border-top: 1px solid rgba(144, 144, 144, 0.25);
            }

            section.special, article.special {
                text-align: center;
            }

            .wrapper {
                padding: 6em 0em 4em;
            }

            h1, h2, h3, h4, h5, h6 {
                color: #474747;
                font-weight: 700;
                line-height: 1em;
                margin: 0 0 1em 0;
            }

            header p {
                color: #858585;
                position: relative;
                margin: 0 0 1.5em 0;
            }

            .wrapper.style1 .box {
                background-color: #fff;
                padding: 3em 2.5em;
            }

            .row {
            margin: 0px 0 -1px -1.5em;
            }

            .row {
            border-bottom: solid 1px transparent;
            }

            .box {
                border-radius: 4px;
                border: solid 1px rgba(144, 144, 144, 0.25);
                margin-bottom: 2em;
                padding: 1.5em;
            }

            .row.\31 50\25>*
            {
                padding: 0px 0 0 2.25em;
            }

            .row>* {
                padding: 0px 0 0 1.5em;
            }

            .\34 u, .\34 u\24
            {
            width: 33.3333333333%;
            clear: none;
            margin-left: 0;
            }

            .row>* {
            float: left;
            }

            .icon.rounded.color1 {
                background-color: #3cadd4;
            }

            .icon.rounded.big {
                font-size: 2.5em;
                margin-bottom: 0.5em;
            }

            .icon.rounded {
                background-color: #383b43;
                border-radius: 100%;
                color: #ffffff;
                display: inline-block;
                height: 3.25em;
                line-height: 3.25em;
                text-align: center;
                width: 3.25em;
            }

            .icon {
                text-decoration: none;
                border-bottom: none;
                position: relative;
            }

            h3, .wrapper.style1 .box h4, .wrapper.style1 .box h5, .wrapper.style1 .box h6 {
                color: #858585;
            }

            h3 {
                font-size: 1.35em;
                line-height: 1.5em;
            }

            .container {
                margin-left: auto;
                margin-right: auto;
                width: 1160px;
            }

            .icon.rounded.color9 {
                background-color: #add43c;
            }

            .icon.rounded.color6 {
                background-color: #d43c61;
            }
        </style>
    </head>
    <body>
    @include('layout.header_not_connected')
    <section id="banner">
        <h2>Wat-izz-Dis, le quizz autrement</h2>
        <p>Wat-izz-Dis, c'est des quizz sur les films, séries, animés, jeux vidéos basés sur les énormes Youtube et IMDb</p>
        <ul class="actions">
            <li>
                <button class="btn btn-1 btn-1a" onclick="location.href = '{{URL::to("/login")}}';">C'est parti !</button>
            </li>
        </ul>
    </section>
    <section id="one" class="wrapper style1 special">
        <div class="container">
            <header class="major">
                <h2>Le site de quizz ultime</h2>
                <p>Avec une interface épurée et une base de données constamment actualisée, vivez les quizz comme jamais.</p>
                <div class="row 150%">
                    <div class="4u 12u$(medium)">
                        <section class="box">
                            <i class="icon big rounded color1 glyphicon glyphicon-film" aria-hidden="true"></i>
                            <h3>Des millions de vidéos</h3>
                            <p>Youtube est utilisé pour les vidéos, le catalogue est donc immense et varié.</p>
                        </section>
                    </div>
                    <div class="4u 12u$(medium)">
                        <section class="box">
                            <i class="icon big rounded color9 glyphicon glyphicon-hdd"></i>
                            <h3>Une base de données énorme</h3>
                            <p>Les réponses des quizz sont tirées du site IMDb, une des références du genre.</p>
                        </section>
                    </div>
                    <div class="4u$ 12u$(medium)">
                        <section class="box">
                            <i class="icon big rounded color6 glyphicon glyphicon-picture"></i>
                            <h3>Un quizz multi-media</h3>
                            <p>Que vous soyez fan de films, séries, jeux vidéo, vous trouverez votre bonheur ici !</p>
                        </section>
                    </div>
                </div>
            </header>
        </div>
    </section>

    @include('layout.footer')

    </body>
</html>
