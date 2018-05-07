<!-- Practise Part Start -->
<section class="practise-part section-p">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head practice-head">
                    <h2><?php echo (isset($about_pa) && !empty($about_pa)) ? strtoupper($about_pa[0]['pa_mainheader']) : ''; ?></h2>
                    <p><?php echo (isset($about_pa) && !empty($about_pa)) ? $about_pa[0]['pa_content'] : ''; ?></p>
                </div>
            </div>
            <?php
            if (isset($about_patypes) && !empty($about_patypes)) {
                foreach ($about_patypes as $key_pat => $value_pat) {
                    ?>
                    <!-- Single Practice -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="practise-item">
                            <div class="icon-box"><i class="<?php echo $value_pat['pat_icon_class']; ?>"></i></div>
                            <h2><a href="#"><?php echo $value_pat['pat_header']; ?></a></h2>
                            <p><?php echo $value_pat['pat_content']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- Practise Part End -->