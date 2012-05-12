<div id='simpleform'>

	<h3 id = "reply-title">Register Now</h3>
    <p><?php echo $message ?></p>
    <?php echo form_open("register", array('id' => "registration"));?>
    <p class = "comment-notes">Required fields are marked *</p>
      <p>
          <label for = "first_name">First Name</label>
          <span class = "required" style = "display:none;">*</span>
          <?php echo form_input($first_name);?>
      </p>
      
      <p>
          <label for = "last_name">Last Name</label>
          <span class = "required" style = "display:none;">*</span>
          <?php echo form_input($last_name);?>
      </p>

    <p>
        <label for = "address">Address</label>
        <span class = "required" style = "display:none;">*</span>
        <?php echo form_input($address);?>
    </p>

    <p>
        <label for = "phone_number">Phone Number</label>
        <span class = "required" style = "display:none;">*</span>
        <?php echo form_input($phone_number);?>
    </p>

    <p>
        <label for = "user_name">Username</label>
        <span class = "required" style = "display:none;">*</span>
        <?php echo form_input($user_name);?>
    </p>


      <p><label for = "email">Email</label>
          <span class = "required" style = "display:none;">*</span>
      <?php echo form_input($email);?>
      </p>
      

      <p><label for = "password">Password</label>
          <span class = "required" style = "display:none;">*</span>
      <?php echo form_input($password);?>
      </p>
      
      <p><label for = "password_confirm">Password Confirm</label>
          <span class = "required" style = "display:none;">*</span>
      <?php echo form_input($password_confirm);?>
      </p>
      
      
      <p><input type = "submit" id = "submit" value = "Register" /></p>

      
    <?php echo form_close();?>

</div>
