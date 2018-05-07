<!-- Main content -->
<?php
$hsb_percentage = $hsb_text = $hsb_buttonimage = $hsb_buttonlink = '';
if (isset($hsb) && !empty($hsb)) {
    $hsb_percentage = $hsb[0]['hsb_percentage'];
    $hsb_text = $hsb[0]['hsb_text'];
    $hsb_buttonimage = $hsb[0]['hsb_buttonimage'];
    $hsb_buttonlink = $hsb[0]['hsb_buttonlink'];
}
?>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Home Slider Box Settings</h3>

            <div class="box-tools pull-right ">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtHSBPercentageText">Text Percentage</label>
                        <input type="text" class="form-control HSBPercentageText" id="txtHSBPercentageText" value="<?php echo $hsb_percentage;?>">
                    </div>
                    <div class="form-group">
                        <label for="txtHSBPercentageText1">Text</label>
                        <input type="text" class="form-control HSBPercentageText1" id="txtHSBPercentageText1" value="<?php echo $hsb_text; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtHSBBtnLink">Button Link</label>
                        <input type="hidden" class="hiddenHSBButtonLink" value="<?php echo $hsb_buttonlink;?>">
                        <select class="form-control HSBbuttonlink_select2"  id="txtHSBBtnLink" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <option value="HomePage">HomePage</option>
                            <option value="AboutUs">AboutUs</option>
                            <option value="PracticeAreas">PracticeAreas</option>
                            <option value="FAQ">FAQ</option>
                            <option value="ContactUs">ContactUs</option>
                        </select>
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-5">
                    <div class="form-group au_header_bgimage">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-lg-8 col-xs-8">
                                <label>Slider Background Image</label>
                                <div id="imgHSBButtonImagePreview">
                                    <label for="imgHSBButtonImageUpload" id="imgHSBButtonImageLabel">Choose File</label>
                                    <input type="file"  class="imgHSBButtonImageUpload" name="imgHSBButtonImageUpload" id="imgHSBButtonImageUpload"  value="<?php echo $hsb_buttonimage; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateHSBItem"  onclick="hsbitem_submit($(this))" >Submit</button>
        </div>
    </div>
</section>
