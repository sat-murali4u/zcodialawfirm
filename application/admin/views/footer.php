</div>
<!-- /.content-wrapper -->




</div>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="themes/backend/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="themes/backend/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<!--<script src="themes/backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="themes/backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="themes/backend/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="themes/backend/assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="themes/backend/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- bootstrap color picker -->
<script src="themes/backend/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- jvectormap  -->
<script src="themes/backend/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="themes/backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="themes/backend/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="themes/backend/assets/bower_components/chart.js/Chart.js"></script>

<script src="themes/backend/assets/dist/js/jquery.toaster.js"></script>
<script src="themes/backend/assets/plugins/iCheck/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="themes/backend/assets/dist/js/jquery.uploadPreview.js"></script>
<script src="themes/backend/assets/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="themes/backend/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="themes/backend/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<?php if ($this->uri->segment(1) == 'home') { ?>
    <script src="themes/backend/js/home_page.js" ></script>
<?php } else if ($this->uri->segment(1) == 'about') { ?>
    <script src="themes/backend/js/about_page.js"></script>
<?php } else if ($this->uri->segment(1) == 'faq') { ?>
    <script src="themes/backend/js/faq_page.js"></script>
<?php } else if ($this->uri->segment(1) == 'dashboard') { ?>
    <script src="themes/backend/js/dashboard.js"></script>
<?php } else if ($this->uri->segment(1) == 'practice') { ?>
    <script src="themes/backend/js/practiceareas.js"></script>
<?php } else if ($this->uri->segment(1) == 'contact') { ?>
    <script src="themes/backend/js/contacts.js" ></script>
<?php } else if ($this->uri->segment(1) == 'header') { ?>
    <script src="themes/backend/js/header_logo.js" ></script>
    <script src="themes/backend/js/header_menu.js" ></script><script src="themes/backend/js/appointment.js" ></script>
<?php } else if ($this->uri->segment(1) == '') { ?>

<?php } ?>
<script>
//b8e43301009243d7a70d4cf8c82a10d0
//579b464db66ec23bdd000001f18aac9377f54c65535c0ee2474f85fc
    function readURL(input, selector) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(selector)
                        .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function success_msg(message)
    {
        var priority = 'success';
        var title = 'Success';

        $.toaster({priority: priority, title: title, message: message});
    }

    function error_msg(message)
    {
        var priority = 'danger';
        var title = 'Error';

        $.toaster({priority: priority, title: title, message: message});
    }

    function info_msg(message)
    {
        var priority = 'info';
        var title = 'Information';

        $.toaster({priority: priority, title: title, message: message});
    }

    $('#FromYearTL').datepicker({
        format: "yyyy",
        autoclose: true, yearRange: '1900:+nn',
        minViewMode: "years"
    }).on('changeDate', function (selected) {
        startDate = $("#FromYearTL").val();
        $('#ToYearTL').datepicker('setStartDate', startDate);
    });

    $('#ToYearTL').datepicker({
        format: "yyyy",
        autoclose: true, yearRange: '1900:+nn',
        minViewMode: "years"
    });
    var table;
    $(document).ready(function () {

        function getUrlParam()
        {
            var sPageURL = window.location.pathname;
            var sURLVariables = sPageURL.split('/');
            var length = (sURLVariables.length) - 1;
            if ($.isNumeric(sURLVariables.length))
            {
                return sURLVariables;
            } else {
                return false;
            }
        }

        if ($.trim($('#imgGMapMarkerUpload').attr('value')) !== '' && $.trim($('#imgGMapMarkerUpload').attr('value')) !== 'undefined') {
            $('#imgGMapMarkerPreview').css("background-image", 'url(' + $('#imgGMapMarkerUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgGMapMarkerLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAbtAttyBCBGUpload').attr('value')) !== '' && $.trim($('#imgAbtAttyBCBGUpload').attr('value')) !== 'undefined') {
            $('#imgAbtAttyBCBGPreview').css("background-image", 'url(' + $('#imgAbtAttyBCBGUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtAttyBCBGLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgWCUTypeUpload').attr('value')) !== '' && $.trim($('#imgWCUTypeUpload').attr('value')) !== 'undefined') {
            $('#imgWCUTypePreview').css("background-image", 'url(' + $('#imgWCUTypeUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgWCUTypeLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgWCUBGUpload').attr('value')) !== '' && $.trim($('#imgWCUBGUpload').attr('value')) !== 'undefined') {
            $('#imgWCUBGPreview').css("background-image", 'url(' + $('#imgWCUBGUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgWCUBGLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgAttyExperienceTypeUpload').attr('value')) !== '' && $.trim($('#imgAttyExperienceTypeUpload').attr('value')) !== 'undefined') {
            $('#imgAttyExperienceTypePreview').css("background-image", 'url(' + $('#imgAttyExperienceTypeUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttyExperienceTypeLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAttyExperienceSignUpload').attr('value')) !== '' && $.trim($('#imgAttyExperienceSignUpload').attr('value')) !== 'undefined') {
            $('#imgAttyExperienceSignPreview').css("background-image", 'url(' + $('#imgAttyExperienceSignUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttyExperienceSignLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAttyExperienceBGUpload').attr('value')) !== '' && $.trim($('#imgAttyExperienceBGUpload').attr('value')) !== 'undefined') {
            $('#imgAttyExperienceBGPreview').css("background-image", 'url(' + $('#imgAttyExperienceBGUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttyExperienceBGLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgAbtSliderUpload').attr('value')) !== '' && $.trim($('#imgAbtSliderUpload').attr('value')) !== 'undefined') {
            $('#imgAbtSliderPreview').css("background-image", 'url(' + $('#imgAbtSliderUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtSliderLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAbtSideUpload').attr('value')) !== '' && $.trim($('#imgAbtSideUpload').attr('value')) !== 'undefined') {
            $('#imgAbtSidePreview').css("background-image", 'url(' + $('#imgAbtSideUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtSideLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeTMSSliderUpload').attr('value')) !== '' && $.trim($('#imgHomeTMSSliderUpload').attr('value')) !== 'undefined') {
            $('#imgHomeTMSSliderPreview').css("background-image", 'url(' + $('#imgHomeTMSSliderUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeTMSSliderLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeTMSSliderSignUpload').attr('value')) !== '' && $.trim($('#imgHomeTMSSliderSignUpload').attr('value')) !== 'undefined') {
            $('#imgHomeTMSSliderSignPreview').css("background-image", 'url(' + $('#imgHomeTMSSliderSignUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeTMSSliderSignLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeTMUpload').attr('value')) !== '' && $.trim($('#imgHomeTMUpload').attr('value')) !== 'undefined') {
            $('#imgHomeTMPreview').css("background-image", 'url(' + $('#imgHomeTMUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeTMLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeSliderUpload').attr('value')) !== '' && $.trim($('#imgHomeSliderUpload').attr('value')) !== 'undefined') {
            $('#imgHomeSliderPreview').css("background-image", 'url(' + $('#imgHomeSliderUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeSliderLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeCounterUpload').attr('value')) !== '' && $.trim($('#imgHomeCounterUpload').attr('value')) !== 'undefined') {
            $('#imgHomeCounterPreview').css("background-image", 'url(' + $('#imgHomeCounterUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeCounterLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeSliderSignUpload').attr('value')) !== '' && $.trim($('#imgHomeSliderSignUpload').attr('value')) !== 'undefined') {
            $('#imgHomeSliderSignPreview').css("background-image", 'url(' + $('#imgHomeSliderSignUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeSliderSignLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAbtItemUpload').attr('value')) !== '' && $.trim($('#imgAbtItemUpload').attr('value')) !== 'undefined') {
            $('#imgAbtItemPreview').css("background-image", 'url(' + $('#imgAbtItemUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtItemLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAbtTLItemUpload').attr('value')) !== '' && $.trim($('#imgAbtTLItemUpload').attr('value')) !== 'undefined') {
            $('#imgAbtTLItemPreview').css("background-image", 'url(' + $('#imgAbtTLItemUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtTLItemLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHomeTMBGUpload').attr('value')) !== '' && $.trim($('#imgHomeTMBGUpload').attr('value')) !== 'undefined') {
            $('#imgHomeTMBGPreview').css("background-image", 'url(' + $('#imgHomeTMBGUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHomeTMBGLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgPAUpload').attr('value')) !== '' && $.trim($('#imgPAUpload').attr('value')) !== 'undefined') {
            $('#imgPAPreview').css("background-image", 'url(' + $('#imgPAUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgPALabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgPASideUpload').attr('value')) !== '' && $.trim($('#imgPASideUpload').attr('value')) !== 'undefined') {
            $('#imgPASidePreview').css("background-image", 'url(' + $('#imgPASideUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgPASideLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgPATUpload').attr('value')) !== '' && $.trim($('#imgPATUpload').attr('value')) !== 'undefined') {
            $('#imgPATPreview').css("background-image", 'url(' + $('#imgPATUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgPATLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgContactUpload').attr('value')) !== '' && $.trim($('#imgContactUpload').attr('value')) !== 'undefined') {
            $('#imgContactPreview').css("background-image", 'url(' + $('#imgContactUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgContactLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgHSBButtonImageUpload').attr('value')) !== '' && $.trim($('#imgHSBButtonImageUpload').attr('value')) !== 'undefined') {
            $('#imgHSBButtonImagePreview').css("background-image", 'url(' + $('#imgHSBButtonImageUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHSBButtonImageLabel').html("CHANGE FILE");
        }
        if ($.trim($('#imgAbtAttyItemUpload').attr('value')) !== '' && $.trim($('#imgAbtAttyItemUpload').attr('value')) !== 'undefined') {
            $('#imgAbtAttyItemPreview').css("background-image", 'url(' + $('#imgAbtAttyItemUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAbtAttyItemLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgAttyUpload').attr('value')) !== '' && $.trim($('#imgAttyUpload').attr('value')) !== 'undefined') {
            $('#imgAttyPreview').css("background-image", 'url(' + $('#imgAttyUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttyLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgAttySkillTypeUpload').attr('value')) !== '' && $.trim($('#imgAttySkillTypeUpload').attr('value')) !== 'undefined') {
            $('#imgAttySkillTypePreview').css("background-image", 'url(' + $('#imgAttySkillTypeUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttySkillTypeLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgAttySkillBGUpload').attr('value')) !== '' && $.trim($('#imgAttySkillBGUpload').attr('value')) !== 'undefined') {
            $('#imgAttySkillBGPreview').css("background-image", 'url(' + $('#imgAttySkillBGUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgAttySkillBGLabel').html("CHANGE FILE");
        }


        /* appointment page -start */
        if ($.trim($('#imgHeaderApptPhoneUpload').attr('value')) !== '' && $.trim($('#imgHeaderApptPhoneUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderApptPhonePreview').css("background-image", 'url(' + $('#imgHeaderApptPhoneUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderApptPhoneLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderApptClockUpload').attr('value')) !== '' && $.trim($('#imgHeaderApptClockUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderApptClockPreview').css("background-image", 'url(' + $('#imgHeaderApptClockUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderApptClockLabel').html("CHANGE FILE");
        }

        /* appointment page - end */

        /* images for logo - start */
        if ($.trim($('#imgHeaderLogoUpload').attr('value')) !== '' && $.trim($('#imgHeaderLogoUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderLogoPreview').css("background-image", 'url(' + $('#imgHeaderLogoUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderLogoLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderFavIconUpload').attr('value')) !== '' && $.trim($('#imgHeaderFavIconUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderFavIconPreview').css("background-image", 'url(' + $('#imgHeaderFavIconUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderFavIconLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderRetinaUpload').attr('value')) !== '' && $.trim($('#imgHeaderRetinaUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderRetinaPreview').css("background-image", 'url(' + $('#imgHeaderRetinaUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderRetinaLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderStickyUpload').attr('value')) !== '' && $.trim($('#imgHeaderStickyUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderStickyPreview').css("background-image", 'url(' + $('#imgHeaderStickyUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderStickyLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderMobileStickyRetinaUpload').attr('value')) !== '' && $.trim($('#imgHeaderMobileStickyRetinaUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderMobileStickyRetinaPreview').css("background-image", 'url(' + $('#imgHeaderMobileStickyRetinaUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderMobileStickyRetinaLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderStickyRetinaUpload').attr('value')) !== '' && $.trim($('#imgHeaderStickyRetinaUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderStickyRetinaPreview').css("background-image", 'url(' + $('#imgHeaderStickyRetinaUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderStickyRetinaLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderMobileLogoUpload').attr('value')) !== '' && $.trim($('#imgHeaderMobileLogoUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderMobileLogoPreview').css("background-image", 'url(' + $('#imgHeaderMobileLogoUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderMobileLogoLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgMobileRetinaLogoUpload').attr('value')) !== '' && $.trim($('#imgMobileRetinaLogoUpload').attr('value')) !== 'undefined') {
            $('#imgMobileRetinaLogoPreview').css("background-image", 'url(' + $('#imgMobileRetinaLogoUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgMobileRetinaLogoLabel').html("CHANGE FILE");
        }

        if ($.trim($('#imgHeaderMobileStickyUpload').attr('value')) !== '' && $.trim($('#imgHeaderMobileStickyUpload').attr('value')) !== 'undefined') {
            $('#imgHeaderMobileStickyPreview').css("background-image", 'url(' + $('#imgHeaderMobileStickyUpload').attr('value') + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $('#imgHeaderMobileStickyLabel').html("CHANGE FILE");
        }

        /* images for logo - end */


        $.uploadPreview({
            input_field: "#imgGMapMarkerUpload",
            preview_box: "#imgGMapMarkerPreview",
            label_field: "#imgGMapMarkerlabel"
        });

        $.uploadPreview({
            input_field: "#imgAbtAttyBCBGUpload",
            preview_box: "#imgAbtAttyBCBGPreview",
            label_field: "#imgAbtAttyBCBGLabel"
        });
        $.uploadPreview({
            input_field: "#imgWCUBGUpload",
            preview_box: "#imgWCUBGPreview",
            label_field: "#imgWCUBGLabel"
        });

        $.uploadPreview({
            input_field: "#imgWCUTypeUpload",
            preview_box: "#imgWCUTypePreview",
            label_field: "#imgWCUTypeLabel"
        });


        $.uploadPreview({
            input_field: "#imgAbtSideUpload",
            preview_box: "#imgAbtSidePreview",
            label_field: "#imgAbtSideLabel"
        });
        $.uploadPreview({
            input_field: "#imgAbtSliderUpload",
            preview_box: "#imgAbtSliderPreview",
            label_field: "#imgAbtSliderLabel"
        });
        $.uploadPreview({
            input_field: "#imgAbtItemUpload",
            preview_box: "#imgAbtItemPreview",
            label_field: "#imgAbtItemLabel"
        });
        $.uploadPreview({
            input_field: "#imgAbtTLItemUpload",
            preview_box: "#imgAbtTLItemPreview",
            label_field: "#imgAbtTLItemLabel"
        });
        $.uploadPreview({
            input_field: "#imgHomeTMSSliderUpload",
            preview_box: "#imgHomeTMSSliderPreview",
            label_field: "#imgHomeTMSSliderLabel"
        });
        $.uploadPreview({
            input_field: "#imgHomeTMSSliderSignUpload",
            preview_box: "#imgHomeTMSSliderSignPreview",
            label_field: "#imgHomeTMSSliderSignLabel"
        });

        $.uploadPreview({
            input_field: "#imgAbtAttyItemUpload",
            preview_box: "#imgAbtAttyItemPreview",
            label_field: "#imgAbtAttyItemLabel"
        });
        $.uploadPreview({
            input_field: "#imgAbtAttyBGItemUpload",
            preview_box: "#imgAbtAttyBGItemPreview",
            label_field: "#imgAbtAttyBGItemLabel"
        });

        $.uploadPreview({
            input_field: "#imgHomeTMUpload",
            preview_box: "#imgHomeTMPreview",
            label_field: "#imgHomeTMLabel"
        });
        $.uploadPreview({
            input_field: "#imgHomeSliderUpload",
            preview_box: "#imgHomeSliderPreview",
            label_field: "#imgHomeSliderLabel"
        });
        $.uploadPreview({
            input_field: "#imgAttyUpload",
            preview_box: "#imgAttyPreview",
            label_field: "#imgAttyLabel"
        });

        $.uploadPreview({
            input_field: "#imgHomeCounterUpload",
            preview_box: "#imgHomeCounterPreview",
            label_field: "#imgHomeCounterLabel"
        });
        $.uploadPreview({
            input_field: "#imgHomeSliderSignUpload",
            preview_box: "#imgHomeSliderSignPreview",
            label_field: "#imgHomeSliderSignLabel"
        });


        $.uploadPreview({
            input_field: "#imgAttySkillTypeUpload",
            preview_box: "#imgAttySkillTypePreview",
            label_field: "#imgAttySkillTypeLabel"
        });
        $.uploadPreview({
            input_field: "#imgAttySkillBGUpload",
            preview_box: "#imgAttySkillBGPreview",
            label_field: "#imgAttySkillBGLabel"
        });

        $.uploadPreview({
            input_field: "#imgHomeTMBGUpload",
            preview_box: "#imgHomeTMBGPreview",
            label_field: "#imgHomeTMBGLabel"
        });
        $.uploadPreview({
            input_field: "#imgPAUpload",
            preview_box: "#imgPAPreview",
            label_field: "#imgPALabel"
        });
        $.uploadPreview({
            input_field: "#imgPASideUpload",
            preview_box: "#imgPASidePreview",
            label_field: "#imgPASideLabel"
        });
        $.uploadPreview({
            input_field: "#imgPATUpload",
            preview_box: "#imgPATPreview",
            label_field: "#imgPATLabel"
        });
        $.uploadPreview({
            input_field: "#imgContactUpload",
            preview_box: "#imgContactPreview",
            label_field: "#imgContactLabel"
        });
        $.uploadPreview({
            input_field: "#imgHSBButtonImageUpload",
            preview_box: "#imgHSBButtonImagePreview",
            label_field: "#imgHSBButtonImageLabel"
        });
        /* Upload Preview for Head Logo  - Start */
        $.uploadPreview({
            input_field: "#imgHeaderLogoUpload",
            preview_box: "#imgHeaderLogoPreview",
            label_field: "#imgHeaderLogoLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderFavIconUpload",
            preview_box: "#imgHeaderFavIconPreview",
            label_field: "#imgHeaderFavIconLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderRetinaUpload",
            preview_box: "#imgHeaderRetinaPreview",
            label_field: "#imgHeaderRetinaLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderStickyUpload",
            preview_box: "#imgHeaderStickyPreview",
            label_field: "#imgHeaderStickyLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderMobileStickyRetinaUpload",
            preview_box: "#imgHeaderMobileStickyRetinaPreview",
            label_field: "#imgHeaderMobileStickyRetinaLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderStickyRetinaUpload",
            preview_box: "#imgHeaderStickyRetinaPreview",
            label_field: "#imgHeaderStickyRetinaLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderMobileLogoUpload",
            preview_box: "#imgHeaderMobileLogoPreview",
            label_field: "#imgHeaderMobileLogoLabel"
        });
        $.uploadPreview({
            input_field: "#imgMobileRetinaLogoUpload",
            preview_box: "#imgMobileRetinaLogoPreview",
            label_field: "#imgMobileRetinaLogoLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderMobileStickyUpload",
            preview_box: "#imgHeaderMobileStickyPreview",
            label_field: "#imgHeaderMobileStickyLabel"
        });


        $.uploadPreview({
            input_field: "#imgAttyExperienceTypeUpload",
            preview_box: "#imgAttyExperienceTypePreview",
            label_field: "#imgAttyExperienceTypeLabel"
        });
        $.uploadPreview({
            input_field: "#imgAttyExperienceSignUpload",
            preview_box: "#imgAttyExperienceSignPreview",
            label_field: "#imgAttyExperienceSignLabel"
        });
        $.uploadPreview({
            input_field: "#imgAttyExperienceBGUpload",
            preview_box: "#imgAttyExperienceBGPreview",
            label_field: "#imgAttyExperienceBGLabel"
        });




        $.uploadPreview({
            input_field: "#imgHeaderApptPhoneUpload",
            preview_box: "#imgHeaderApptPhonePreview",
            label_field: "#imgHeaderApptPhoneLabel"
        });
        $.uploadPreview({
            input_field: "#imgHeaderApptClockUpload",
            preview_box: "#imgHeaderApptClockPreview",
            label_field: "#imgHeaderApptClockLabel"
        });
        /* Upload Preview for Head Logo  - End */


        var pa_list_dt = 0;
        if (pa_list_dt !== 0) {
            pa_list_dt.destroy();
        }
        pa_list_dt = $('#pa_list_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/practice/get_PracticeAreaDetails",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        var hslist_dt = 0;
        if (hslist_dt !== 0) {
            hslist_dt.destroy();
        }
        hslist_dt = $('#hslist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/home/get_HomeSliderItems",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });


        var attySkillTypes_dt = 0;
        if (attySkillTypes_dt !== 0) {
            attySkillTypes_dt.destroy();
        }
        hslist_dt = $('#attySkillTypes_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_attorneySkillTypes",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        var wcutypelist_dt = 0;
        if (wcutypelist_dt !== 0) {
            wcutypelist_dt.destroy();
        }
        wcutypelist_dt = $('#wcutypelist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_WCUItems",
            "aaSorting": [[2, "desc"]],
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });


        var hclist_dt = 0;
        if (hclist_dt !== 0) {
            hclist_dt.destroy();
        }
        hclist_dt = $('#hclist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/home/get_HomeCounterItems",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        var attyExperienceTypes_dt = 0;
        if (attyExperienceTypes_dt !== 0) {
            attyExperienceTypes_dt.destroy();
        }
        attyExperienceTypes_dt = $('#attyExperienceTypes_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_attyExperienceTypes",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        var attydetails_dt = 0;
        if (attydetails_dt !== 0) {
            attydetails_dt.destroy();
        }
        attydetails_dt = $('#attydetails_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_attyDetails",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        var home_tm_list_dt = 0;
        if (home_tm_list_dt !== 0) {
            home_tm_list_dt.destroy();
        }
        home_tm_list_dt = $('#home_tm_list_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/home/get_HomeTMItems",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var tmslist_dt = 0;
        if (tmslist_dt !== 0) {
            tmslist_dt.destroy();
        }
        tmslist_dt = $('#tmslist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/home/get_tmslist",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var timelinelist_dt = 0;
        if (timelinelist_dt !== 0) {
            timelinelist_dt.destroy();
        }
        timelinelist_dt = $('#timelinelist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_timelinelist",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var ailist_dt = 0;
        if (ailist_dt !== 0) {
            ailist_dt.destroy();
        }
        ailist_dt = $('#ailist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/about/get_aboutItems_details",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var faq_qd_list_dt = 0;
        if (faq_qd_list_dt !== 0) {
            faq_qd_list_dt.destroy();
        }
        faq_qd_list_dt = $('#faq_qd_list_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/faq/get_questionDetails",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var qc_catlist_dt = 0;
        if (qc_catlist_dt !== 0) {
            qc_catlist_dt.destroy();
        }
        qc_catlist_dt = $('#qc_catlist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/faq/get_questionCategories",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var patlist_dt = 0;
        if (patlist_dt !== 0) {
            patlist_dt.destroy();
        }
        patlist_dt = $('#patlist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/practice/get_pat_details",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var param = getUrlParam();

        if (param[4] == 'menu') {
            $.ajax({
                url: 'admin.php/header/get_menu_entries',
                method: 'get',
                dataType: 'json',
                success: function (data) {

                    buildMenu($('#menu'), data);
                    // $('#menu').menu();
                }
            });
        }

        var contactuslist_dt = 0;
        if (contactuslist_dt !== 0) {
            contactuslist_dt.destroy();
        }
        contactuslist_dt = $('#contactuslist_dt').DataTable({
            "scrollX": true,
            "processing": true,
            "ajax": "admin.php/contact/get_contactus_details",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var socialiconslist_dt = 0;
        if (socialiconslist_dt !== 0) {
            socialiconslist_dt.destroy();
        }
        socialiconslist_dt = $('#socialiconslist_dt').DataTable({
            "scrollX": true,
            "processing": true,
            "ajax": "admin.php/contact/get_social_details",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
                $("table.dataTable.socialiconslist_dt").removeAttr('style');
                $(".dataTables_scrollHeadInner").removeAttr('style');
            }
        });
        var footer_link_dt = 0;
        if (footer_link_dt !== 0) {
            footer_link_dt.destroy();
        }
        footer_link_dt = $('#footer_link_dt').DataTable({
            "scrollX": true,
            "processing": true,
            "ajax": "admin.php/contact/get_footer_details",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });

        /* Load seo header details for seo page - on load  - start*/
        var param = getUrlParam();

        if (param[4] == 'seo') {
            $.ajax({
                method: "POST",
                url: "admin.php/header/getSEOMenuHeaders"
            }).done(function (msg) {
                if (msg !== '') {
                    var obj = jQuery.parseJSON(msg);
                    if (obj !== 0) {
                        $("#txtSEOGAScript").val(obj[0].sh_ga_script);
                        $("#txtSEOGACode").val(obj[0].sh_ga_code);
                        $("#txtSEORobot").val(obj[0].sh_robot_text);
                    }
                }
            });
        }
        /* Load seo header details for seo page - on load  - end*/
        $(".collapsibleHeading").click(function () {
            $(".hms_collapse").trigger('click');
        });
        $(".collapsibleHeading_contact").click(function () {
            $(".contact_collapse_address").trigger('click');
        });
        $(".collapsibleHeading_social").click(function () {
            $(".contact_collapse_social").trigger('click');
        });
        $(".collapsibleHeading_footerlink").click(function () {
            $(".contact_collapse_footerlink").trigger('click');
        });
        /* Undelete Datatables for dashboard start */
        var ud_hslist_dt = 0;
        if (ud_hslist_dt !== 0) {
            ud_hslist_dt.destroy();
        }
        ud_hslist_dt = $('#ud_hslist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/dashboard/get_deleted_HS_Items",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        var ud_home_tmlist_dt = 0;
        if (ud_home_tmlist_dt !== 0) {
            ud_home_tmlist_dt.destroy();
        }
        ud_home_tmlist_dt = $('#ud_home_tmlist_dt').DataTable({
            "responsive": true, "scrollX": true,
            "processing": true,
            "ajax": "admin.php/dashboard/get_deleted_tmslist",
            "aaSorting": [[2, "desc"]],
            // "sPaginationType": "full_numbers",
            "bServerSide": false,
            "fnDrawCallback": function (oSettings) {
            }
        });
        /* undelete Datatables for dashboard end */

        $("#txtPAButtonLink").val($(".hidden_buttonlink").val()).trigger('change');
        $("#txtHSBBtnLink").val($(".hiddenHSBButtonLink").val()).trigger('change');
        var ctype_onload = $(".hidden_contactType").val();
        if (ctype_onload > 0) {
            $("#txtContactType").val(ctype_onload).trigger('change');
        }
        /* contact us functionality start */
        $("#txtContactName,#txtcontactSocialLink,#txtFooterContent,#txtContactSocialName,#imgContactUpload,#txtContactContent").attr("disabled", "disabled");
        $("#txtContactType").on('change', function () {
            $("#txtContactName,#txtcontactSocialLink,#txtFooterContent,#txtContactSocialName,#imgContactUpload,#txtContactContent").attr("disabled", "disabled");
            if ($(this).val() == 1) { // contact
                $("#txtContactName,#imgContactUpload,#txtContactContent").removeAttr("disabled", "disabled");
            } else if ($(this).val() == 2) { //social
                $("#txtcontactSocialLink,#txtContactSocialName").removeAttr("disabled", "disabled");
            } else if ($(this).val() == 3) { // footer
                $("#txtFooterContent").removeAttr("disabled", "disabled");
            }
        });
        /* contact us functionality end */

        //get Menu details loaded for menu dropdown in menupage
        var parent_id = 0;
        $.ajax({
            method: "POST",
            url: "admin.php/header/getMenuDetails",
            data: {parent_id: parent_id}
        }).done(function (msg) {
            if (msg !== '') {

                //  console.log(msg['menu_details'])
                $(".ddMainMenuOuter").html(msg['menu_details'])
                $(".ddMainMenu").select2();
            }
        });

        /*popuplate disclaimer content */
        //console.log($('textArea#txtDisclaimerContent').attr('value'));
        fillEditor('#txtDisclaimerContent', $('textArea#txtDisclaimerContent').attr('value'));
        $("table.dataTable.socialiconslist_dt").removeAttr('style');
    });
    function addSubMenuDetails(thss) {
        $(".menuModalLabel.name").html('Sub Menu Name');
        $(".menuModalText,.menuModalUrl").val('');
        $(".update_menu_modal").attr('parent_id', $('.ddMainMenu').val());
    }

    function preview_images()
    {
        var total_file = document.getElementById("imgPracticeItemUpload").files.length;
        for (var i = 0; i < total_file; i++)
        {
            $('#pat_image_preview').append("<span class='pat_thumbnail_outer'><img class='pat_thumbnail' src='" + URL.createObjectURL(event.target.files[i]) + "'><span class='del_icon hide'><i class='fa fa-remove'></i></span></span>");
        }
    }
    function get_menuDetails(thss) {
        var selectedMainMenu = $('.ddMainMenu').val();
        $(".confirm_delete_menuItem").attr('parent_id', 0).attr("menu_id", selectedMainMenu);
        $(".confirm_delete_submenuItem").removeAttr('parent_id').removeAttr("menu_id");
        if (selectedMainMenu > 0) {
            $(".btnEditMainMenu,.btnDelMainMenu").removeAttr("disabled");
            $(".btnAddSubMenu,.ddSubMenu").prop("disabled", false);
            $.ajax({
                method: "POST",
                url: "admin.php/header/getMenuDetails",
                data: {parent_id: selectedMainMenu}
            }).done(function (msg) {
                if (msg !== '') {
                    //alert('sub');
                    $(".ddSubMenuOuter").html(msg['menu_details']);
                    $(".ddSubMenu").select2();
                }
            });
        } else {
            $(".btnAddSubMenu,.ddSubMenu").prop("disabled", true);
            $(".btnEditMainMenu,.btnDelMainMenu").prop("disabled", true);
        }
    }

    function get_submenuDetails(thss) {
        var selectedSubMenu = $(thss).val();
        $(".confirm_delete_submenuItem").attr('parent_id', $('.ddMainMenu').val()).attr("menu_id", selectedSubMenu);
        if (selectedSubMenu > 0) {
            $(".btnEditSubMenu,.btnDelSubMenu").prop("disabled", false);
            $(".update_menu_modal").attr('parent_id', $('.ddMainMenu').val());
        } else {
            $(".btnEditSubMenu,.btnDelSubMenu").prop("disabled", true);
        }
    }
    function change_this(thss) {
        info_msg('here');
    }
    function fillEditor(selector, value) {
        var content = $(selector);
        var contentPar = content.parent()
        contentPar.find('.wysihtml5-toolbar').remove()
        contentPar.find('iframe').remove()
        contentPar.find('input[name*="wysihtml5"]').remove()
        content.show()
        $(selector).val(value);
        // $(selector).wysihtml5();
    }
    function disableEditor(selector) {
        var content = $(selector);
        var contentPar = content.parent()
        contentPar.find('.wysihtml5-toolbar').remove()
        contentPar.find('iframe').remove()
        contentPar.find('input[name*="wysihtml5"]').remove()
        content.show()
        $(selector).attr("disabled", "disabled");
        // $(selector).wysihtml5();
    }

    function enableEditor(selector) {
        var content = $(selector);
        var contentPar = content.parent()
        contentPar.find('.wysihtml5-toolbar').remove()
        contentPar.find('iframe').remove()
        contentPar.find('input[name*="wysihtml5"]').remove()
        content.show()
        $(selector).removeAttr("disabled", "disabled");
        $(selector).wysihtml5();
    }

</script>
<script>


    $(function () {


        $('.qc_select2,.practicecategory_select2, #txtHomeSliderBtnLink,#txtPAButtonLink,#txtContactSocialName,#txtHSBBtnLink').select2();
        $('#txtContactType,.ddMainMenu,.ddSubMenu,.ddPagesMenu,#txtattorney,#txtSocialName,#txtExperienceBtnLink,#txtWCUTypeHeadLink').select2();
        $('input.rememberMe').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });

        $("#txtAbtItemContent,#txtHomeContentTMS,#txtHomeTMContent,#txtContentAboutMe,#txtAbtTLSubHeader,#txtanswer,#txtPAContent,#txtAbtAttyContent,#txt_pc_content").wysihtml5();
        $('.my-colorpicker2').colorpicker();
    })
</script>
</body>
</html>