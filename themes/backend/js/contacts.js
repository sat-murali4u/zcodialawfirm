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



function getContactDetails(thss) { // get ContactUs Item details - Edit event
    var c_id = $(thss).attr('c_id');
    var c_type = $(thss).attr('c_type');

    $(".hidden_contactType").val(c_type);

    $.ajax({
        method: "POST",
        url: "admin.php/contact/getContactDetails",
        data: {c_id: c_id, c_type: c_type}
    }).done(function (msg) {
        if (msg !== '')
        {
            disableContactFields();
            var myObj = jQuery.parseJSON(msg);

            if (c_type == 1) { // contact
                $("#txtContactName,#imgContactUpload").removeAttr("disabled", "disabled");
                $('#txtContactContent').prop('disabled',false);
            } else if (c_type == 2) { //social
                $("#txtcontactSocialLink,#txtContactSocialName").removeAttr("disabled", "disabled");
            } else if (c_type == 3) { // footer
                $("#txtFooterContent").removeAttr("disabled", "disabled");
            }
            $('#imgContactPreview').removeAttr("style");
            $('#imgContactLabel').html("CHOOSE FILE");
            $("#txtContactSocialName").val(myObj[0].c_social_name).trigger('change');
            $("#txtContactName").val(myObj[0].c_name);

            $("#txtContactType").val($(".hidden_contactType").val()).trigger('change');
            $("#txtcontactSocialLink").val(myObj[0].c_social_link);
            $('#txtContactContent').val(myObj[0].c_content);



            $('textArea#txtFooterContent').val(myObj[0].c_footer_content);
            if (myObj[0].c_icon !== '') {
                $('#imgContactLabel').html("CHANGE FILE");
                $("#imgContactUpload").attr("value", myObj[0].c_icon);
                $("#imgContactPreview").css("background-image", 'url(' + myObj[0].c_icon + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
            $(".btnUpdateContact").attr("c_id", c_id);
        }
    });
}

function disableContactFields() {
    $("#txtContactName,#txtcontactSocialLink,#txtFooterContent,#txtContactSocialName,#imgContactUpload,#txtContactContent").attr("disabled", "disabled");
    


}

function delContactItems(thss) {
    $('.confirm_delete_contactusItem').attr('c_id', thss.attr('c_id'));
}

function del_contactusDetails(thss) { // delete contact details - from modal
    $.ajax({
        method: "POST",
        url: "admin.php/contact/deleteContactDetail",
        data: {c_id: thss.attr('c_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#contactuslist_dt').DataTable();
            table.ajax.reload();

        } else {
            error_msg("Failed to delete..");
        }
    });
}

function change_dt_contact_status(thss) { // contact details - status change - datatable
    var c_id = $(thss).attr('c_id');
    var c_status = ($(thss).attr('c_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/contact/update_contact_status",
        data: {c_id: c_id, c_status: c_status}
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
        table = $('#contactuslist_dt').DataTable();
        table.ajax.reload();
    });
}

function contact_submit(thss) {
    var error = false;
    var c_id = $(thss).attr('c_id');
    var txtContactType = $("#txtContactType").select2('val');
    var txtContactName = $("#txtContactName").val();
    var txtContactSocialName = $('#txtContactSocialName').val();
    var txtcontactSocialLink = $("#txtcontactSocialLink").val();
    var txtContactContent = $("textArea#txtContactContent").val();
    var txtFooterContent = $("textArea#txtFooterContent").val();
    // var icon = $('#imgContactUpload').prop('files')[0];
    // var bg = $("#imgContactPreview").css("background-image");
    
    if (txtContactType == 0) {
        info_msg('Please select contact type!!');
        error = true;
    }
    //   bg = bg.replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');

    if (txtContactType == 1) {
        if (!txtContactName) {
            info_msg('Contact Name is empty!!');
            error = true;
        } else if (!txtContactContent) {
            info_msg('Contact Content is empty!!');
            error = true;
        }
    } else if (txtContactType == 2) {
        if (txtContactSocialName == 0) {
            info_msg('Please select a Social Name!!');
            error = true;
        } else if (!txtcontactSocialLink) {
            info_msg('Social Link text is empty!!');
            error = true;
        }
    } else if (txtContactType == 3) {
        if (!txtFooterContent) {
            info_msg('Footer content is empty!!');
            error = true;
        }
    }
    if (!txtFooterContent && !txtContactName && (txtContactSocialName === 'null') && !txtcontactSocialLink && !txtContactContent && !txtFooterContent) {
        info_msg('Please fill the details!!');
        error = true;
    } else if (!txtFooterContent && !txtContactName && (typeof txtContactSocialName == 'undefined') && !txtcontactSocialLink && !txtContactContent && !txtFooterContent) {
        info_msg('Please fill the details!!');
        error = true;
    }
//    else if (txtContactSocialName.length < 1) {
//        info_msg('Please fill the details!!');
//        error = true;
//    }
    if (error == false) {
        var form_data = new FormData();
        form_data.append('c_name', txtContactName);
        form_data.append('c_icon', $('#imgContactUpload').prop('files')[0]);
        form_data.append('c_content', txtContactContent);
        form_data.append('c_footer_content', txtFooterContent);
        form_data.append('c_social_name', txtContactSocialName);
        form_data.append('c_social_link', txtcontactSocialLink);
        form_data.append('c_type', txtContactType);
        if (typeof (c_id) !== 'undefined') {
            form_data.append('c_id', c_id);
        } else {
            form_data.append('c_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/contact/update_contact",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtContactName").val("");
                    $("#txtContactContent").val("");
                    clearEditor("#txtFooterContent");
                    $("#txtcontactSocialLink").val("");

                    $("#txtContactSocialName").select2('val', 'Please Select...');
                 //   document.getElementById("imgContactUpload").value = "";
                    $("#imgContactPreview").removeAttr("style");
                    $("#imgContactLabel").html("CHOOSE FILE");
                    $(".btnUpdateContact").removeAttr("c_id");
                    $("#txtContactName,#txtcontactSocialLink,#txtFooterContent,#txtContactSocialName,#imgContactUpload").attr("disabled", "disabled");
                    $('#txtContactContent').prop('disabled',true);
                    $(".hidden_contactType").val('');
                    $("#txtContactType").val(0).trigger('change');
                    success_msg('Contact Details Updated Successfully!!!');
                    var table_c = 0;
                    if (table_c !== 0) {
                        table_c.destroy();
                    }
                    table_c = $('#contactuslist_dt').DataTable();
                    table_c.ajax.reload();
                    
                    var table_s = 0;
                    if (table_s !== 0) {
                        table_s.destroy();
                    }
                    table_s = $('#socialiconslist_dt').DataTable();
                    table_s.ajax.reload();
                    
                    var table_f = 0;
                    if (table_f !== 0) {
                        table_f.destroy();
                    }
                    table_f = $('#footer_link_dt').DataTable();
                    table_f.ajax.reload();
                } else {
                    error_msg('Updation Failed!!!');
                }
            }
        });
    }
}


function gmap_submit(thss) {
    var error = false;
    var txtGMapLat = $("#txtGMapLat").val();
    var txtGMapLong = $("#txtGMapLong").val();
    var txtGMapKey = $('#txtGMapKey').val();
    
    
        if (!txtGMapLat) {
            info_msg('Google Map Latitude is empty!!');
            error = true;
        } else if (!txtGMapLong) {
            info_msg('Google Map Longitude is empty!!');
            error = true;
        } else if (!txtGMapKey) {
            info_msg('Google Map Key is empty!!');
            error = true;
        }
    
    if (error == false) {
        var form_data = new FormData();
        form_data.append('map_long', txtGMapLong);
        form_data.append('map_lat', txtGMapLat);
        form_data.append('map_key', txtGMapKey);
         form_data.append('map_marker_image', $('#imgGMapMarkerUpload').prop('files')[0]);
      
        $.ajax({
            method: "POST",
            url: "admin.php/contact/update_gmap_entry",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Google Map Entries Updated Successfully!!!');
                    
                } else {
                    error_msg('Updation Failed!!!');
                }
            }
        });
    }
}

