<?php
$pa_mainheader = $pa_subheader = $pa_content = $pa_image = $pa_sideimage = $pa_buttontext = $pa_buttonlink = $pa_footerContent = '';
//if (isset($about_pa) && !empty($about_pa)) {
//    $pa_mainheader = $about_pa[0]['pa_mainheader'];
//    $pa_subheader = $about_pa[0]['pa_subheader'];
//    $pa_content = $about_pa[0]['pa_content'];
//    $pa_image = $about_pa[0]['pa_image'];
//    $pa_sideimage = $about_pa[0]['pa_sideimage'];
//    $pa_buttontext = $about_pa[0]['pa_buttontext'];
//    $pa_buttonlink = $about_pa[0]['pa_buttonlink'];
//}
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title hide">Contact Us Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtContactType">Contact Type</label>
                        <input type="hidden" class="hidden_contactType" value="">
                        <select class="form-control contact_ctype_select2"  id="txtContactType" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <option value="1">Contact Details</option>
                            <option value="2">Social Entry</option>
                            <option value="3">Copyright Entry</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtContactName">Contact Name</label>
                        <input type="text" class="form-control ContactName" id="txtContactName" value="<?php echo $pa_mainheader; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtPAButtonLink">Social Name</label>
                        <input type="hidden" class="hidden_buttonlink" value="<?php echo $pa_buttonlink; ?>">
                        <select class="form-control contact_social_select2"  id="txtContactSocialName" style="width: 100%;">
                            <option selected="selected" value="0">Please Select...</option>
                            <option value="fa fa-facebook">Facebook</option>
                            <option value="fa fa-google-plus">Google Plus</option>
                            <option value="fa fa-pinterest">Pinterest</option>
                            <option value="fa fa-twitter">Twitter</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-lg-8 col-xs-6">
                                <label>Contact Image</label>
                                <div id="imgContactPreview">
                                    <label for="imgContactUpload" id="imgContactLabel">Choose File</label>
                                    <input type="file"  class="ContactUpload" name="imgContactUpload" id="imgContactUpload"   value="<?php echo $pa_image; ?>" accept="image/gif,image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="txtcontactSocialLink">Social Link</label>
                        <input type="text" class="form-control contactSocialLink" id="txtcontactSocialLink" value="<?php echo $pa_buttontext; ?>">
                    </div>

                    <div class="form-group">
                        <label for="txtContactContent">Contact Content</label>
                        <textarea class="form-control ContactContent" id="txtContactContent"><?php echo $pa_content; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="txtFooterContent">Footer Content</label>
                        <textarea class="form-control FooterContent" id="txtFooterContent"><?php echo $pa_footerContent; ?></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateContact"  onclick="contact_submit($(this))" >Submit</button>
        </div>
    </div>
</section>



<section class="content contactItemsDT">

    <div class="row">
        <div class="col-md-12 contactItems_list_dt">
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title headerTitle collapsibleHeading_contact footer_section_dts" >Contact Us Entries</h3>

                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool contact_collapse_address" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ud_hslist_dt_dash" style="display: none;">
                    <table class="table table-striped contactuslist_dt" cellspacing="0" id="contactuslist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col contactus_dt">Name</th>
                                <th class="dt_content_col contactus_dt">Content</th>
                                <th class="dt_image_col contactus_dt">Image</th>
                                <th class="dt_status_col contactus_dt">Show / Hide</th>
                                <th class="dt_action_col contactus_dt">Action</th>
                            </tr>
                        </thead>

                    </table>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
        </div> 
        <div class="col-md-12 ">
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title headerTitle collapsibleHeading_social footer_section_dts" >Social Link Entries</h3>

                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool contact_collapse_social" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ud_hslist_dt_dash" style="display: none;">
                    <table class="table table-striped socialiconslist_dt" cellspacing="0" id="socialiconslist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col social_dt">Social Name</th>
                                <th class="dt_item_col social_dt">Social Link</th>
                                <th class="dt_status_col social_dt">Show / Hide</th>
                                <th class="dt_action_col social_dt">Action</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
        </div> 
        <div class="col-md-12 footerlink_dt">
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title headerTitle collapsibleHeading_footerlink footer_section_dts" >Footer Link Entry</h3>

                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool contact_collapse_footerlink" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ud_hslist_dt_dash" style="display: none;">
                    <table class="table table-striped footerlink_dt" cellspacing="0" id="footer_link_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_content_col contactus_dt">Footer Content</th>
                                <th class="dt_status_col footer_link_dt">Show / Hide</th>
                                <th class="dt_action_col footer_link_dt">Action</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
        </div> 
    </div> 


</section>

<div class="modal fade" id="modal-delete_contactitems">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_contactusItem btn btn-primary yes_popup_button " onclick="del_contactusDetails($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>



