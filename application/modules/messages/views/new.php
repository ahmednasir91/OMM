<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/13/12
 * Time: 6:27 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div id="respond">
    <h3 id="reply-title"><span>Compose New Message</span></h3>
    <? if($this->session->userdata('isloggedin')): ?>
    <form action="/messages/create" method="post" id="commentform">
    <p>Required fields are marked <span class="required">*</span></p>
    <p><label for="recipient">Recipient</label> <span class="required">*</span><input id="recipient" name="recipient" type="text" value="" size="30" aria-required='true' /></p>
    <p><label for="subject">Subject</label><span class="required">*</span><input id="subject" name="subject" type="text" value="" size="30" /></p>
        <p class="comment-form-comment">
            <label for="description">Message</label>
            <textarea id="description" name="description" cols="45" rows="8" aria-required="true"></textarea></p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" value="Send" />
            <input type='hidden' name='senderid' value='<? echo $senderid; ?>' id='senderid' />
        </p>
        </form>
    <? else: ?>
         <p class="comment-notes">You must login in order to send a message.</p>
    <? endif; ?>
</div><!-- #respond -->