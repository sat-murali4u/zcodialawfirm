function headerlogo_submit() {

    var error = false;
    var txtWebsiteTitle = $("#txtWebsiteTitle").val();
    var txtLogoTitle = $("#txtLogoTitle").val();
    var txtLogoLinkerUrl = $("#txtLogoLinkerUrl").val();
    var txtLogoAltText = $("#txtLogoAltText").val();
    var txtLogoStickyAltText = $("#txtLogoStickyAltText").val();
    var txtMobileRetinaAltText = $("#txtMobileRetinaAltText").val();
    var txtMobileStickyRetinaAltText = $("#txtMobileStickyRetinaAltText").val();
    var txtLogoDataHeight = $("#txtLogoDataHeight").val();
    var txtLogoDataPadding = $("#txtLogoDataPadding").val();
    var txtMainLogoDataHeight = $("#txtMainLogoDataHeight").val();
    var txtStickyLogoDataHeight = $("#txtStickyLogoDataHeight").val();
    var txtMobileLogoDataHeight = $("#txtMobileLogoDataHeight").val();
    var txtMobileStickyLogoDataHeight = $("#txtMobileStickyLogoDataHeight").val();
    var txtHeaderLogoHeight = $("#txtHeaderLogoHeight").val();
    var txtHeaderLogoWidth = $("#txtHeaderLogoWidth").val();
    var txtFooterLogoHeight = $("#txtFooterLogoHeight").val();
    var txtFooterLogoWidth = $("#txtFooterLogoWidth").val();

//    if (!txtWebsiteTitle) {
//        info_msg('Website Title is empty!!');
//        error = true;
//    } else 
    if (!txtLogoTitle) {
        info_msg('Logo Title is empty!!');
        error = true;
    } else if (!txtLogoLinkerUrl) {
        info_msg('Logo linker Url is empty!!');
        error = true;
    } else if (!txtLogoAltText) {
        info_msg('Logo Alt Text is empty!!');
        error = true;
    } else if (!txtHeaderLogoHeight) {
        info_msg("Header Logo's Height should not be empty!!");
        error = true;
    } else if (!txtHeaderLogoWidth) {
        info_msg("Header Logo's Width should not be empty!!");
        error = true;
    } else if (!txtFooterLogoHeight) {
        info_msg("Footer Logo's Height should not be empty!!");
        error = true;
    } else if (!txtFooterLogoWidth) {
        info_msg("Footer Logo's Width should not be empty!!");
        error = true;
    }

//    else if (!txtLogoStickyAltText) {
//        info_msg('Logo Sticky Alt Text is empty!!');
//        error = true;
//    } else if (!txtMobileRetinaAltText) {
//        info_msg('Mobile Retina Alt Text is empty!!');
//        error = true;
//    } else if (!txtMobileStickyRetinaAltText) {
//        info_msg('Mobile Sticky Retina Alt Text is empty!!');
//        error = true;
//    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('title', txtWebsiteTitle);
        form_data.append('logo_title', txtLogoTitle);
        form_data.append('logo_href', txtLogoLinkerUrl);
        form_data.append('logo_alt_text', txtLogoAltText);
        form_data.append('logo_header_height', txtHeaderLogoHeight);
        form_data.append('logo_header_width', txtHeaderLogoWidth);
        form_data.append('logo_footer_height', txtFooterLogoHeight);
        form_data.append('logo_footer_width', txtFooterLogoWidth);


        form_data.append('logo_sticky_alt_text', txtLogoStickyAltText);
        form_data.append('logo_mobile_retina_alt_text', txtMobileRetinaAltText);
        form_data.append('logo_mobile_sticky_retina_alt_text', txtMobileStickyRetinaAltText);
        form_data.append('logo_data_height', txtLogoDataHeight);
        form_data.append('logo_data_padding', txtLogoDataPadding);
        form_data.append('logo_main_data_height', txtMainLogoDataHeight);
        form_data.append('logo_sticky_data_height', txtStickyLogoDataHeight);
        form_data.append('logo_mobile_data_height', txtMobileLogoDataHeight);
        form_data.append('logo_mobile_sticky_data_height', txtMobileStickyLogoDataHeight);

        form_data.append('fav_image', $('#imgHeaderFavIconUpload').prop('files')[0]);
        form_data.append('logo_image', $('#imgHeaderLogoUpload').prop('files')[0]);
        form_data.append('logo_retina_image', $('#imgHeaderRetinaUpload').prop('files')[0]);
        form_data.append('logo_sticky_image', $('#imgHeaderStickyUpload').prop('files')[0]);
        form_data.append('logo_sticky_retina_image', $('#imgHeaderStickyRetinaUpload').prop('files')[0]);
        form_data.append('logo_mobile_image', $('#imgHeaderMobileLogoUpload').prop('files')[0]);
        form_data.append('logo_mobile_retina_image', $('#imgMobileRetinaLogoUpload').prop('files')[0]);
        form_data.append('logo_mobile_sticky_image', $('#imgHeaderMobileStickyUpload').prop('files')[0]);
        form_data.append('logo_mobile_sticky_retina_image', $('#imgHeaderMobileStickyRetinaUpload').prop('files')[0]);
        $.ajax({
            method: "POST",
            url: "admin.php/header/update_logo",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Logo Particulars Updated Successfully!!!');
                } else {
                    error_msg('Logo Particulars not Updated!!!');
                }
            }
        });
    }
}
