<!-- Main content -->
<?php
$aiHeaderTitle = $aiContent = $aiContentImage = '';
if (isset($about_me) && !empty($about_me)) {
    $aiHeaderTitle = $about_me[0]['ai_header_title'];
    $aiContent = $about_me[0]['ai_content'];
    $aiContentImage = $about_me[0]['ai_content_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Me Items</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me Settings</h3>

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
                        <label for="txtAbtItemMainHeader">Item Header</label>
                        <input type="text" class="form-control AbtItemMainHeader" id="txtAbtItemMainHeader" value="<?php //echo $auHeaderTitle;    ?>">
                    </div>
                    <div class="form-group au_header_bgimage">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-lg-7 col-xs-12">
                                <label>Item Image</label>
                                <div class="imgAbtItemPreviewOuter">
                                    <div id="imgAbtItemPreview">
                                        <label for="imgAbtItemUpload" id="imgAbtItemLabel">Choose File</label>
                                        <input type="file"  class="imgAbtItemUpload" name="imgAbtItemUpload" id="imgAbtItemUpload"  value="<?php //echo $auSliderImage;    ?>"  accept="image/gif,image/jpeg,image/png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtAbtItemContent">Item Content</label>
                        <textarea class="form-control aboutme-content abtItemContent" id="txtAbtItemContent"><?php //echo $auContent;    ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAboutItem"  onclick="aboutitem_submit($(this))" >Submit</button>
        </div>
    </div>


</section>



<section class="content aboutItemsDT">

    <div class="row">
        <div class="col-md-12 aboutItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header ailist_dt1">
                    <h3 class="box-title">About Me Items List</h3>
                </div>

                <div class="box-body no-padding aboutItems_list">
                    <table class="table table-striped ailist_dt" cellspacing="0" id="ailist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col">Item Name</th>
                                <th class="dt_content_col">Content</th>
                                <th class="dt_image_col">Item Image</th>
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

<div class="modal fade" id="modal-delete_abtitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_aboutItem btn btn-primary yes_popup_button " onclick="del_aboutItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>