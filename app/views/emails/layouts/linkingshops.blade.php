<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Linking Shops</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#ee4c50" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                @if(isset($shop_name))
                                    <label style=" color:#fff; font-size: 53px;">{{ $shop_name }} </label>
                                @else
                                    <img src="http://linkingshops.com/assets/images/logo-white.png" width="50" height="50" style="margin-right: 20px"><label style=" color:#fff; font-size: 53px;"> LinkingSh<img src="http://linkingshops.com/assets/images/loading-white.gif" width="40" height="40">ps </label>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            @yield('content')

                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#555555" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 24px; position: relative;">
                                        													<a style="text-decoration: none; color: #CFCFCF;" href="#">Para cualquier inquietud o comentario, escribenos a: <a href="mailto:soporte@linkingshops.com" style="color: #ffffff; ">soporte@linkingshops.com </a></a>
                                        												</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #CFCFCF; font-family: Arial,Helvetica sans-serif; font-size: 14px;" width="75%">
                                            &reg; LinkingShops, 2014<br/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>