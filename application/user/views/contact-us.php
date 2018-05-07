<?php

$fav_image = $logo_title = $logo_href = $logo_image = $logo_alt_text = $footer_logo = '';
if (isset($logo_details) && !empty($logo_details)) {
    $fav_image = $logo_details[0]['fav_image'];
    $logo_title = $logo_details[0]['logo_title'];
    $logo_href = $logo_details[0]['logo_href'];
    $logo_image = $logo_details[0]['logo_image'];
    $logo_alt_text = $logo_details[0]['logo_alt_text'];
    $footer_logo = $logo_details[0]['logo_mobile_image'];
}
$footer_about_content = '';
if (isset($footer_about) && !empty($footer_about)) {
    $footer_about_content = $footer_about[0]['c_content'];
}

$txtApptPhoneNumber = $txtApptOpenDays = $txtApptFAPhoneIcon = $txtApptFAClockIcon = $txtApptTimeBetween = $appt_phone_image = $appt_clock_image = $txtApptVacationDays = '';

if (isset($appt_details) && !empty($appt_details)) {

    $txtApptPhoneNumber = $appt_details[0]['appt_phone'];
    $txtApptOpenDays = $appt_details[0]['appt_open_days'];
    $txtApptVacationDays = $appt_details[0]['appt_vacation_days'];
    $txtApptFAPhoneIcon = $appt_details[0]['appt_fa_phone_icon'];
    $txtApptFAClockIcon = $appt_details[0]['appt_fa_clock_icon'];
    $txtApptTimeBetween = $appt_details[0]['appt_time_between'];
    $appt_phone_image = $appt_details[0]['appt_phone_image'];
    $appt_clock_image = $appt_details[0]['appt_clock_image'];
}
$disclaimer_content = '';
if (isset($disclaimer) && !empty($disclaimer)) {
    $disclaimer_content = $disclaimer[0]['disclaimer_content'];
}

$gmaplat = $gmaplong = $gmapkey = $map_marker_image = '';
if (isset($google_map_entries) && !empty($google_map_entries)) {
    $gmaplat = $google_map_entries[0]['map_lat'];
    $gmaplong = $google_map_entries[0]['map_long'];
    $gmapkey = $google_map_entries[0]['map_key'];
    $map_marker_image = $google_map_entries[0]['map_marker_image'];
}
?>



<?php include APPPATH . 'views/contactus_part/google_map.php'; ?>
<?php //include APPPATH . 'views/contactus_part/contactus_info.php'; ?>
<?php include APPPATH . 'views/contactus_part/contactus_form.php'; ?>

