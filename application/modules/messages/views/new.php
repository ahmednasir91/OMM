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
    <p><? echo validation_errors(); ?></p>
    <form action="/messages/create" method="post" id="commentform">
        <? if($recipientid !== 0): ?>
        <input type='hidden' name='recipientid' value='<? echo $recipientid; ?>' id='recipientid' />
        <input type='hidden' name='recipient' value='<? echo $recipient; ?>' id='recipient' />

    <? else: echo '<p><label for="recipient">Recipient</label><input id="recipient" name="recipient" type="text" size="30" aria-required="true" /></p>'; ?>
        <? endif; ?>
    <p><label for="subject">Subject</label><input id="subject" name="subject" type="text" value="" size="30" /></p>
        <p class="comment-form-comment">
            <label for="description">Message</label>
            <textarea id="description" name="description" cols="45" rows="8" aria-required="true"></textarea></p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" value="Send" />
            <input type='hidden' name='senderid' value='<? echo $senderid; ?>' id='senderid' />
        </p>
        </form>
</div>