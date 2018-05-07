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

function pa_submit() {
    var error = false;
    var txtPAMainHeader = $("#txtPAMainHeader").val();
    var txtPASubHeader = $("#txtPASubHeader").val();
    var txtPAContent = $("textArea#txtPAContent").val();
    var txtPAButtonText = $("#txtPAButtonText").val();
    var txtPAButtonLink = $('#txtPAButtonLink').select2('val');

    if (!txtPAMainHeader) {
        info_msg('Header text is empty!!');
        error = true;
    } else if (!txtPASubHeader) {
        info_msg('Sub Header text is empty!!');
        error = true;
    } else if (!txtPAContent) {
        info_msg('Content is empty!!');
        error = true;
    } else if (!txtPAButtonText) {
        info_msg('Button Text is empty!!');
        error = true;
    } else if (!txtPAButtonLink) {
        info_msg('Button Link is empty!!');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('pa_mainheader', txtPAMainHeader);
        form_data.append('pa_subheader', txtPASubHeader);
        form_data.append('pa_content', txtPAContent);
        form_data.append('pa_buttontext', txtPAButtonText);
        form_data.append('pa_buttonlink', txtPAButtonLink);
        form_data.append('pa_image', $('#imgPAUpload').prop('files')[0]);
        form_data.append('pa_sideimage', $('#imgPASideUpload').prop('files')[0]);

        $.ajax({
            method: "POST",
            url: "admin.php/practice/update_about_pa",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Updated Successfully!!!');
                } else {
                    error_msg('Updation Failed!!!');
                }
            }
        });
    }
}

function getPATItemDetails(thss) { // get PracticeArea Item details
    var pat_id = $(thss).attr('pat_id');
    $.ajax({
        method: "POST",
        url: "admin.php/practice/getPATDetails",
        data: {pat_id: pat_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $("#txtPATMainHeader").val(myObj[0].pat_header);
            $("#txtPATIcon").val(myObj[0].pat_icon_class);
            //fillEditor('#txtPATContent', myObj[0].pat_content);
            $("#txtPATContent").val(myObj[0].pat_content);
            if (myObj[0].pat_icon !== '') {
                $('#imgPATLabel').html("CHANGE FILE");
                $("#imgPATPreview").css("background-image", 'url(' + myObj[0].pat_icon + ')').css("background-position", 'center').css("background-repeat", 'no-repeat').css("background-size", "contain");
            }
            $(".btnUpdatePAT").attr("pat_id", myObj[0].pat_id);
        }
    });
}
function delPATItemDetails(thss) {
    $('.confirm_delete_patItem').attr('pat_id', thss.attr('pat_id'));
}

function del_patItem(thss) { // delete testimonial slider item - from modal
    $.ajax({
        method: "POST",
        url: "admin.php/practice/deletePATDetail",
        data: {pat_id: thss.attr('pat_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#patlist_dt').DataTable();
            table.ajax.reload();

        } else {
            error_msg("Failed to delete..");
        }
    });
}

function change_dt_pat_status(thss) { // Practice area types - status change in datatable
    var pat_id = $(thss).attr('pat_id');
    var pat_status = ($(thss).attr('pat_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/practice/update_pat_status",
        data: {pat_id: pat_id, pat_status: pat_status}
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
        table = $('#pat_list_dt').DataTable();
        table.ajax.reload();
    });
}

function change_dt_pat_hf_status(thss) { // Practice area types - Home flag status change in datatable
    var pat_id = $(thss).attr('pat_id');
    var pat_home_flag = ($(thss).attr('pat_home_flag') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/practice/update_pat_hf_status",
        data: {pat_id: pat_id, pat_home_flag: pat_home_flag}
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
        table = $('#pat_list_dt').DataTable();
        table.ajax.reload();
    });
}

