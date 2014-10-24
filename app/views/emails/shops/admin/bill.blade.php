@extends('emails.layout')

@section('content')
@if(!$is_new_user)
    <center><h2 style="font-family: arial, Helvetica, sans-serif;">Hola {{ $user->first_name }}</h2></center>
    <center><h3 style="font-family: arial, Helvetica, sans-serif;">{{ $title }}</h3></center>
@else
    <center><h2 style="font-family: arial, Helvetica, sans-serif;">{{ $title }}</h2></center>
@endif
@if($shop->retribution>0)
<center><h3 style="font-family: arial, Helvetica, sans-serif;">Te obsequimos <b style="color:rgb(232, 76, 61); font-size:25px; ">{{  Shop::showMoney($bill->retribution) }}</b> por esta compra</h3></center>
@endif



<div>
@if($bill->purchases->count())
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
                <td style="border: 1px solid #ddd; padding: 8px;">{{ Shop::showMoney($purchase->cost) }}</td>
             </tr>
            @endforeach
            @if($shop->retribution>0)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"> </td>
                <td style="border: 1px solid #ddd; padding: 8px;">Saldo ganado:</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b> {{  Shop::showMoney($bill->retribution) }}</b></td>
            </tr>
            @endif
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"> </td>
                <td style="border: 1px solid #ddd; padding: 8px;">Total:</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b> {{  Shop::showMoney($bill->total_cost) }}</b></td>
            </tr>
    </table>
@else
   <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ddd; border-spacing: 0; border-collapse: collapse;" class="devicewidthinner">
            @if($shop->retribution>0)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">Saldo ganado:</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b> {{ Shop::showMoney($bill->retribution) }}</b></td>
            </tr>
            @endif
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">
                Total compra:</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>{{ Shop::showMoney($bill->total_cost) }}</b></td>
            </tr>
    </table>
@endif
</div>

<div style="margin: 20px">
@if($is_new_user)
    @if($shop->retribution>0)
        <center style="font-family: arial, Helvetica, sans-serif;  line-height: 20px">
             Por cada compra que realices en <b style="color:rgb(232, 76, 61);">{{ $shop->name }}</b> recibirás el <b style="color:rgb(232, 76, 61);">{{ $shop->retribution*100 }}%</b> <br> del total pagado, valor que podrás utilizar en compras futuras.

    <br><br>
   <h3>Debes finalizar el registro de tu cuenta para actvar tu saldo.</h3>
 @endif
<br>
   <a href="{{ route('complete_registration',[$shop->link,$user->email,sha1("$user->email-luis5484175")]) }}" style="display: inline-block; margin-bottom: 0; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; border-radius: 4px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #fff; background-color: #1abc9c; border-color: #16a085; text-decoration: none; font-size:16px">Finalizar registro</a>
</center>
@elseif($shop->retribution>0)
<center style="font-family: arial, Helvetica, sans-serif;  line-height: 20px">
    Recuerda, tu código de verificación es: <b style="color:rgb(232, 76, 61);">{{ $user->code }}</b> <br> Lo necesitarás para redimir tu saldo.

<br><br>
   <a href="{{ route('shop_path',$shop->link) }}" style="display: inline-block; margin-bottom: 0; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; border-radius: 4px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #fff; background-color: #1abc9c; border-color: #16a085; text-decoration: none; font-size:16px">Consultar saldo</a>
</center>
@else
<br><br>
   <a href="{{ route('shop_path',$shop->link) }}" style="display: inline-block; margin-bottom: 0; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; border-radius: 4px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #fff; background-color: #1abc9c; border-color: #16a085; text-decoration: none; font-size:16px">{{ $shop->name }}</a>
@endif
</div>

@stop