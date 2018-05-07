<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'class' => 'form-control', 'placeholder' => 'Email Address',
    'maxlength' => 80,
    'size' => 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
    $login_label = 'Email or login';
} else {
    $login_label = 'Email';
}
?>
<div class="register-box">
    <div class="register-logo">
        <a href="./"><b>Lawyer</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"></p>

        <?php echo form_open($this->uri->uri_string()); ?>
        <div class="form-group has-feedback">
            <?php echo form_input($login); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></span>
        </div>

        <div class="row">

            <!-- /.col -->
            <div class="col-xs-12">
                <?php echo form_submit('reset', 'Register', 'btn btn-primary btn-block btn-flat'); ?>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close(); ?>



        <a href="admin.php/auth/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>