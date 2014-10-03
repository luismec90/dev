<!DOCTYPE html>
<html lang="es-EN">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Se ha realizado el siguinete pedido</h2>

        <table>
            <tr>
                <td>Cliente</td>
                <td>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</td>
            </tr>
             <tr>
                <td>Email</td>
                <td> {{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <td>Télefono</td>
                <td>{{ Input::get('phone') }}</td>
            </tr>
            <tr>
                <td>Producto</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td>{{ Input::get('address') }}</td>
            </tr>
            <tr>
                <td>Notas adicionales</td>
                <td>{{ Input::get('note') }}</td>
            </tr>
        </table>
    </body>
</html>