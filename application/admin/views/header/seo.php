<!-- Main content -->
<?php
$title = $fav_image = $logo_title = $logo_href = $logo_image = $logo_retina_image = $logo_alt_text = $logo_sticky_image = $logo_sticky_retina_image = $logo_sticky_alt_text = $logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_retina_alt_text = $logo_mobile_sticky_image = $logo_mobile_sticky_retina_image = $logo_mobile_sticky_retina_alt_text = $logo_data_height = $logo_data_padding = $logo_main_data_height = $logo_sticky_data_height = $logo_mobile_data_height = $logo_mobile_sticky_data_height = '';
if (isset($logo_details) && !empty($logo_details)) {
//    $title = $logo_details[0]['title'];
//    $fav_image = $logo_details[0]['fav_image'];
//    $logo_title = $logo_details[0]['logo_title'];
//    $logo_href = $logo_details[0]['logo_href'];
//    $logo_image = $logo_details[0]['logo_image'];
//    $logo_retina_image = $logo_details[0]['logo_retina_image'];
//    $logo_alt_text = $logo_details[0]['logo_alt_text'];
//    $logo_sticky_image = $logo_details[0]['logo_sticky_image'];
//    $logo_sticky_retina_image = $logo_details[0]['logo_sticky_retina_image'];
//    $logo_sticky_alt_text = $logo_details[0]['logo_sticky_alt_text'];
//    $logo_mobile_image = $logo_details[0]['logo_mobile_image'];
//    $logo_mobile_retina_image = $logo_details[0]['logo_mobile_retina_image'];
//    $logo_mobile_retina_alt_text = $logo_details[0]['logo_mobile_retina_alt_text'];
//    $logo_mobile_sticky_image = $logo_details[0]['logo_mobile_sticky_image'];
//    $logo_mobile_sticky_retina_image = $logo_details[0]['logo_mobile_sticky_retina_image'];
//    $logo_mobile_sticky_retina_alt_text = $logo_details[0]['logo_mobile_sticky_retina_alt_text'];
//    $logo_data_height = $logo_details[0]['logo_data_height'];
//    $logo_data_padding = $logo_details[0]['logo_data_padding'];
//    $logo_main_data_height = $logo_details[0] ['logo_main_data_height'];
//    $logo_sticky_data_height = $logo_details[0]['logo_sticky_data_height'];
//    $logo_mobile_data_height = $logo_details[0]['logo_mobile_data_height'];
//    $logo_mobile_sticky_data_height = $logo_details[0]['logo_mobile_sticky_data_height'];
}
?>
<section class="content-header ">
    <h1>
        Header Settings
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">SEO</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title ">SEO Settings</h3>

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
                        <label for="txtPages">Pages</label>
                        <input type="hidden" class="hiddenPages">
                        <select class="form-control ddPagesMenu" style="width: 100%;" onchange="get_SEOPageDetails($(this));">
                            <option selected="selected" value="0">Please Select...</option>
                            <?php
                            if (isset($controller_pages) && !empty($controller_pages)) {
                                foreach ($controller_pages as $key_cp => $value_cp) {
                                    ?>
                                    <option value="<?php echo $value_cp; ?>"><?php echo $value_cp; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Page Title</label>
                        <textarea type="text" class="form-control SEOTitle" id="txtSEOTitle" readonly><?php //echo $logo_title; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtSEOMetaTitle">SEO Meta Title</label>
                        <textarea type="text" class="form-control SEOMetaTitle" id="txtSEOMetaTitle"  readonly><?php //echo $logo_title; ?></textarea>
                    </div>
                   <div class="form-group">
                        <label for="txtSEOMetaDescription">SEO Meta Description</label>
                        <textarea type="text" class="form-control SEOMetaDescription" id="txtSEOMetaDescription"  readonly><?php //echo $logo_title; ?></textarea>
                    </div>
                    
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtSEOGAScript">SEO Script</label>
                         <textarea type="text" class="form-control" id="txtSEOGAScript"><?php //echo $logo_title; ?></textarea>
                   </div>
                    <div class="form-group">
                        <label for="txtSEOGACode">Google Authorization Code</label>
                        <input type="text"  class="form-control" id="txtSEOGACode" value="<?php //echo $logo_mobile_retina_alt_text; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtSEORobot">Robot Content</label>
                        <input type="text"   class="form-control" id="txtSEORobot" value="<?php //echo $logo_mobile_sticky_retina_alt_text; ?>">
                    </div>
                    
                </div>

            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateHeaderLogo"  onclick="seoContent_submit()" >Submit</button>
        </div>
    </div>



</section>
