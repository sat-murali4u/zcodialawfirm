// home slider undelete action

function change_dt_hs_delete(thss) { // status change for timelines items
    var hs_id = $(thss).attr('hs_id');
    var hs_deleted = ($(thss).attr('hs_deleted') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/dashboard/update_hs_delete",
        data: {hs_id: hs_id, hs_deleted: hs_deleted}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Undeleted successfully!!!');
        } else {
            error_msg('Unable to recover!!');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#ud_hslist_dt').DataTable();
        table.ajax.reload();
    });
}

function change_dt_tms_deleted(thss){
    var tms_id = $(thss).attr('tms_id');
    var tms_deleted = ($(thss).attr('tms_deleted') == 1 ? 0 : 1);
    $.ajax({
        method: "POST",
        url: "admin.php/dashboard/update_tms_delete",
        data: {tms_id: tms_id, tms_deleted: tms_deleted}
    }).done(function (msg) {
        if (msg !== '')
        {
            success_msg('Undeleted successfully!!!');
        } else {
            error_msg('Unable to recover!!');
        }
        var table = 0;
        if (table != 0) {
            table.destroy();
        }
        table = $('#ud_home_tmlist_dt').DataTable();
        table.ajax.reload();
    });
}