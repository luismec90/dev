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
            <div class="col-xs-12">
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-eliminar-categoria">
                    Crear categoría
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Cantidad de productos</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    @foreach($shop->categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products()->count() }}</td>
                        <td>
                            {{ link_to_route('admin_edit_category_path','Editar categoría',[$shop->link,$category->id],['class'=>'btn btn-primary btn-sm']) }}
                            {{ link_to_route('admin_show_category_path','Ver productos',[$shop->link,$category->id],['class'=>'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop