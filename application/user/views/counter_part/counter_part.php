
<!-- Counter Part Start -->
<section class="counter-part section-p" style="background-image: url(themes/frontend/images/bg/count_image_bg.jpg);">
    <div class="container">
        <div class="counter-box">
            <div class="row">
                <?php
                if (isset($home_counter) && !empty($home_counter)) {
                    foreach ($home_counter as $key_counter => $value_counter) {
                        ?>
                        <!-- Single Counter -->
                        <div class="col-sm-6 col-lg-3 d-flex justify-content-center justify-content-lg-start">
                            <div class="counter-item">
                                <div class="count-des">
                                    <i class="<?php echo $value_counter['hc_image_class']; ?>"></i>
                                </div>
                                <div class="count-des">
                                    <h2 class="counter"><?php echo $value_counter['hc_count']; ?></h2>
                                    <p><?php echo $value_counter['hc_name']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                
            </div>
        </div>
    </div>
</section>
<!-- Counter Part End -->