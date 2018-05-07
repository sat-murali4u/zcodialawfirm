<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
        'class' => 'form-control',
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        'class' => 'form-control',
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
        'class' => 'form-control',

);
?>
<style>
    ol.breadcrumb li.active {
  font-weight: 900;
  /*color: #69C91D;*/
}

div#cp_form2 {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        display: block;
        font-size: 100%;
        /*margin: 61px 0 -77px 18px;*/
        width: 359px;
        padding: 13px;
        text-align: center;
          margin-bottom: 15px;
        margin-left: 34px;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}

.box.box-primary {
  width: 86%!important;
}
</style>
<section class="content-header">
    <h1>
        Change Password
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>      
        <li class="active cp1">Change Password</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-6">
        <?php
                   echo isset($this->session->userdata['flash:old:message']) ? "<div id='cp_form2'>".$this->session->userdata['flash:old:message']."</div>" : '';
            ?>
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
            
            </div><!-- /.box-header -->
            <!-- form start -->
           
          
            <?php echo form_open($this->uri->uri_string()); ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo form_label('Old Password', $old_password['id']); ?>
                    <?php echo form_password($old_password); ?>
                    <?php echo form_error($old_password['name']); ?>
                    <?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('New Password', $new_password['id']); ?>
                    <?php echo form_password($new_password); ?>
                    <?php echo form_error($new_password['name']); ?>
                    <?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?>
                    <?php echo form_password($confirm_new_password); ?>
                    <?php echo form_error($confirm_new_password['name']); ?>
                    <?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php echo form_submit('change', 'Change Password', "class='btn btn-primary'"); ?>
            </div>
          <?php echo form_close(); ?>
        </div><!-- /.box -->

    </div>
</section>