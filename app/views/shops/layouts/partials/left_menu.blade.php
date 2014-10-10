<div class="col-md-3">

    @if(Auth::check() && !Auth::user()->isAdmin($shop->id))
            <div class="alert well-sm alert-warning">
            <b>Saldo: $ {{ Auth::user()->saldo($shop->id) }} </b>
            </div>
    @endif

    <div  class="well">
        <ul class="nav nav-pills nav-stacked">

            <li class="{{ Route::currentRouteName()=='shop_path' ? 'active':'' }}">
                <a href="{{ route('shop_path',$shop->link) }}">Inicio</a>
            </li>
            <li><a class="tree-toggler nav-header">Categorías</a>
                <ul class="nav nav-list tree " style="{{ Route::currentRouteName()!='category_path' ? 'display: none;' :'' }};">
                    @foreach ($shop->categories as $row)
                       <li class="{{ Route::currentRouteName()=='category_path' && $category->name==$row->name ? 'active':''; }}">
                        <a href="{{ route('category_path',[$shop->link,$row->name]) }}">{{ $row->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="{{ Route::currentRouteName()=='delivery_path' || Route::currentRouteName()=='product_delivery_path' ? 'active':'' }}">
                <a href="{{ route('delivery_path',$shop->link) }}">Domicilios</a>
            </li>
            <li class="{{ Route::currentRouteName()=='localization_path' ? 'active':'' }}">
                <a href="{{ route('localization_path',$shop->link) }}">Localización</a>
            </li>
            @if(isset($shop) && Auth::check() &&  Auth::user()->isAdmin($shop->id))
                <li><hr></li>
                <li class="dropdown-header">Administración</li>
                <li class="@if(Route::currentRouteName()=='bill_path') {{ 'active'}} @endif">
                    <a href="{{ route('bill_path',$shop->link) }}">Realizar venta</a>
                </li>

                <li class="@if(Route::currentRouteName()=='admin_category_path' ||
                Route::currentRouteName()=='admin_edit_category_path' ||
                Route::currentRouteName()=='admin_create_category_path'||
                Route::currentRouteName()=='admin_products_path' ||
                Route::currentRouteName()=='admin_edit_product_path' ||
                Route::currentRouteName()=='admin_create_product_path')
                {{ 'active'}} @endif">
                <a href="{{ route('admin_category_path',$shop->link) }}">Editar categorías y productos</a>
                </li>

                <li class="@if(Route::currentRouteName()=='subscriptions_path') {{ 'active'}} @endif">
                    <a href="{{ route('subscriptions_path',$shop->link) }}">Usuarios suscritos</a>
                </li>
            @endif
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-12">
           @include('shops.layouts.partials.member-form')
        </div>
    </div>
</div>
