@extends('.........layouts.default')

@section('content')


<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">
              <a href="{{ URL::route('admin_category_path',[$shop->name]) }}" class="btn btn-success" title=""><i class="fa fa-reply"></i></a>  
  Productos de la categoría <em class="text-info">{{ $category->name }}</em>
            <!-- Button trigger modal -->

        </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            @foreach($category->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    {{ link_to_route('admin_edit_product_path','Editar producto',[$shop->name,$category->name,$product->name],['class'=>'btn btn-success btn-sm']) }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>



@stop