function pat_submit(thss) {
    var error = false;
    var txtPAMainHeader = $("#txtPATMainHeader").val();
    var txtPATIcon = $("#txtPATIcon").val();
    var txtPATContent = $("#txtPATContent").val();
    var icon = $('#imgPATUpload').prop('files')[0];
    var pat_id = $(thss).attr('pat_id');
    if (!txtPAMainHeader) {
        info_msg('Header text is empty!!');
        error = true;
    } else if (!txtPATContent) {
        info_msg('Content is empty!!');
        error = true;
    } else if (!txtPATIcon) {
        info_msg('Icon Class should not be empty!!');
        error = true;
    }
//    else if (typeof icon == "undefined") {
//        var bg = $("#imgPATPreview").css("background-image");
//        bg = bg.replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');
//        if (bg == '') {
//            info_msg('Please upload an image!!');
//            error = true;
//        }
//    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('pat_header', txtPAMainHeader);
        form_data.append('pat_icon_class', txtPATIcon);
        form_data.append('pat_content', txtPATContent);
        form_data.append('pat_icon', $('#imgPATUpload').prop('files')[0]);
        if (typeof (pat_id) !== 'undefined') {
            form_data.append('pat_id', pat_id);
        } else {
            form_data.append('pat_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/practice/update_about_pat",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtPATMainHeader").val("");
                    $("#txtPATIcon").val("");
                    //clearEditor("#txtPATContent");
                    $("#txtPATContent").val('');
                    document.getElementById("imgPATUpload").value = "";
                    $("#imgPATPreview").removeAttr("style");
                    $("#imgPATLabel").html("CHOOSE FILE");
                    $(".btnUpdatePAT").removeAttr("pat_id");
                    success_msg('Practice Area Item Updated Successfully!!!');

                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#patlist_dt').DataTable();
                    table.ajax.reload();


                } else {
                    error_msg('Updation Failed!!!');
                }
            }
        });
    }
}
/* practice area details functions start */
function pa_details_submit(thss) {
    var error = false;
    var pad_id = $(thss).attr('pad_id');

    var practiceCategory = $('.practicecategory_select2').select2("val");
    var pc_content = $("textArea#txt_pc_content").val();
    if (practiceCategory < 0) {
        info_msg('Please select Practice Category!');
        error = true;
    } else if (!pc_content) {
        info_msg('Content should not be empty!');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('pat_id', practiceCategory);
        form_data.append('pad_content', pc_content);
        var image_file_length = document.getElementById('imgPracticeItemUpload').files.length;
        if (image_file_length > 0) {
            for (var index = 0; index < image_file_length; index++) {
                form_data.append("fileToUpload[]", document.getElementById('imgPracticeItemUpload').files[index]);
            }
        }

        if (typeof (pad_id) !== 'undefined') {
            form_data.append('pad_id', pad_id);
        } else {
            form_data.append('pad_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/practice/update_practiceAreaDetails",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $(".btnUpdateQC").removeAttr("qc_id");
                    $(".practicecategory_select2").select2("val", 0);
                    $("#pat_image_preview").html('');
                    clearEditor("#txt_pc_content");
                    success_msg('Practice Area Details Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#pa_list_dt').DataTable();
                    table.ajax.reload();

                } else {
                    error_msg('Practice Area Details not Updated!!!');
                }
            }
        });
    }

}

function getPAItemDetails(thss) { //getting question category details to edit 
    var pad_id = $(thss).attr('pad_id');
    $.ajax({
        method: "POST",
        url: "admin.php/practice/getPADetails",
        data: {pad_id: pad_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $(".btnUpdatePAT").attr('pad_id', myObj[0].pad_id);
            $(".practicecategory_select2").val(myObj[0].pat_id).trigger('change');
            fillEditor('#txt_pc_content', myObj[0].pad_content);
            var json_string = myObj[0].pad_image;
            var array = $.parseJSON(json_string);
            var thumbnails = '';
            $.each(array, function (index, value)
            {
                thumbnails += '<span class="pat_thumbnail_outer" img_name = "' + value + '"><img class="pat_thumbnail" src="' + value + '"><span class="del_icon open_popup_modal"  data-toggle="modal" data-target="#modal-delete_PracticeAreaItem" pad_id = "' + pad_id + '" img_name = "' + value + '" onclick="delete_thumbnail($(this));"><i class="fa fa-remove"></i></span></span>';
            });
            $("#pat_image_preview").html(thumbnails)
            //$("#txtCatName").val(myObj[0].qc_name);

        }
    });
}

