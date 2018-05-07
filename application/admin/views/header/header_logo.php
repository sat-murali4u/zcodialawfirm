<!-- Main content -->
<?php
$title = $fav_image = $logo_title = $logo_href = $logo_image = $logo_retina_image = $logo_alt_text = $logo_sticky_image = $logo_sticky_retina_image = $logo_sticky_alt_text = $logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_retina_alt_text = $logo_mobile_sticky_image = $logo_mobile_sticky_retina_image = $logo_mobile_sticky_retina_alt_text = $logo_data_height = $logo_data_padding = $logo_main_data_height = $logo_sticky_data_height = $logo_mobile_data_height = $logo_mobile_sticky_data_height = '';
$logo_header_height = $logo_header_width = $logo_footer_height = $logo_footer_width = '';

if (isset($logo_details) && !empty($logo_details)) {
    $title = $logo_details[0]['title'];
    $fav_image = $logo_details[0]['fav_image'];
    $logo_title = $logo_details[0]['logo_title'];
    $logo_href = $logo_details[0]['logo_href'];
    $logo_image = $logo_details[0]['logo_image'];
    $logo_retina_image = $logo_details[0]['logo_retina_image'];
    $logo_alt_text = $logo_details[0]['logo_alt_text'];
    $logo_header_height = $logo_details[0]['logo_header_height'];
    $logo_header_width = $logo_details[0]['logo_header_width'];
    $logo_footer_height = $logo_details[0]['logo_footer_height'];
    $logo_footer_width = $logo_details[0]['logo_footer_width'];
    $logo_sticky_image = $logo_details[0]['logo_sticky_image'];
    $logo_sticky_retina_image = $logo_details[0]['logo_sticky_retina_image'];
    $logo_sticky_alt_text = $logo_details[0]['logo_sticky_alt_text'];
    $logo_mobile_image = $logo_details[0]['logo_mobile_image'];
    $logo_mobile_retina_image = $logo_details[0]['logo_mobile_retina_image'];
    $logo_mobile_retina_alt_text = $logo_details[0]['logo_mobile_retina_alt_text'];
    $logo_mobile_sticky_image = $logo_details[0]['logo_mobile_sticky_image'];
    $logo_mobile_sticky_retina_image = $logo_details[0]['logo_mobile_sticky_retina_image'];
    $logo_mobile_sticky_retina_alt_text = $logo_details[0]['logo_mobile_sticky_retina_alt_text'];
    $logo_data_height = $logo_details[0]['logo_data_height'];
    $logo_data_padding = $logo_details[0]['logo_data_padding'];
    $logo_main_data_height = $logo_details[0] ['logo_main_data_height'];
    $logo_sticky_data_height = $logo_details[0]['logo_sticky_data_height'];
    $logo_mobile_data_height = $logo_details[0]['logo_mobile_data_height'];
    $logo_mobile_sticky_data_height = $logo_details[0]['logo_mobile_sticky_data_height'];
}
?>
<section class="content-header ">
    <h1>
        Header Settings
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Logo</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title ">Logo Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group hide">
                        <label for="txtWebsiteTitle">Website Title</label>
                        <input type="text" class="form-control WebsiteTitle" id="txtWebsiteTitle" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtLogoTitle">Logo Title</label>
                        <input type="text" placeholder="./" class="form-control " id="txtLogoTitle" value="<?php echo $logo_title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtLogoLinkerUrl">Logo linker Url</label>
                        <input type="text" placeholder="./"  class="form-control " id="txtLogoLinkerUrl" value="<?php echo $logo_href; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtLogoAltText">Logo Alt Text</label>
                        <input type="text" placeholder="./"  class="form-control " id="txtLogoAltText" value="<?php echo $logo_alt_text; ?>">
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 no-padding">
                            <div class="form-group">
                                <label for="txtHeaderLogoWidth">Header Logo Width</label>
                                <input type="number" placeholder="60"  min="0" max="200"  class="form-control " id="txtHeaderLogoWidth" value="<?php echo $logo_header_width; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 no-pad-right">
                            <div class="form-group">
                                <label for="txtHeaderLogoHeight">Header Logo Height</label>
                                <input type="number" placeholder="30"  min="0" max="200"  class="form-control " id="txtHeaderLogoHeight" value="<?php echo $logo_header_height; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 no-padding">
                            <div class="form-group">
                                <label for="txtFooterLogoWidth">Footer Logo Width</label>
                                <input type="number" placeholder="60"  min="0" max="200"  class="form-control " id="txtFooterLogoWidth" value="<?php echo $logo_footer_width; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12  no-pad-right">
                            <div class="form-group">
                                <label for="txtFooterLogoHeight">Footer Logo Height</label>
                                <input type="number" placeholder="30"  min="0" max="200"  class="form-control " id="txtFooterLogoHeight" value="<?php echo $logo_footer_height; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group hide">
                        <label for="txtAbtHeaderText">Logo Sticky Alt Text</label>
                        <input type="text" placeholder="./"  class="form-control " id="txtLogoStickyAltText" value="<?php echo $logo_sticky_alt_text; ?>">
                    </div>
                    <div class="form-group hide">
                        <label for="txtAbtSubHeaderText">Mobile Retina Alt Text</label>
                        <input type="text" placeholder="./"  class="form-control " id="txtMobileRetinaAltText" value="<?php echo $logo_mobile_retina_alt_text; ?>">
                    </div>
                    <div class="form-group hide">
                        <label for="txtAbtSubHeaderText">Mobile Sticky Retina Alt Text</label>
                        <input type="text" placeholder="./"  class="form-control " id="txtMobileStickyRetinaAltText" value="<?php echo $logo_mobile_sticky_retina_alt_text; ?>">
                    </div>
                    <div class="row hide">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtLogoDataHeight">Logo Data Height</label>
                                <input type="number" placeholder="60"  min="0" max="200"  class="form-control " id="txtLogoDataHeight" value="<?php echo $logo_data_height; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtLogoDataPadding">Logo Data Padding</label>
                                <input type="number" placeholder="30"  min="0" max="200"  class="form-control " id="txtLogoDataPadding" value="<?php echo $logo_data_padding; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row hide">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtMainLogoDataHeight">Main Logo - Data Height</label>
                                <input type="number" placeholder="58"  min="0" max="200" class="form-control " id="txtMainLogoDataHeight" value="<?php echo $logo_main_data_height; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtStickyLogoDataHeight">Sticky Logo Data Height</label>
                                <input type="number" placeholder="58"  min="0" max="200"  class="form-control" id="txtStickyLogoDataHeight" value="<?php echo $logo_sticky_data_height; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row hide">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtMobileLogoDataHeight">Mob. Logo Data Height</label>
                                <input type="number" placeholder="58"  min="0" max="200"  class="form-control" id="txtMobileLogoDataHeight" value="<?php echo $logo_mobile_data_height; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtMobileStickyLogoDataHeight">Mobile SL - Data Height</label>
                                <input type="number" placeholder="58"  min="0" max="200"  class="form-control" id="txtMobileStickyLogoDataHeight" value="<?php echo $logo_mobile_sticky_data_height; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4 col-xs-6 one-fourth">
                            <label>Logo Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderLogoPreview" class="logo-page img-preview">
                                    <label for="imgHeaderLogoUpload" id="imgHeaderLogoLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file"  class="HeaderLogoUpload logo-page img-upload" name="imgHeaderLogoUpload" id="imgHeaderLogoUpload"  value="<?php echo $logo_image; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-4 col-xs-6  one-fourth">
                            <label>Fav Icon Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderFavIconPreview" class="logo-page img-preview">
                                    <label for="imgHeaderFavIconUpload" id="imgHeaderFavIconLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file" class="HeaderFavIconUpload logo-page img-upload" name="imgHeaderFavIconUpload" id="imgHeaderFavIconUpload"   value="<?php echo $fav_image; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-6 col-xs-6  one-fourth hide">
                            <label>Retina Logo </label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div> 
                                <div id="imgHeaderRetinaPreview" class="logo-page img-preview">
                                    <label for="imgHeaderRetinaUpload" id="imgHeaderRetinaLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file"  class="HeaderRetinaUpload logo-page img-upload" name="imgHeaderRetinaUpload" id="imgHeaderRetinaUpload"  value="<?php echo $logo_retina_image; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>    <div class="column mcb-column one column_divider hide"><hr class="no_line"></div>
                        <div class="col-md-6 col-sm-4 col-lg-6 col-xs-6  one-fourth hide">
                            <label>Sticky Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderStickyPreview" class="logo-page img-preview">
                                    <label for="imgHeaderStickyUpload" id="imgHeaderStickyLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file" class="HeaderStickyUpload logo-page img-upload" name="imgHeaderStickyUpload" id="imgHeaderStickyUpload"   value="<?php echo $logo_sticky_image; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-4 col-lg-6 col-xs-6  one-fourth hide">
                            <label>MSticky Retina</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderMobileStickyRetinaPreview" class="logo-page img-preview">
                                    <label for="imgHeaderMobileStickyRetinaUpload" id="imgHeaderMobileStickyRetinaLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file" class="HeaderMobileStickyRetinaUpload logo-page img-upload" name="imgHeaderMobileStickyRetinaUpload" id="imgHeaderMobileStickyRetinaUpload"   value="<?php echo $logo_mobile_sticky_retina_image; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-6 col-xs-6 one-fourth hide">
                            <label>Sticky Retina</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderStickyRetinaPreview" class="logo-page img-preview">
                                    <label for="imgHeaderStickyRetinaUpload" id="imgHeaderStickyRetinaLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file"  class="HeaderStickyRetinaUpload logo-page img-upload" name="imgHeaderStickyRetinaUpload" id="imgHeaderStickyRetinaUpload"  value="<?php echo $logo_sticky_retina_image; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-4 col-xs-6  one-fourth hide">
                            <label>Mobile Sticky Image</label>
                            <div id="imgHeaderMobileStickyPreview" class="logo-page img-preview">
                                <label for="imgHeaderMobileStickyUpload" id="imgHeaderMobileStickyLabel" class="logo-page img-label">Choose File</label>
                                <input type="file"  class="imgHeaderMobileStickyUpload logo-page img-upload" name="imgHeaderMobileStickyUpload" id="imgHeaderMobileStickyUpload"  value="<?php echo $logo_mobile_sticky_image; ?>" accept="image/gif,image/jpeg,image/png" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-4 col-xs-6  one-fourth hide">
                            <label>MRetina Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div> 
                                <div id="imgMobileRetinaLogoPreview" class="logo-page img-preview">
                                    <label for="imgMobileRetinaLogoUpload" id="imgMobileRetinaLogoLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file"  class="MobileRetinaLogoUpload logo-page img-upload" name="imgMobileRetinaLogoUpload" id="imgMobileRetinaLogoUpload"  value="<?php echo $logo_mobile_retina_image; ?>"  accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-4 col-lg-4 col-xs-6  one-fourth">
                            <label>Footer Image</label>
                            <div class="img-preview-outer">
                                <div class="deletePreview logo-page hide"><i class="fa fa-remove"></i></div>
                                <div id="imgHeaderMobileLogoPreview" class="logo-page img-preview">
                                    <label for="imgHeaderMobileLogoUpload" id="imgHeaderMobileLogoLabel" class="logo-page img-label">Choose File</label>
                                    <input type="file" class="HeaderMobileLogoUpload logo-page img-upload" name="imgHeaderMobileLogoUpload" id="imgHeaderMobileLogoUpload"   value="<?php echo $logo_mobile_image; ?>"  accept="image/gif,image/jpeg,image/png"/>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateHeaderLogo"  onclick="headerlogo_submit()" >Submit</button>
        </div>
    </div>



</section>
