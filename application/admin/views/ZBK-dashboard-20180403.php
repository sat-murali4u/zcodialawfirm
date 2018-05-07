<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Home Slider Settings</h3>

            <div class="box-tools pull-right ">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body hsItems_list_dash" style="display: none;">
            <table class="table table-striped hslist_dt" cellspacing="0" id="hslist_dt"  style="width: 100%;">
                <thead>
                    <tr>
                        <th class="dt_item_col">Main Heading</th>
                        <th class="dt_item_col">Sub Heading 1</th>
                        <th class="dt_item_col">Sub Heading 2</th>
                        <th class="dt_image_col">Slider BG Image</th>
                        <th class="dt_image_col">Slider Sign Image</th>
                        <th class="dt_status_col">Show / Hide</th>
                        <th class="dt_action_col">UnDelete</th>
                    </tr>
                </thead>
            </table>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: none;">
            <button type="submit" class="btn btn-primary btnUpdateHSItem"  onclick="hsitem_submit($(this))" >Submit</button>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-delete_hsitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_hsItem btn btn-primary yes_popup_button " onclick="del_hsItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>