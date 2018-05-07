<!-- Banner Part Start -->
<section class="banner-part">
    <div class="swiper-container banner-slider home-one" data-swiper-config='{"loop": true, "effect": "fade", "speed": 800, "autoplay": 5000, "paginationClickable": true }'>
        <div class="swiper-wrapper">
            <?php
            if (isset($home_slider_details) && !empty($home_slider_details)) {
                $index = 1;
                foreach ($home_slider_details as $key => $value) {
                    ?>
                    <div class="swiper-slide banner-item" data-bg-image="<?php echo ($value['hs_bgimage'] == ''?'themes/frontend/images/transparent_image.png':$value['hs_bgimage']); ?>">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-12 banner-caption text-center_old">
                                    <h2 class="brand-color animated" data-animate="fadeInUp"><?php echo $value['hs_header1']; ?></h2>
                                    <h1 data-animate="fadeInUp"><?php echo $value['hs_subheader1']; ?></h1>
                                    <div class="banner-line hide"></div>
                                    <p data-animate="fadeInUp"><?php echo $value['hs_subheader2']; ?></p>

                                    <a href="<?php echo $value['hs_buttonlink1']; ?>" class="btn-1" data-animate="fadeInUp"><?php echo $value['hs_buttontext1']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $index++;
                }
            }
            ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- Banner Part End -->