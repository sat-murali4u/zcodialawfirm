<?php
$txtApptPhoneNumber = $txtApptOpenDays = $txtApptFAPhoneIcon = $txtApptFAClockIcon = $txtApptTimeBetween = $appt_phone_image = $appt_clock_image = '';

if (isset($appt_details) && !empty($appt_details)) {
    $txtApptPhoneNumber = $appt_details[0]['appt_phone'];
    $txtApptOpenDays = $appt_details[0]['appt_open_days'];
    $txtApptFAPhoneIcon = $appt_details[0]['appt_fa_phone_icon'];
    $txtApptFAClockIcon = $appt_details[0]['appt_fa_clock_icon'];
    $txtApptTimeBetween = $appt_details[0]['appt_time_between'];
    $appt_phone_image = $appt_details[0]['appt_phone_image'];
    $appt_clock_image = $appt_details[0]['appt_clock_image'];
}
?>

<header class="header-part">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7 col-6 text-left">
                <div class="header-item">
                    <p class="pl-0">
                        <i class="<?php echo $txtApptFAPhoneIcon; ?>"></i> 
                        <span class="d-none d-md-inline-block">Phone:</span> 
                        <a href="callto::<?php echo $txtApptPhoneNumber; ?>"><?php echo $txtApptPhoneNumber; ?></a> 
                        <span class="d-none d-xl-inline-block">;</span> 
                        <a href="callto::<?php echo $txtApptPhoneNumber; ?>" class="d-none d-xl-inline-block"><?php echo $txtApptPhoneNumber; ?></a>
                    </p>
                    <p class="d-none d-md-inline-block">
                        <i class="<?php echo $txtApptFAClockIcon; ?>"></i> 
                        <span class="d-none d-sm-inline-block">We are open:</span><?php echo ' ' . $txtApptOpenDays; ?>: <?php echo $txtApptTimeBetween; ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-5 col-6 text-left text-sm-right">
                <div class="header-icon">
                    <a href="#" class="btn-1 d-none d-md-inline-block">Get Appointment</a>
                    <ul class="flat-list social-icon d-inline-block">
                        <?php
                        if (isset($contactus_social) && !empty($contactus_social)) {
                            foreach ($contactus_social as $key_social => $value_social) {
                                ?>
                                <li><a target=”_blank” href="<?php echo $value_social['c_social_link']; ?>"><i class="<?php echo $value_social['c_social_name']; ?>"></i></a></li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>