<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Te han contactado</h2>


        <table>
            <tr>
                <td>Nombre</td>
                <td>{{ Input::get('name') }}</td>
            </tr>
            <tr>
                <td>Asunto</td>
                <td>{{ Input::get('subject') }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ Input::get('email') }}</td>
            </tr>
            <tr>
                <td>Mensaje</td>
                <td>{{ Input::get('message') }}</td>
            </tr>
        </table>
    </body>
</html>