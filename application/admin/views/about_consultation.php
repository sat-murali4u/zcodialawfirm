<?php
$AbtConsultationMainHeader = $AbtConsultationSubHeader = $AbtConsultationFormHeader = $AbtConsultationButtonText = '';
if (isset($about_consultation) && !empty($about_consultation)) {
    $AbtConsultationMainHeader = $about_consultation[0]['abt_consult_main_title'];
    $AbtConsultationSubHeader = $about_consultation[0]['abt_consult_sub_title'];
    $AbtConsultationFormHeader = $about_consultation[0]['abt_consult_form_header'];
    $AbtConsultationButtonText = $about_consultation[0]['abt_consult_button_text'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Consultation</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About - Consultation Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="txtAbtConsultationMainHeader">Main Header</label>
                        <input type="text" class="form-control" id="txtAbtConsultationMainHeader" value="<?php echo $AbtConsultationMainHeader; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtConsultationSubHeader">Sub Header</label>
                        <input type="text" class="form-control" id="txtAbtConsultationSubHeader" value="<?php echo $AbtConsultationSubHeader; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="txtAbtConsultationFormHeader">Form Heading</label>
                        <input type="text" class="form-control" id="txtAbtConsultationFormHeader" value="<?php echo $AbtConsultationFormHeader; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtConsultationButtonText">Button Text</label>
                        <input type="text" class="form-control" id="txtAbtConsultationButtonText" value="<?php echo $AbtConsultationButtonText; ?>" >
                    </div>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary " onclick="aboutConsulting_submit($(this))">Submit</button>
        </div>
    </div>


</section>

