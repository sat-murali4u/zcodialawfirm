<?php
$autMainTitle = $autSubTitle = '';
if (isset($about_timeline) && !empty($about_timeline)) {
    $autMainTitle = $about_timeline[0]['aut_main_title'];
    $autSubTitle = $about_timeline[0]['aut_sub_title'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Timeline</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Us - Timeline Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="txtAbtTLMainHeader">Main Header</label>
                        <input type="text" class="form-control" id="txtAbtTLMainHeader" value="<?php echo ($autMainTitle <> '' ? $autMainTitle : ''); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtTLMainSubHeader">Sub Header</label>
                        <input type="text" class="form-control" id="txtAbtTLMainSubHeader" value="<?php echo ($autSubTitle <> '' ? $autSubTitle : ''); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtTLYear">Year Range</label>
                        <input type="text" class="form-control hide" id="txtAbtTLYear" >
                        <input type="text" id="FromYearTL" placeholder="From Year" class="form-control txtFromYear year_range" data-date-format="yyyy" name="from" >
                        <input type="text" id="ToYearTL" placeholder="To Year" class="form-control txtToYear year_range" data-date-format="yyyy" name="to" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtTLHeader">Timeline Item Header</label>
                        <input type="text" class="form-control" id="txtAbtTLHeader" >
                    </div>
                    <div class="form-group">
                        <label for="txtAbtTLSubHeader">Timeline Item Sub Header</label>
                        <textarea type="text" class="form-control" id="txtAbtTLSubHeader" ></textarea>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-lg-7 col-xs-12">
                                <label>Image</label>
                                <div class="imgAbtTLItemPreviewOuter">
                                    <div id="imgAbtTLItemPreview">
                                        <label for="imgAbtTLItemUpload" id="imgAbtTLItemLabel">Choose File</label>
                                        <input type="file" class="imgAbtTLItemUpload" name="imgAbtTLItemUpload" id="imgAbtTLItemUpload" value="" accept="image/gif,image/jpeg,image/png">
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
            <button type="submit" class="btn btn-primary btnAddAboutTL" onclick="aboutTL_submit($(this))">Submit</button>
        </div>
    </div>


</section>

<section class="content timelineItemsDT">

    <div class="row">
        <div class="col-md-12 timelineItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header timeline_dt1">
                    <h3 class="box-title">Timeline Items List</h3>
                </div>

                <div class="box-body no-padding timelineItems_list">
                    <table class="table table-striped timelinelist_dt" cellspacing="0" id="timelinelist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col timelineitems">Year</th>
                                <th class="dt_item_col1 timelineitems">Header</th>
                                <th class="dt_content_col timelineitems">Content</th>
                                <th class="dt_image_col timelineitems">Image</th>
                                <th class="dt_status_col timelineitems">Show / Hide</th>
                                <th class="dt_action_col timelineitems">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_timelineitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_hts btn btn-primary yes_popup_button " onclick="del_timelineItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>

