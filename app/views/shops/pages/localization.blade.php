@extends('shops.layouts.default')

@section('js')
<script src="http://maps.google.com/maps/api/js?sensor=false&callback=iniciar"></script>

<script>
function iniciar() {

    var myLatlng = new google.maps.LatLng( {{ $shop->lat }}, {{ $shop->lng }});

    var mapOptions = {
        center: myLatlng,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // To add the marker to the map, use the 'map' property
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "{{ $shop->name }}"
    });
}
</script>
@stop
@section('content')
@include('shops.layouts.partials.title_page',['showTour'=>true])
<div class="row">
    @include('shops.layouts.partials.left_menu')

    <div class="col-md-9">

        <div class="row">
            <div class="col-xs-10">
                <h3 class="no-margin">Localización</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div id="map"></div>
            </div>
            <div class="col-md-4">
                <h3>Detalles de contacto</h3>
                @if($shop->street_address)
                    <p><i class="fa fa-home"></i>
                        <b title="Dirección">Dirección</b>: {{ $shop->street_address }}
                    </p>
                @endif

                @if($shop->phone)
                    <p><i class="fa fa-phone"></i>
                        <b title="Fijo">Fijo</b>: {{ $shop->phone }}
                    </p>
                @endif

                @if($shop->cell)
                    <p><i class="fa fa-mobile"></i>
                        <b title="Celular">Celular</b>: {{ $shop->cell  }}
                    </p>
                @endif

                 @if($shop->cell)
                    <p><i class="fa fa-envelope-o"></i>
                        <b title="Email">Email</b>: <a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a>
                    </p>
                @endif

                @if($shop->schedule)
                    <p><i class="fa fa-clock-o"></i>
                        <b title="Horario">Horario</b>: {{ $shop->schedule }}
                    </p>
                @endif

                @if($shop->facebook)
                    <ul class="list-unstyled list-inline list-social-icons">
                        <li>
                            <a href="{{ $shop->facebook }}" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<br>
@stop