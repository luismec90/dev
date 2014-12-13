<div class="row">
    <div class="col-lg-12">
        @if($showTour && Auth::user()->isAdmin($shop->id))
            <button id="btn-take-tour" class="btn btn-sm btn-primary pull-right" data-route-name="{{ Route::currentRouteName() }}">Tomar el tour</button>
        @endif
        <h2 class="shop-title section-title"><span>{{ $shop->name }}</span> </h2>
        <br>
    </div>
</div>