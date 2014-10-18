<div class="thumbnail">
     <h4 class="name" title="{{ $product->name }}"> {{ link_to_route('product_path',$product->name,[$shop->link,$category->name,$product->name]) }}</h4>
    <img class="" src="{{ $product->pathImage(false,$shop->id,$product->id) }}" width="252" height="126" alt="">
    <div class="caption">
    <div>
        <h4 class="precio-ver-mas">{{ $product->price() }} {{ link_to_route('product_path','Ver más',[$shop->link,$category->name,$product->name],['class'=>'pull-right ver-mas']) }}</h4>
</div>
        <div class="description">
            <b>Descripción: </b>
        </div>
        <p class="product-description"> {{ substr($product->description,0,100) }}
            @if(strlen($product->description)>100)
            ...
            @endif
        </p>
    </div>
    <div class="ratings">
    <p class="pull-right">{{$product->rating_count}} {{ $product->rating_count==1 ? 'valoración':'valoraciones' }}</p>
    <p>
        @for ($i=1; $i <= 5 ; $i++)
            <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
        @endfor
    </p>
    </div>
</div>
