<?php
$attySkillName = $attySkillDesc = $attySkillBGImage = '';
if (isset($attorney_experience) && !empty($attorney_experience)) {
    $attyExperienceName = $attorney_experience[0]['atty_exp_name'];
    $attyExperienceDesc = $attorney_experience[0]['atty_exp_desc'];
    $attyExperienceBGImage = $attorney_experience[0]['atty_exp_bg_image'];
    $attyExperienceSignImage = $attorney_experience[0]['atty_exp_sign_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Our Experience</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Our Experience Settings</h3>

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
                        <label for="txtAttyExperienceHeader">Header</label>
                        <textarea type="text" class="form-control" style="resize:none;" id="txtAttyExperienceHeader"><?php echo $attyExperienceName; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtAttyExperienceDescription">Description</label>
                        <textarea type="text"  class="form-control" id="txtAttyExperienceDescription" ><?php echo $attyExperienceDesc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtExperienceBtnLink">Button Link</label>
                        <input type="hidden" id="attyExpBtnLink">
                        <select class="form-control buttonlink_select2"  id="txtExperienceBtnLink" style="width: 100%;">
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
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12">
                                <label>Experience Sign Image</label>
                                <div id="imgAttyExperienceSignPreview">
                                    <label for="imgAttyExperienceSignUpload" id="imgAttyExperienceSignLabel">Choose File</label>
                                    <input type="file" class="imgAttyExperienceSignUpload" name="imgAttyExperienceSignUpload" id="imgAttyExperienceSignUpload" value="<?php echo $attyExperienceSignImage; ?>" accept="image/gif,image/jpeg,image/png">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12">
                                <label>Experience BG Image</label>
                                <div class="imgAttyExperienceBGOuter">
                                    <div id="imgAttyExperienceBGPreview">
                                        <label for="imgAttyExperienceBGUpload" id="imgAttyExperienceBGLabel">Choose File</label>
                                        <input type="file" class="imgAttyExperienceBGUpload" name="imgAttyExperienceBGUpload" id="imgAttyExperienceBGUpload" value="<?php echo $attyExperienceBGImage; ?>" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12">
                                <label>Experience Type Image</label>
                                <div class="imgAttyExperienceBGOuter">
                                    <div id="imgAttyExperienceTypePreview">
                                        <label for="imgAttyExperienceTypeUpload" id="imgAttyExperienceTypeLabel">Choose File</label>
                                        <input type="file" class="imgAttyExperienceBGUpload" name="imgAttyExperienceTypeUpload" id="imgAttyExperienceTypeUpload" value="" accept="image/gif,image/jpeg,image/png">
                                    </div>
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
            <button type="submit" class="btn btn-primary btnUpdateAttorneyExperience" onclick="attyExperience_submit($(this))">Submit</button>
        </div>
    </div>


</section>

<section class="content attyExperienceTypesDT">

    <div class="row">
        <div class="col-md-12 ">
            <div class="box box_border_top">
                <div class="box-header">
                    <h3 class="box-title">Attorney Experience Types</h3>
                </div>

                <div class="box-body no-padding attyExperienceTypes_list">
                    <table class="table table-striped " cellspacing="0" id="attyExperienceTypes_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_image_col attyExperienceTypes">Link Image</th>
                                <th class="dt_item_col attyExperienceTypes">Link</th>
                                <th class="dt_status_col attyExperienceTypes">Show / Hide</th>
                                <th class="dt_action_col attyExperienceTypes">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_attyExperienceTypes">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_attyExperienceType btn btn-primary yes_popup_button " onclick="del_attyExperienceItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>

