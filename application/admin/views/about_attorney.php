<?php
$attyTitle = $attyContent = $attyImage = $attyBGImage = '';
if (isset($about_attorney) && !empty($about_attorney)) {
    $attyTitle = $about_attorney[0]['atty_title_head'];
    $attyContent = $about_attorney[0]['atty_content'];
    $attyImage = $about_attorney[0]['atty_title_image'];
    $attyBGImage = $about_attorney[0]['atty_bg_image'];
}
?>
<section class="content-header">
    <h1>
        About Us
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attorney</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Attorney Settings</h3>

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
                        <label for="txtAbtAttyHeader">Main Header</label>
                        <input type="text" class="form-control" id="txtAbtAttyHeader" value="<?php echo $attyTitle; ?>" >
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Image</label>
                                <div class="imgAbtAttyItemPreviewOuter">
                                    <div id="imgAbtAttyItemPreview">
                                        <label for="imgAbtAttyItemUpload" id="imgAbtAttyItemLabel">Choose File</label>
                                        <input type="file" class="imgAbtAttyItemUpload" name="imgAbtAttyItemUpload" id="imgAbtAttyItemUpload" value="<?php echo $attyImage; ?>" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Image</label>
                                <div class="imgAbtAttyBGItemPreviewOuter">
                                    <div id="imgAbtAttyBGItemPreview">
                                        <label for="imgAbtAttyBGItemUpload" id="imgAbtAttyBGItemLabel">Choose File</label>
                                        <input type="file" class="imgAbtAttyBGItemUpload" name="imgAbtAttyBGItemUpload" id="imgAbtAttyBGItemUpload" value="<?php echo $attyBGImage; ?>" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtAbtAttyContent">Content</label>
                        <textarea type="text" class="form-control" id="txtAbtAttyContent" ><?php echo $attyContent; ?></textarea>
                    </div>


                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateAbtAtty" onclick="aboutAtty_submit($(this))">Submit</button>
        </div>
    </div>

</section>