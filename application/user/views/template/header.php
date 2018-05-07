<!doctype html>
<html lang="en">
    <?php
    $title = $fav_image = $logo_title = $logo_href = $logo_image = $logo_retina_image = '';
    $logo_alt_text = $logo_sticky_image = $logo_sticky_retina_image = $logo_sticky_alt_text = '';
    $logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_retina_alt_text = $logo_mobile_sticky_image = '';
    $logo_mobile_sticky_retina_image = $logo_mobile_sticky_retina_alt_text = $logo_data_height = $logo_data_height = '';
    $logo_data_padding = $logo_main_data_height = $logo_sticky_data_height = $logo_mobile_data_height = $logo_mobile_sticky_data_height = '';

    if (isset($logo_details) && isset($logo_details)) {

        $title = $logo_details[0]['title'];
        $fav_image = $logo_details[0]['fav_image'];
        $logo_title = $logo_details[0]['logo_title'];
        $logo_href = $logo_details[0]['logo_href'];
        $logo_image = $logo_details[0]['logo_image'];
        $logo_retina_image = $logo_details[0]['logo_retina_image'];
        $logo_alt_text = $logo_details[0]['logo_alt_text'];
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
        $logo_main_data_height = $logo_details[0]['logo_main_data_height'];
        $logo_sticky_data_height = $logo_details[0]['logo_sticky_data_height'];
        $logo_mobile_data_height = $logo_details[0]['logo_mobile_data_height'];
        $logo_mobile_sticky_data_height = $logo_details[0]['logo_mobile_sticky_data_height'];
    }

    $seo_ga_script = $seo_ga_code = $seo_robot_text = '';
    if (isset($seo_header) && isset($seo_header)) {
        $seo_ga_script = $seo_header[0]['sh_ga_script'];
        $seo_ga_code = $seo_header[0]['sh_ga_code'];
        $seo_robot_text = $seo_header[0]['sh_robot_text'];
    }

    $seo_sp_title = $seo_meta_title = $seo_meta_desc = '';
    if (isset($seo_page) && isset($seo_page)) {
        $seo_sp_title = $seo_page[0]['sp_title'];
        $seo_meta_title = $seo_page[0]['sp_meta_title'];
        $seo_meta_desc = $seo_page[0]['sp_meta_desc'];
    }
    ?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $seo_sp_title; ?></title>
        <base href="<?php echo base_url(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php echo $seo_meta_desc; ?>" />
        <meta name="google-site-verification"  content="<?php echo $seo_ga_code; ?>" />
        <meta name="keywords"  content="<?php echo $seo_meta_title; ?>" />
        <meta name="robots"  content="<?php echo $seo_robot_text; ?>" />
        <meta name="p:domain_verify"   content=""/>





        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $fav_image; ?>" type="image/x-icon">
        <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="themes/frontend/css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="themes/frontend/css/font-awesome.min.css">
        <!-- Swiper css -->
        <link rel="stylesheet" href="themes/frontend/css/swiper.min.css">
        <!-- Animate css -->
        <link rel="stylesheet" href="themes/frontend/css/animate.min.css">
        <!-- Venbox css -->
        <link rel="stylesheet" href="themes/frontend/css/venobox.css">
        <!-- Rateyo css -->
        <link rel="stylesheet" href="themes/frontend/css/rateyo.min.css">
        <!-- Flaticon css -->
        <link rel="stylesheet" href="themes/frontend/css/flaticon.css">
        <!-- Magnific css -->
        <link rel="stylesheet" href="themes/frontend/css/magnific-popup.css">
        <!-- Main style css -->
        <link rel="stylesheet" href="themes/frontend/css/style.css">
        <link rel="stylesheet" href="themes/frontend/css/custom.css">
        <link rel="stylesheet" type="text/css" href="themes/frontend/news_part/css/news_style.css" media="all" />


        <script type="text/javascript">
<?php echo $seo_ga_script; ?>
        </script>
    </head>

    <body>
        <div class="preloader" style="display: none;"></div>
        <!-- Header Part Start -->
        <?php include APPPATH . 'views/template/get_appointment_part.php'; ?>
        <!-- Header Part End -->
        <!-- Navigation Part Start -->
        <?php include APPPATH . 'views/template/desktop_menu.php'; ?>

        <!-- Banner Part Start -->