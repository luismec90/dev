<div class="col-md-3">
    <p class="lead"><a href="{{ URL::route('category_path',[$shop->name,$category->name]) }}" class="btn btn-success" title=""><i class="fa fa-reply"></i></a> Productos</p>
    <div class="list-group">
        
        @foreach ($category->products as $row)
        <a href="{{ route('product_path',[$shop->name,$category->name,$row->name]) }}" class="list-group-item @if(isset($product) && $product->name==$row->name) {{ "active"}} @endif">{{ $row->name }}</a>
        @endforeach
       
    </div>
</div>