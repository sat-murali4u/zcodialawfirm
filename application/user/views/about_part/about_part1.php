
<!-- About-4 Part Start -->
<div class="about-4-part section-p-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div class="about-4-img">
                    <img src="<?php echo $auSideImage; ?>" alt="">
                </div>
            </div>
            <div class="col-md-8 col-xl-6">
                <div class="about-4-des">
                    <div class="section-head-2-1">
                        <h2><?php echo $auHeaderTitle; ?></h2>
                        <p><?php echo $auDesc; ?></p>
                    </div>
                    <div id="accordion-4" class="about-4-accodian">
                        <?php
                        if (isset($aboutus_items) && !empty($aboutus_items)) {
                            foreach ($aboutus_items as $key => $value) {
                                ?>   
                                <div class="accodian-4-item">
                                    <div class="accodian-4-head" data-toggle="collapse" data-target="#collapse-4-<?php echo $key; ?>" >
                                        <h5 class="bold"><?php echo $value['auti_name']; ?></h5>
                                    </div>
                                    <div id="collapse-4-<?php echo $key; ?>" class="accodian-4-result collapse" data-parent="#accordion-4">
                                        <p><?php echo $value['auti_content']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About-4 Part End -->