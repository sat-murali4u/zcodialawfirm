/* Question Category start */
function category_submit(thss) {
    var error = false;
    var qc_id = $(thss).attr('qc_id');

    var txtCatName = $("#txtCatName").val();
    if (!txtCatName) {
        info_msg('Category Name is empty');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('txtCatName', txtCatName);
        if (typeof (qc_id) !== 'undefined') {
            form_data.append('qc_id', qc_id);
        } else {
            form_data.append('qc_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/faq/update_qc",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $("#txtCatName").val("");
                    $(".btnUpdateQC").removeAttr("qc_id");
                    success_msg('Question Category Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#qc_catlist_dt').DataTable();
                    table.ajax.reload();

                } else {
                    error_msg('Question Category not Updated!!!');
                }
            }
        });
    }
}

function getQCDetails(thss) { //getting question category details to edit 
    var qc_id = $(thss).attr('qc_id');
    $.ajax({
        method: "POST",
        url: "admin.php/faq/getQCDetails",
        data: {qc_id: qc_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $("#txtCatName").val(myObj[0].qc_name);

        }
    });
}

function getQDDetails(thss) { //getting question details to edit 
    var qd_id = $(thss).attr('qd_id');
    $.ajax({
        method: "POST",
        url: "admin.php/faq/getQDDetails",
        data: {qd_id: qd_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            //$('.qc_select2').select2(myObj[0].qc_id);
            $(".qc_select2").select2("val", myObj[0].qc_id);
            $('#txtquestion').val(myObj[0].qd_question);
            $(".btnUpdateQD").attr("qd_id", qd_id);
            fillEditor('textArea#txtanswer', myObj[0].qd_answer);
        }
    });
}

function delQCDetails(thss) {
    $('.confirm_delete_QC').attr('qc_id', thss.attr('qc_id'));
}
function delQDDetails(thss) {
    $('.confirm_delete_QD').attr('qd_id', thss.attr('qd_id'));
}
function del_qcItem(thss) { // delete question category item - modal confirmation
    $.ajax({
        method: "POST",
        url: "admin.php/faq/deleteQCDetail",
        data: {qc_id: thss.attr('qc_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Question Category Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#qc_catlist_dt').DataTable();
            table.ajax.reload();

            //  table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function change_dt_qc_status(thss) { // status change for question category items
    var qc_id = $(thss).attr('qc_id');
    var qc_status = ($(thss).attr('qc_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/faq/update_QC_status",
        data: {qc_id: qc_id, qc_status: qc_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change the Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#qc_catlist_dt').DataTable();
        table.ajax.reload();
    });
}

function change_dt_qd_status(thss) { // status change for question details
    var qd_id = $(thss).attr('qd_id');

    var qd_status = ($(thss).attr('qd_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/faq/update_QD_status",
        data: {qd_id: qd_id, qd_status: qd_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change the Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#faq_qd_list_dt').DataTable();
        table.ajax.reload();
    });
}
function quedetails_submit(thss) {
    var error = false;
    var qd_id = $(thss).attr('qd_id');

    var questionCategory = $('.qc_select2').select2("val");
    var txtquestion = $("#txtquestion").val();
    var txtanswer = $("textArea#txtanswer").val();
    if (questionCategory == 0) {
        info_msg('Please select Question Category!');
        error = true;
    } else if (!txtquestion) {
        info_msg('Question should not be empty!');
        error = true;
    } else if (!txtanswer) {
        info_msg('Answer should not be empty!');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('qc_id', questionCategory);
        form_data.append('qd_question', txtquestion);
        form_data.append('qd_answer', txtanswer);
        if (typeof (qd_id) !== 'undefined') {
            form_data.append('qd_id', qd_id);
        } else {
            form_data.append('qd_id', '');
        }
        $.ajax({
            method: "POST",
            url: "admin.php/faq/update_faqDetails",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $(".btnUpdateQC").removeAttr("qc_id");
                    $(".qc_select2").select2("val", 0);
                    $('#txtquestion').val('');
                    clearEditor("#txtanswer");
                    success_msg('Question & Answer Updated Successfully!!!');
                    var table = 0;
                    if (table != 0) {
                        table.destroy();
                    }
                    table = $('#faq_qd_list_dt').DataTable();
                    table.ajax.reload();

                } else {
                    error_msg('Question & Answer not Updated!!!');
                }
            }
        });
    }

}

function getQCDetails(thss) { //getting question category details to edit 
    var qc_id = $(thss).attr('qc_id');
    $.ajax({
        method: "POST",
        url: "admin.php/faq/getQCDetails",
        data: {qc_id: qc_id}
    }).done(function (msg) {
        if (msg !== '')
        {
            var myObj = jQuery.parseJSON(msg);
            $("#txtCatName").val(myObj[0].qc_name);

        }
    });
}

function delQCDetails(thss) {
    $('.confirm_delete_QC').attr('qc_id', thss.attr('qc_id'));
}
function delQCDetails(thss) {
    $('.confirm_delete_QD').attr('qd_id', thss.attr('qd_id'));
}

function del_qcItem(thss) { // delete question category item - modal confirmation
    $.ajax({
        method: "POST",
        url: "admin.php/faq/deleteQCDetail",
        data: {qc_id: thss.attr('qc_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Question Category Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#qc_catlist_dt').DataTable();
            table.ajax.reload();

            //  table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function del_qdItem(thss) { // delete question item - modal confirmation
    $.ajax({
        method: "POST",
        url: "admin.php/faq/deleteQDDetail",
        data: {qd_id: thss.attr('qd_id')}
    }).done(function (msg) {
        if (msg !== '')
        {
            $('.nobutton').trigger('click');
            success_msg("Question & Answers Deleted Successfully!!!");
            var table = 0;
            if (table != 0) {
                table.destroy();
            }
            table = $('#faq_qd_list_dt').DataTable();
            table.ajax.reload();

            //  table.ajax.reload();
        } else {
            error_msg("Failed to delete..");
        }
    });
}

function change_dt_qc_status(thss) { // status change for question category items
    var qc_id = $(thss).attr('qc_id');
    var qc_status = ($(thss).attr('qc_status') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/faq/update_QC_status",
        data: {qc_id: qc_id, qc_status: qc_status}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Status changed successfully');
        } else {
            error_msg('Failed to change the Status');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#qc_catlist_dt').DataTable();
        table.ajax.reload();
    });
}

/* Question Details end */
$('.qc_select2').change(function () {
    // info_msg('changed:' + $(this).val());
});

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
