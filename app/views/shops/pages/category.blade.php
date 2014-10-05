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

        <div class="row carousel-holder">

            <div class="col-md-12">
                <!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="http://www.usfoods.com/content/www/home/food/scoop/scoop-favorites/deli-meats/deli-meats/_jcr_content/mainpar/image.img.jpg/1374862220115.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://www.thesauce.com/Images/RykoffSexton/PeeledTomatoes_800x300.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://www.tyderw.co.uk/wp-content/uploads/2014/07/MVW-C06-1314-0242-1024PX-800x300.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>-->
            </div>

        </div>

        <div class="row">
            @foreach($category->products as $product)
            <div class="product col-sm-4 col-lg-4 col-md-4">
                @include('shops.layouts.partials.preview_product')
            </div>
            @endforeach
        </div>

    </div>

</div>

@stop