<ul id="navigation" class="nav navbar-nav navbar-right">
    @if(Auth::check())
        <li role="presentation" class="dropdown">
            <a  href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                @if(Auth::user()->notifications->count())
                    <i class="fa fa-bell-o icon-animated-bell"></i><span class="badge">{{ Auth::user()->notifications->count() }}</span>
                @else
                    <i class="fa fa-bell-o"></i>
                @endif

            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop5">
                @forelse(Auth::user()->notifications as $notification)
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $notification->url }}">{{ $notification->body }}</a></li>
                @empty
                    <li role="presentation" class="dropdown-header">No hay notificaciones nuevas</li>
                @endforelse
            </ul>
        </li>
        <li id="mis-sitios" class="@if(Route::currentRouteName()=='mysites_path') {{ "active"}} @endif">
            <a href="{{ route('mysites_path') }}">Mis tiendas</a>
        </li>
        <li> @include('layouts.partials.avatar')</li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->first_name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="@if(Route::currentRouteName()=='profile_path') {{ "active"}} @endif">
                    <a href="{{ route('profile_path') }}">Mi perfil</a>
                </li>

                <li class="divider"></li>

                <li>{{ link_to_route('logout_path','Salir') }}</li>
            </ul>
        </li>
    @else
        <li class="@if(Route::currentRouteName()=='register_path') {{ "active"}} @endif">
            <a href="{{ route('register_path') }}">Registro</a>
        </li>
        <li class="@if(Route::currentRouteName()=='login_path') {{ "active"}} @endif">
            <a href="{{ route('login_path') }}">Entrar</a>
        </li>
    @endif
</ul>