<div class="col-md-3">
    <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-info btn-block">Afiliarse</button>
                <br>
            </div>
        </div>
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
        </ul>
    </div>

</div>
