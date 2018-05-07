<!-- Main content -->
<section class="content-header">
    <h1>
        Home Page
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Counter</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Counter Settings</h3>

            <div class="box-tools pull-right ">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="txtHomeCounterHeading">Heading</label>
                        <input type="text" class="form-control HomeCounterMainHeading" id="txtHomeCounterMainHeading" value="<?php //echo $auHeaderTitle;      ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtHomeCounterCount">Count</label>
                        <input type="text" class="form-control HomeCounterCount" id="txtHomeCounterCount">
                    </div>
                    <div class="form-group">
                        <label for="txtHomeCounterIconClass">Image Icon Class</label>
                        <input type="text" class="form-control HomeCounterIconClass" id="txtHomeCounterIconClass">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">

                    <div class="form-group au_header_bgimage">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-lg-7 col-xs-7">
                                <label>Counter Image</label>
                                <div id="imgHomeCounterPreview">
                                    <label for="imgHomeCounterUpload" id="imgHomeCounterLabel">Choose File</label>
                                    <input type="file"  class="imgHomeCounterUpload" name="imgHomeCounterUpload" id="imgHomeCounterUpload"  accept="image/gif,image/jpeg,image/png" />
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
            <button type="submit" class="btn btn-primary btnUpdateCounterItem"  onclick="counter_submit($(this))" >Submit</button>
        </div>
    </div>
</section>

<section class="content hcItemsDT">

    <div class="row">
        <div class="col-md-12 hcItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header hclist_dt1">
                    <h3 class="box-title">Home Counter Items List</h3>
                </div>

                <div class="box-body no-padding hcItems_list">
                    <table class="table table-striped hclist_dt" cellspacing="0" id="hclist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col">Name</th>
                                <th class="dt_item_col">Count</th>
                                <th class="dt_item_col">Icon Class</th>
                                <th class="dt_image_col">Counter Image</th>
                                <th class="dt_status_col">Show / Hide</th>
                                <th class="dt_action_col">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_hcitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_hcItem btn btn-primary yes_popup_button " onclick="del_hcItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>