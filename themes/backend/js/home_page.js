function clearEditor(selector) {
    var content = $(selector);
    var contentPar = content.parent()
    contentPar.find('.wysihtml5-toolbar').remove()
    contentPar.find('iframe').remove()
    contentPar.find('input[name*="wysihtml5"]').remove()
    content.show()
    $(selector).val('');
    $(selector).wysihtml5();
}
function disclaimer_submit(thss) {     //disclaimer - form_submit - ajax
    var error = false;
    var txtDisclaimerContent = $("textArea#txtDisclaimerContent").val();

    if (!txtDisclaimerContent) {
        info_msg('Disclaimer Content is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('disclaimer_content', txtDisclaimerContent);

        $.ajax({
            method: "POST",
            url: "admin.php/home/update_disclaimer",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Disclaimer Content Updated Successfully!!!');
                } else {
                    error_msg('Testimonial Content not Updated!!!');
                }
            }
        });
    }

}
function home_tms_submit(thss) { //testimonial slider - form_submit - ajax
    var error = false;
    var tms_id = $(thss).attr('tms_id');
    var txtHomeTMSMainHeader = $("#txtHomeTMSMainHeader").val();
    var txtHomeTMSSubHeader = $("#txtHomeTMSSubHeader").val();
    var txtHomeTMSName = $("#txtHomeTMSName").val();
    var txtHomeContentTMS = $("textArea#txtHomeContentTMS").val();
    if (!txtHomeTMSMainHeader) {
        info_msg('Testimonial Header is empty');
        error = true;
    } else if (!txtHomeTMSSubHeader) {
        info_msg('Testimonial Subheader is empty');
        error = true;
    }
    else if (!txtHomeTMSName && !txtHomeTMSMainHeader && !txtHomeTMSSubHeader) {
        info_msg('Testimonial User name is empty');
        error = true;
    } else if (!txtHomeContentTMS && !txtHomeTMSMainHeader && !txtHomeTMSSubHeader) {
        info_msg('Testimonial User Content is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('abt_tm_main_title', txtHomeTMSMainHeader);
        form_data.append('abt_tm_sub_title', txtHomeTMSSubHeader);
        form_data.append('txtHomeTMSName', txtHomeTMSName);
        form_data.append('txtHomeContentTMS', txtHomeContentTMS);
        form_data.append('HomeTMS_image', $('#imgHomeTMSSliderUpload').prop('files')[0]);
        form_data.append('HomeTMS_image_sign', $('#imgHomeTMSSliderSignUpload').prop('files')[0]);
        if (typeof (tms_id) !== 'undefined') {
            form_data.append('tms_id', tms_id);
        } else {
            form_data.append('tms_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/home/update_TMS",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtHomeTMSName").val("");
                    clearEditor("#txtHomeContentTMS");

                    document.getElementById("imgHomeTMSSliderUpload").value = "";
                    $("#imgHomeTMSSliderPreview").removeAttr("style");
                    $("#imgHomeTMSSliderLabel").html("CHOOSE FILE");
                    document.getElementById("imgHomeTMSSliderSignUpload").value = "";
                    $("#imgHomeTMSSliderSignPreview").removeAttr("style");
                    $("#imgHomeTMSSliderSignLabel").html("CHOOSE FILE");

                    $(".btnUpdateTMSlider").removeAttr("tms_id");
                    success_msg('Testimonial Content Updated Successfully!!!');

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#tmslist_dt').DataTable();
                    table.ajax.reload();

                } else {
                    error_msg('Testimonial Content not Updated!!!');
                }
            }
        });
    }
}

function testimonials_submit(thss) { // home testimonials - submit
    var error = false;
    var tm_bg_image = $('#imgHomeTMBGUpload').prop('files')[0];
    var ht_id = $(thss).attr('ht_id');
    var txtTMName = $("#txtTMName").val();
    var txtHomeTMContent = $("textArea#txtHomeTMContent").val();
    if (!txtTMName && !tm_bg_image) {
        info_msg('Testimonial Value is empty');
        error = true;
    } else if (!txtHomeTMContent && !tm_bg_image) {
        info_msg('Testimonial Content is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('txtTMName', txtTMName);
        form_data.append('txtHomeTMContent', txtHomeTMContent);
        form_data.append('testimonial_image', $('#imgHomeTMUpload').prop('files')[0]);
        form_data.append('testimonial_bg_image', $('#imgHomeTMBGUpload').prop('files')[0]);
        if (typeof (ht_id) !== 'undefined') {
            form_data.append('ht_id', ht_id);
        } else {
            form_data.append('ht_id', '');
        }

        $.ajax({
            method: "POST",
            url: "admin.php/home/update_testimonials",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtTMName").val("");
                    clearEditor("#txtHomeTMContent");

                    document.getElementById("imgHomeTMUpload").value = "";
                    $("#imgHomeTMPreview").removeAttr("style");
                    $("#imgHomeTMLabel").html("CHOOSE FILE");
                    $(".btnUpdateTMS").removeAttr("ht_id");
                    success_msg('Testimonial Details Updated Successfully!!!');

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#home_tm_list_dt').DataTable();
                    table.ajax.reload();

                } else {
                    if (tm_bg_image) {
                        success_msg('Testimonial Background Image Updated Successfully!!!');
                    } else {
                        error_msg('Testimonial Details not Updated!!!');
                    }
                }
            }
        });
    }
}

function hsitem_submit(thss) { // home slider - form submit
    var error = false;
    var hs_id = $(thss).attr('hs_id');
    var txtHomeSliderMainHeading = $("#txtHomeSliderMainHeading").val();
    var txtHomeSliderSubHead1 = $("#txtHomeSliderSubHead1").val();
    var txtHomeSliderSubHead2 = $("#txtHomeSliderSubHead2").val();
    var txtHomeSliderBtnText = $("#txtHomeSliderBtnText").val();
    var txtHomeSliderBtnLink = $('#txtHomeSliderBtnLink').select2('val');

    if (!txtHomeSliderMainHeading) {
        info_msg('Main Heading is empty');
        error = true;
    } else if (!txtHomeSliderSubHead1) {
        info_msg('Sub Heading 1 is empty');
        error = true;
    } else if (!txtHomeSliderSubHead2) {
        info_msg('Sub Heading 2 is empty');
        error = true;
    } else if (!txtHomeSliderBtnText) {
        info_msg('Button Text is empty');
        error = true;
    } else if (!txtHomeSliderBtnLink) {
        info_msg('Button Link is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('txtHomeSliderMainHeading', txtHomeSliderMainHeading);
        form_data.append('txtHomeSliderSubHead1', txtHomeSliderSubHead1);
        form_data.append('txtHomeSliderSubHead2', txtHomeSliderSubHead2);
        form_data.append('txtHomeSliderBtnText', txtHomeSliderBtnText);
        form_data.append('txtHomeSliderBtnLink', txtHomeSliderBtnLink);
        form_data.append('hs_bg_image', $('#imgHomeSliderUpload').prop('files')[0]);
        form_data.append('hs_sign_image', $('#imgHomeSliderSignUpload').prop('files')[0]);
        if (typeof (hs_id) !== 'undefined') {
            form_data.append('hs_id', hs_id);
        } else {
            form_data.append('hs_id', '');
        }

        $.ajax({
            method: "POST",
            url: "admin.php/home/update_hs",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Home Slider Details Updated Successfully!!!');

                    $("#txtHomeSliderMainHeading").val('');
                    $("#txtHomeSliderSubHead1").val('');
                    $("#txtHomeSliderSubHead2").val('');
                    $("#txtHomeSliderBtnText").val('');
                    $("#txtHomeSliderBtnLink").select2('val', 0);

                    $("#imgHomeSliderPreview, #imgHomeSliderSignPreview").removeAttr("style");
                    document.getElementById("imgHomeSliderUpload").value = "";
                    document.getElementById("imgHomeSliderSignUpload").value = "";
                    $("#imgHomeSliderLabel, #imgHomeSliderSignLabel").html("CHOOSE FILE");
                    $(".btnUpdateHSItem").removeAttr("hs_id");

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#hslist_dt').DataTable();
                    table.ajax.reload();
                } else {
                    error_msg('Home Slider Details not Updated!!!');
                }
            }
        });
    }
}

