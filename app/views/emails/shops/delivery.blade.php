
<!DOCTYPE html>
<html lang="es-EN">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ $title }}</h2>

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
                <td>Dirección</td>
                <td>{{ Input::get('address') }}</td>
            </tr>
            <tr>
                <td>Notas adicionales</td>
                <td>{{ Input::get('note') }}</td>
            </tr>
        </table>

        <table>
            <tr>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio</td>
            </tr>
            @foreach($bill->purchases as $purchase)
             <tr>
                <td>{{ $purchase->product_name }}</td>
                <td>{{ $purchase->amount }}</td>
                <td>$ {{ $purchase->cost }}</td>
             </tr>
            @endforeach
            <tr>
                <td> </td>
                <td>Saldo ganado:</td>
                <td>$ {{ $bill->retribution }}</td>
            </tr>
            <tr>
                <td> </td>
                <td>Total:</td>
                <td>$ {{ $bill->total_cost }}</td>
            </tr>
        </table>
    </body>
</html>