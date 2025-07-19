@extends('emails.app-nuxt')

@section('content')

<table cellpadding="0" cellspacing="0" align="center" class="g" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
            <tr>
                <td align="center" style="padding:0;Margin:0">
                    <table bgcolor="#0f172a" align="center" cellpadding="0" cellspacing="0" class="z" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#0f172a;width:600px;border:2px solid #3b82f6">
                        <tr>
                            <td align="left" style="Margin:0;padding-right:20px;padding-left:20px;padding-top:30px;padding-bottom:30px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0px"><img src="{{asset('img/LOGO_UNEG.jpg')}}" alt="Logo" width="150" title="Logo" style="display:block;font-size:12px;border:0;outline:none;text-decoration:none"></td>
                                                </tr>
                                    
                                                    <tr>
                                                        <td align="center" class="u" style="padding:0;Margin:0;padding-bottom:10px">
                                                            <h1 style="Margin:0;font-family:arial, 'helvetica neue', helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:46px;font-style:normal;font-weight:bold;line-height:46px;color:#ffffff">Recuperación de contraseña</h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="bd bc" style="Margin:0;padding-top:5px;padding-right:40px;padding-bottom:5px;padding-left:40px">
                                                            <p style="Margin:0;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#ffffff;font-size:14px">Has recibido este mensaje porque has solicitado un cambio de contraseña. Por favor, haz clic en el botón de abajo para cambiar tu contraseña.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:5px">
                                                            <p style="Margin:0;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#ffffff;font-size:14px">Si no has solicitado un cambio de contraseña, por favor ignora este correo.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                                            <span class="r" style="border-style:solid;border-color:#3b82f6;background:#3b82f6;border-width:0px;display:inline-block;border-radius:6px;width:auto">
                                                                <a href="/forgot-password/{{$token}}" target="_blank" class="n" style="mso-style-priority:100 !important;text-decoration:none !important;mso-line-height-rule:exactly;color:#ffffff;font-size:20px;padding:10px 30px 10px 30px;display:inline-block;background:#3b82f6;border-radius:6px;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center;letter-spacing:0;mso-padding-alt:0;mso-border-alt:10px solid #3b82f6;padding-left:30px;padding-right:30px">RECUPERAR CONTRASEÑA</a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                       

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

@endsection

