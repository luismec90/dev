<ul id="navigation" class="nav navbar-nav navbar-right">
    @if(Auth::check())
    @if(isset($shop) && Auth::user()->isAdmin($shop->id))
        <li class="@if(Route::currentRouteName()=='bill_path') {{ 'active'}} @endif">
            <a href="{{ route('bill_path',$shop->link) }}">Administración</a>
        </li>
        @endif
        <li> @include('layouts.partials.avatar')</li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img class="nav-gravatar" src="">
                {{ Auth::user()->first_name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="@if(Route::currentRouteName()=='profile_path') {{ "active"}} @endif">
                    <a href="{{ route('profile_path') }}">Mi perfil</a>
                </li>
                <li class="divider"></li>
                @if(false && isset($shop))
                    @if(Auth::user()->isAdmin($shop->name))
                        <li>{{ link_to_route('admin_category_path','Categorías',[$shop->name]) }}</li>
                    @endif
                @endif
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