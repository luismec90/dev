@extends('shops.layouts.default')

@section('js')
<script src="http://maps.google.com/maps/api/js?sensor=false&callback=iniciar"></script>

<script>
function iniciar() {

    var myLatlng = new google.maps.LatLng( {{ $shop->lat }}, {{ $shop->lng }} );

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

<div class="row">
    <div class="col-lg-12">
       <h2 class="section-title"><span>Localización</span></h2>
    <br>
    </div>
</div>
<div class="row">

    <div class="col-md-8">
        <div id="map"></div>
    </div>
    <div class="col-md-4">
        <h3>Detalles de contacto</h3>
        <p>
            {{ $shop->street_address }}<br>
        </p>
        <p><i class="fa fa-phone"></i> 
            <abbr title="Phone">Fijo</abbr>: {{ $shop->phone }}</p>
        <p><i class="fa fa-mobile"></i>
                    <abbr title="Phone">Celular</abbr>: {{ $shop->cell  }}</p>
        <p><i class="fa fa-envelope-o"></i> 
            <abbr title="Email">Email</abbr>: <a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a>
        </p>
        <p><i class="fa fa-clock-o"></i> 
            <abbr title="Hours">Horario</abbr>: {{ $shop->schedule }}</p>
        <ul class="list-unstyled list-inline list-social-icons">
            <li>
                <a href="{{ $shop->facebook }}" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
            </li>

        </ul>
    </div>
</div>
<br>
@stop