function counter_submit(thss) { // home Counter - form submit
    var error = false;
    var hc_id = $(thss).attr('hc_id');

    var txtHomeCounterMainHeading = $("#txtHomeCounterMainHeading").val();
    var txtHomeCounterCount = $("#txtHomeCounterCount").val();
    var txtHomeCounterIconClass = $("#txtHomeCounterIconClass").val();

    if (!txtHomeCounterMainHeading) {
        info_msg('Name is empty');
        error = true;
    } else if (!txtHomeCounterCount) {
        info_msg('Counter Value is  empty');
        error = true;
    } else if (!txtHomeCounterIconClass) {
        info_msg('Image Icon class is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('hc_name', txtHomeCounterMainHeading);
        form_data.append('hc_count', txtHomeCounterCount);
        form_data.append('hc_image_class', txtHomeCounterIconClass);
        form_data.append('hc_image', $('#imgHomeCounterUpload').prop('files')[0]);
        if (typeof (hc_id) !== 'undefined') {
            form_data.append('hc_id', hc_id);
        } else {
            form_data.append('hc_id', '');
        }

        $.ajax({
            method: "POST",
            url: "admin.php/home/update_counter",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Home Counter Details Updated Successfully!!!');

                    $("#txtHomeCounterMainHeading").val('');
                    $("#txtHomeCounterCount").val('');
                    $("#txtHomeCounterIconClass").val('');

                    $("#imgHomeCounterPreview").removeAttr("style");
                    document.getElementById("imgHomeCounterUpload").value = "";
                    $("#imgHomeCounterLabel").html("CHOOSE FILE");
                    $(".btnUpdateHCItem").removeAttr("hc_id");

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#hclist_dt').DataTable();
                    table.ajax.reload();
                } else {
                    error_msg('Home Counter Details not Updated!!!');
                }
            }
        });
    }
}

function hsbitem_submit(thss) { // home slider box - form submit
    var error = false;

    var txtHSBPercentageText = $("#txtHSBPercentageText").val();
    var txtHSBPercentageText1 = $("#txtHSBPercentageText1").val();
    var txtHSBBtnLink = $('#txtHSBBtnLink').select2('val');

    if (!txtHSBPercentageText) {
        info_msg('Percentage text is empty');
        error = true;
    } else if (!txtHSBPercentageText1) {
        info_msg('Text 1 is empty');
        error = true;
    } else if (!txtHSBBtnLink) {
        info_msg('Button Link is empty');
        error = true;
    }
    if (error == false) {
        var form_data1 = new FormData();
        form_data1.append('hsb_percentage', txtHSBPercentageText);
        form_data1.append('hsb_text', txtHSBPercentageText1);
        form_data1.append('hsb_buttonlink', txtHSBBtnLink);
        form_data1.append('hsb_buttonimage', $('#imgHSBButtonImageUpload').prop('files')[0]);


        $.ajax({
            method: "POST",
            url: "admin.php/home/update_hsb",
            data: form_data1, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Home Slider Details Updated Successfully!!!');

                    $("#txtHomeSliderMainHeading").val('');
                    $("#txtHomeSliderSubHead1").val('');
                    $("#txtHomeSliderSubHead2").val('');
                    $("#txtHomeSliderBtnText").val('');
                    $("#txtHomeSliderBtnLink").select2('val', 0);

                    $("#imgHomeSliderPreview, #imgHomeSliderSignPreview").removeAttr("style");
                    document.getElementById("imgHomeSliderUpload").value = "";
                    document.getElementById("imgHomeSliderSignUpload").value = "";
                    $("#imgHomeSliderLabel, #imgHomeSliderSignLabel").html("CHOOSE FILE");
                    $(".btnUpdateHSItem").removeAttr("hs_id");

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#hslist_dt').DataTable();
                    table.ajax.reload();
                } else {
                    error_msg('Home Slider Details not Updated!!!');
                }
            }
        });
    }
}

