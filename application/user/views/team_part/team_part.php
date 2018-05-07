
<!-- Team Part Start -->
<section class="team-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head">
                    <?php if (isset($about_attorney) && !empty($about_attorney)) { ?>
                        <h2><?php echo $about_attorney[0]['atty_title_head']; ?></h2>
                        <p><?php echo $about_attorney[0]['atty_content']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($attorney_details) && !empty($attorney_details)) {
                foreach ($attorney_details['attorney'] as $key => $value) {
                    ?>
                    <!-- Single Team-->
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
                                            <li><a href="<?php echo $value1['attySocialLink']; ?>"><i class="<?php echo $value1['social_class']; ?>"></i></a></li>
                                        <?php }
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
<!-- Team Part End -->