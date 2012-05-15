<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 12:42 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<article class="entry post clearfix">
    <h1 class="main_title">Contact Us</h1>
</article>


<div id="form-1" class="responsive">

    <div id="et-contact-message"> <? echo validation_errors() ?></div>
    <?= form_open('/pages/contact') ?>
    <div id="et_contact_left">
        <p class="clearfix">
            <label for = "name">Name</label>
            <input type="text" name="name" id="name" class="input">
        </p>
        <p class="clearfix">
            <label for = "name">Email</label>
            <input type="text" name="email" id="email" class="input">
        </p>
        <p class="clearfix">
            <label for = "subject">Subject</label>
            <input type="text" name="subject" id="subject" class="input">
        </p>
    </div>


    <div class="clear"></div>

    <p class="clearfix">
        <label for = "description">Description</label>
        <textarea class="input" id="description" name="description">Description</textarea>
    </p>
    <input class="form1_submit" type="submit" value="Submit" id="form1_submit">
    </form>
</div>