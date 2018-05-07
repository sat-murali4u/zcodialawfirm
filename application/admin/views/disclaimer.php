<?php
$content = '';
if (isset($disclaimer) && !empty($disclaimer)) {
    $content = $disclaimer[0]['disclaimer_content'];
   
}
?>
<!-- Main content -->
<section class="content-header">
    <h1>
        Home Page
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Disclaimer</li>
    </ol>
</section>
<section class="content">

    <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="txtDisclaimerContent">Disclaimer Content</label>
                        <textarea type="text" class="form-control DisclaimerContent "  id="txtDisclaimerContent" value="<?php echo $content; ?>"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateDisclaimer"  onclick="disclaimer_submit($(this))" >Submit</button>
        </div>
    </div>
</section>
