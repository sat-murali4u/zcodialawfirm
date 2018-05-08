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


function attyDetails_submit(thss) {

    var error = false;
    var attyItem_id = $(thss).attr('attyItem_id');
    var txtAttyName = $("#txtAttyName").val();
    var txtAttyDesignation = $("#txtAttyDesignation").val();
    if (!txtAttyName) {
        info_msg('Attorney Name is empty');
        error = true;
    } else if (!txtAttyDesignation) {
        info_msg('Attorney Designation is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('attyItem_name', txtAttyName);
        form_data.append('attyItem_designation', txtAttyDesignation);
        form_data.append('attyItem_image', $('#imgAttyUpload').prop('files')[0]);
        if (typeof (attyItem_id) !== 'undefined') {
            form_data.append('attyItem_id', attyItem_id);
        } else {
            form_data.append('attyItem_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_attorneyDetails",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtAttyName").val("");
                    $("#txtAttyDesignation").val("");
                    document.getElementById("imgAttyUpload").value = "";
                    $("#imgAttyPreview").removeAttr("style");
                    $("#imgAttyLabel").html("CHOOSE FILE");
                    $(".btnUpdateAttyDetails").removeAttr("attyItem_id");
                    success_msg('Attorney Details Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#attydetails_dt').DataTable();
                    table.ajax.reload();
                } else {
                    error_msg('Attorney Details not Updated!!!');
                }
            }
        });
    }
}

function aboutAtty_submit(thss) {

    var error = false;
    var atty_id = $(thss).attr('atty_id');

    var txtAbtAttyHeader = $("#txtAbtAttyHeader").val();
    var txtAbtAttyContent = $("textArea#txtAbtAttyContent").val();
    if (!txtAbtAttyHeader) {
        info_msg('Title is empty');
        error = true;
    } else if (!txtAbtAttyContent) {
        info_msg('Content is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('atty_title_head', txtAbtAttyHeader);
        form_data.append('atty_content', txtAbtAttyContent);
        form_data.append('atty_title_image', $('#imgAbtAttyItemUpload').prop('files')[0]);
        form_data.append('atty_bg_image', $('#imgAbtAttyBGItemUpload').prop('files')[0]);
        if (typeof (atty_id) !== 'undefined') {
            form_data.append('atty_id', atty_id);
        } else {
            form_data.append('atty_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_about_attorney",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
//                    $("#txtAbtAttyHeader").val("");
//                    clearEditor("#txtAbtAttyContent");

//                    document.getElementById("imgAbtAttyItemUpload").value = "";
//                     document.getElementById("imgAbtAttyBGItemUpload").value = "";
//                    $("#imgAbtAttyItemPreview,#imgAbtAttyBGItemPreview").removeAttr("style");
//                    $("#imgAbtAttyItemLabel,#imgAbtAttyBGItemLabel").html("CHOOSE FILE");
//                    $(".btnUpdateAbtAtty").removeAttr("atty_id");
                    success_msg('Attorney Details Updated Successfully!!!');


                } else {
                    error_msg('Attorney Details not Updated!!!');
                }
            }
        });
    }
}

function aboutitem_submit(thss) {
    var error = false;
    var auti_id = $(thss).attr('auti_id');

    var txtAbtUsMainHeader = $("#txtAbtUsMainHeader").val();
    var txtAbtUsMainDesc = $("textArea#txtAbtUsMainDesc").val();

    var txtAbtItemHeader = $("#txtAbtItemHeader").val();
    var txtAbtItemContent = $("#txtAbtItemContent").val();
    if (!txtAbtUsMainHeader) {
        info_msg('About Us Main Header text is empty');
        error = true;
    } else if (!txtAbtUsMainDesc) {
        info_msg('About Us Description is empty');
        error = true;
    } else if (!txtAbtItemHeader && !txtAbtUsMainHeader && !txtAbtUsMainDesc) {
        info_msg('About Item Header text is empty');
        error = true;
    } else if (!txtAbtItemContent && !txtAbtUsMainHeader && !txtAbtUsMainDesc) {
        info_msg('About Item Content is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('au_header_title', txtAbtUsMainHeader);
        form_data.append('au_content', txtAbtUsMainDesc);
        form_data.append('auti_name', txtAbtItemHeader);
        form_data.append('auti_content', txtAbtItemContent);
        form_data.append('auti_image', $('#imgAbtItemUpload').prop('files')[0]);
        form_data.append('au_side_image', $('#imgAbtSideItemUpload').prop('files')[0]);
        if (typeof (auti_id) !== 'undefined') {
            form_data.append('auti_id', auti_id);
        } else {
            form_data.append('auti_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_about_item",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtAbtItemMainHeader,#txtAbtItemHeader").val("");
                    clearEditor("#txtAbtItemContent");

                    document.getElementById("imgAbtItemUpload").value = "";
                    $("#imgAbtItemPreview").removeAttr("style");
                    $("#imgAbtItemLabel").html("CHOOSE FILE");
                    $(".btnUpdateAboutItem").removeAttr("auti_id");
                    success_msg('About Item content Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#ailist_dt').DataTable();
                    table.ajax.reload();


                } else {
                    error_msg('About Item content not Updated!!!');
                }
            }
        });
    }
}

