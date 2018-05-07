<?php
$logo_image = $logo_height = $logo_width = '';

if (isset($logo_details) && !empty($logo_details)) {
    $logo_image = $logo_details[0]['logo_image'];
    $logo_height = $logo_details[0]['logo_header_height'];
    $logo_width = $logo_details[0]['logo_header_width'];
}
$message = $name = $from = '';
if (isset($user_data) && !empty($user_data)) {
    $from = 'Admin';
    $name = $user_data['name'];
    $message = $user_data['message'];
}
//echo '<pre>admin_data:';print_r($admin_data);echo '</pre>';die;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
    <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="144"><a href= "http://localhost:8080/lawyer" target="_blank"><img src="<?php echo $logo_image; ?>" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" border="0" alt=""/></a></td>
                                <td width="393">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="30"><img src="themes/backend/assets/dist/img/email_template/PROMO-GREEN2_01_04.jpg" width="393" height="30" border="0" alt=""/></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#010101; font-size:24px"><strong><em>Hi <?php echo $name; ?>,</em></strong></font><br /><br />
                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><?php echo $message; ?>
                                    <br /><br />
                                    On behalf of the Company<br />
                                    Admin</font></td>
                                <td width="10%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="right" valign="top">
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><img src="images/PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
                </tr>


                <tr>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table></td>
    </tr>
</table>