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
    <h3 id="reply-title"><span>Leave a Review</span></h3>
    <? if($this->session->userdata('isloggedin')): ?>
        <form action="/reviews/create" method="post" id="commentform">
        <p class="comment-form-comment">
            <textarea id="description" name="description" cols="45" rows="8" aria-required="true"></textarea></p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" value="Submit" />
            <input type='hidden' name='userid' value='<? echo $userid; ?>' id='userid' />
            <input type='hidden' name='productid' id='productid' value='<? echo $productid; ?>' />
        </p>
        </form>
    <? else: ?>
         <p class="comment-notes">You must login in order to review a product.</p>
    <? endif; ?>
</div><!-- #respond -->