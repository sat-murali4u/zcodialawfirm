<?php
$wcu_head = $wcu_desc = $wcu_box_image = $wcu_box_head = $wcu_box_desc = $wcu_bg_image = '';
if (isset($why_us) && !empty($why_us)) {
    $wcu_head = $why_us[0]['wcu_head'];
    $wcu_desc = $why_us[0]['wcu_desc'];
    $wcu_box_image = $why_us[0]['wcu_box_image'];
    $wcu_box_head = $why_us[0]['wcu_box_head'];
    $wcu_box_desc = $why_us[0]['wcu_box_desc'];
    $wcu_bg_image = $why_us[0]['wcu_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Why Choose Us</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title hide">WCU's Settings</h3>

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
                        <label for="txtWCUHeader">Header</label>
                        <input type="text" class="form-control" id="txtWCUHeader" value="<?php echo $wcu_head; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtWCUDesc">Description</label>
                        <textarea type="text"  class="form-control" id="txtWCUDesc" ><?php echo $wcu_desc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="txtWCUTypeHead">WCU Type Heading</label>
                                <input type="text" class="form-control" id="txtWCUTypeHead" value="" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtWCUTypeHeadLink">Referral Page</label>
                                    <select class="form-control buttonlink_select2"  id="txtWCUTypeHeadLink" style="width: 100%;">
                                        <option selected="selected" value="0">Please Select...</option>
                                        <option value="HomePage">HomePage</option>
                                        <option value="AboutUs">AboutUs</option>
                                        <option value="PracticeAreas">PracticeAreas</option>
                                        <option value="FAQ">FAQ</option>
                                        <option value="ContactUs">ContactUs</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtWCUTypeDesc">WCU Type Description</label>
                        <textarea type="text"  class="form-control" id="txtWCUTypeDesc" ></textarea>
                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="txtWCUImageClass">Image Class</label>
                                <input type="text" class="form-control" id="txtWCUImageClass" value="<?php echo $wcu_box_image; ?>" >
                            </div> 
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="txtWCUBoxHeading">Box Heading</label>
                                <input type="text" class="form-control" id="txtWCUBoxHeading" value="<?php echo $wcu_box_head; ?>" >
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="txtWCUBoxDesc">Box Description</label>
                                <input type="text" class="form-control" id="txtWCUBoxDesc" value="<?php echo $wcu_box_desc; ?>" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="txtWCUTypeIcon">WCU Type Image Classname</label>
                                <input type="text" class="form-control" id="txtWCUTypeIcon" value="" >
                            </div> </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>WCU Type Image</label>
                                <div class="imgWCUBGOuter">
                                    <div id="imgWCUTypePreview">
                                        <label for="imgWCUTypeUpload" id="imgWCUTypeLabel">Choose File</label>
                                        <input type="file" class="imgWCUTypeUpload" name="imgWCUTypeUpload" id="imgWCUTypeUpload" value="" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>WCU BG Image</label>
                                <div class="imgWCUBGOuter">
                                    <div id="imgWCUBGPreview">
                                        <label for="imgWCUBGUpload" id="imgWCUBGLabel">Choose File</label>
                                        <input type="file" class="imgWCUBGUpload" name="imgWCUBGUpload" id="imgWCUBGUpload" value="<?php echo $wcu_bg_image; ?>" accept="image/gif,image/jpeg,image/png">
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
            <button type="submit" class="btn btn-primary btnUpdateWCU" onclick="WCU_submit($(this))">Submit</button>
        </div>
    </div>


</section>

<section class="content">

    <div class="row">
        <div class="col-md-12 ">
            <div class="box box_border_top">
                <div class="box-header">
                    <h3 class="box-title">WCU Types</h3>
                </div>

                <div class="box-body no-padding">
                    <table class="table table-striped wcutypelist_dt" cellspacing="0" id="wcutypelist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col attyWCUTypes">Heading</th>
                                <th class="dt_content_col attyWCUTypes">Description</th>
                                <th class="dt_item_col attyWCUTypes">Referral Page</th>
                                <th class="dt_image_col attyWCUTypes">Icon</th>
                                <th class="dt_image_col attyWCUTypes">Image</th>
                                <th class="dt_status_col attyWCUTypes">Show / Hide</th>
                                <th class="dt_action_col attyWCUTypes">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_WCUTypes">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_WCUType btn btn-primary yes_popup_button " onclick="del_WCUTypeItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>

