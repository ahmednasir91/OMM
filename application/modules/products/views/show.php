<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 11:47 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1 style=" border-radius:4px;  border:1px solid #ddd; padding:10px; color:#2B2B2B; width:600px;  margin:20px 0px; font-style:italic; font-family:Georgia, 'Times New Roman', Times, serif; "><? echo $make . " " . $model_no ?></h1>

<div style=" border:1px solid #ddd; padding:6px;  float:left; margin:0 10px 0px 0; ">
    <? echo img($image_url); ?>
</div>
<div>
    <? if($sold !== "0") echo '<font class="productdetails" color="red"><b>Sold!</b></font>' ?>
</div>
<div>
    <font class="productdetails"> Price:</font> <? echo $price . "PKR" ?>
</div>
<div>
    <font class="productdetails"> Seller:</font> <? echo $seller ?>
</div>
<div>
   <font class="productdetails">  Description:</font>
    <p><? echo $description ?></p>
</div>
    <? if($this->session->userdata("isloggedin") && $sold === "0" && $this->session->userdata("username") !== $seller): ?>
<form action="/products/buy" method="post" id="commentform">
    <p class="form-submit">
        <input name="submit" type="submit" id="submit" value="Buy Now!">
        <input type="hidden" name="seller" value="<? echo $seller ?>" id="seller">
        <input type="hidden" name="productid" id="productid" value="<? echo $id ?>">
        <input type="hidden" name="buyerid" id="buyerid" value="<? echo $this->session->userdata('userid') ?>">
    </p>
</form>
    <? elseif(!$this->session->userdata("isloggedin")): ?>
    <? echo "<i><b>You must be logged in to buy this product.</b></i>" ?>
    <? endif; ?>
<section style="clear:both;"  id="comment-wrap">
    <? echo $reviews ?>
    <? echo $reviewform ?>
</section>
