<?php
$pat_mainheader = $pat_subheader = $pat_content = $pat_image = $pat_sideimage = $pat_buttontext = $pat_buttonlink = $pat_icon_class = '';
//if (isset($about_pa) && !empty($about_pa)) {
//    $pa_mainheader = $about_pa[0]['pa_mainheader'];
//    $pa_subheader = $about_pa[0]['pa_subheader'];
//    $pa_content = $about_pa[0]['pa_content'];
//    $pa_image = $about_pa[0]['pa_image'];
//    $pa_sideimage = $about_pa[0]['pa_sideimage'];
//    $pa_buttontext = $about_pa[0]['pa_buttontext'];
//    $pa_buttonlink = $about_pa[0]['pa_buttonlink'];
//}
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
                        <label for="txtPATMainHeader">Name</label>
                        <input type="text" class="form-control PATMainHeader" id="txtPATMainHeader" value="<?php echo $pat_mainheader; ?>">
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-sm-8 col-lg-8 col-xs-8">
                                <label>Image</label>
                                <div id="imgPATPreview">
                                    <label for="imgPATUpload" id="imgPATLabel">Choose File</label>
                                    <input type="file"  class="PATUpload" name="imgPATUpload" id="imgPATUpload"   value="<?php echo $pat_image; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtPATIcon">Icon Class Name</label>
                        <input type="text" class="form-control PATMainIcon" id="txtPATIcon" value="<?php echo $pat_mainheader; ?>">
                    </div>

                    <div class="form-group">
                        <label for="txtPATContent">Content</label>
                        <textarea class="form-control PATContent" id="txtPATContent"><?php echo $pat_content; ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdatePAT"  onclick="pat_submit($(this))" >Submit</button>
        </div>
    </div>
</section>


<section class="content patItemsDT">

    <div class="row">
        <div class="col-md-12 patItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header patlist_dt1">
                    <h3 class="box-title">Practice Area Items List</h3>
                </div>

                <div class="box-body no-padding patItems_list">
                    <table class="table table-striped patlist_dt" cellspacing="0" id="patlist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col pat_dt">Header</th>
                                <th class="dt_content_col pat_dt">Content</th>
                                <th class="dt_item_col pat_dt">Icon Class</th>
                                <th class="dt_image_col pat_dt">Image</th>
                                <th class="dt_status_col pat_dt">Show in Home</th>
                                <th class="dt_status_col pat_dt">Show / Hide</th>
                                <th class="dt_action_col pat_dt">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_patitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_patItem btn btn-primary yes_popup_button " onclick="del_patItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>


