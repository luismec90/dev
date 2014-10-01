@extends('.........layouts.default')

@section('content')


<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">
            Categorías
        </h1>
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
                    {{ link_to_route('admin_edit_category_path','Ver categoría',[$shop->name,$category->name],['class'=>'btn btn-success btn-sm']) }}
                    {{ link_to_route('admin_show_category_path','Ver productos',[$shop->name,$category->name],['class'=>'btn btn-success btn-sm']) }}
                </td>                    
            </tr>
            @endforeach
        </table>
    </div>

</div>



@stop