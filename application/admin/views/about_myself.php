<!-- Main content -->
<?php
$auHeaderTitle = $auHeaderSubtitle = $auContentMainTitle = $auContentSubTitle = $auContent = $auContentImage = $auSliderImage = '';
if (isset($about_me) && !empty($about_me)) {
    $auHeaderTitle = $about_me[0]['au_header_title'];
    $auHeaderSubtitle = $about_me[0]['au_header_subtitle'];
    $auContentMainTitle = $about_me[0]['au_content_main_title'];
    $auContentSubTitle = $about_me[0]['au_content_sub_title'];
    $auContent = $about_me[0]['au_content'];
    $auContentImage = $about_me[0]['au_content_image'];
    $auSliderImage = $about_me[0]['au_slider_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Me</li>
    </ol>
</section>
<section class="content ">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me Settings</h3>

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
                        <label for="txtAbtMainHeader">Main Header</label>
                        <input type="text" class="form-control AbtMainHeader" id="txtAbtMainHeader" value="<?php echo $auHeaderTitle; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtAbtMainSubHeader">Sub Header</label>
                        <input type="text" class="form-control AbtMainSubHeader" id="txtAbtMainSubHeader" value="<?php echo $auHeaderSubtitle; ?>">
                    </div>

                    <div class="form-group au_header_bgimage">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Header Background Image</label>
                                <div id="imgAbtSliderPreview">
                                    <label for="imgAbtSliderUpload" id="imgAbtSliderLabel">Choose File</label>
                                    <input type="file"  class="AbtSliderUpload" name="imgAbtSliderUpload" id="imgAbtSliderUpload"  value="<?php echo $auSliderImage; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label >About Us Image</label>
                                <div id="imgAbtSidePreview">
                                    <label for="imgAbtSideUpload" id="imgAbtSideLabel">Choose File</label>
                                    <input type="file" class="AbtSideUpload" name="imgAbtSideUpload" id="imgAbtSideUpload"   value="<?php echo $auContentImage; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtAbtHeaderText">About Me Header Text</label>
                        <input type="text" class="form-control AbtHeaderText" id="txtAbtHeaderText" value="<?php echo $auContentMainTitle; ?>">
                    </div>


                    <div class="form-group">
                        <label for="txtAbtSubHeaderText">About Me Sub Header</label>
                        <input type="text" class="form-control AbtSubHeaderText" id="txtAbtSubHeaderText" value="<?php echo $auContentSubTitle; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtContentAboutMe">Content</label>
                        <textarea class="form-control aboutme-content ContentAboutMe" id="txtContentAboutMe"><?php echo $auContent; ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAboutMe"  onclick="aboutme_submit()" >Submit</button>
        </div>
    </div>


</section>

<div class="modal fade" id="modal-delete_attySkillTypes">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_attySkillType btn btn-primary yes_popup_button " onclick="del_timelineItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>
