<img class="media-object img-circle avatar hidden-xs" width="{{ isset($size) ? $size : 40 }}" height="{{ isset($size) ? $size : 40 }}" src="{{ Auth::user()->rutaAvatar() }} " alt="{{ Auth::user()->name }}">
