<?php
$fav_image = $logo_title = $logo_href = $logo_image = $logo_alt_text = $footer_logo = '';
if (isset($logo_details) && !empty($logo_details)) {
    $fav_image = $logo_details[0]['fav_image'];
    $logo_title = $logo_details[0]['logo_title'];
    $logo_href = $logo_details[0]['logo_href'];
    $logo_image = $logo_details[0]['logo_image'];
    $logo_alt_text = $logo_details[0]['logo_alt_text'];
    $footer_logo = $logo_details[0]['logo_mobile_image'];
}
$footer_about_content = '';
if (isset($footer_about) && !empty($footer_about)) {
    $footer_about_content = $footer_about[0]['c_content'];
}

$txtApptPhoneNumber = $txtApptOpenDays = $txtApptFAPhoneIcon = $txtApptFAClockIcon = $txtApptTimeBetween = $appt_phone_image = $appt_clock_image = $txtApptVacationDays = '';

if (isset($appt_details) && !empty($appt_details)) {

    $txtApptPhoneNumber = $appt_details[0]['appt_phone'];
    $txtApptOpenDays = $appt_details[0]['appt_open_days'];
    $txtApptVacationDays = $appt_details[0]['appt_vacation_days'];
    $txtApptFAPhoneIcon = $appt_details[0]['appt_fa_phone_icon'];
    $txtApptFAClockIcon = $appt_details[0]['appt_fa_clock_icon'];
    $txtApptTimeBetween = $appt_details[0]['appt_time_between'];
    $appt_phone_image = $appt_details[0]['appt_phone_image'];
    $appt_clock_image = $appt_details[0]['appt_clock_image'];
}
$disclaimer_content = '';
if (isset($disclaimer) && !empty($disclaimer)) {
    $disclaimer_content = $disclaimer[0]['disclaimer_content'];
}
$gmapkey = '';
if (isset($google_map_entries) && !empty($google_map_entries)) {
    $gmapkey = $google_map_entries[0]['map_key'];
}
?>

