@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
{{ HTML::style('assets/css/registro.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/delivery.js')}}
<script>
    @foreach($shop->categories as $category)
        var category_{{ $category->id }}="<option value=''>Seleccionar...</option>";
        @foreach($category->products as $product)
            category_{{ $category->id }}+="<option value='{{ $product->id }}'>{{ $product->name }}</option>"
        @endforeach
    @endforeach

     var selectedProductId=null;
     var selectedProductCategoryId=null;
    @if(!is_null($selectedProduct))
        selectedProductId="{{ $selectedProduct->id }}";
        selectedProductCategoryId="{{ $selectedProduct->category_id }}";
    @endif
</script>
@stop

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

        @include('layouts.partials.errors')

                    {{ Form::open(['route'=>['delivery_path',$shop->link],'class'=>'validate']) }}

                    <!-- User Form Input -->
                    <div class="form-group">
                    {{ Form::label('category','Comprador:') }}
                        <input tyoe="text" disabled="true" class="form-control" value="{{ Auth::user()->first_name." ". Auth::user()->last_name }}">
                    </div>

                    <!-- Email Form Input -->
                    <div class="form-group">
                    {{ Form::label('category','Email:') }}
                        <input type="email" disabled="true" class="form-control" value="{{ Auth::user()->email }}">
                    </div>

                    <!-- Phone Form Input -->
                    <div class="form-group">
                    {{ Form::label('category','Télefono:') }}
                    {{ Form::text('phone',null,['class'=>'form-control','required'=>'true']) }}
                    </div>

                    <!-- Category Form Input -->
                    <div class="form-group">
                    {{ Form::label('category','Categoria:') }}
                    {{ Form::select('category',$selectCategories,null,['class'=>'form-control','required'=>'true']) }}
                    </div>

                    <!-- Product Form Input -->
                    <div class="form-group">
                    {{ Form::label('product','Producto:') }}
                    {{ Form::select('product',[''=>''],null,['class'=>'form-control','required'=>'true','readonly'=>'true']) }}
                    </div>

                    <!-- Address Form Input -->
                    <div class="form-group">
                    {{ Form::label('birth_date','Dirección:') }}
                    {{ Form::text('address',null,['class'=>'form-control','required'=>'required']) }}
                    </div>

                    <!-- Note Form Input -->
                    <div class="form-group">
                    {{ Form::label('birth_date','Notas adicionales:') }}
                    {{ Form::textarea('note',null,['class'=>'form-control','rows'=>'5']) }}
                    </div>



                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                    </div>

                    {{ Form::close() }}
    </div>

</div>
<br>
@stop