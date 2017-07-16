<header class="main-header clearfix">
    <div class="container">
        <div class="brand">
            <a href="{{URL::to("/")}}" class="logo" class="icon-list">Wat-izz-Dis</a>
        </div>
        <nav class="main-nav">
            <ul class="menu">
                <li><a href="{{URL::to("/leaderboard")}}"><span class="menu-title">Classement</span></a></li>
                <li><a href="{{URL::to("/create-quizz")}}"><span class="menu-title">Créer un quiz</span></a></li>
                <li><a href="{{URL::to("/myquizz")}}"><span class="menu-title">Gérer mes quiz</span></a></li>
                <li><a href="{{URL::to("/logoff")}}"><span class="menu-title">Déconnexion</span></a></li>
            </ul>
        </nav>
    </div>
</header>