<!-- Footer Part Start -->
<footer class="footer-part footer-bg-dark">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <!-- Single widget-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-logo">
                        <input type="hidden" class="da_input" value="">
                        <a href="<?php echo $logo_href; ?>"><img src="<?php echo $footer_logo; ?>" alt="<?php echo $logo_alt_text; ?>"></a>
                        <p><?php echo $footer_about_content; ?></p>
                        <ol class="flat-list">
                            <?php
                            if (isset($contactus_social) && !empty($contactus_social)) {
                                foreach ($contactus_social as $key_social => $value_social) {
                                    ?>
                                    <li><a target=”_blank” href="<?php echo $value_social['c_social_link']; ?>"><i class="<?php echo $value_social['c_social_name']; ?>"></i></a></li>
                                    <?php
                                }
                            }
                            ?>

                        </ol>
                    </div>
                </div>
                <!-- Single widget-->
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0 footer_cols">
                    <div class="footer-widget-item">
                        <h3>PRACTICE AREAS</h3>
                        <ul class="footer-widget-link">
                            <?php
                            if (isset($footer_submenus) && !empty($footer_submenus)) {
                                foreach ($footer_submenus as $key => $value) {
                                    ?>
                                    <li><a href="<?php echo $value['url']; ?>"><i class="fa fa-angle-double-right"></i> <?php echo $value['menu_text']; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- Single widget-->
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0 footer_cols">
                    <div class="footer-widget-item">
                        <h3>CONTACT US</h3>

                        <ul class="footer-widget-contact">
                            <?php if (isset($contact_email) && !empty($contact_email)) { ?>
                                <li><i class="fa fa-envelope"></i>
                                    <p><?php echo $contact_email[0]['c_content']; ?></p>
                                </li>
                            <?php } ?>
                            <?php if (isset($contact_call) && !empty($contact_call)) {
                                ?>
                                <li><i class="fa fa-phone"></i>
                                    <p><?php echo $contact_call[0]['c_content']; ?></p>
                                </li>
                            <?php } ?>
                            <?php if (isset($contact_address) && !empty($contact_address)) { ?>
                                <li><i class="fa fa-map-marker"></i><?php echo $contact_address[0]['c_content']; ?></li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
                <!-- Single widget-->
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-lg-0 footer_cols">
                    <div class="footer-widget-item">
                        <h3>OPEN TIME</h3>
                        <ul class="footer-widget-office-time">
                            <li>
                                <p>Opening Day:</p>
                                <p><?php echo $txtApptOpenDays; ?>: <?php echo $txtApptTimeBetween; ?></p>

                            </li>
                            <li>
                                <p>Vacation:</p>
                                <p><?php echo $txtApptVacationDays; ?></p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copy right Start -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <?php
                    if (isset($contactus_footer) && !empty($contactus_footer)) {
                        foreach ($contactus_footer as $key_footer => $value_footer) {
                            echo $value_footer['c_footer_content'];
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="backtotop">
    <i class="fa fa-angle-up backtotop_btn"></i>
</div>

<div class="modal fade" id="modal-disclaimer">
    <div class="modal-dialog disclaimer_dialog">
        <div class="modal-content disclaimer_conf">
            <div class="modal-header">
                <h4 class="modal-title strong message" id="myModalLabel">Disclaimer & Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-body-disclaimer">
                <div class='disclaimer_content'><?php echo $disclaimer_content; ?></div>
            </div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_disclaimer btn btn-primary yes_popup_button " onclick="iagree($(this), 1);">I agree</button>
                <button type="button"class="btn btn btn-danger nobutton"  onclick="iagree($(this), 0);">No</button> 

            </div>
        </div>
    </div>
</div>

<!--js Library  -->
<script src="themes/frontend/js/jquery.min.js"></script>
<!--Popper js  -->
<script src="themes/frontend/js/popper.min.js"></script>
<!--Bootstrap min js  -->
<script src="themes/frontend/js/bootstrap.min.js"></script>
<!--Plugins   -->
<script src="themes/frontend/js/plugins.js"></script>
<script src="themes/backend/assets/dist/js/jquery.toaster.js"></script>
<!--Gmap3 js  -->
<script src="themes/frontend/js/gmap3.min.js"></script>
<!--SwiperRunner  -->
<script src="themes/frontend/js/swiperRunner.min.js"></script>
<!--Google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script>
<!--Custom js  -->
<script src="themes/frontend/js/custom.js"></script>
<script src="themes/frontend/js/slick.js"></script>
<script src="themes/frontend/js/infobubble.js"></script>
<script src="themes/frontend/js/infobubble-compiled.js"></script>

<script type="text/javascript" src="themes/frontend/news_part/js/df983.js"></script>

<script type="text/javascript" src="themes/frontend/news_part/js/1118c.js"></script>
<script type="text/javascript" src="themes/frontend/news_part/js/0a1f3.js"></script>
<script type="text/javascript" src="themes/frontend/news_part/js/29e8b.js"></script>

<!--script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"-->

<script>
                    var map, infoBubble, infoBubble2;
                    var markers = [];
                    function init() {

                        var stylez = [
                            {
                                featureType: "all",
                                stylers: [
                                    {hue: "#0000ff"},
                                    {saturation: -75}
                                ]
                            },
                            {
                                featureType: "poi",
                                elementType: "label",
                                stylers: [
                                    {visibility: "off"}
                                ]
                            }
                        ];

                        var mapCenter = new google.maps.LatLng($("#map").attr('data-lat'), $("#map").attr('data-lng'));
                        styledMapType = new google.maps.StyledMapType(stylez, {name: "Edited"}),
                                map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 14,
                                    center: mapCenter,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP, disableDefaultUI: true,
                                });

                        var marker = new google.maps.Marker({
                            map: map,
                            // style: stylez,
                            position: new google.maps.LatLng($("#map").attr('data-lat'), $("#map").attr('data-lng')),
                            //draggable: true,
                            icon: 'themes/frontend/images/empty_marker.png'
                        });
                        markers.push(marker);
                        var header_logo = $('.header_logo img').attr('src');

                        var contentString = '<div id="content">' +
                                '<img class="logo_img" src="' + header_logo + '" />' +
                                '</div>';

                        infoBubble = new InfoBubble({
                            maxWidth: 300,
                            content: '<div class="gmap_marker">' + contentString + '</div>',
                            position: new google.maps.LatLng($("#map").attr('data-lat'), $("#map").attr('data-lng')),
                            // top:5px
                        });
                        map.mapTypes.set("Edited", styledMapType);
                        map.setMapTypeId('Edited');
//                        setMapOnAll(null);
                        setMapOnAll(map);
                        infoBubble.open(map, marker);
                        updateStyles();

                    }
                    var param = (getUrlParam());
                    if (param[2] == 'contactus') {
                        google.maps.event.addDomListener(window, 'load', init);
                    }
                    function setMapOnAll(map) {
                        console.log(markers.length)
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(map);
                        }
                    }

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
                    function updateStyles() {
                        var shadowStyle = 0;//document.getElementById('shadowstyle').value;
                        infoBubble.setShadowStyle(shadowStyle);

                        var padding = 0;//document.getElementById('padding').value;
                        infoBubble.setPadding(padding);

                        var borderRadius = '100%';//document.getElementById('borderRadius').value;
                        infoBubble.setBorderRadius(borderRadius);

                        var borderWidth = 0;//document.getElementById('borderWidth').value;
                        infoBubble.setBorderWidth(borderWidth);

                        var borderColor = 'transparent';//document.getElementById('borderColor').value;
                        infoBubble.setBorderColor(borderColor);

                        var backgroundColor = 'white';//document.getElementById('backgroundColor').value;
                        infoBubble.setBackgroundColor(backgroundColor);

                        var maxWidth = '160';//document.getElementById('maxWidth').value;
                        infoBubble.setMaxWidth(maxWidth);

                        var maxHeight = '160';//document.getElementById('maxHeight').value;
                        console.log(maxHeight);
                        infoBubble.setMaxHeight(maxHeight);

                        var minWidth = '160';//document.getElementById('minWidth').value;
                        infoBubble.setMinWidth(minWidth);

                        var minHeight = '160';//document.getElementById('minHeight').value;
                        infoBubble.setMinHeight(minHeight);

                        var arrowSize = 0;//document.getElementById('arrowSize').value;
                        infoBubble.setArrowSize(arrowSize);

                        var arrowPosition = 50;//document.getElementById('arrowPosition').value;
                        infoBubble.setArrowPosition(arrowPosition);

                        var arrowStyle = 0;//document.getElementById('arrowStyle').value;
                        infoBubble.setArrowStyle(arrowStyle);

                        var closeSrc = '';//document.getElementById('closeSrc').value;
                        infoBubble.setCloseSrc(closeSrc);

                        infoBubble.top = '50';
                    }


</script>
<script>



    $(document).ready(function () {

        $.ajax({
            url: 'admin.php/header/get_menu_entries',
            method: 'get', async: false,
            dataType: 'json',
            success: function (data) {
                buildMenu($('.navbar-nav.ml-auto'), data);
                $("ul.dropdown-child-manu > li").removeAttr("class");
                $("ul.dropdown-child-manu > li > a ").removeAttr("class");
            }
        });
        $.ajax({
            url: 'admin.php/header/get_menu_entries',
            method: 'get', asycn: false,
            dataType: 'json',
            success: function (data) {
                buildMobileMenu($("ul.mobile-list-nav"), data);
//                                var hasClass = $("ul.submenuItems > li > a").hasClass('dropdownlink');
//                                $("ul.submenuItems > li > a").removeAttr('class');
            }
        });

//        if ($(".da_input").val() !== "1") {
//            $('#modal-disclaimer').modal('show');
//            $('#modal-disclaimer').modal({
//                backdrop: 'static',
//                keyboard: false
//            });
//        }

//                         var screensize = document.documentElement.clientWidth;
//                            alert(screensize);
        $(".bars").css("display", "none");
        var screensize = document.documentElement.clientWidth;
        console.log(screensize);
        if (parseInt(screensize) < 1024) {
            $(".bars").css("display", "block");
        }else if (parseInt(screensize) <=320){
            console.log('320')
            $(".singlecenter  .slick-active .post-head.no-image").css("left","0px")
        }
        var param = (getUrlParam());
        if (param[2] == '') {
            $("div#nav-list ul > li:nth-child(1) > a").addClass('active');
        } else if (param[2] == 'attorney') {
            $("div#nav-list ul > li:nth-child(2) > a").addClass('active');
        } else if (param[2] == 'practice') {
            $("div#nav-list ul > li:nth-child(3) > a").addClass('active');
        } else if (param[2] == 'practiceareas') {
            $("div#nav-list ul > li:nth-child(3) > a").addClass('active');
        } else if (param[2] == 'about-us') {
            $("div#nav-list ul > li:nth-child(4) > a").addClass('active');
        } else if (param[2] == 'news') {
            $("div#nav-list ul > li:nth-child(5) > a").addClass('active');
        } else if (param[2] == 'contactus') {
            $("div#nav-list ul > li:last-child > a").addClass('active');
        }


        // Call initialize -- in prod, add this to window.onload or some other DOM ready alternative
        // initialize();
        var placeholder_img = 'themes/frontend/images/placeholder.png';
        //$('._ibani1_').before($('<img class="marker_img" src="' + placeholder_img + '" />'));
    });

    $(window).resize(function () {
        $(".bars").css("display", "none");
        var screensize = document.documentElement.clientWidth;
        console.log(screensize);
        if (parseInt(screensize) < 1024) {
            $(".bars").css("display", "block");
        }
    });

    function contact_submit(thss) {

        var error = false;
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        var message = $("#txtContactMessage").val();
        var name = $("#txtContactName").val();
        var mail = $('#txtContactEmail').val();


        if (!name) {
            info_msg('Name should not be empty!!');
            error = true;
        } else if (!mail) {
            info_msg('E-Mail Address should not be empty!!');
            error = true;
        } else if (!pattern.test(mail)) {
            info_msg('Incorrect E-Mail Address!!');
            error = true;
        } else if (!message) {
            info_msg('Message should not be empty!!');
            error = true;
        }

        if (error == false) {
            var form_data = new FormData();
            form_data.append('message', message);
            form_data.append('name', name);
            form_data.append('mail', mail);

            $.ajax({
                method: "POST",
                url: "admin.php/contact/sendmail",
                data: form_data, contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data == 1) {
                        success_msg('Mail sent Successfully!!!');
                    } else {
                        error_msg('Mail sending failed!!!');
                    }
                }
            });
        }
    }

    function iagree(thss, opt) {

        $.ajax({
            method: "POST",
            url: "admin.php/home/accept_disclaimer",
            data: {option: opt}
        }).done(function (msg) {
            if (msg == 1) {
                $('#modal-disclaimer').modal('hide');
                $(".da_input").val(msg);
            }
        });

    }

    function buildMenu(parent, items) {
        $.each(items, function () {
            var sPageURL = window.location.pathname;
            var sURLVariables = sPageURL.split('/');
            var li = $('<li class="nav-item custom-dropdown-box"><a href="' + this.url + '" class="' + (sURLVariables[2].toLowerCase() == this.menu_text.toLowerCase() ? 'active' : '') + '">' + this.menu_text + '</a></li>');
            li.appendTo(parent);
            if (this.List && this.List.length > 0)
            {
                var ul = $('<ul class="dropdown-child-manu"></ul>');
                ul.appendTo(li);
                buildMenu(ul, this.List);
            }
        });
    }

    function buildMobileMenu(parent, items) {
        $.each(items, function () {

            var li = $('<li class=""><a href="' + this.url + '" class="dropdownlink" onclick="chooseThis($(this));">' + this.menu_text + '</a></li>');
            li.appendTo(parent);
            if (this.List && this.List.length > 0)
            {
                var ul = $('<ul class="submenuItems" style="">');
                ul.appendTo(li);
                buildMobileMenu(ul, this.List);
            }
        });
    }

    function chooseThis(thss) {
        $("ul.mobile-list-nav > li").removeClass("open").removeClass('chosen');
        $(thss).closest('li').addClass('chosen open');
        $("ul.submenuItems").attr('style', '');
        $("li.chosen > ul.submenuItems").attr('style', 'display:block;').fadeIn("slow");
    }

    function buildMenu1(parent, items) {
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

</script>
</body>

</html>