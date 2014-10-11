@extends('shops.layouts.default')
@section('js')
  {{HTML::script('assets/themes/one/js/product.js')}}
    {{HTML::script('assets/themes/one/js/starrr.js')}}
  {{HTML::script('assets/themes/one/js/starrr.js')}}

  <script type="text/javascript">
    $(function(){



      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();

      });

      // If there were validation errors we need to open the comment form programmatically
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
@stop

@section('styles')
  <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }
  </style>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
       <h2 class="section-title"><span>{{ $product->name }}</span></h2>
    <br>
    </div>
</div>
<div class="row">
    @include('shops.layouts.partials.products_menu')
    
    <div class="col-md-9">
       
        <div class="thumbnail">
            <img class="img-cover" src="{{ $product->pathImage(true,$shop->id,$product->id) }}" alt="">
             
            <div class="caption-full">
                <h4 class="pull-right">{{ $product->price() }}</h4>
                <h4><a>{{$product->name}}
                @if($product->delivery_service==1)
                    <a  href="{{ URL::route('product_delivery_path',[$shop->link,$product->id]) }}"  class="btn btn-primary btn-sm">Pedir a domicilio</a>
                @endif

                @if(Auth::check() && Auth::user()->isAdmin($shop->id))
                     <a  href="{{ URL::route('admin_edit_product_path',[$shop->link,$product->category_id,$product->id]) }}"  class="btn btn-primary btn-sm">Editar</a>
                @endif
                </a></h4>
                <p>{{$product->description}}</p>

            </div>
            <div class="ratings">
                <p class="pull-right">{{$product->rating_count}}  {{ $product->rating_count==1 ? 'valoración':'valoraciones'; }}</p>
                <p>
                    @for ($i=1; $i <= 5 ; $i++)
                    <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($product->rating_cache, 1);}} estrellas
                </p>
            </div>
        </div>
        
        <div class="well" id="reviews-anchor">
          <div class="row">
            <div class="col-md-12">
              @if(Session::get('errors'))
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5>Por favor solucione los siguientes errores:</h5>
                   @foreach($errors->all('<li>:message</li>') as $message)
                      {{$message}}
                   @endforeach
                </div>
              @endif
              @if(Session::has('review_posted'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5>Your review has been posted!</h5>
                </div>
              @endif
              @if(Session::has('review_removed'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5>Your review has been removed!</h5>
                </div>
              @endif
            </div>
          </div>
          <div class="text-right">

            <a  id="open-review-box" class="btn btn-primary" {{ Auth::check() ? '':'disabled'; }}>Dejar un comentario</a>
          </div>
          <div class="row" id="post-review-box" style="display:none;">
            <div class="col-md-12">
              {{Form::open(['route'=>['review_path',$shop->link,$category->name,$product->name,$product->id]])}}
              {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
              {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Ingrese su comentario...'))}}
              <div class="text-right">
                <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                <a href="#" class="btn btn-danger" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                <button class="btn btn-primary" type="submit">Enviar</button>
              </div>
            {{Form::close()}}
            </div>
          </div>

          @foreach($reviews as $review)
          <hr>
            <div class="row">
              <div class="col-md-12">

               <p><img width="50" height="50" class="img-circle" src="{{ $review->user->rutaAvatar() }}"> {{ $review->user->first_name }} <span class="pull-right">{{$review->timeago}}</span>
               </p>
                @for ($i=1; $i <= 5 ; $i++)
                  <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                @endfor

                <p>{{{$review->comment}}}</p>
              </div>
            </div>
          @endforeach
          {{ $reviews->links(); }}
        </div>

    </div>

</div>

@stop