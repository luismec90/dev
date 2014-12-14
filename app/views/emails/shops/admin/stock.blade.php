@extends('emails.layouts.linkingshops')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
            Hola, solo te quedan <b style="color:rgb(232, 76, 61);">{{ $stock->total_amount." ".$stock->unit->name }}</b> de <b>{{ $stock->name }}</b>
        </td>
    </tr>
</table>

@stop


