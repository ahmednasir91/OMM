<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 11:47 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1 style=" border-radius:4px;  border:1px solid #ddd; padding:10px; color:#111; width:600px;  margin:20px 0px; font-style:italic; font-family:Georgia, 'Times New Roman', Times, serif; "><? echo $make . " " . $model_no ?></h1>

<div style=" border:1px solid #ddd; padding:6px;  float:left; margin:0 10px 10px 0; ">
    <? echo img($image_url); ?>
</div>

<table cellpadding="10">

    <tr><td> <img style="margin:-4px 5px 0 0; display:inline;" src="/Assets/Images-CSS/images/price.png" align="left"/><font class="productdetails"> Price:</font></td><td> <font style="font-size:18px; font-weight:bold; color:#289728;"><? echo $price . " PKR" ?></font></td></tr>
    <tr> <td><img style="margin:-4px 5px 0 0; display:inline;" src="/Assets/Images-CSS/images/seller.png" align="left"/> <font class="productdetails"> Seller:</font></td><td><? echo $seller ?></td></tr>

    <tr><td colspan="2">
        <? if($this->session->userdata("isloggedin") && $sold === "0" && $this->session->userdata("username") !== $seller):
        echo '<a  style="margin-left:-7px;" class="buynow" href="#">Buy Now</a>' ?>
        <? elseif($sold !== "0"): echo '<a style="margin-left:-7px;" class="soldout" href="#">Sold out</a>' ?>
        <? endif; ?>
    </td></tr>
</table>
<div style="clear:both;">
    <font class="productdetails">  Description:</font>
    <p style="text-align:justify;"><? echo $description ?></p>
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
