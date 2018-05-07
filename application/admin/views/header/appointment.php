<!-- Main content -->
<?php
$txtApptPhoneNumber = $txtApptOpenDays = $txtApptFAPhoneIcon = $txtApptFAClockIcon = $txtApptTimeBetween = $appt_phone_image = $appt_clock_image = $txtApptVacationDays = '';

if (isset($appt_details) && !empty($appt_details)) {
    $txtApptPhoneNumber = $appt_details[0]['appt_phone'];
    $txtApptOpenDays = $appt_details[0]['appt_open_days'];
    $txtApptVacationDays = $appt_details[0]['appt_vacation_days'];
    $txtApptFAPhoneIcon = $appt_details[0]['appt_fa_phone_icon'];
    $txtApptFAClockIcon = $appt_details[0]['appt_fa_clock_icon'];
    $txtApptTimeBetween = $appt_details[0]['appt_time_between'];
    $appt_phone_image = $appt_details[0]['appt_phone_image'];
    $appt_clock_image = $appt_details[0]['appt_clock_image'];
}
?>
<section class="content-header ">
    <h1>
        Header Settings
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Appointment</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title ">Appointment Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="txtApptPhoneNumber">Phone Number</label>
                        <input type="text" placeholder="9876543210" class="form-control WebsiteTitle" id="txtApptPhoneNumber" value="<?php echo $txtApptPhoneNumber; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtApptOpenDays">Open Days</label>
                        <input type="text"  placeholder="Mon - Fri" class="form-control " id="txtApptOpenDays" value="<?php echo $txtApptOpenDays; ?>">
                    </div>  
                    <div class="form-group">
                        <label for="txtApptVacationDays">Vacation Days</label>
                        <input type="text"  placeholder="All Sunday Holiday" class="form-control " id="txtApptVacationDays" value="<?php echo $txtApptVacationDays; ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 one-fourth">
                            <div class="form-group">
                                <label for="txtApptFAPhoneIcon">Font Awesome Phone Icon Class</label>
                                <input type="text" placeholder= "fa fa-phone" class="form-control " id="txtApptFAPhoneIcon" value="<?php echo $txtApptFAPhoneIcon; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6  one-fourth">
                            <div class="form-group">
                                <label for="txtApptFAClockIcon">Font Awesome Clock Icon Class</label>
                                <input type="text" placeholder= "fa fa-clock" class="form-control " id="txtApptFAClockIcon" value="<?php echo $txtApptFAClockIcon; ?>">
                            </div>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtApptTimeBetween">Time Between</label>
                        <input type="text" placeholder="11am - 11pm"  class="form-control " id="txtApptTimeBetween" value="<?php echo $txtApptTimeBetween; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 one-fourth">
                            <label>Phone Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview appointment-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderApptPhonePreview" class="appointment-page img-preview">
                                    <label for="imgHeaderApptPhoneUpload" id="imgHeaderApptPhoneLabel" class="appointment-page img-label">Choose File</label>
                                    <input type="file"  class="HeaderApptPhoneUpload appointment-page img-upload" name="imgHeaderApptPhoneUpload" id="imgHeaderApptPhoneUpload"  value="<?php echo $appt_phone_image; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6  one-fourth">
                            <label>Clock Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview appointment-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderApptClockPreview" class="appointment-page img-preview">
                                    <label for="imgHeaderApptClockUpload" id="imgHeaderApptClockLabel" class="appointment-page img-label">Choose File</label>
                                    <input type="file" class="HeaderApptClockUpload appointment-page img-upload" name="imgHeaderApptClockUpload" id="imgHeaderApptClockUpload"   value="<?php echo $appt_clock_image; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAppt"  onclick="headerAppt_submit()" >Submit</button>
        </div>
    </div>



</section>
