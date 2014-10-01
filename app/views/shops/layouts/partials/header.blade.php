<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('shop_path',$shop->link) }}">{{ $shop->name }}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                 <li class="@if(Route::currentRouteName()=='shop_path') {{ "active"}} @endif">
                    <a href="{{ route('shop_path',$shop->link) }}">Inicio</a>
                </li>
                <li class="@if(Route::currentRouteName()=='category_path') {{ "active"}} @endif">
                    <a href="{{ route('category_path',[$shop->link,$shop->categories[0]->name]) }}">Categorías</a>
                </li>
                <li class="@if(Route::currentRouteName()=='localization_path') {{ "active"}} @endif">
                    <a href="{{ route('localization_path',$shop->link) }}">Localización</a>
                </li>

            </ul>

            @include('layouts.partials.login')
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>