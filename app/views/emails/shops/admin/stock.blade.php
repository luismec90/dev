@extends('emails.layout')

@section('content')

<div>
 <center><h2 style="font-family: arial, Helvetica, sans-serif;">Hola, solo te quedan <b style="color:rgb(232, 76, 61);">{{ $stock->total_amount." ".$stock->unit->name }}</b> de <b>{{ $stock->name }}</b></h2></center>
</div>

@stop