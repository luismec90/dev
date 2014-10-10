<div class="thumbnail">
    <img class="" src="{{ $product->pathImage(false,$shop->id,$product->id) }}" width="252" height="126" alt="">
    <div class="caption">
        <h4 class="pull-right">{{ $product->price() }}</h4>
        <h4 class="name"> {{ link_to_route('product_path',$product->name,[$shop->link,$category->name,$product->name]) }}

        </h4>
        <div class="description">
            <b>Descripción: </b>{{ link_to_route('product_path','Ver más',[$shop->link,$category->name,$product->name],['class'=>'pull-right']) }}
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
