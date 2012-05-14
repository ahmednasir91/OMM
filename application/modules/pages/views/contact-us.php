<div id="et-contact" class="responsive">

    <div id="et-contact-message"> </div>

    <form action="/pages/contact-us" method="post" id="contact_form">
        <div id="et_contact_left">
            <p class="clearfix">
                <input type="text" name="name" value="Name" id="et_contact_name" class="input">
            </p>

            <p class="clearfix">
                <input type="text" name="email" value="Email Address" id="et_contact_email" class="input">
            </p>

            <p class="clearfix">
                <input type="text" name="subject" value="Subject" id="et_contact_subject" class="input">
            </p>
        </div> <!-- #et_contact_left -->

        <div id="et_contact_right">
            <p class="clearfix">
                Captcha: <br>14 + 11 = 							<input type="text" name="captcha" value="" id="et_contact_captcha" class="input" size="2">
            </p>
        </div> <!-- #et_contact_right -->

        <div class="clear"></div>

        <p class="clearfix">
            <textarea class="input" id="et_contact_message" name="message">Message</textarea>
        </p>

        <input class="et_contact_submit" type="submit" value="Submit" id="et_contact_submit">
    </form>
</div>