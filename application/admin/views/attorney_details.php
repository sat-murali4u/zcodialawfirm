
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attorney Details</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Attorney Details</h3>

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
                        <label for="txtAttyName">Name</label>
                        <input type="text" class="form-control" id="txtAttyName" >
                    </div>
                    <div class="form-group">
                        <label for="txtAttyDesignation">Designation</label>
                        <input type="text" class="form-control" id="txtAttyDesignation">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <label>Attorney Image</label>
                        <div class="imgAttyPreviewOuter">
                            <div id="imgAttyPreview">
                                <label for="imgAttyUpload" id="imgAttyLabel">Choose File</label>
                                <input type="file" class="imgAttyUpload" name="imgAttyUpload" id="imgAttyUpload" accept="image/gif,image/jpeg,image/png">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <!-- /.row -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAttyDetails" onclick="attyDetails_submit($(this))">Submit</button>
        </div>
    </div>


</section>




<section class="content aboutAttyDetailsDT">

    <div class="row">
        <div class="col-md-12 aboutAttyDetails_dt">
            <div class="box box_border_top">
                <div class="box-header">
                    <h3 class="box-title">Attorney Details</h3>
                </div>

                <div class="box-body no-padding aboutAttyDetails">
                    <table class="table table-striped ailist_dt" cellspacing="0" id="attydetails_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col atty_details">Name</th>
                                <th class="dt_content_col atty_details">Designation</th>
                                <th class="dt_image_col atty_details">Attorney Image</th>
                                <th class="dt_status_col atty_details">Show / Hide</th>
                                <th class="dt_action_col atty_details">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_attyDetails">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_attyDetails btn btn-primary yes_popup_button " onclick="del_attyDetail($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>