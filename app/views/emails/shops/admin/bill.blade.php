@extends('emails.layout')

@section('content')

<center><h2>{{ $title }}</h2></center>



<div>
    <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ddd; border-spacing: 0; border-collapse: collapse;" class="devicewidthinner">
            <tr style="background: #444; color:#FFFFFF">
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
                <td style="border: 1px solid #ddd; padding: 8px;"><b>$ {{ $bill->retribution }}</b></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"> </td>
                <td style="border: 1px solid #ddd; padding: 8px;">Total:</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>$ {{ $bill->total_cost }}</b></td>
            </tr>
    </table>
</div>

<div style="margin: 20px">
@if($is_new_user)
    Gracias por comprar en <b style="color:rgb(232, 76, 61);">{{ $shop->name }}</b>, has ganado <b style="color:rgb(232, 76, 61);">$ {{ $bill->retribution }}</b>.<br><br>
     Por cada compra que realices recibirás el {{ $shop->retribution*100 }}% del total pagado, valor que podrás usar en compras futuras. <a href="{{ route('complete_registration',[$shop->link,$user->email,sha1("$user->email-luis5484175")]) }}" title="Completar registro" target="_blank">Finaliza el registro de tu cuenta para usarlo</a>.
<br>
<br>
   <a href="{{ route('complete_registration',[$shop->link,$user->email,sha1("$user->email-luis5484175")]) }}" style="display: inline-block; margin-bottom: 0; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; border-radius: 4px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #fff; background-color: #1abc9c; border-color: #16a085; text-decoration: none; font-size:16px">Finalizar registro</a>
@endif
</div>

@stop