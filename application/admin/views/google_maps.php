<?php
$gmaplat = $gmaplong = $gmapkey = $map_marker_image = '';
if (isset($google_map_enries) && !empty($google_map_enries)) {
    $gmaplat = $google_map_enries[0]['map_lat'];
    $gmaplong = $google_map_enries[0]['map_long'];
     $gmapkey = $google_map_enries[0]['map_key'];
    $map_marker_image = $google_map_enries[0]['map_marker_image'];
}
?>
<section class="content-header">
    <h1>
        Footer
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Google Maps</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Google Map Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtGMapLat">Latitude</label>
                        <input type="number" min="0" max="100" class="form-control" id="txtGMapLat" value="<?php echo $gmaplat; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="txtGMapLong">Longitude</label>
                        <input type="number" min="0" max="100"  class="form-control" id="txtGMapLong" value="<?php echo $gmaplong; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtGMapKey">Google Map Key</label>
                        <input type="text" class="form-control" id="txtGMapKey" value="<?php echo $gmapkey; ?>">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label>Marker Image</label>
                                <div class="imgGMapMarkerImageOuter">
                                    <div id="imgGMapMarkerPreview">
                                        <label for="imgGMapMarkerUpload" id="imgGMapMarkerLabel">Choose File</label>
                                        <input type="file" class="imgGMapMarkerUpload" name="imgGMapMarkerUpload" id="imgGMapMarkerUpload" value="<?php echo $map_marker_image; ?>" accept="image/gif,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateGMap" onclick="gmap_submit($(this))">Submit</button>
        </div>
    </div>


</section>

