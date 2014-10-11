@extends('shops.layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
       <h2 class="shop-title section-title"><span>{{ $shop->name }}</span></h2>
    <br>
    </div>
</div>
<div class="row">
    @include('shops.layouts.partials.left_menu')
  	<div class="col-md-9">


<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @for ($i = 0; $i < $shop->covers->count(); $i++)
        <li data-target="#carousel-1" data-slide-to="{{ $i }}" class="{{ $shop->covers[$i]->current==1 ? 'active' : '';}}"></li>
    @endfor

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($shop->covers as $cover)
        <div class="item {{ $cover->current==1 ? 'active' : '';}}">
            <img src="{{ $cover->pathImage($shop->id) }}" alt="...">
            @if( $cover->caption!="")
                <div class="carousel-caption">
                    <h3>{{ $cover->caption }}</h3>
                </div>
            @endif
        </div>
        @endforeach

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

    <div class="section row">
    <br>
        <div class="col-lg-12">
         <h2 class="section-title"><span>Acerca</span></h2>
        </div>
        <div class="col-lg-12">
            <p>{{ $shop->about }}</p>
        </div>
    </div>
    <div class="section row">
        <div class="col-lg-12">
            <h2 class="section-title"><span>Lo más destacado</span></h2>
        </div>


            @foreach($popular_products as $product)
            <div class="product col-sm-4 col-lg-4 col-md-4">
                @include('shops.layouts.partials.preview_product',['category'=>$product->category])
            </div>
            @endforeach


    </div>
    </div>
</div>
@stop
