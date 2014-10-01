@extends('......layouts.default')

@section('content')
<div class="row">
    @include('......layouts.partials.products_menu')
    
    <div class="col-md-9">
       
        <div class="thumbnail">
            <img src="http://www.dailygourmet.com.hk/wp-content/uploads/2013/05/ribeye.jpg" alt="">
             
            <div class="caption-full">
                <h4 class="pull-right">$24.99</h4>
                <h4><a>{{$product->name}} <button class="btn btn-primary btn-sm">Pedir a domicilio</button> <button  class="btn btn-primary btn-sm">Compartir en Facebook</button></a></h4>
                <p>{{$product->short_description}}</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="ratings">
                <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
                <p>
                    @for ($i=1; $i <= 5 ; $i++)
                    <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($product->rating_cache, 1);}} stars
                </p>
            </div>
        </div>
        
        <div class="well" id="reviews-anchor">
           
            <div class="row" id="post-review-box">
                <div class="col-md-12">
                  <form method="POST" action="http://laravel-shop.gopagoda.com/products/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="EoyikqdGU0tNPaPaqIlN3QmZ8mYIdrOBG8pacMmk">                  <input id="ratings-hidden" name="rating" type="hidden">                  <textarea rows="5" id="new-review" class="form-control animated" placeholder="Ingrese su valoración..." name="comment" cols="50" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"></textarea>                  <div class="text-right">
                    <div class="stars starrr" data-rating="0"><span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span><span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span><span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span><span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span><span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span></div>
                    <br>
                    <a href="#" class="btn btn-danger" id="close-review-box" style="margin-right: 10px;"> <span class="glyphicon glyphicon-remove"></span> Cancelar</a>
                    <button class="btn btn-success" type="submit"> Enviar</button>
                  </div>
                </form>                </div>
              </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>

                    Anonymous <span class="pull-right">Hace 2 horas</span> 

                    <p>Johny Poo was here</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>

                    Anonymous <span class="pull-right">Hace 10 horas</span> 

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>

                    Anonymous <span class="pull-right">Hace 2 dias</span> 

                     <p>Lorem ipsum dolor sit amet,  incid</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>

                    Anonymous <span class="pull-right">Hace 5 meses</span> 

                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>

                    Anonymous <span class="pull-right">Hace 1 año</span> 

                     <p>Lorem ipsum dolor sit </p>
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>
@stop