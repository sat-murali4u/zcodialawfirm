<!-- Map Area Start -->
<?php
$gmaplat = $gmaplong = $map_marker_image = '';

if (isset($google_map_entries) && !empty($google_map_entries)) {
    $gmaplat = $google_map_entries[0]['map_lat'];
    $gmaplong = $google_map_entries[0]['map_long'];
    $map_marker_image = $google_map_entries[0]['map_marker_image']; //"<div class='gmap_marker'>" . $google_map_entries[0]['map_marker_image'] . "</div>";
    //$map_marker_image;
}
?>
<div class="google-map" id="wrapper">
    <div id="map"  data-lat="<?php echo $gmaplat; ?>" data-lng="<?php echo $gmaplong; ?>" data-mrkr1="<?php //echo $map_marker_image;  ?>" onchange="get_map_content($(this)"></div>
    <!--div class="gmap3-area" data-lat="<?php //echo $gmaplat;  ?>" data-lng="<?php //echo $gmaplong;  ?>" data-mrkr1="<?php //echo $map_marker_image;  ?>"-->
</div><!-- /.google-map -->
<!--    <div class='gmap_marker'></div>-->
</div><!-- /#map -->

<!-- Map Area end -->