<!-- Contact-info area Start -->
<section class="contact-info">
    <div class="container-fluid no-pad">
        <div class="contact-info-inner">
            <div class="row no-gutters">
                <div class="col-md-4">

                    <div class="email-info sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-at"></i>
                            <h3>Email Us</h3>
                            <?php if (isset($contact_email) && !empty($contact_email)) { ?>
                                <p>Mail:<?php echo $contact_email[0]['c_content']; ?></p>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="office-location sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-location"></i>
                            <h3>office location</h3>
                            <?php if (isset($contact_address) && !empty($contact_address)) { ?>
                                <p><?php echo $contact_address[0]['c_content']; ?></p>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="call-us sin-cont-info d-flex align-items-center">
                        <div class="center-wrap">
                            <i class="flaticon-telephone-of-old-design"></i>
                            <h3>Call Us</h3>
                            <?php if (isset($contact_call) && !empty($contact_call)) { ?>
                                <p>Phone: <?php echo $contact_call[0]['c_content']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Contact-info area End -->