function aboutme_submit() {
    var error = false;
    var txtAbtMainHeader = $("#txtAbtMainHeader").val();
    var txtAbtMainSubHeader = $("#txtAbtMainSubHeader").val();
    var txtAbtHeaderText = $("#txtAbtHeaderText").val();
    var txtAbtSubHeaderText = $("#txtAbtSubHeaderText").val();
    var txtContentAboutMe = $("textArea#txtContentAboutMe").val();
//    var imgAbtSliderPreview = $("#imgAbtSliderPreview").css('background-image');
//    var imgAbtContentPreview = $("#imgAbtSidePreview").css('background-image');

    if (!txtAbtMainHeader) {
        info_msg('Main Header text is empty');
        error = true;
    } else if (!txtAbtMainSubHeader) {
        info_msg('Main Sub Header text is empty');
        error = true;
    } else if (!txtAbtHeaderText) {
        info_msg('Header Text is empty');
        error = true;
    } else if (!txtAbtSubHeaderText) {
        info_msg('Sub Header text is empty');
        error = true;
    } else if (!txtContentAboutMe) {
        info_msg('About me Content text is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('txtAbtMainHeader', txtAbtMainHeader);
        form_data.append('txtAbtMainSubHeader', txtAbtMainSubHeader);
        form_data.append('txtAbtHeaderText', txtAbtHeaderText);
        form_data.append('txtAbtSubHeaderText', txtAbtSubHeaderText);
        form_data.append('txtContentAboutMe', txtContentAboutMe);
        form_data.append('abtSlider_image', $('#imgAbtSliderUpload').prop('files')[0]);
        form_data.append('abtContent_image', $('#imgAbtSideUpload').prop('files')[0]);

        $.ajax({
            method: "POST",
            url: "admin.php/about/update_about_myself",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('About Me content Updated Successfully!!!');
                } else {
                    error_msg('About Me content not Updated!!!');
                }
            }
        });
    }
}


function update_aboutme(thss) {

    var error = false;
    var txtAbtMainHeader = $("#txtAbtMainHeader").val();
    var txtAbtMainSubHeader = $("#txtAbtMainSubHeader").val();
    var txtAbtHeaderText = $("#txtAbtHeaderText").val();
    var txtAbtSubHeaderText = $("#txtAbtSubHeaderText").val();
    var txtContentAboutMe = $("textArea#txtContentAboutMe").val();
    var imgAbtSliderPreview = $("#imgAbtSliderPreview").css('background-image');
    var imgAbtContentPreview = $("#imgAbtSidePreview").css('background-image');
    imgAbtSliderPreview = imgAbtSliderPreview.replace('url(', '').replace(')', '');
    imgAbtContentPreview = imgAbtContentPreview.replace('url(', '').replace(')', '');

    if (!txtAbtMainHeader) {
        info_msg('Main Header text is empty');
        error = true;
    } else if (!txtAbtMainSubHeader) {
        info_msg('Main Sub Header text is empty');
        error = true;
    } else if (!txtAbtHeaderText) {
        info_msg('Header Text is empty');
        error = true;
    } else if (!txtAbtSubHeaderText) {
        info_msg('Sub Header text is empty');
        error = true;
    } else if (!txtContentAboutMe) {
        info_msg('About me Content text is empty');
        error = true;
    }
    if (error == false) {
        var bg = $("#imgAbtSliderPreview").css('background-image');
        bg = bg.replace('url(', '').replace(')', '');
        alert(bg);
        return true;

    }
}

