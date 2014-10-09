<ul id="navigation" class="nav navbar-nav navbar-right">
    @if(Auth::check())
        <li> @include('layouts.partials.avatar')</li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->first_name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="@if(Route::currentRouteName()=='profile_path') {{ "active"}} @endif">
                    <a href="{{ route('profile_path') }}">Mi perfil</a>
                </li>
                <li class="@if(Route::currentRouteName()=='summary_path') {{ "active"}} @endif">
                    <a href="{{ route('summary_path') }}">Mis sitios</a>
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