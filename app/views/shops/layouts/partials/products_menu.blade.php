<div class="col-md-3">
     <h3><a href="{{ URL::route('category_path',[$shop->link,$category->name]) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> </a> Regresar </h3>
    <div class="list-group">
        @foreach ($category->products as $row)
            <a href="{{ route('product_path',[$shop->link,$category->name,$row->name]) }}" class="list-group-item @if(isset($product) && $product->name==$row->name) {{ "active"}} @endif">{{ $row->name }}</a>
        @endforeach
    </div>
</div>