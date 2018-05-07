<?php
$wcu_head = $wcu_desc = $wcu_box_image = $wcu_box_head = $wcu_box_desc = $wcu_bg_image = '';
if (isset($wcu) && !empty($wcu)) {
    $wcu_head = $wcu[0]['wcu_head'];
    $wcu_desc = $wcu[0]['wcu_desc'];
    $wcu_box_image = $wcu[0]['wcu_box_image'];
    $wcu_box_head = $wcu[0]['wcu_box_head'];
    $wcu_box_desc = $wcu[0]['wcu_box_desc'];
    $wcu_bg_image = $wcu[0]['wcu_image'];
}
?>

<!-- About Part Start -->
<section class="about-part">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-5 hide">
                <div class="law-pro text-center hide">
                    <i class="fi flaticon-auction"></i>
                    <h2><?php echo strtoupper($wcu_box_head); ?></h2>
                    <p class="h3"><?php echo $wcu_box_desc; ?></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="about-details">
                    <div class="section-head-2">
                        <h2><?php echo strtoupper($wcu_head); ?></h2>
                        <p><?php echo $wcu_desc; ?></p>
                    </div>
                    <?php
                    if (isset($wcu_types) && !empty($wcu_types)) {
                        foreach ($wcu_types as $key => $value) {
                            ?>   
                            <div class="about-item-box">
                                <div class="about-item-icon">
                                    <i class="<?php echo $value['wcu_type_icon']; ?>"></i>
                                </div>

                                <h3><a href="<?php echo $value['wcu_type_name_hl']; ?>"><?php echo $value['wcu_type_name']; ?></a></h3>
                                <p><?php echo $value['wcu_type_desc']; ?></p>

                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Part End -->