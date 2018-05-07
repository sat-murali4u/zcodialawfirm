<!-- Main content -->
<section class="content-header">
    <h1>
        Home Page
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Slider</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Home Slider Settings</h3>

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
                        <label for="txtHomeSliderMainHeading">Main Heading</label>
                        <input type="text" class="form-control HomeSliderMainHeading" id="txtHomeSliderMainHeading" value="<?php //echo $auHeaderTitle;     ?>">
                    </div>
                    <div class="form-group au_header_bgimage">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label>Slider Background Image</label>
                                <div id="imgHomeSliderPreview">
                                    <label for="imgHomeSliderUpload" id="imgHomeSliderLabel">Choose File</label>
                                    <input type="file"  class="imgHomeSliderUpload" name="imgHomeSliderUpload" id="imgHomeSliderUpload"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <label>Home Slider Sign Image</label>
                                <div id="imgHomeSliderSignPreview">
                                    <label for="imgHomeSliderSignUpload" id="imgHomeSliderSignLabel">Choose File</label>
                                    <input type="file"  class="imgHomeSliderSignUpload" name="imgHomeSliderSignUpload" id="imgHomeSliderSignUpload"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtHomeSliderSubHead1">Sub Heading1</label>
                        <input type="text" class="form-control HomeSliderSubHead1" id="txtHomeSliderSubHead1">
                    </div>
                    <div class="form-group">
                        <label for="txtHomeSliderSubHead2">Sub Heading2</label>
                        <input type="text" class="form-control HomeSliderSubHead2" id="txtHomeSliderSubHead2">
                    </div>
                    <div class="form-group">
                        <label for="txtHomeSliderBtnText">Button Text</label>
                        <input type="text" class="form-control HomeSliderBtnText" id="txtHomeSliderBtnText">
                    </div>
                    <div class="form-group">
                        <label for="txtHomeSliderBtnLink">Button Link</label>
                        <select class="form-control buttonlink_select2"  id="txtHomeSliderBtnLink" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <option value="HomePage">HomePage</option>
                            <option value="AboutUs">AboutUs</option>
                            <option value="PracticeAreas">PracticeAreas</option>
                            <option value="FAQ">FAQ</option>
                            <option value="ContactUs">ContactUs</option>
                        </select>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateHSItem"  onclick="hsitem_submit($(this))" >Submit</button>
        </div>
    </div>
</section>

<section class="content hsItemsDT">

    <div class="row">
        <div class="col-md-12 hsItems_list_dt">
            <div class="box box_border_top">
                <div class="box-header hslist_dt1">
                    <h3 class="box-title">Home Slider Items List</h3>
                </div>

                <div class="box-body no-padding hsItems_list">
                    <table class="table table-striped hslist_dt" cellspacing="0" id="hslist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col">Main Heading</th>
                                <th class="dt_item_col">Sub Heading 1</th>
                                <th class="dt_item_col">Sub Heading 2</th>
                                <th class="dt_image_col">Slider BG Image</th>
                                <th class="dt_image_col">Slider Sign Image</th>
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