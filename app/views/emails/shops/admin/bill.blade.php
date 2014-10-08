<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <!-- Facebook sharing information tags -->
        <meta property="og:title" content="*|MC:SUBJECT|*" />

        <title>*|MC:SUBJECT|*</title>

	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
            	<tr>
                	<td align="center" valign="top" style="padding-top:20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Header \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
                                            <td class="headerContent">

                                            	<!-- // Begin Module: Standard Header Image \\ -->
                                            	<img src="{{ $shop->covers[0]->pathImage($shop->id) }}" style="max-width:600px;" id="headerImage campaign-icon" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />
                                            	<!-- // End Module: Standard Header Image \\ -->

                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Header \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Body \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                    	<tr>
                                            <td valign="top">

                                                <!-- // Begin Module: Standard Content \\ -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top" class="bodyContent">
                                                            <div mc:edit="std_content00">
                                                                <h1 class="h1">{{ $shop->name }}</h1>
                                                                <strong>Getting started:</strong> Transactional emails serve a defined and simple purpose. They differ from traditional mass-emails because they're generally sent on a user-by-user basis, instead of large list of users, and are generally used to deliver purchase receipts, account updates, security notifications, and more.
                                                            </div>
														</td>
                                                    </tr>
                                                    <tr>
                                                    	<td valign="top" style="padding-top:0; padding-bottom:0;">
                                                          <table border="0" cellpadding="10" cellspacing="0" width="100%" class="templateDataTable">
                                                              <tr>
                                                                  <td scope="col" valign="top" width="25%" class="dataTableHeading" mc:edit="data_table_heading00">
                                                                    Producto
                                                                  </td>
                                                                  <td scope="col" valign="top" width="25%" class="dataTableHeading" mc:edit="data_table_heading01">
                                                                    Cantidad
                                                                  </td>
                                                                  <td scope="col" valign="top" width="50%" class="dataTableHeading" mc:edit="data_table_heading02">
                                                                    Costo
                                                                  </td>
                                                              </tr>
                                                              @for ($i = 0; $i < sizeof($products); $i++)
                                                                  <tr mc:repeatable>
                                                                      <td valign="top" class="dataTableContent" mc:edit="data_table_content00">
                                                                        {{ $products[$i] }}
                                                                      </td>
                                                                      <td valign="top" class="dataTableContent" mc:edit="data_table_content01">
                                                                        {{ $amounts[$i] }}
                                                                      </td>
                                                                      <td valign="top" class="dataTableContent" mc:edit="data_table_content02">
                                                                        {{ $costs[$i] }}
                                                                      </td>
                                                                  </tr>
                                                              @endfor
                                                              <tr mc:repeatable>
                                                                  <td valign="top" class="dataTableContent" mc:edit="data_table_content00">

                                                                  </td>
                                                                  <td valign="top" class="dataTableContent" mc:edit="data_table_content01">
                                                                    <b>Saldo ganado:</b>
                                                                  </td>
                                                                  <td valign="top" class="dataTableContent" mc:edit="data_table_content02">
                                                                    {{ $retribution }}
                                                                  </td>
                                                              </tr>
                                                               <tr mc:repeatable>
                                                                    <td valign="top" class="dataTableContent" mc:edit="data_table_content00">

                                                                    </td>
                                                                    <td valign="top" class="dataTableContent" mc:edit="data_table_content01">
                                                                      <b>Total:</b>
                                                                    </td>
                                                                    <td valign="top" class="dataTableContent" mc:edit="data_table_content02">
                                                                      {{ $total_cost }}
                                                                    </td>
                                                                </tr>
                                                          </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td valign="top" class="bodyContent">
                                                            <div mc:edit="std_content01">
                                                                Where <a href="http://www.mailchimp.com/" target="_blank">MailChimp</a> can be used to send newsletters to several subscribers in one large blast, <a href="http://www.mandrill.com/" target="_blank">Mandrill</a> is specifically positioned to send transactional emails, and offers relevant tracking and metrics that isn't necessarily available through a traditional email platform.
                                                            </div>
														</td>
                                                    </tr>
                                                    <tr>
                                                    	<td align="center" valign="top" style="padding-top:0;">
                                                        	<table border="0" cellpadding="15" cellspacing="0" class="templateButton">
                                                            	<tr>
                                                                	<td valign="middle" class="templateButtonContent">
                                                                    	<div mc:edit="std_content02">
                                                                        	<a href="http://www.mandrill.com/" target="_blank">See What Mandrill Can Do</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Standard Content \\ -->

                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Body \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Footer \\ -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                    	<tr>
                                        	<td valign="top" class="footerContent">

                                                <!-- // Begin Module: Transactional Footer \\ -->
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top">
                                                            <div mc:edit="std_footer">
																<em>Copyright &copy; *|CURRENT_YEAR|* *|LIST:COMPANY|*, All rights reserved.</em>
																<br />
																*|IFNOT:ARCHIVE_PAGE|* *|LIST:DESCRIPTION|*
																<br />
																<strong>Our mailing address is:</strong>
																<br />
																*|HTML:LIST_ADDRESS_HTML|**|END:IF|*
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="middle" id="utility">
                                                            <div mc:edit="std_utility">
                                                                &nbsp;<a href="*|ARCHIVE|*" target="_blank">view this in your browser</a> | <a href="*|UNSUB|*">unsubscribe from this list</a> | <a href="*|UPDATE_PROFILE|*">update subscription preferences</a>&nbsp;
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Transactional Footer \\ -->

                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Footer \\ -->
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>