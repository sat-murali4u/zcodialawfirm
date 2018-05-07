

$(".btnAddMainMenu").click(function () {


//    console.log($('.ddMainMenu').search[0].value);
});
$(".btnEditMainMenu,.btnDelMainMenu").click(function () {
    $(".update_menu_modal").attr("menu_id", $('.ddMainMenu').val()).attr("parent_id", 0);
});

function buildMenu(parent, items) {
    $.each(items, function () {

        var li = $('<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="' + this.url + '">' + this.menu_text + '</a></li>');
        li.appendTo(parent);
        if (this.List && this.List.length > 0)
        {
            var ul = $('<ul class="dropdown-menu"></ul>');
            ul.appendTo(li);
            buildMenu(ul, this.List);
        }
    });
}

function addMainMenuDetails(thss) {
    $(".menuModalLabel.name").html('Menu Name');
    $(".menuModalText,.menuModalUrl").val('');
    $(".update_menu_modal").removeAttr("menu_id").attr('parent_id', 0);
}
function addSubMenuDetails(thss) {
    $(".menuModalLabel").html('Sub Menu Name');
    $(".menuModalText,.menuModalUrl").val('');
}
function getMainMenuDetails(thss) {
    var data = $('.ddMainMenu').select2('data');
    $(".menuModalLabel.name").html('Main Menu')
    $(".menuModalText").val(data[0].text);
    $(".menuModalUrl").val($(".ddMainMenu").select2().find(":selected").attr("url"));
    $(".update_menu_modal").attr("menu_id", $('.ddMainMenu').val());
}

function getSubMenuDetails(thss) {
    var data = $('.ddSubMenu').select2('data');
    $(".menuModalLabel.name").html('Sub Menu')
    $(".menuModalText").val(data[0].text);
    $(".menuModalUrl").val($(".ddSubMenu").select2().find(":selected").attr("url"));
    $(".update_menu_modal").attr("menu_id", $('.ddSubMenu').val());
}

function del_menuItem(thss) {
    var error = false;
    var menu_id = $(thss).attr('menu_id');
    var parent_id = $(thss).attr('parent_id');
    if (!menu_id) {
        info_msg('Menu Name Should be selected!!');
        error = true;
    }

    if (parent_id < 0) {
        info_msg('Parent ID is not set!!');
        error = true;
    }
    if (error == false) {
        $.ajax({
            method: "POST",
            url: "admin.php/header/delete_menu",
            data: {menu_id: menu_id, parent_id: parent_id}
        }).done(function (msg) {
            if (msg !== '')
                if (msg == 0) {
                    error_msg('Unable to delete!!');
                } else {
                    $('.nobutton').trigger('click');
                    $(".btnAddSubMenu,.ddSubMenu").prop("disabled", true);
                    $(".btnEditMainMenu,.btnDelMainMenu,.btnEditSubMenu,.btnDelSubMenu,.btnAddSubMenu").prop("disabled", true);
                    if (parent_id == 0) {
                        $(".ddMainMenuOuter").html(msg['menu_details']);
                        $(".ddMainMenu").select2();
                    } else {
                        $(".ddSubMenuOuter").html(msg['menu_details']);
                        $(".ddSubMenu").select2();
                    }
                    success_msg('Menu deleted successfully..');
                }
        });
    }
}
function addMenu(thss) {
    var error = false;
    var menu_id = thss.attr('menu_id');
    var parent_id = thss.attr('parent_id');
    var menu_name = $(".menuModalText").val();
    var menu_url = $(".menuModalUrl").val();
    if (typeof parent_id == 'undefined') {
        parent_id = 0;
    }

    var menu_type = 1;
    if (!menu_name) {
        info_msg('Menu Name Should not be empty!!');
        error = true;
    } else if (!menu_url) {
        info_msg('URL Should not be empty!!');
        error = true;
    }
    if (error == false) {

        $.ajax({
            method: "POST",
            url: "admin.php/header/update_menu",
            data: {menu_name: menu_name, parent_id: parent_id, url: menu_url, menu_id: menu_id, menu_type: menu_type}
        }).done(function (msg) {
            if (msg !== '')
                if (msg == 0) {
                    error_msg('Menu already exists!!');
                    $(".menuModalText").val('').focus();
                } else {
                    if (parent_id == 0) {
                        $(".ddMainMenuOuter").html(msg['menu_details'])
                        $(".ddMainMenu").select2();
                        $(".ddSubMenu").prop('disabled', true);
                        $(".btnAddSubMenu,.btnEditSubMenu,.btnDelSubMenu,.btnEditMainMenu,.btnDelMainMenu").prop("disabled", true);
                        success_msg('Menu updated successfully..');
                    } else {
                        $(".ddSubMenuOuter").html(msg['menu_details'])
                        $(".ddSubMenu").select2();
                        $(".btnEditSubMenu,.btnDelSubMenu").prop("disabled", true);
                        success_msg('Sub Menu updated successfully..');
                    }
                    $('.nobutton').trigger('click');
                }
        });
    }
}
function seoContent_submit(thss) {
    var dd_page = $(".ddPagesMenu").val();
    var txtSEOTitle = $("#txtSEOTitle").val();
    var txtSEOMetaTitle = $('#txtSEOMetaTitle').val();
    var txtSEOMetaDescription = $("#txtSEOMetaDescription").val();
    var txtSEOGAScript = $("#txtSEOGAScript").val();
    var txtSEOGACode = $("#txtSEOGACode").val();
    var txtSEORobot = $("#txtSEORobot").val();
    $.ajax({
        method: "POST",
        url: "admin.php/header/update_seo_details",
        data: {dd_page: dd_page, pageTitle: txtSEOTitle, metaTitle: txtSEOMetaTitle, metaDesc: txtSEOMetaDescription, gaScript: txtSEOGAScript, gaCode: txtSEOGACode, robotText: txtSEORobot}
    }).done(function (msg) {
        if (msg !== '') {
            success_msg('SEO Content updated successfully..');
        }else{
             error_msg('Failed to update SEO Content..');
        }
    });
}
function get_SEOPageDetails(thss) {
    var dd_page_selected = $(".ddPagesMenu").val();
    $("#txtSEOTitle").val('');
    $("#txtSEOMetaTitle").val('');
    $("#txtSEOMetaDescription").val('');
    if (dd_page_selected == 0) {
        jQuery(".SEOTitle,.SEOMetaTitle,.SEOMetaDescription").prop("readonly", true);
    } else {
        jQuery(".SEOTitle,.SEOMetaTitle,.SEOMetaDescription").prop("readonly", false);

        $.ajax({
            method: "POST",
            url: "admin.php/header/get_SEOPageDetails",
            data: {dd_page: dd_page_selected}
        }).done(function (msg) {
            if (msg !== 0) {

                var obj = jQuery.parseJSON(msg);

                if (obj !== 0) {
                    $("#txtSEOTitle").val(obj[0].sp_title);
                    $("#txtSEOMetaTitle").val(obj[0].sp_meta_title);
                    $("#txtSEOMetaDescription").val(obj[0].sp_meta_desc);
                }
            }
        });
    }
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

