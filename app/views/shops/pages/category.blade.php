@extends('shops.layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
       <h2 class="section-title"><span>{{ $category->name }}</span></h2>
    <br>
    </div>
</div>

<div class="row">

    @include('shops.layouts.partials.categories_menu')

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
                <div class="thumbnail">
                    <img class="" src="{{ $product->pathImage() }}" alt="">
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
                                           <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
                                           <p>
                                               @for ($i=1; $i <= 5 ; $i++)
                                                   <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                                               @endfor
                                           </p>
                                       </div>
                </div>
            </div>
            @endforeach

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->pathImage() }}" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$64.99</h4>
                        <h4><a href="#">Second Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">12 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://bdtrading.ie/images/images-2.jpg" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$74.99</h4>
                        <h4><a href="#">Third Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">31 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://www.brake.eu/images/home3.jpg" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$84.99</h4>
                        <h4><a href="#">Fourth Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">6 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://96bda424cfcc34d9dd1a-0a7f10f87519dba22d2dbc6233a731e5.r41.cf2.rackcdn.com/BionicBody/VeggieWraps.jpg" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$94.99</h4>
                        <h4><a href="#">Fifth Product</a>
                        </h4>
                        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">18 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                </div>
            </div>

            <!--            <div class="col-sm-4 col-lg-4 col-md-4">
                            <h4><a href="#">Like this template?</a>
                            </h4>
                            <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                            <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                        </div>-->

        </div>

    </div>

</div>

@stop