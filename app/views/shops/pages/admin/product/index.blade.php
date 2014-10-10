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

         <div class="row">
            <div class="col-xs-10">
                <a href="{{ URL::route('admin_category_path',$shop->link) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atrás</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('admin_create_product_path',[$shop->link,$category->id]) }}" class="btn btn-primary pull-right">Crear producto</a>
                <h3 class="no-margin">Productos de la categoría: {{ $category->name }}</h3>
            </div>
        </div>





        <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Precio</td>
                            <td>Servicio a domicilio</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    @foreach($category->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td> {{ $product->delivery_service ? "Si" : "No"; }}</td>
                        <td>
                            {{ link_to_route('admin_edit_product_path','Editar producto',[$shop->link,$category->id,$product->id],['class'=>'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop