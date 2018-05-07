<?php
$bc_header = $bc_image = '';
if (isset($attorney_breadcrumb) && !empty($attorney_breadcrumb)) {
    $bc_header = $attorney_breadcrumb[0]['atty_bc_header'];
    $bc_image = $attorney_breadcrumb[0]['atty_bc_bg_image'];
}
?>
<section class="content-header">
    <h1>
        About
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attorney Breadcrumb</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Attorney Breadcrumb Settings</h3>

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
                        <label for="txtAbtAttyBCHeader">Header</label>
                        <input type="text" class="form-control" id="txtAbtAttyBCHeader" value="<?php echo $bc_header; ?>" >
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Background Image</label>
                                <div class="imgAbtAttyBCBGPreviewOuter">
                                    <div id="imgAbtAttyBCBGPreview">
                                        <label for="imgAbtAttyBCBGUpload" id="imgAbtAttyBCBGLabel">Choose File</label>
                                        <input type="file" class="imgAbtAttyBCBGUpload" name="imgAbtAttyBGItemUpload" id="imgAbtAttyBCBGUpload" value="<?php echo $bc_image; ?>" accept="image/gif,image/jpeg,image/png">
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
            <button type="submit" class="btn btn-primary btnUpdateAbtAttyBG" onclick="aboutAttyBC_submit($(this))">Submit</button>
        </div>
    </div>

</section>