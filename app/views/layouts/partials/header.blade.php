<header id="header" class="site-header">
    <nav id="navbar" class="site-navbar navbar navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="navbar-brand"><i class="fa fa-power-off"></i> <a href="/">NOVA</a></h1>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul id="navigation" class="nav navbar-nav">
                    <li class="@if(Route::currentRouteName()=='home') {{ "active"}} @endif">
                        <a href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="@if(Route::currentRouteName()=='search_path') {{ "active"}} @endif">
                        <a href="{{ route('search_path') }}">Búsqueda</a>
                    </li>
                    <li class="@if(Route::currentRouteName()=='contact_path') {{ "active"}} @endif">
                        <a href="{{ route('contact_path') }}">Contacto</a>
                    </li>
                </ul>
                @include('layouts.partials.login')
            </div>
        </div>
    </nav>
</header>
