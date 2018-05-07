<!-- Team-2 Part Start -->
<section class="team-2-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head-3-1"> 
                    <?php if (isset($about_attorney) && !empty($about_attorney)) { ?>
                        <h2><?php echo $about_attorney[0]['atty_title_head']; ?></h2>
                        <p><?php echo $about_attorney[0]['atty_content']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container team-3-slider" data-swiper-config='{"loop": true, "effect": "slide", "speed": 800, "autoplay": 5000, "paginationClickable": true,"slidesPerView" : 3 ,"spaceBetween": 30,"breakpoints": { "500": { "slidesPerView": 1},"768": { "slidesPerView": 2 }}}'>
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        <?php
                        if (isset($attorney_details) && !empty($attorney_details)) {
                            foreach ($attorney_details['attorney'] as $key => $value) {
                                ?>
                                <!-- Single Exprt Slider  -->
                                <div class="swiper-slide">
                                    <div class="team-2-item single-team">
                                        <div class="img">
                                            <img src="<?php echo $value['attyItem_image']; ?>" alt="">
                                            <div class="content">
                                                <span class="default"><i class="flaticon-social"></i></span>
                                                <ul class="social">
                                                    <?php
                                                    if (isset($value['social']) && !empty($value['social'])) {
                                                        foreach ($value['social'] as $key1 => $value1) {
                                                            ?>
                                                            <li><a href="<?php echo $value1['attySocialLink']; ?>" target="_blank"><i class="<?php echo $value1['social_class']; ?>"></i></a></li>
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
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team-2 Part End --> 