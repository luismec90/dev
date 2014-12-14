@extends('emails.layouts.linkingshops')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
          {{ $shop->name }} requiere asistencia
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;">
            <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #ddd; border-spacing: 0; border-collapse: collapse;" >
                <tr>
                     <td style="border: 1px solid #ddd; padding: 8px;">Nombre: </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ Input::get('name_help') }}</td>
                </tr>
                <tr>
                     <td style="border: 1px solid #ddd; padding: 8px;">Celular: </td>
                     <td style="border: 1px solid #ddd; padding: 8px;">{{ Input::get('cell_help') }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@stop