function delPAItemDetails(thss) {
    $('.confirm_delete_PracticeAreaItem').attr('pad_id', thss.attr('pad_id'));
    $('.confirm_delete_PracticeAreaItem').removeAttr('img_name');
}
function delete_thumbnail(thss) {
    $('.confirm_delete_PracticeAreaItem').attr('pad_id', thss.attr('pad_id'));
    $('.confirm_delete_PracticeAreaItem').attr('img_name', thss.attr('img_name'));
}


function del_PracticeAreaItem(thss) { // delete Pracice Area item Image - from modal

    var image = thss.attr('img_name');

    if (typeof image == 'undefined') { // delete practice area details
        $.ajax({
            method: "POST",
            url: "admin.php/practice/deletePADetail",
            data: {pad_id: thss.attr('pad_id')}
        }).done(function (msg) {
            if (msg !== '')
            {
                $('.nobutton').trigger('click');
                success_msg("Deleted Successfully!!!");
                var table = 0;
                if (table != 0) {
                    table.destroy();
                }
                table = $('#pa_list_dt').DataTable();
                table.ajax.reload();

            } else {
                error_msg("Failed to delete..");
            }
        });
    } else { // delete practice area detail - image 
        $.ajax({
            method: "POST",
            url: "admin.php/practice/deletePADetail", async: false,
            data: {pad_id: thss.attr('pad_id'), img_name: thss.attr('img_name')}
        }).done(function (msg) {
            if (msg !== '')
            {
                $('.nobutton').trigger('click');
                success_msg("Image Deleted Successfully!!!");
                $(".pat_thumbnail_outer[img_name='" + thss.attr('img_name') + "']").remove();
                var table = 0;
                if (table != 0) {
                    table.destroy();
                }
                table = $('#pa_list_dt').DataTable();
                table.ajax.reload();
                $.ajax({
                    method: "POST",
                    url: "admin.php/practice/getPADetails", async: false,
                    data: {pad_id: thss.attr('pad_id')}
                }).done(function (msg) {
                    if (msg !== '')
                    {
                        var myObj = jQuery.parseJSON(msg);
                        $(".btnUpdatePAT").attr('pad_id', myObj[0].pad_id);
                        $(".practicecategory_select2").val(myObj[0].pat_id).trigger('change');
                        fillEditor('#txt_pc_content', myObj[0].pad_content);
                        var json_string = myObj[0].pad_image;
                        var array = $.parseJSON(json_string);
                        var thumbnails = '';
                        $.each(array, function (index, value)
                        {
                            thumbnails += '<span class="pat_thumbnail_outer"><img class="pat_thumbnail" src="' + value + '"><span class="del_icon open_popup_modal"  data-toggle="modal" data-target="#modal-delete_PracticeAreaItem" pad_id = "' + thss.attr('pad_id') + '" img_name = "' + value + '" onclick="delete_thumbnail($(this));"><i class="fa fa-remove"></i></span></span>';
                        });
                        $("#pat_image_preview").html(thumbnails)
                    }
                });


            } else {
                error_msg("Failed to delete image..");
            }
        });
    }

}

function change_dt_pad_status(thss) { // Status change for practice area details in datatable
    var pad_id = $(thss).attr('pad_id');
    var pad_status = ($(thss).attr('pad_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/practice/update_pad_status",
        data: {pad_id: pad_id, pad_status: pad_status}
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
        table = $('#pa_list_dt').DataTable();
        table.ajax.reload();
    });
}
/* practice area details ends */