function aboutTL_submit(thss) { // timeline details update - on form_submit action
    var error = false;
    var autli_id = $(thss).attr('autli_id');
    var txtAbtTLMainHeader = $("#txtAbtTLMainHeader").val();
    var txtAbtTLMainSubHeader = $("#txtAbtTLMainSubHeader").val();
    var txtAbtTLFromYear = $("#FromYearTL").val();
    var txtAbtTLToYear = $("#ToYearTL").val();
    var txtAbtTLHeader = $("#txtAbtTLHeader").val();
    var txtAbtTLSubHeader = $("textArea#txtAbtTLSubHeader").val();
    if (!txtAbtTLMainHeader) {
        info_msg('Timeline Main Header text is empty');
        error = true;
    } else if (!txtAbtTLMainSubHeader) {
        info_msg('Timeline Sub Header text is empty');
        error = true;
    } else if (!txtAbtTLFromYear && !txtAbtTLMainHeader && !txtAbtTLMainSubHeader) {
        info_msg('Timeline Start Year is empty');
        error = true;
    } else if (!txtAbtTLToYear && !txtAbtTLMainHeader && !txtAbtTLMainSubHeader) {
        info_msg('Timeline End Year is empty');
        error = true;
    } else if (!txtAbtTLHeader && !txtAbtTLMainHeader && !txtAbtTLMainSubHeader) {
        info_msg('Timeline Header text is empty');
        error = true;
    } else if (!txtAbtTLSubHeader && !txtAbtTLMainHeader && !txtAbtTLMainSubHeader) {
        info_msg('Timeline content is empty');
        error = true;
    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('AbtTLMainHeader', txtAbtTLMainHeader);
        form_data.append('AbtTLMainSubHeader', txtAbtTLMainSubHeader);
        form_data.append('AbtTLFromYear', txtAbtTLFromYear);
        form_data.append('AbtTLToYear', txtAbtTLToYear);
        form_data.append('AbtTLHeader', txtAbtTLHeader);
        form_data.append('AbtTLSubHeader', txtAbtTLSubHeader);
        form_data.append('autli_image', $('#imgAbtTLItemUpload').prop('files')[0]);
        if (typeof (autli_id) !== 'undefined') {
            form_data.append('autli_id', autli_id);
        } else {
            form_data.append('autli_id', '');
        }

        $.ajax({
            method: "POST",
            url: "admin.php/about/update_timeline",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                if (msg !== '') {
                    $("#FromYearTL").val("");
                    $("#ToYearTL").val("");
                    $("#txtAbtTLHeader").val("");
                    clearEditor("#txtAbtTLSubHeader");

                    document.getElementById("imgAbtTLItemUpload").value = "";
                    $("#imgAbtTLItemPreview").removeAttr("style");
                    $("#imgAbtTLItemLabel").html("CHOOSE FILE");
                    $(".btnAddAboutTL").removeAttr("autli_id");
                    success_msg('Testimonial Content Updated Successfully!!!');

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#timelinelist_dt').DataTable();
                    table.ajax.reload();
                }
            }
        });
    }
}
function change_dt_attySkillType_status(thss) {   // status change for Attorney Details
    var atty_st_id = $(thss).attr('atty_st_id');
    var atty_st_status = ($(thss).attr('atty_st_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_attySkillTypes_status",
        data: {atty_st_id: atty_st_id, atty_st_status: atty_st_status}
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
        table = $('#attySkillTypes_dt').DataTable();
        table.ajax.reload();
    });

}
function change_dt_attyDetails_status(thss) {   // status change for Attorney Details
    var attyItem_id = $(thss).attr('attyItem_id');
    var attyItem_status = ($(thss).attr('attyItem_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_attyDetails_status",
        data: {attyItem_id: attyItem_id, attyItem_status: attyItem_status}
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
        table = $('#attydetails_dt').DataTable();
        table.ajax.reload();
    });

}
function change_dt_timeline_status(thss) { // status change for timelines items
    var autli_id = $(thss).attr('autli_id');
    var autli_status = ($(thss).attr('autli_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_timeline_status",
        data: {autli_id: autli_id, autli_status: autli_status}
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
        table = $('#timelinelist_dt').DataTable();
        table.ajax.reload();
    });
}
function change_dt_ai_status(thss) { // status change for about items

    var auti_id = $(thss).attr('auti_id');
    var auti_status = ($(thss).attr('auti_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_ai_status",
        data: {auti_id: auti_id, auti_status: auti_status}
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
        table = $('#ailist_dt').DataTable();
        table.ajax.reload();
    });
}

