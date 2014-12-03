<div class="row">
    <div class="col-xs-10">
        <h3 class="no-margin">Alianzas</h3>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <ul  class="nav nav-tabs">
            <li class="{{ Route::currentRouteName()=="alliances_path" ? "active" : "" }}">
               <a href="{{ route("alliances_path",$shop->link) }}">Buscar aliados</a>
            </li>
           <li class="{{ Route::currentRouteName()=="pending_alliances_path" || Route::currentRouteName()=="pending_alliance_path" ? "active" : "" }}">
                <a href="{{ route("pending_alliances_path",$shop->link) }}">Alianzas en proceso</a>
            </li>
            <li class="{{ Route::currentRouteName()=="active_alliances_path" || Route::currentRouteName()=="active_alliance_path" ? "active" : "" }}">
                <a href="{{ route("active_alliances_path",$shop->link) }}">Alianzas activas</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <br>
    </div>
</div>