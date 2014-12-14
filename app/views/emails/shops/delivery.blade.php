@extends('emails.layouts.linkingshops')

@section('content')

    <center><h2>{{ $title }}</h2></center>

<div>
       <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ddd; border-spacing: 0; border-collapse: collapse;" class="devicewidthinner">
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Cliente</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</td>
            </tr>
             <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Email</td>
                <td style="border: 1px solid #ddd; padding: 8px;"> {{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Télefono</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ Input::get('phone') }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Dirección</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ Input::get('address') }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Notas adicionales</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ Input::get('note') }}</td>
            </tr>
        </table>
</div>
<br><br>
<div>

<table width="540" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ddd; border-spacing: 0; border-collapse: collapse;" class="devicewidthinner">
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Producto</td>
                <td style="border: 1px solid #ddd; padding: 8px;">Cantidad</td>
                <td style="border: 1px solid #ddd; padding: 8px;">Precio</td>
            </tr>
            @foreach($bill->purchases as $purchase)
             <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $purchase->product_name }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $purchase->amount }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">$ {{ $purchase->cost }}</td>
             </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"> </td>
                <td style="border: 1px solid #ddd; padding: 8px;">Saldo ganado:</td>
                <td style="border: 1px solid #ddd; padding: 8px;">$ {{ $bill->retribution }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"> </td>
                <td style="border: 1px solid #ddd; padding: 8px;">Total:</td>
                <td style="border: 1px solid #ddd; padding: 8px;">$ {{ $bill->total_cost }}</td>
            </tr>
</table>
</div>
@stop