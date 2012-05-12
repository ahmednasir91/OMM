<div id="simpleform">
<h3 id = "reply-title">Retrieve Password</h3>
<?php echo form_open("forgot_password", array('id' => "registration"));?>
    <p class = "comment-notes">Please enter your email address so we can send you an email to reset your password.</p>
    <p>
        <label for = "email">Email Address</label>
        <?php echo form_input($email);?>
    </p>
    <p><input type = "submit" id = "submit" value = "Submit" /></p>
<?php echo form_close();?>
</div>