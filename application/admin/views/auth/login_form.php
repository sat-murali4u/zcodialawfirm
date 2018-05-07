<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'class' => 'form-control',
    'placeholder' => 'Email',
    'value' => (isset($_COOKIE["login"]) ? $_COOKIE["login"] : ''),
    'maxlength' => 80,
    'size' => 30,
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Email or login';
} else if ($login_by_username) {
    $login_label = 'Login';
} else {
    $login_label = 'Email';
}

$password = array(
    'type' => 'password',
    'name' => 'password',
    'id' => 'password',
    'value' => (isset($_COOKIE["password"]) ? $_COOKIE["password"] : ''),
    'class' => 'form-control',
    'placeholder' => 'Password',
    'size' => 30,
);
$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'class' => 'form-control rememberMe',
    'value' => (isset($_COOKIE["remember"]) ? $_COOKIE["remember"] : 1),
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'placeholder' => 'Captcha',
    'class' => 'form-control',
    'maxlength' => 8,
);
?>
<div class="login-box">
    <div class="login-logo">
        <a href="./"><b>Lawyer</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php echo form_open($this->uri->uri_string()); ?>
        <div class="form-group has-feedback">
            <?php
            if (form_error($login['name'])) {
                $login['class'] .= "  error_input";
            }
            echo form_input($login);
            echo form_error($login['name']);
            echo isset($errors[$login['name']]) ? "<div class='error'>" . $errors[$login['name']] . "</div>" : '';
            ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php
            if (form_error($password['name'])) {
                $password['class'] .= "  error_input";
            }
            echo form_input($password);
            echo form_error($password['name']);
            echo isset($errors[$password['name']]) ? "<div class='error'>" . $errors[$password['name']] . "</div>" : '';
            ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <?php
                    echo form_checkbox($remember);
                    echo form_label(' Remember me', $remember['id']);
                    echo form_error($remember['name']);
                    ?>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?php echo form_submit('submit', 'Sign In', "class='btn btn-primary btn-block btn-flat'"); ?>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close(); ?>


        <a href="admin.php/auth/forgot_password" class="text-center ">I forgot my password</a><br />
        <a href="admin.php/auth/register" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>