function delAttyDetails(thss) {
    $('.confirm_delete_attyDetails').attr('attyItem_id', thss.attr('attyItem_id'));
}

function delAttySkillTypes(thss) {
    $('.confirm_delete_attySkillType').attr('atty_st_id', thss.attr('atty_st_id'));
}

function getAttyDetails(thss, dd) { //getting Attorney Details to edit 

    var attyItem_id = '';
    if (typeof dd !== 'undefined') {
        attyItem_id = $('#txtattorney').val();
        $('#txtSocialName').prop('disabled', false).val(0).trigger('change');
    } else {
        attyItem_id = $(thss).attr('attyItem_id');
    }
    if (attyItem_id < 1) {
        $('#txtSocialName').prop('disabled', true).val(0).trigger('change');
    }
    if (attyItem_id > 0) {
        $.ajax({
            method: "POST",
            url: "admin.php/about/getAttorneyDetails",
            data: {attyItem_id: attyItem_id}
        }).done(function (msg) {
            if (msg !== '')
            {
                var myObj = jQuery.parseJSON(msg);
                $("#txtAttyName").val(myObj[0].attyItem_name);
                $('#txtAttyDesignation').val(myObj[0].attyItem_designation);
                $(".btnUpdateAttyDetails").attr("attyItem_id", myObj[0].attyItem_id);
                if (myObj[0].attyItem_image !== '') {
                    $('#imgAttyLabel').html("CHANGE FILE");
                    $("#imgAttyPreview").css("background-image", 'url(' + myObj[0].attyItem_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
                }
            }
        });
    }
}


function getAttySocialDetails(thss) { //getting Attorney's Social Details to edit 

    var attyItem_id = $('#txtattorney').val();
    var attySocial_id = $('#txtSocialName').val();
    $("#txtSocialLink").val('');
    if (attyItem_id > 0 && attySocial_id > 0) {
        $.ajax({
            method: "POST",
            url: "admin.php/about/getAttorneySocialDetails",
            data: {attyItem_id: attyItem_id, social_id: attySocial_id},
            success: function (msg) {

                if (!$.isNumeric(msg))
                {
                    var myObj = jQuery.parseJSON(msg);
                    if (typeof myObj !== false) {
                        $("#txtSocialLink").val(myObj[0].attySocialLink);
                    }
                }
            }
        });
    }
}
function delTimelineItemDetails(thss) {
    $('.confirm_delete_hts').attr('autli_id', thss.attr('autli_id'));
}

function getTimelineItemDetails(thss) { //getting timeline item details to edit 
    var autli_id = $(thss).attr('autli_id');
    $.ajax({
        method: "POST",
        url: "admin.php/about/getTimelineItemDetails",
        data: {autli_id: autli_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $("#FromYearTL").val(myObj[0].autli_fromyear);
            $('#ToYearTL').val(myObj[0].autli_toyear);
            $("#txtAbtTLHeader").val(myObj[0].autli_head);
            $(".btnAddAboutTL").attr("autli_id", myObj[0].autli_id);
            fillEditor('#txtAbtTLSubHeader', myObj[0].autli_content); //imgAbtTLItemUpload
            if (myObj[0].autli_image !== '') {
                $('#imgAbtTLItemLabel').html("CHANGE FILE");
                $("#imgAbtTLItemPreview").css("background-image", 'url(' + myObj[0].autli_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
        }
    });
}
function delItemDetails(thss) {
    $('.confirm_delete_aboutItem').attr('auti_id', thss.attr('auti_id'));
}
function getItemDetails(thss) { //getting aboutus item details to edit
    var auti_id = $(thss).attr('auti_id');
    $.ajax({
        method: "POST",
        url: "admin.php/about/getItemDetails",
        data: {auti_id: auti_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            // console.log(msg);
            var myObj = jQuery.parseJSON(msg);
            $("#txtAbtItemHeader").val(myObj[0].auti_name)
            $('#imgAbtItemPreview').css("background-image", 'url(' + myObj[0].auti_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            $(".btnUpdateAboutItem").attr("auti_id", myObj[0].auti_id);
            fillEditor('#txtAbtItemContent', myObj[0].auti_content);
            // $("#txtAbtItemMainHeader").val(myObj[0].auti_image);
        }
    });
}

function del_attyDetail(thss) {    // delete Attorney Detail - modal confirmation

    $.ajax({
        method: "POST",
        url: "admin.php/about/deleteAttyDetail",
        data: {attyitem_id: thss.attr('attyitem_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#attydetails_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}
function del_timelineItem(thss) {// delete timeline item - modal confirmation
    $.ajax({
        method: "POST",
        url: "admin.php/about/deleteTimelineDetail",
        data: {autli_id: thss.attr('autli_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#timelinelist_dt').DataTable();
            table.ajax.reload();



            //  table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}


function del_aboutItem(thss) { // delete About item - modal confirmation
    $.ajax({
        method: "POST",
        url: "admin.php/about/deleteAbtItemDetail",
        data: {auti_id: thss.attr('auti_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#ailist_dt').DataTable();
            table.ajax.reload();



            //  table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function attySocialDetails_submit(thss) {
    var error = false;
    var s_id = $(thss).attr('s_id');
    var a_id = $(thss).attr('a_id');
    var txtattorney = $('#txtattorney').val(); //attorney_id
    var txtSocialName = $("#txtSocialName").val(); // social dropdown id
    var txtSocialLink = $("#txtSocialLink").val(); // attorney social link
    if (txtattorney < 1) {
        info_msg('Please select the Attorney.');
        error = true;
    } else if (!txtSocialName) {
        info_msg('Please select the Social Name.');
        error = true;
    } else if (!txtSocialLink) {
        info_msg('Social Link should not be empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('attyItem_id', txtattorney);
        form_data.append('social_id', txtSocialName);
        form_data.append('attySocialLink', txtSocialLink);
        if (typeof (s_id) !== 'undefined') {
            form_data.append('s_id', s_id);
        } else {
            form_data.append('s_id', '');
        }
        if (typeof (a_id) !== 'undefined') {
            form_data.append('a_id', a_id);
        } else {
            form_data.append('a_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_attorneySocialDetails",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtAttyName").val("");
                    // $("#txtAttyDesignation").val("");
                    //    document.getElementById("imgAttyUpload").value = "";
                    //    $("#imgAttyPreview").removeAttr("style");
                    // $("#imgAttyLabel").html("CHOOSE FILE");
                    $(".btnUpdateAttyDetails").removeAttr("attyItem_id");
                    success_msg('Attorney Details Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#attydetails_dt').DataTable();
                    table.ajax.reload();
                } else {
                    error_msg('Attorney Details not Updated!!!');
                }
            }
        });
    }
}


function attySkills_submit(thss) {
    var error = false;
    var atty_st_id = $(thss).attr('atty_st_id');

    var txtAttySkillHeader = $("#txtAttySkillHeader").val();
    var txtAttySkillDescription = $("textArea#txtAttySkillDescription").val();
    var txtAttySkillType = $("#txtAttySkillType").val();
    var txtAttyTransitionGoal = $("#txtAttyTransitionGoal").val();
    var txtAttySkillStartColor = $("#txtAttySkillStartColor").val();
    var txtAttySkillEndColor = $("#txtAttySkillEndColor").val();
    if (!txtAttySkillHeader) {
        info_msg('Skill Header is empty');
        error = true;
    } else if (!txtAttySkillDescription) {
        info_msg('Skill Description is empty');
        error = true;
    } else if (!txtAttySkillStartColor) {
        info_msg('Starting color should not be empty');
        error = true;
    } else if (!txtAttySkillEndColor) {
        info_msg('Ending Color should not be empty');
        error = true;
    }
//    else if (!txtAttySkillType) {
//        info_msg('Skill Type is empty');
//        error = true;
//    } else if (!txtAttyTransitionGoal) {
//        info_msg('Skill Goal is empty');
//        error = true;
//    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('atty_skill_name', txtAttySkillHeader);
        form_data.append('atty_skill_desc', txtAttySkillDescription);
        form_data.append('atty_st_name', txtAttySkillType);
        form_data.append('atty_st_goal', txtAttyTransitionGoal);
        form_data.append('atty_skill_bg_image', $('#imgAttySkillBGUpload').prop('files')[0]);
        form_data.append('atty_st_start_color', txtAttySkillStartColor);
        form_data.append('atty_st_end_color', txtAttySkillEndColor);
        form_data.append('atty_st_image', $('#imgAttySkillTypeUpload').prop('files')[0]);

        if (typeof (atty_st_id) !== 'undefined') {
            form_data.append('atty_st_id', atty_st_id);
        } else {
            form_data.append('atty_st_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_attorney_skills",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtAttySkillType").val("");
                    $("#txtAttySkillStartColor").val("").trigger('change');
                    $("#txtAttySkillEndColor").val("").trigger('change');
                    $(".my-colorpicker2 .input-group-addon").removeAttr('style');
                    $("#txtAttyTransitionGoal").val("");
                    document.getElementById("imgAttySkillTypeUpload").value = "";
                    $("#imgAttySkillTypePreview").removeAttr("style");
                    $("#imgAttySkillTypeLabel").html("CHOOSE FILE");
                    $(".btnUpdateAttorneySkills").removeAttr("atty_st_id");
                    success_msg('Attorney Skills Details Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#attySkillTypes_dt').DataTable();
                    table.ajax.reload();


                } else {
                    error_msg('Attorney Skills Details not Updated!!!');
                }
            }
        });
    }


}

function getAttySkillTypes(thss) {     //getting Attorney's Social Details to edit 

    var atty_st_id = $(thss).attr('atty_st_id');
    if (atty_st_id > 0) {
        $.ajax({
            method: "POST",
            url: "admin.php/about/getAttorneySkillTypes",
            data: {atty_st_id: atty_st_id},
            success: function (msg) {

                if (!$.isNumeric(msg))
                {
                    var myObj = jQuery.parseJSON(msg);
                    if (typeof myObj !== false) {
                        $("#txtAttySkillType").val(myObj[0].atty_st_name);
                        $("#txtAttySkillStartColor").val(myObj[0].atty_st_start_color).trigger('change');
                        $("#txtAttySkillEndColor").val(myObj[0].atty_st_end_color).trigger('change');
                        $("#txtAttyTransitionGoal").val(myObj[0].atty_st_goal);
                        $('.btnUpdateAttorneySkills').attr('atty_st_id', atty_st_id);
                        if (myObj[0].atty_st_image !== '') {
                            $('#imgAttySkillTypeLabel').html("CHANGE FILE");
                            $("#imgAttySkillTypePreview").css("background-image", 'url(' + myObj[0].atty_st_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
                        }
                    }
                }
            }
        });
    }
}


function attyExperience_submit(thss) {
    var error = false;
    var atty_et_id = $(thss).attr('atty_et_id');

    var txtAttyExperienceHeader = $("#txtAttyExperienceHeader").val();
    var txtAttyExperienceDescription = $("textArea#txtAttyExperienceDescription").val();
    var txtExperienceBtnLink = $("#txtExperienceBtnLink").val();


    if (!txtAttyExperienceHeader) {
        info_msg('Experience Header is empty');
        error = true;
    } else if (!txtAttyExperienceDescription) {
        info_msg('Experience Description is empty');
        error = true;
    }
//    else if (txtExperienceBtnLink < 1) {
//        info_msg('Please select the button url');
//        error = true;
//    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('atty_exp_name', txtAttyExperienceHeader);
        form_data.append('atty_exp_desc', txtAttyExperienceDescription);
        form_data.append('atty_et_link', txtExperienceBtnLink);
        form_data.append('atty_exp_bg_image', $('#imgAttyExperienceBGUpload').prop('files')[0]);
        form_data.append('atty_exp_sign_image', $('#imgAttyExperienceSignUpload').prop('files')[0]);
        form_data.append('atty_et_image', $('#imgAttyExperienceTypeUpload').prop('files')[0]);

        if (typeof (atty_et_id) !== 'undefined') {
            form_data.append('atty_et_id', atty_et_id);
        } else {
            form_data.append('atty_et_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_attorney_experience",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtExperienceBtnLink").val(0).trigger('change');

                    document.getElementById("imgAttyExperienceTypeUpload").value = "";
                    $("#imgAttyExperienceTypePreview").removeAttr("style");
                    $("#imgAttyExperienceTypeLabel").html("CHOOSE FILE");
                    $(".btnUpdateAttorneyExperiences").removeAttr("atty_et_id");
                    success_msg('Attorney Experiences Details Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#attyExperienceTypes_dt').DataTable();
                    table.ajax.reload();


                } else {
                    error_msg('Attorney Experiences Details not Updated!!!');
                }
            }
        });
    }


}

function getAttyExperienceTypes(thss) {     //getting Attorney's Social Details to edit 

    var atty_et_id = $(thss).attr('atty_et_id');
    if (atty_et_id > 0) {
        $.ajax({
            method: "POST",
            url: "admin.php/about/getAttorneyExperienceTypes",
            data: {atty_et_id: atty_et_id},
            success: function (msg) {

                if (!$.isNumeric(msg))
                {
                    var myObj = jQuery.parseJSON(msg);
                    if (typeof myObj !== false) {
                        $("#txtExperienceBtnLink").val(myObj[0].atty_et_link).trigger('change');

                        $('.btnUpdateAttorneyExperience').attr('atty_et_id', atty_et_id);
                        if (myObj[0].atty_et_image !== '') {
                            $('#imgAttyExperienceTypeLabel').html("CHANGE FILE");
                            $("#imgAttyExperienceTypePreview").css("background-image", 'url(' + myObj[0].atty_et_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
                        }
                    }
                }
            }
        });
    }
}

function change_dt_attyExperienceType_status(thss) {   // status change for Attorney Details
    var atty_et_id = $(thss).attr('atty_et_id');
    var atty_et_status = ($(thss).attr('atty_et_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_attyExperienceTypes_status",
        data: {atty_et_id: atty_et_id, atty_et_status: atty_et_status}
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
        table = $('#attyExperienceTypes_dt').DataTable();
        table.ajax.reload();
    });

}

function delAttyExperienceTypes(thss) {
    $('.confirm_delete_attyExperienceType').attr('atty_et_id', thss.attr('atty_et_id'));
}

function del_attyExperienceItem(thss) {    // delete Attorney Detail - modal confirmation

    $.ajax({
        method: "POST",
        url: "admin.php/about/deleteAttyExperienceType",
        data: {atty_et_id: thss.attr('atty_et_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#attyExperienceTypes_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function WCU_submit(thss) {

    var error = false;
    var wcu_type_id = $(thss).attr('wcu_type_id');

    var txtWCUHeader = $("#txtWCUHeader").val();
    var txtWCUDesc = $("textArea#txtWCUDesc").val();
    var txtWCUImageClass = $("#txtWCUImageClass").val();
    var txtWCUTypeIcon = $("#txtWCUTypeIcon").val();
    var txtWCUBoxHeading = $("#txtWCUBoxHeading").val();
    var txtWCUBoxDesc = $("#txtWCUBoxDesc").val();
    var txtWCUTypeHeader = $("#txtWCUTypeHead").val();
    var txtWCUTypeHeadLink = $("#txtWCUTypeHeadLink").val();
    var txtWCUTypeDesc = $("textArea#txtWCUTypeDesc").val();
    if (!txtWCUHeader) {
        info_msg('WCU Header text is empty');
        error = true;
    } else if (!txtWCUDesc) {
        info_msg('WCU Description is empty');
        error = true;
    } else if (!txtWCUImageClass) {
        info_msg('Image Class is empty');
        error = true;
    } else if (!txtWCUBoxHeading) {
        info_msg('Box Heading is empty');
        error = true;
    } else if (!txtWCUBoxDesc) {
        info_msg('Box Description is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('wcu_head', txtWCUHeader);
        form_data.append('wcu_desc', txtWCUDesc);
        form_data.append('wcu_box_image', txtWCUImageClass);
        form_data.append('wcu_type_icon', txtWCUTypeIcon);
        form_data.append('wcu_box_head', txtWCUBoxHeading);
        form_data.append('wcu_box_desc', txtWCUBoxDesc);
        form_data.append('wcu_type_name', txtWCUTypeHeader);
        form_data.append('wcu_type_name_hl', txtWCUTypeHeadLink);
        form_data.append('wcu_type_desc', txtWCUTypeDesc);
        form_data.append('wcu_image', $('#imgWCUBGUpload').prop('files')[0]);
        form_data.append('wcu_type_image', $('#imgWCUTypeUpload').prop('files')[0]);
        if (typeof (wcu_type_id) !== 'undefined') {
            form_data.append('wcu_type_id', wcu_type_id);
        } else {
            form_data.append('wcu_type_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_wcu",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtWCUTypeHead, #txtWCUTypeDesc,#txtWCUTypeIcon").val("");
                    $("#txtWCUTypeHeadLink").val(0).trigger('change');
                    document.getElementById("imgWCUTypeUpload").value = "";
                    $("#imgWCUTypePreview").removeAttr("style");
                    $("#imgWCUTypeLabel").html("CHOOSE FILE");
                    $(".btnUpdateWCU").removeAttr("wcu_type_id");
                    success_msg('WCU Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#wcutypelist_dt').DataTable();
                    table.ajax.reload();


                } else {
                    error_msg('WCU not Updated!!!');
                }
            }
        });
    }
}

function change_dt_wcuType_status(thss) {   // status change for WCUType Details
    var wcu_type_id = $(thss).attr('wcu_type_id');
    var wcu_type_status = ($(thss).attr('wcu_type_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/about/update_WCUTypeStatus",
        data: {wcu_type_id: wcu_type_id, wcu_type_status: wcu_type_status}
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
        table = $('#wcutypelist_dt').DataTable();
        table.ajax.reload();
    });

}

function getWCUTypes(thss) { //getting WCU Details to edit 
    var wcu_type_id = $(thss).attr('wcu_type_id');

    if (wcu_type_id > 0) {
        $.ajax({
            method: "POST",
            url: "admin.php/about/getWCUDetails",
            data: {wcu_type_id: wcu_type_id}
        }).done(function (msg) {
            if (msg !== '')
            {
                var myObj = jQuery.parseJSON(msg);
                $("#txtWCUTypeHead").val(myObj[0].wcu_type_name);
                $('#txtWCUTypeDesc').val(myObj[0].wcu_type_desc);
                $('#txtWCUTypeHeadLink').val(myObj[0].wcu_type_name_hl).trigger('change');
                $('#txtWCUTypeIcon').val(myObj[0].wcu_type_icon);
                $(".btnUpdateWCU").attr("wcu_type_id", myObj[0].wcu_type_id);
                if (myObj[0].wcu_type_image !== '') {
                    $('#imgWCUTypeLabel').html("CHANGE FILE");
                    $("#imgWCUTypePreview").css("background-image", 'url(' + myObj[0].wcu_type_image + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
                }
            }
        });
    }
}

function delWCUTypes(thss) {
    $('.confirm_delete_WCUType').attr('wcu_type_id', thss.attr('wcu_type_id'));
}

function del_WCUTypeItem(thss) {    // delete WCU Type Detail - modal confirmation

    $.ajax({
        method: "POST",
        url: "admin.php/about/deleteWCUTypeDetail",
        data: {wcu_type_id: thss.attr('wcu_type_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#wcutypelist_dt').DataTable();
            table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function aboutAttyBC_submit(thss) {

    var error = false;
    var atty_bc_id = $(thss).attr('atty_bc_id');

    var txtAbtAttyBCHeader = $("#txtAbtAttyBCHeader").val();
    if (!txtAbtAttyBCHeader) {
        info_msg('Breadcrumb Header is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('atty_bc_header', txtAbtAttyBCHeader);
        form_data.append('atty_bc_bg_image', $('#imgAbtAttyBCBGUpload').prop('files')[0]);
        if (typeof (atty_bc_id) !== 'undefined') {
            form_data.append('atty_bc_id', atty_bc_id);
        } else {
            form_data.append('atty_bc_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/about/update_attorney_bc",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
//                    $("#txtAbtAttyHeader").val("");
//                    clearEditor("#txtAbtAttyContent");

//                    document.getElementById("imgAbtAttyItemUpload").value = "";
//                     document.getElementById("imgAbtAttyBGItemUpload").value = "";
//                    $("#imgAbtAttyItemPreview,#imgAbtAttyBGItemPreview").removeAttr("style");
//                    $("#imgAbtAttyItemLabel,#imgAbtAttyBGItemLabel").html("CHOOSE FILE");
//                    $(".btnUpdateAbtAtty").removeAttr("atty_id");
                    success_msg('Attorney Details Updated Successfully!!!');


                } else {
                    error_msg('Attorney Details not Updated!!!');
                }
            }
        });
    }
}