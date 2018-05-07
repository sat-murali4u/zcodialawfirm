<?php
if (isset($social_details) && !empty($social_details)) {
    // echo '<pre>';print_r($social_details);die;
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attorney Social Details</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Attorney Social Details</h3>

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
                        <label for="txtattorney">Attorney Name</label>
                        <select class="form-control attorney_select2"  id="txtattorney" style="width: 100%;" onchange="getAttyDetails($(this), 'social')">
                            <option selected="selected" value="0">Please Select...</option>
                            <?php
                            if (isset($attorney_details) && !empty($attorney_details)) {
                                foreach ($attorney_details as $key => $value) {
                                    ?>
                                    <option  value="<?php echo $value['attyItem_id']; ?>"><?php echo $value['attyItem_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtAttyDesignation">Designation</label>
                        <input type="text" class="form-control" id="txtAttyDesignation" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txtSocialName">Social Name</label>
                        <select class="form-control socialName_select2 " disabled  id="txtSocialName" style="width: 100%;" onchange="getAttySocialDetails($(this))">
                            <option selected="selected" value="0">Please Select...</option>
                            <?php
                            if (isset($social_details) && !empty($social_details)) {
                                foreach ($social_details as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['social_id']; ?>"><?php echo $value['social_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtSocialLink" class='lblSocialLink'>Social Link</label>
                        <input type="text"  class="form-control" id="txtSocialLink" >
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Attorney Image</label>
                                <div class="imgAttyPreviewOuter">
                                    <div id="imgAttyPreview">
                                        <!--label for="imgAttyUpload" id="imgAttyLabel">Choose File</label-->
                                        <input type="image" class="imgAttyUpload disabled" style="cursor:default;"name="imgAttyUpload" id="imgAttyUpload" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <span class="fa fa-bi"></span>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAttySocialDetails" onclick="attySocialDetails_submit($(this))">Submit</button>
        </div>
    </div>
</section>
