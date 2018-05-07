<?php
$attySkillName = $attySkillDesc = $attySkillBGImage = '';
if (isset($attorney_skills) && !empty($attorney_skills)) {
    $attySkillName = $attorney_skills[0]['atty_skill_name'];
    $attySkillDesc = $attorney_skills[0]['atty_skill_desc'];
    $attySkillBGImage = $attorney_skills[0]['atty_skill_bg_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attorney Skills</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Attorney Skills Settings</h3>

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
                        <label for="txtAttySkillHeader">Skill Header</label>
                        <input type="text" class="form-control" id="txtAttySkillHeader" value="<?php echo $attySkillName; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtAttySkillDescription">Skill Description</label>
                        <textarea type="text"  class="form-control" id="txtAttySkillDescription" ><?php echo $attySkillDesc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="txtAttySkillType">Skill Type</label>
                                <input type="text" class="form-control" id="txtAttySkillType" value="<?php //echo ($autSubTitle <> '' ? $autSubTitle : '');         ?>" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="txtAttyTransitionGoal">Transition Goal</label>
                                <input type="number" min="0" max="100" class="form-control" id="txtAttyTransitionGoal" >        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Gradient Color Picker</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="txtAttySkillStartColor">Start Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" id="txtAttySkillStartColor">
                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label for="txtAttySkillEndColor">End Color</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" id="txtAttySkillEndColor">
                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Skill Type Image</label>
                                <div class="imgAttySkillBGOuter">
                                    <div id="imgAttySkillTypePreview">
                                        <label for="imgAttySkillTypeUpload" id="imgAttySkillTypeLabel">Choose File</label>
                                        <input type="file" class="imgAttySkillBGUpload" name="imgAttySkillTypeUpload" id="imgAttySkillTypeUpload" value="" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Skill BG Image</label>
                                <div class="imgAttySkillBGOuter">
                                    <div id="imgAttySkillBGPreview">
                                        <label for="imgAttySkillBGUpload" id="imgAttySkillBGLabel">Choose File</label>
                                        <input type="file" class="imgAttySkillBGUpload" name="imgAttySkillBGUpload" id="imgAttySkillBGUpload" value="<?php echo $attySkillBGImage; ?>" accept="image/gif,image/jpeg,image/png">
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
            <button type="submit" class="btn btn-primary btnUpdateAttorneySkills" onclick="attySkills_submit($(this))">Submit</button>
        </div>
    </div>


</section>

<section class="content attySkillTypesDT">

    <div class="row">
        <div class="col-md-12 attySkillTypes_dt">
            <div class="box box_border_top">
                <div class="box-header">
                    <h3 class="box-title">Attorney Skill Types</h3>
                </div>

                <div class="box-body no-padding attySkillTypes_list">
                    <table class="table table-striped attySkillTypes_dt" cellspacing="0" id="attySkillTypes_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col attySkillTypes">Skill Type</th>
                                <th class="dt_item_col attySkillTypes">Goal</th>
                                <th class="dt_image_col attySkillTypes">Starting Color</th>
                                <th class="dt_image_col attySkillTypes">Ending Color</th>
                                <th class="dt_status_col attySkillTypes">Show / Hide</th>
                                <th class="dt_action_col attySkillTypes">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
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

