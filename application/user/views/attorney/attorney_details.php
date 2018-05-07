<?php
$attyTitle = $attyContent = $attyImage = $attyBGImage = '';
if (isset($about_attorney) && !empty($about_attorney)) {
    $attyTitle = $about_attorney[0]['atty_title_head'];
    $attyContent = $about_attorney[0]['atty_content'];
    $attyImage = $about_attorney[0]['atty_title_image'];
    $attyBGImage = $about_attorney[0]['atty_bg_image'];
}
$bc_header = $bc_image = '';
if (isset($attorney_breadcrumb) && !empty($attorney_breadcrumb)) {
    $bc_header = $attorney_breadcrumb[0]['atty_bc_header'];
    $bc_image = $attorney_breadcrumb[0]['atty_bc_bg_image'];
}

$AbtConsultationMainHeader = $AbtConsultationSubHeader = $AbtConsultationFormHeader = $AbtConsultationButtonText = '';
if (isset($about_consultation) && !empty($about_consultation)) {
    $AbtConsultationMainHeader = $about_consultation[0]['abt_consult_main_title'];
    $AbtConsultationSubHeader = $about_consultation[0]['abt_consult_sub_title'];
    $AbtConsultationFormHeader = $about_consultation[0]['abt_consult_form_header'];
    $AbtConsultationButtonText = $about_consultation[0]['abt_consult_button_text'];
}
?>
<!-- BreadCrumb Part Start -->
<section class="breadcrumb-part" style="background: url(<?php echo $bc_image; ?>) no-repeat;background-size: cover;background-position: center;position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-title">
                    <h1>LAWYER PERSONAL PAGE</h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-link">
            <ul class="flat-list hide">
                <li><a href="#">Home</a></li>
                <li><a href="#">Personal Consultant</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- BreadCrumb Part End -->
<!--Team detils area start-->
<section class="team-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-4 ">
                <div class="lawer-sidebar"> 
                    <!--Single sidebar-->
                    <div class="sin-sidebar">
                        <div class="lawer-info-widget">
                            <div class="info-img">
                                <img src="themes/frontend/images/attor-det1.png" alt="#">
                            </div>
                            <h4>Angelina Adson</h4>
                            <p>PROPERTY / FAMILY LAWYER</p>
                            <div class="per-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Single sidebar-->
                    <div class="sin-sidebar">
                        <h2>our skills</h2>
                        <div class="progressbar-box per-progress">
                            <?php
                            $start_color = $end_color = '';
                            if (isset($attorney_skill_types) && !empty($attorney_skill_types)) {
                                foreach ($attorney_skill_types as $key => $value) {
                                    $start_color = $this->convertcolorcode->convert2rgb(substr($value['atty_st_start_color'], 1));
                                    $end_color = $this->convertcolorcode->convert2rgb(substr($value['atty_st_end_color'], 1));
                                    ?>
                                    <!-- Single Skill -->
                                    <div class="progressbar-wrapper">
                                        <div class="progress vertical bottom">
                                            <div class="progress-bar six-sec-ease-in-out"  style="background: linear-gradient(<?php echo $start_color; ?>,<?php echo $end_color; ?>);" data-bg-image="<?php echo "'background: linear-gradient('. $start_color; .', '. $end_color');"; ?>" role="progressbar" data-transitiongoal="<?php echo $value['atty_st_goal']; ?>"></div>
                                        </div>
                                        <h5 class="font-size-16"><?php echo $value['atty_st_name']; ?></h5>
                                        <span><?php echo $value['atty_st_goal']; ?>%</span>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <!--Single sidebar-->
                    <div class="sin-sidebar">
                        <h2>contact me</h2>
                        <div class="lawer-per-contact">

                            <a href="#"><i class="fa fa-phone"></i>(2)-895-124-654</a>
                            <a href="#"><i class="fa fa-envelope"></i>info@lawyerfamily.com</a>

                            <div class="con-page-form per-form">
                                <div class="row">

                                    <div class="col-12 col-lg-12">
                                        <input type="text" placeholder="Name" id="txtContactName" class="mar-r contact_name cf_field">
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <input type="text" placeholder="Email" id="txtContactEmail" class="contact_email cf_field">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="Message" id="txtContactMessage" class="contact_message cf_field"></textarea>
                                    </div>
                                    <div class="col-12 button-row">
                                        <input value="Submit" class="btnUpdateContactDetails c_form btn-1" type="submit" onclick="contact_submit($(this))">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-10 col-lg-8">
                <div class="team-detals-content">
                    <div class="sin-part">
                        <h4>About My History</h4>
                        <p>Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        <ul>
                            <li>Consectetur adipiscing elit, sed do eiusmod tempor.</li>
                            <li>Nostrud exercitation psum dolor ullamco .</li>
                            <li>Latin derived from Cicero's passage is attributed 1st-century .</li>
                            <li>Consectetur adipiscing elit, sed do eiusmod tempor.</li>
                        </ul>

                        <p>Waecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                    </div>
                    <div class="sin-part">
                        <h4>Education & Court</h4>
                        <div class="part-sub">
                            <p><span>2010-2012</span> - Work in company “WDIT”</p>
                            <span>Juridical Science (S.J.D.)</span>
                            <span>Juridical Science (S.J.D.)</span>
                        </div>
                        <div class="part-sub">
                            <p><span>2010-2012</span> - Work in company “WDIT”</p>
                            <span>Juridical Science (S.J.D.)</span>
                            <span>Juridical Science (S.J.D.)</span>
                        </div>
                        <div class="part-sub">
                            <p><span>2010-2012</span> - Work in company “WDIT”</p>
                            <span>Juridical Science (S.J.D.)</span>
                            <span>Juridical Science (S.J.D.)</span>
                        </div>
                    </div>
                    <div class="sin-part">
                        <h4>Membership & Honors</h4>
                        <p>Taecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        <p>Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                    </div>
                    <div class="sin-part">
                        <h4>Professional Certification</h4>
                        <p>Yaecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultriciesllis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. vehicula ut id elit. </p>
                        <p>Henas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                    </div>
                    <div class="sin-part">
                        <h4>My Experties</h4>
                        <p>Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        <ul>
                            <li>Consectetur adipiscing elit, sed do eiusmod tempor.</li>
                            <li>Nostrud exercitation psum dolor ullamco .</li>
                            <li>Latin derived from Cicero's passage is attributed 1st-century .</li>
                            <li>Consectetur adipiscing elit, sed do eiusmod tempor.</li>
                        </ul>

                        <p>Waecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team detils area end-->