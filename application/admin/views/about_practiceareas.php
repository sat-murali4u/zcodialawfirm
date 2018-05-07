<?php
$pa_mainheader = $pa_subheader = $pa_content = $pa_image = $pa_sideimage = $pa_buttontext = $pa_buttonlink = '';
if (isset($about_pa) && !empty($about_pa)) {
    $pa_mainheader = $about_pa[0]['pa_mainheader'];
    $pa_subheader = $about_pa[0]['pa_subheader'];
    $pa_content = $about_pa[0]['pa_content'];
    $pa_image = $about_pa[0]['pa_image'];
    $pa_sideimage = $about_pa[0]['pa_sideimage'];
    $pa_buttontext = $about_pa[0]['pa_buttontext'];
    $pa_buttonlink = $about_pa[0]['pa_buttonlink'];
}
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title hide">Practice Areas Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="txtPAMainHeader">Header</label>
                        <input type="text" class="form-control PAMainHeader" id="txtPAMainHeader" value="<?php echo $pa_mainheader; ?>">
                    </div>

                    <div class="form-group">
                        <label for="txtPASubHeader">Sub Header</label>
                        <input type="text" class="form-control PASubHeader" id="txtPASubHeader" value="<?php echo $pa_subheader; ?>">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-lg-6 col-xs-10">
                                <label>Practice Areas Image</label>
                                <div id="imgPAPreview">
                                    <label for="imgPAUpload" id="imgPALabel">Choose File</label>
                                    <input type="file"  class="PAUpload" name="imgPAUpload" id="imgPAUpload"   value="<?php echo $pa_image; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-6 col-lg-6 col-xs-10">
                                <label>Practice Areas Side Image</label>
                                <div id="imgPASidePreview">
                                    <label for="imgPASideUpload" id="imgPASideLabel">Choose File</label>
                                    <input type="file"  class="PASideUpload" name="imgPASideUpload" id="imgPASideUpload"  value="<?php echo $pa_sideimage; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtPAButtonText">Button Text</label>
                        <input type="text" class="form-control PAButtonText" id="txtPAButtonText" value="<?php echo $pa_buttontext;  ?>">
                    </div>

                    <div class="form-group">
                        <label for="txtPAButtonLink">Button Link</label>
                        <input type="hidden" class="hidden_buttonlink" value="<?php echo $pa_buttonlink; ?>">
                        <select class="form-control PAButtonlink_select2"  id="txtPAButtonLink" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <option value="HomePage">HomePage</option>
                            <option value="AboutUs">AboutUs</option>
                            <option value="PracticeAreas">PracticeAreas</option>
                            <option value="FAQ">FAQ</option>
                            <option value="ContactUs">ContactUs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtPAContent">Content</label>
                        <textarea class="form-control PAContent" id="txtPAContent"><?php echo $pa_content; ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdatePA"  onclick="pa_submit($(this))" >Submit</button>
        </div>
    </div>
</section>





