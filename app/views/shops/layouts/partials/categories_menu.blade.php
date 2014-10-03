<div class="col-md-3">
    <div class="list-group">
        
        @foreach ($shop->categories as $row)
        <a href="{{ route('category_path',[$shop->link,$row->name]) }}" class="list-group-item @if(isset($category) && $category->name==$row->name) {{ "active"}} @endif">{{ $row->name }}</a>
        @endforeach
       
    </div>
</div>