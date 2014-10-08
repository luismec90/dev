@extends('emails.layout')

@section('content')
    <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
    														<tbody>
    															<!-- Title -->

    															<tr>
    																<td style="font-family: arial, Helvetica, sans-serif; font-size: 18px; color: rgb(51, 51, 51); text-align: center; line-height: 20px; position: relative;" emtitle="fulltext-title">
    																	Para reestablecer su contraseña por favor de click en el siguiente enlace:
    																</td>
    															</tr>
    															<!-- End of Title -->

    															<!-- spacing -->

    															<tr>
    																<td height="5" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
    																</td>
    															</tr>
    															<!-- /spacing -->

    															<!-- content -->


    															<!-- End of content -->

    															<!-- Spacing -->

    															<tr>
    																<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
    																</td>
    															</tr>
    															<!-- /Spacing -->

    															<!-- button -->

    															<tr>
    																<td>
    																	<table height="40" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" style="border-collapse:separate;">
    																		<tbody>
    																			<tr>
    																				<td width="auto" align="center" valign="middle" height="40" style="border-top-left-radius: 4px; border-bottom-left-radius: 4px; border-top-right-radius: 4px; border-bottom-right-radius: 4px; font-size: 16px; font-family: arial, Helvetica, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 22px; padding-right: 22px; border-bottom-width: 4px; border-bottom-style: solid; border-bottom-color: rgb(197, 65, 52); position: relative; background-color: rgb(241, 97, 73); background-clip: padding-box;" hlitebg="edit" emtitle="fulltxt-button">
    																					<table id="backgroundTable" style="border-collapse:collapse;" border="0" cellspacing="0" cellpadding="0" align="center" class="mce-item-table">
    																						<tbody>
    																							<tr>

    																								<td>
    																									<span style="color: #ffffff; font-weight: 300;"> <a style="color: #ffffff; text-align:center;text-decoration: none;" href="{{ URL::to('password/reset', array($token)) }}">Recuperar</a></span>
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
    															<!-- /button -->

    															<!-- Spacing -->

    															<tr>
    																<td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
    																</td>
    															</tr>
    															<!-- Spacing -->

    														</tbody>
    													</table>
@stop