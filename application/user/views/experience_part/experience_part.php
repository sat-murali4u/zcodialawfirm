<?php
$attySkillName = $attySkillDesc = $attySkillBGImage = '';
if (isset($attorney_experience) && !empty($attorney_experience)) {
    $attyExperienceName = $attorney_experience[0]['atty_exp_name'];
    $attyExperienceDesc = $attorney_experience[0]['atty_exp_desc'];
    $attyExperienceBGImage = $attorney_experience[0]['atty_exp_bg_image'];
    $attyExperienceSignImage = $attorney_experience[0]['atty_exp_sign_image'];
}

?>
<!-- Experience  Part Start -->
<section class="experience-part section-p" style="background: url(<?php echo $attyExperienceBGImage; ?>) no-repeat;
    background-size: cover;
    background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="section-head-2">
                    <h2><?php echo strtoupper($attyExperienceName); ?></h2>
                    <p class="white"><?php echo $attyExperienceDesc; ?></p>
                    <img src="<?php echo $attyExperienceSignImage; ?>" alt="">
                </div>
            </div>
            <div class="col-md-5 text-center text-lg-left">
                <?php
                if (isset($attorney_experience_types) && !empty($attorney_experience_types)) {
                    foreach ($attorney_experience_types as $key => $value) {
                        ?>
                        <!-- Single Client-->
                        <a href="<?php echo $value['atty_et_link']; ?>" class="clints-logo">
                            <img src="<?php echo $value['atty_et_image']; ?>" alt="">
                        </a>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Experience  Part End -->