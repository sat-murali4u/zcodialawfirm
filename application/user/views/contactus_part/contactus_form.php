<!-- Contact bottom area Start -->
<section class="contuct-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="con-bottom-inner section-head">
                    <h2><span>CONTACT </span>US</h2>
                    <div class="per-social">
                        <ul>
                            <?php
                            if (isset($contactus_social) && !empty($contactus_social)) {
                                foreach ($contactus_social as $key_social => $value_social) {
                                    ?>
                                    <li><a target=”_blank” href="<?php echo $value_social['c_social_link']; ?>"><i class="<?php echo $value_social['c_social_name']; ?>"></i></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <?php if (isset($contactus_contact) && !empty($contactus_contact)) { ?>
                        <p><?php echo $contactus_contact[0]['c_content']; ?></p>
                    <?php } ?>


                    <div class="con-page-form">
                        <div class="row">

                            <div class="col-12 col-lg-12">
                                <input type="text" placeholder="Name" id="txtContactName" class="mar-r contact_name cf_field">
                            </div>
                            <div class="col-12 col-lg-12">
                                <input type="text" placeholder="Email" id="txtContactEmail" class="contact_email cf_field">
                            </div>
                            <div class="col-12">
                                <textarea name="message" placeholder="Message" id="txtContactMessage" class="contact_message cf_field"></textarea>
                            </div>
                            <div class="col-12 button-row">
                                <input value="Submit" class="btnUpdateContactDetails c_form btn-1" type="submit" onclick="contact_submit($(this))">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Contact bottom area end -->