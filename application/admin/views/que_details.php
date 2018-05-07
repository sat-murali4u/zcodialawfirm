
<section class="content-header">
    <h1>
        Question & Answer
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category QA</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title  ">Question Details</h3>

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
                        <label>Question Category</label>
                        <select class="form-control qc_select2" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <?php
                            if (isset($questions_category) && !empty($questions_category)) {
                                foreach ($questions_category as $key_qc => $value_qc) {
                                    ?>
                                    <option value="<?php echo $value_qc['qc_id'] ?>"><?php echo ucfirst($value_qc['qc_name']) ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtquestion">Question</label>
                        <input type="text" class="form-control txtquestion" id="txtquestion">
                    </div>
                    <div class="form-group">
                        <label for="txtanswer">Answer</label>
                        <textarea class="form-control aboutme-content txtanswer" id="txtanswer"><?php //echo $auContent;      ?></textarea>
                    </div>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateQD"  onclick="quedetails_submit($(this))" >Submit</button>
        </div>
    </div>
</section>

<section class="content queItemsDT">

    <div class="row">
        <div class="col-md-12 queItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header qdlist_dt1">
                    <h3 class="box-title">Question Category List List</h3>
                </div>

                <div class="box-body no-padding qdItems_list">
                    <table class="table table-striped faq_qd_list_dt" cellspacing="0" id="faq_qd_list_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col faq_qd">Question Category</th>
                                <th class="dt_item_col faq_qd">Question</th>
                                <th class="dt_content_col faq_qd">Answer</th>
                                <th class="dt_status_col faq_qd">Show / Hide</th>
                                <th class="dt_action_col faq_qd">Action</th>
                            </tr>
                        </thead>

                    </table>
                    <!-- /.form-group -->
                </div>
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_qditems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_QD btn btn-primary yes_popup_button " onclick="del_qdItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>


