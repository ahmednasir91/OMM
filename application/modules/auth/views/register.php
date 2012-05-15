<article class="entry post clearfix">
    <h1 class="main_title">Register Now</h1>
</article>
<div id='form-1' class = "responsive">
    <div id="et-contact-message">
      <div>  <p><?php echo validation_errors(); ?></p></div>
    </div>
    <?php echo form_open("/register");?>
    <div id = "et_contact_left">
      <p>
          <label for = "first_name">First Name</label>
          <input class="input" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" id="first_name">
      </p>
      
      <p>
          <label for = "last_name">Last Name</label>
          <input class="input" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" id="last_name">
      </p>

    <p>
        <label for = "address">Address</label>
        <input class="input" type="text" name="address" value="<?php echo set_value('address'); ?>" id="address">
    </p>

    <p>
        <label for = "phone_number">Phone Number</label>
        <input class="input" type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>" id="phone_number">
    </p>

    <p>
        <label for = "user_name">Username</label>
        <input class="input" type="text" name="user_name" value="<?php echo set_value('username'); ?>" id="user_name">
    </p>


      <p><label for = "email">Email</label>
          <input class="input" type="text" name="email" value="<?php echo set_value('email'); ?>" id="email">
      </p>
      

      <p><label for = "password">Password</label>
          <input class="input" type="password" name="password" value="<?php echo set_value('password'); ?>" id="password">
      </p>
      
      <p><label for = "password_confirm">Password Confirm</label>
          <input class="input" type="password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" id="password_confirm">
      </p>
    </div>
    <p class="clearfix">

    </p>
      <input class="form1_submit" type="submit" value="Register" id="form1_submit">
    <?php echo form_close();?>

</div>
