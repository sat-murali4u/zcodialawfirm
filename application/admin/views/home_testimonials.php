<!-- Main content --> 
<?php
$tm_bg_image = '';
if (isset($home_testimonial_bg_image) && !empty($home_testimonial_bg_image)) {
    $tm_bg_image = $home_testimonial_bg_image[0]['tmimg_bg'];
}
?>

<section class="content-header">
    <h1>
        Home Page
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Testimonials</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title hide">Home - Testimonials Settings</h3>

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
                        <label for="txtTMName">Testimonial Value</label>
                        <input type="text" class="form-control HomeTMSName" id="txtTMName" value="<?php //echo //$auHeaderTitle;      ?>">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-lg-6 col-xs-6">
                                <label>Testimonial Icon</label>
                                <div id="imgHomeTMPreview">
                                    <label for="imgHomeTMUpload" id="imgHomeTMLabel">Choose File</label>
                                    <input type="file"  class="HomeTMUpload" name="imgHomeTMUpload" id="imgHomeTMUpload"  value="<?php //echo $auSliderImage;      ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-6 col-lg-6 col-xs-6">
                                <label>Testimonial BG Image</label>
                                <div id="imgHomeTMBGPreview">
                                    <label for="imgHomeTMBGUpload" id="imgHomeTMBGLabel">Choose File</label>
                                    <input type="file"  class="HomeTMBGUpload" name="imgHomeTMBGUpload" id="imgHomeTMBGUpload" value="<?php echo $tm_bg_image; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">

                    <div class="form-group">
                        <label for="txtHomeTMContent">Testimonial Content</label>
                        <textarea class="form-control homeTMContent" id="txtHomeTMContent"><?php //echo $auContent;      ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateTMS"  onclick="testimonials_submit($(this))" >Submit</button>
        </div>
    </div>
</section>


<section class="content home_tm_ItemsDT">

    <div class="row">
        <div class="col-md-12 ">
            <div class="box box_border_top">
                <div class="box-header home_tm_list_dt1">
                    <h3 class="box-title">Home Testimonial Items List</h3>
                </div>

                <div class="box-body no-padding home_tm_Items_list">
                    <table class="table table-striped home_tm_list_dt" cellspacing="0" id="home_tm_list_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col tm_dt">Text 1</th>
                                <th class="dt_item_col tm_dt">Text 2</th>
                                <th class="dt_image_col tm_dt">Testimonial Image</th>
                                <th class="dt_status_col tm_dt">Show / Hide</th>
                                <th class="dt_action_col tm_dt">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>


<div class="modal fade" id="modal-delete_htitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_htItem btn btn-primary yes_popup_button " onclick="del_htItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>


