
<section class="content-header">
    <h1>
        Question & Answer
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">FAQ Categories</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title  ">Question Category</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtCatName">Category Value</label>
                        <input type="text" class="form-control txtCatName" id="txtCatName">
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateQC"  onclick="category_submit($(this))" >Submit</button>
        </div>
    </div>

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title  ">Question Category List List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box no-border">
                       
                        <div class="box-body no-padding qcItems_list">
                            <table class="table table-striped faq_qc_list_dt" cellspacing="0" id="qc_catlist_dt"  style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="dt_item_col faq_qc">Category Name</th>
                                        <th class="dt_status_col faq_qc">Show / Hide</th>
                                        <th class="dt_action_col faq_qc">Action</th>
                                    </tr>
                                </thead>

                            </table>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>

    </div>
</section>

<div class="modal fade" id="modal-delete_qcitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_QC btn btn-primary yes_popup_button " onclick="del_qcItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>


