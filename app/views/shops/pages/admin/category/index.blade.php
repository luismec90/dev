@extends('shops.layouts.default')

@section('content')


<div class="row">
    @include('shops.layouts.partials.left_menu')

    <div class="col-md-9">

        <div class="row">
            <div class="col-xs-12">
            <a href="{{ route('admin_create_category_path',$shop->link) }}" class="btn btn-primary pull-right">
                Crear categoría
            </a>
            <h3 class="no-margin">Categorías</h3>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
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
                         <a href="{{ route('admin_edit_category_path',[$shop->link,$category->id]) }}" class="btn btn-primary btn-sm">Editar categoría</a>
                         <a href="{{ route('admin_products_path',[$shop->link,$category->id]) }}" class="btn btn-primary btn-sm">Listar productos</a>

                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop