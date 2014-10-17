@extends('emails.layout')

@section('content')
<table width="540"  cellpadding="0" cellspacing="0" border="0" >

    <tbody>
        <tr>
            <td style="font-family: arial, Helvetica, sans-serif; font-size: 18px; text-align: center;">
                Bienvenido a LinkingShops, {{ $user->first_name }}
            </td>
        </tr>
        <tr>
            <td style="font-family: arial, Helvetica, sans-serif; font-size: 18px; padding-left: 20px;">
                <br>
            </td>
            <td style="margin-left: 20px;">

            </td>
            <td style="margin-left: 20px;">

            </td>
        </tr>
        <tr>
            <td style="font-family: arial, Helvetica, sans-serif; font-size: 18px; color: rgb(51, 51, 51); text-align: center; line-height: 20px; position: relative;" emtitle="fulltext-title">
                Por favor verifique su email
            </td>
        </tr>

        <tr>
            <td height="5" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
            </td>
        </tr>

        <tr>
            <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
            </td>
        </tr>

        <tr>
            <td>
                <table height="40" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" style="border-collapse:separate;">
                    <tbody>
                        <tr>
                            <td width="auto" align="center" valign="middle" height="40" style="cursor:pointer; border-top-left-radius: 4px; border-bottom-left-radius: 4px; border-top-right-radius: 4px; border-bottom-right-radius: 4px; font-size: 16px; font-family: arial, Helvetica, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 22px; padding-right: 22px; border-bottom-width: 4px; border-bottom-style: solid; border-bottom-color: rgb(197, 65, 52); position: relative; background-color: rgb(241, 97, 73); background-clip: padding-box;" hlitebg="edit" emtitle="fulltxt-button">
                                <table id="backgroundTable" style="border-collapse:collapse;" border="0" cellspacing="0" cellpadding="0" align="center" class="mce-item-table">
                                    <tbody>
                                        <tr>

                                            <td>
                                                <span style="color: #ffffff; font-weight: 300;"> <a style="color: #ffffff; text-align:center;text-decoration: none;" href="{{ URL::to('register/verify/' . $confirmation_code) }}">Verificar</a></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr>
            <td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
            </td>
        </tr>

    </tbody>
</table>
@stop

