
<?php
$logo_image = $logo_height = $logo_width = '';

if (isset($logo_details) && !empty($logo_details)) {
    $logo_image = $logo_details[0]['logo_image'];
    $logo_height = $logo_details[0]['logo_header_height'];
    $logo_width = $logo_details[0]['logo_header_width'];
}
$message = $name = $from = '';
if (isset($admin_data) && !empty($admin_data)) {
    $from = $admin_data['from'];
    $name = $admin_data['name'];
    $message = $admin_data['message'];
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
                                            <td height="30"><img src="<?php echo  'themes/backend/assets/dist/img/email_template/PROMO-GREEN2_01_04.jpg'; ?>" width="393" height="30" border="0" alt=""/></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table></td>
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
                                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#010101; font-size:14px"><strong><em>Hi,</em></strong></font><br/><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#010101; font-size:14px"><br /> You got a mail from the below mentioned user.<br /><br /></font>
                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><table>
                                        <tr><td>Name</td><td>:</td><td><?php echo $name; ?></td></tr>
                                        <tr><td>Email Address</td><td>:</td><td><?php echo $from; ?></td></tr>
                                        <tr><td>Message</td><td>:</td><td><?php echo $message; ?></td></tr>
                                    </table>
                                    <br /><br />
                                    <br />
                                    </font></td>
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
              

            </table></td>
    </tr>
</table>