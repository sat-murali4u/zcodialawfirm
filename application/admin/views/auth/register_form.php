<?php
if ($use_username) {
    $username = array(
        'name' => 'username',
        'id' => 'username',
        'class' => 'form-control',
        'placeholder' => 'Username',
        'value' => set_value('username'),
        'maxlength' => $this->config->item('username_max_length', 'tank_auth'),
        'size' => 100,
    );
}
$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'placeholder' => 'Email',
    'value' => set_value('email'),
    'maxlength' => 80,
    'size' => 100,
);
$password = array(
    'name' => 'password',
    'type' => 'password',
    'id' => 'password',
    'class' => 'form-control',
    'placeholder' => 'Password',
    'value' => set_value('password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
$confirm_password = array(
    'name' => 'confirm_password',
    'type' => 'password',
    'id' => 'confirm_password',
    'class' => 'form-control',
    'placeholder' => 'Retype Password',
    'value' => set_value('Retype'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'class' => 'form-control',
    'placeholder' => 'Captcha',
    'maxlength' => 8,
);
?>

<div class="register-box">
    <div class="register-logo">
        <a href="./"><b>Lawyer</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <?php echo form_open($this->uri->uri_string()); ?>
        <?php
        echo isset($this->session->userdata['flash:old:message']) ? $this->session->userdata['flash:old:message'] : '';
        ?>
        <?php if ($use_username) { ?>
            <div class="form-group has-feedback">
                <?php
                if (form_error($username['name'])) {
                    $username['class'] .= "  error_input";
                }
                echo form_input($username);
                echo form_error($username['name']);
                echo isset($errors[$username['name']]) ? "<div class='error'>" . $errors[$username['name']] . "</div>" : '';
                ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
        <?php } ?>
        <div class="form-group has-feedback">
            <?php
            if (form_error($email['name'])) {
                $email['class'] .= "  error_input";
            }
            echo form_input($email);
            echo form_error($email['name']);
            echo isset($errors[$email['name']]) ? "<div class='error'>" . $errors[$email['name']] . "</div>" : '';
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
        <div class="form-group has-feedback">
            <?php
            if (form_error($confirm_password['name'])) {
                $confirm_password['class'] .= "  error_input";
            }
            echo form_input($confirm_password);
            echo form_error($confirm_password['name']);
            echo isset($errors[$confirm_password['name']]) ? "<div class='error'>" . $errors[$confirm_password['name']] . "</div>" : '';
            ?>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" class="rememberMe"> I agree to the <a href="javascript:void(0);">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?php echo form_submit('submit', 'Register', "class='btn btn-primary btn-block btn-flat'"); ?>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close(); ?>

        <a href="admin.php/auth/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->


