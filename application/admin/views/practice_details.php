
<section class="content-header">
    <h1>
        Practice Areas
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Practice Area Details</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title  ">Practice Area Details</h3>

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
                        <label>Practice Category</label>
                        <select class="form-control practicecategory_select2" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <?php
                            if (isset($practicearea_types) && !empty($practicearea_types)) {
                                foreach ($practicearea_types as $key_pat => $value_pat) {
                                    ?>
                                    <option value="<?php echo $value_pat['pat_id'] ?>"><?php echo ucfirst($value_pat['pat_header']) ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-lg-12 col-xs-12">
                                <label>Item Image</label>
                                <div class="imgPracticeItemOuter">
                                    <label for="imgPracticeItemUpload" id="imgPracticeItemLabel">Choose File</label>
                                    <input type="file"  class="imgPracticeItemUpload" name="imgPracticeItemUpload[]" id="imgPracticeItemUpload"   accept="image/gif,image/jpeg,image/png" onchange="preview_images();" multiple/>
                                    <div id="pat_image_preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txt_pc_content">Content</label>
                        <textarea class="form-control pc-content" id="txt_pc_content"></textarea>
                    </div>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdatePAT" onclick="pa_details_submit($(this))" >Submit</button>
        </div>
    </div>
</section>

<section class="content queItemsDT">

    <div class="row">
        <div class="col-md-12 queItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header qdlist_dt1">
                    <h3 class="box-title">Practice Area List</h3>
                </div>

                <div class="box-body no-padding qdItems_list">
                    <table class="table table-striped pa_list_dt" cellspacing="0" id="pa_list_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col pa_details">Category</th>
                                <th class="dt_image_col pa_details">Slider Images</th>
                                <th class="dt_content_col pa_details">Content</th>
                                <th class="dt_status_col pa_details">Show / Hide</th>
                                <th class="dt_action_col pa_details">Action</th>
                            </tr>
                        </thead>

                    </table>
                    <!-- /.form-group -->
                </div>
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_PracticeAreaItem">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_PracticeAreaItem btn btn-primary yes_popup_button " onclick="del_PracticeAreaItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>


