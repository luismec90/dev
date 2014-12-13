<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkingShops</title>



</head><body><div class="block">
	<!-- Start of preheader -->

	<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" module="preheader">
		<tbody>
			<tr>
				<td>
					<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
						<tbody>
							<tr>
								<td>
									<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										<tbody>
											<!-- Spacing -->

											<tr>
												<td width="100%" height="7" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
												</td>
											</tr>
											<!-- /Spacing -->

											<!-- preheader text -->


											<!-- /preheader text -->

											<!-- Spacing -->

											<tr>
												<td width="100%" height="7" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
												</td>
											</tr>
											<!-- /Spacing -->

										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- End of preheader -->

</div>
<div class="block">
	<!-- start of header -->

	<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" module="header">
		<tbody>
			<tr>
				<td>
					<table bgcolor="#e84c3d" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-bottom-width:4px;border-bottom-style: solid;border-bottom-color: #c73d26;" hlitebg="edit">
						<tbody>
							<tr>
								<td>
									<table width="580" cellpadding="0" cellspacing="0" border="0" align="" class="devicewidth">
										<tbody>
											<tr>
												<td>
													<!-- logo -->

													<table width="450" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
														<tbody>
															<tr>
																<td height="66" width="400" valign="middle" style="padding-left:20px;" class="devicewidthinner" >
																@if(isset($shop))
																	 <a href="{{ URL::route('shop_path',$shop->link) }}" style="color:#fff; text-decoration: none; font-size: 30px; font-family: arial, Helvetica, sans-serif; text-align: center; line-height: 20px; position: relative;">{{ $shop->name }}</a>
                                                                 @else
                                                                    <a href="{{ URL::route('home') }}" style="color:#fff; text-decoration: none; font-size: 30px; font-family: arial, Helvetica, sans-serif; text-align: center; line-height: 20px; position: relative;">LinkingShops</a>
                                                                 @endif
																</td>
																<td width="190" align="left" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;" class="emhide">
																</td>
															</tr>
														</tbody>
													</table>
													<!-- End of logo -->

													<!-- menu -->



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
		</tbody>
	</table>
	<!-- end of header -->

</div>
<div class="block">
	<!-- Start of main-banner -->


</div>
<div class="block">
	<!-- start fulltext -->

	<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" module="fulltext">
		<tbody>
			<tr>
				<td>
					<table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
						<tbody>
							<tr>
								<td>
									<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										<tbody>
											<!-- Spacing -->

											<tr>
												<td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
												</td>
											</tr>
											<!-- /Spacing -->

											<tr>
												<td>
												@yield('content')

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
		</tbody>
	</table>
	<!-- end of fulltext -->

</div>

<div class="block">
	<!-- start of footermenu -->

	<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" module="footermenu" class="emhide">
		<tbody>
			<tr>
				<td>
					<table width="580" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
						<tbody>
							<tr>
								<td>
									<table width="540" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										<tbody>
											<tr>
												<td align="center" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(153, 153, 153); text-align: center; line-height: 24px; position: relative;">
													<a style="text-decoration: none; color: #999999;" href="#">Para cualquier inquietud o comentario, escribenos a: <a href="mailto:soporte@linkingshops.com" style="color: rgb(153, 153, 153); ">soporte@linkingshops.com </a></a>
												</td>

											</tr>
										</tbody>
									</table>
									<!-- End of Menu -->

								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- end of footermenu -->

</div>

</body></html>