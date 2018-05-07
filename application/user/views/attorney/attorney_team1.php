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
<section class="breadcrumb-part" style="background: url(<?php echo $bc_image; ?>) no-repeat;background-size: cover;background-position: center;position: relative;">
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
<section class="team-part section-p attorney-page-two">
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

                    <!-- Single Team  -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="<?php echo $value['attyItem_image']; ?>" alt="">
                                <div class="team-member-name">
                                    <h2><?php echo $value['attyItem_name']; ?></h2>
                                    <div class="team-member-des">
                                        <p><?php echo $value['attyItem_designation']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="team-social">
                                <ul class="flat-list">
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
                    </div>
                    <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<!-- Team-2 Part End -->