@extends('emails.layouts.linkingshops')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
             Bienvenido a LinkingShops {{ $user->first_name }}!
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;">
             Por favor verifique su email
        </td>
    </tr>
    <tr>
        <td style="padding: 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;text-align: center;">
            <a href="{{ URL::to('register/verify/' . $confirmation_code) }}" style="display:inline-block;margin-bottom:0;font-weight:400;text-align:center;vertical-align:middle;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.42857143;border-radius:4px;color:#fff;background-color:#1abc9c;border-color:#16a085;text-decoration:none;font-size:16px" target="_blank">Verificar</a>
        </td>
    </tr>
</table>

@stop