function change_dt_tms_status(thss) { // temstimonial items - status change - datatable
    var tms_id = $(thss).attr('tms_id');
    var tms_status = ($(thss).attr('tms_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/home/update_tms_status",
        data: {tms_id: tms_id, tms_status: tms_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#tmslist_dt').DataTable();
        table.ajax.reload();
    });
}
function change_dt_hs_status(thss) { //home slider - status change - datatable

    var hs_id = $(thss).attr('hs_id');
    var hs_status = ($(thss).attr('hs_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/home/update_hs_status",
        data: {hs_id: hs_id, hs_status: hs_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#hslist_dt').DataTable();
        table.ajax.reload();
    });
}

function change_dt_hc_status(thss) { //home counter - status change - datatable

    var hc_id = $(thss).attr('hc_id');
    var hc_status = ($(thss).attr('hc_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/home/update_hc_status",
        data: {hc_id: hc_id, hc_status: hc_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#hclist_dt').DataTable();
        table.ajax.reload();
    });
}


function change_dt_ht_status(thss) { //Home Testimonial Items - status change

    var ht_id = $(thss).attr('ht_id');
    var ht_status = ($(thss).attr('ht_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/home/update_ht_status",
        data: {ht_id: ht_id, ht_status: ht_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#home_tm_list_dt').DataTable();
        table.ajax.reload();
    });
}

function delHSItemDetails(thss) {
    $('.confirm_delete_hsItem').attr('hs_id', thss.attr('hs_id'));
}
function delHCItemDetails(thss) {
    $('.confirm_delete_hcItem').attr('hc_id', thss.attr('hc_id'));
}
function getHSItemDetails(thss) { // get Home Slider details
    var hs_id = $(thss).attr('hs_id');
    $.ajax({
        method: "POST",
        url: "admin.php/home/getHSDetails",
        data: {hs_id: hs_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            //console.log(msg);
            var myObj = jQuery.parseJSON(msg);
            $("#txtHomeSliderMainHeading").val(myObj[0].hs_header1);
            $("#txtHomeSliderSubHead1").val(myObj[0].hs_subheader1);
            $("#txtHomeSliderSubHead2").val(myObj[0].hs_subheader2);
            $("#txtHomeSliderBtnText").val(myObj[0].hs_buttontext1);
            $("#txtHomeSliderBtnLink").val(myObj[0].hs_buttonlink1).trigger('change');
            $('#imgHomeSliderLabel, #imgHomeSliderSignLabel').html("CHANGE FILE");
            $("#imgHomeSliderPreview").css("background-image", 'url(' + myObj[0].hs_bgimage + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $("#imgHomeSliderSignPreview").css("background-image", 'url(' + myObj[0].hs_signature + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $(".btnUpdateHSItem").attr("hs_id", myObj[0].hs_id);


        }
    });
}

function getHCItemDetails(thss) { // get Home Counter details
    var hc_id = $(thss).attr('hc_id');

    $.ajax({
        method: "POST",
        url: "admin.php/home/getHCDetails",
        data: {hc_id: hc_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $("#txtHomeCounterMainHeading").val(myObj[0].hc_name);
            $("#txtHomeCounterCount").val(myObj[0].hc_count);
            $("#txtHomeCounterIconClass").val(myObj[0].hc_image_class);
            if (myObj[0].hc_image !== '') {
                $('#imgHomeCounterLabel').html("CHANGE FILE");
                $("#imgHomeCounterPreview").css("background-image", 'url(' + myObj[0].hc_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
            $(".btnUpdateCounterItem").attr("hc_id", myObj[0].hc_id);


        }
    });
}

function delTMSItemDetails(thss) {
    $('.confirm_delete_hts').attr('tms_id', thss.attr('tms_id'));
}
function getTMSItemDetails(thss) { // get Testimonial Slider item details
    var tms_id = $(thss).attr('tms_id');

    $.ajax({
        method: "POST",
        url: "admin.php/home/getTMSDetails",
        data: {tms_id: tms_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);

            $("#txtHomeTMSName").val(myObj[0].tms_name);
            $(".btnUpdateTMSlider").attr("tms_id", myObj[0].tms_id);
            fillEditor('#txtHomeContentTMS', myObj[0].tms_content);
            if (myObj[0].tms_image !== '') {
                $('#imgHomeTMSSliderLabel').html("CHANGE FILE");
                $("#imgHomeTMSSliderPreview").css("background-image", 'url(' + myObj[0].tms_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
            if (myObj[0].tms_image_sign !== '') {
                $('#imgHomeTMSSliderSignLabel').html("CHANGE FILE");
                $("#imgHomeTMSSliderSignPreview").css("background-image", 'url(' + myObj[0].tms_image_sign + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
        }
    });
}
function delHTItemDetails(thss) {
    $('.confirm_delete_htItem').attr('ht_id', thss.attr('ht_id'));
}
function getHTItemDetails(thss) { // get Testimonial Item details
    var ht_id = $(thss).attr('ht_id');

    $.ajax({
        method: "POST",
        url: "admin.php/home/getHTDetails",
        data: {ht_id: ht_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);

            $("#txtTMName").val(myObj[0].ht_value);
            $(".btnUpdateTMS").attr("ht_id", myObj[0].ht_id);
            fillEditor('#txtHomeTMContent', myObj[0].ht_text);
            $('#imgHomeTMLabel').html("CHANGE FILE");
            $("#imgHomeTMPreview").css("background-image", 'url(' + myObj[0].ht_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");

        }
    });
}

function del_testimonial_sliderItem(thss) { // delete testimonial slider item - from modal
    $.ajax({
        method: "POST",
        url: "admin.php/home/deleteTMSDetail",
        data: {tms_id: thss.attr('tms_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#tmslist_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}
function del_hsItem(thss) { // delete home slider item - from modal

    $.ajax({
        method: "POST",
        url: "admin.php/home/deleteHsDetail",
        data: {hs_id: thss.attr('hs_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#hslist_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function del_htItem(thss) { // delete home temstimonial item - from modal
    $.ajax({
        method: "POST",
        url: "admin.php/home/deleteHTDetail",
        data: {ht_id: thss.attr('ht_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#home_tm_list_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}


function aboutConsulting_submit(thss) {     //about consultation  - form_submit - ajax
    var error = false;
    var txtAbtConsultationMainHeader = $("#txtAbtConsultationMainHeader").val();
    var txtAbtConsultationSubHeader = $("#txtAbtConsultationSubHeader").val();
    var txtAbtConsultationFormHeader = $("#txtAbtConsultationFormHeader").val();
    var txtAbtConsultationButtonText = $("#txtAbtConsultationButtonText").val();
    if (!txtAbtConsultationMainHeader) {
        info_msg('Heading Text is empty');
        error = true;
    } else if (!txtAbtConsultationSubHeader) {
        info_msg('Sub Heading Text is empty');
        error = true;
    } else if (!txtAbtConsultationFormHeader) {
        info_msg('Box Heading Text is empty');
        error = true;
    } else if (!txtAbtConsultationButtonText) {
        info_msg('Button Text is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('abt_consult_main_title', txtAbtConsultationMainHeader);
        form_data.append('abt_consult_sub_title', txtAbtConsultationSubHeader);
        form_data.append('abt_consult_form_header', txtAbtConsultationFormHeader);
        form_data.append('abt_consult_button_text', txtAbtConsultationButtonText);
        $.ajax({
            method: "POST",
            url: "admin.php/home/update_consultation",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Consultation Content Updated Successfully!!!');
                } else {
                    error_msg('Consultation Content not Updated!!!');
                }
            }
        });
    }

}