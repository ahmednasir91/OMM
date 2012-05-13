
<div id = "login">
    <?php echo form_open("auth/login", array('id' => 'loginform'));?>
    <p>
        <label for="identity">Username:</label>
        <?php echo form_input('identity');?>
    </p>

    <p>
        <label for="password">Password:</label>
        <?php echo form_password('password');?>
    </p>

    <p>
        <input type = "submit" value = "Login" name = "submit" id = "submit" />
    </p>

    <?php echo form_close();?>
    <p><a href = "/register" >Register New Account</a></p>
    <p><a href = "/forgot_password" >Forgot Your Password ?</a></p>
</div>

