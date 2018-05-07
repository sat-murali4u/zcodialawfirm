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
?>
<!-- BreadCrumb Part Start -->
<section class="breadcrumb-part"style="background: url(<?php echo $bc_image; ?>) no-repeat;background-size: cover;background-position: center;position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-title">
                    <h1><?php echo $bc_header; ?></h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-link">
            <ul class="flat-list">
                <li><a href="./">Home</a></li>
                <li><a href="#">ATTORNEYS</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- BreadCrumb Part End -->
<!-- Team-2 Part End -->
<section class="team-2-part section-p pad-bot-30">
    <div class="container">
         <div class="row">
            <div class="col-12 text-center">
                <div class="section-head">
                    <h2><?php echo $attyTitle; ?></h2>
                    <p><?php echo $attyContent; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($attorney_details) && !empty($attorney_details)) {
                foreach ($attorney_details['attorney'] as $key => $value) {
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4 text-center">
                        <div class="team-2-item">
                            <div class="team-2-img">
                                <img src="<?php echo $value['attyItem_image']; ?>" alt="">
                                <div class="team-2-social">
                                    <ul>
                                        <?php
                                        if (isset($value['social']) && !empty($value['social'])) {
                                            foreach ($value['social'] as $key1 => $value1) {
                                                ?>
                                                <li><a href="<?php echo $value1['attySocialLink']; ?>"><i class='<?php echo $value1['social_class']; ?>'></i></a></li>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="team-2-des">
                                <h4><?php echo $value['attyItem_name']; ?></h4>
                                <p><?php echo $value['attyItem_designation']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>
</section>
<!-- Team-2 Part End -->