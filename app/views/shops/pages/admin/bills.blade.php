@extends('shops.layouts.default')


@section('css')

@stop

@section('js')
{{ HTML::script('assets/themes/one/js/bill.js')}}
<script>

    var item='<div class="row item"> <div class="col-md-10"> <div class="well well-sm"> <div class="row"> <div class="col-sm-4"> <div class="form-group"> {{ Form::label("category","Categoria:") }} {{ Form::select("categories[]",$selectCategories,null,["class"=>"form-control categoria","required"=>"true"]) }} </div> </div> <div class="col-sm-4"> <div class="form-group"> {{ Form::label("product","Producto:") }} {{ Form::select("products[]",[""=>""],null,["class"=>"form-control producto","required"=>"true","readonly"=>"true"]) }} </div> </div> <div class="col-sm-2"> <div class="form-group"> {{ Form::label("amounts","Cantidad:") }} {{ Form::number("amounts[]",1,["class"=>"form-control cantidad","required"=>"true"]) }} </div> </div> <div class="col-sm-2"> <div class="form-group"> {{ Form::label("cost","Costo:") }} {{ Form::text("costs[]",null,["class"=>"form-control costo","required"=>"true"]) }} </div> </div> </div> </div> </div> <div class="col-md-2"> <a class="btn btn-danger remove"> <i class="fa fa-minus"></i> </a> </div> </div>';

    var retribution="{{ $shop->retribution }}";

    @foreach($shop->categories as $category)
        var category_{{ $category->id }}="<option value=''>Seleccionar...</option>";
        @foreach($category->products as $product)
            category_{{ $category->id }}+="<option value='{{ $product->id }}' data-price='{{ $product->price }}'>{{ $product->name }}</option>"
        @endforeach
    @endforeach

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

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('layouts.partials.errors')
            </div>
        </div>

        {{ Form::open(['route'=>['bill_path',$shop->link],'class'=>'validate']) }}
        <div class="row">
            <div class="col-md-10 ">
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Email del comprador:') }}
                    {{ Form::email('email',null,['class'=>'form-control','required'=>'true']) }}
                </div>
            </div>
        </div>
        <div id="products">
            <div class="row item">
                    <div class="col-md-10">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                    {{ Form::label('category','Categoria:') }}
                                    {{ Form::select('categories[]',$selectCategories,null,['class'=>'form-control categoria','required'=>'true']) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                    {{ Form::label('product','Producto:') }}
                                    {{ Form::select('products[]',[''=>''],null,['class'=>'form-control producto','required'=>'true','readonly'=>'true']) }}
                                    </div>
                                </div>
                                <div class="col-sm-2">

                                    <div class="form-group">
                                    {{ Form::label('product','Cantidad:') }}
                                    {{ Form::number('amounts[]',1,['class'=>'form-control cantidad','required'=>'true']) }}
                                    </div>
                                </div>
                                <div class="col-sm-2">

                                    <div class="form-group">
                                    {{ Form::label('cost','Costo:') }}
                                    {{ Form::text('costs[]',null,['class'=>'form-control costo','required'=>'true']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-info add">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
        </div>
        <div class="row">
        <div class="col-md-2 col-md-offset-6">
                <!-- Total Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Saldo ganado:') }}
                    {{ Form::text('retribution',0,['id'=>'retribution','class'=>'form-control','readonly'=>'true']) }}
                </div>
            </div>
            <div class="col-md-2 ">
                <!-- Total Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Total a pagar:') }}
                    {{ Form::text('total',0,['id'=>'total','class'=>'form-control','readonly'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
<br>
@stop