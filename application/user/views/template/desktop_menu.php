<?php
$title = $fav_image = $logo_title = $logo_href = $logo_image = $logo_retina_image = $logo_alt_text = $logo_sticky_image = $logo_sticky_retina_image = $logo_sticky_alt_text = $logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_retina_alt_text = $logo_mobile_sticky_image = $logo_mobile_sticky_retina_image = $logo_mobile_sticky_retina_alt_text = $logo_data_height = $logo_data_padding = $logo_main_data_height = $logo_sticky_data_height = $logo_mobile_data_height = $logo_mobile_sticky_data_height = '';
$logo_header_height = $logo_header_width = $logo_footer_height = $logo_footer_width = '';
if (isset($logo_details) && !empty($logo_details)) {
    //echo '<pre>';print_r($logo_details);echo '</pre>';die;
    $title = $logo_details[0]['title'];
    $fav_image = $logo_details[0]['fav_image'];
    $logo_title = $logo_details[0]['logo_title'];
    $logo_href = $logo_details[0]['logo_href'];
    $logo_image = $logo_details[0]['logo_image'];
    $logo_retina_image = $logo_details[0]['logo_retina_image'];
    $logo_alt_text = $logo_details[0]['logo_alt_text'];
    $logo_header_height = $logo_details[0]['logo_header_height'];
    $logo_header_width = $logo_details[0]['logo_header_width'];
    $logo_footer_height = $logo_details[0]['logo_footer_height'];
    $logo_footer_width = $logo_details[0]['logo_footer_width'];
    $logo_sticky_image = $logo_details[0]['logo_sticky_image'];
    $logo_sticky_retina_image = $logo_details[0]['logo_sticky_retina_image'];
    $logo_sticky_alt_text = $logo_details[0]['logo_sticky_alt_text'];
    $logo_mobile_image = $logo_details[0]['logo_mobile_image'];
    $logo_mobile_retina_image = $logo_details[0]['logo_mobile_retina_image'];
    $logo_mobile_retina_alt_text = $logo_details[0]['logo_mobile_retina_alt_text'];
    $logo_mobile_sticky_image = $logo_details[0]['logo_mobile_sticky_image'];
    $logo_mobile_sticky_retina_image = $logo_details[0]['logo_mobile_sticky_retina_image'];
    $logo_mobile_sticky_retina_alt_text = $logo_details[0]['logo_mobile_sticky_retina_alt_text'];
    $logo_data_height = $logo_details[0]['logo_data_height'];
    $logo_data_padding = $logo_details[0]['logo_data_padding'];
    $logo_main_data_height = $logo_details[0] ['logo_main_data_height'];
    $logo_sticky_data_height = $logo_details[0]['logo_sticky_data_height'];
    $logo_mobile_data_height = $logo_details[0]['logo_mobile_data_height'];
    $logo_mobile_sticky_data_height = $logo_details[0]['logo_mobile_sticky_data_height'];
}
?>

<nav id="navigation" class="navbar navbar-expand-lg nav-bg-white">
    <div class="container">
        <a class="navbar-brand header_logo" href="<?php echo $logo_href; ?>"><img src="<?php echo $logo_image; ?>" alt="<?php echo $logo_alt_text; ?>" style="width:<?php echo $logo_header_width; ?>px; height:<?php echo $logo_header_height; ?>px;"></a>
        <div class="collapse navbar-collapse" id="nav-list">
            <ul class="navbar-nav ml-auto"></ul>

        </div>
        <button class="second-nav-toggler" type="button">
            <i class="fa fa-bars bars"></i>
        </button>
    </div>
</nav>
<!-- mobile menu  -->
<div id="mobile-nav" data-prevent-default="true" data-mouse-events="true">
    <div class="mobile-nav-box">
        <div class="mobile-logo">
            <a href="<?php echo $logo_href; ?>" class="mobile-main-logo"><img src="<?php echo $logo_image; ?>" alt="<?php echo $logo_alt_text; ?>" style="width:<?php echo $logo_header_width; ?>px; height:<?php echo $logo_header_height; ?>px;"></a>
            <a href="#" class="manu-close">MENU <i class="fa fa-times"></i></a>
        </div>

        <ul class="mobile-list-nav"></ul>
 </div>
</div>
<!-- Navigation Part End -->