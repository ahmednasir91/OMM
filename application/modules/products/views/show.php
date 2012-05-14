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
    <font class="productdetails"> Price:</font> <i><? echo $price . "PKR" ?></i>
</div>
<div>
    <font class="productdetails"> Seller:</font><i> <? echo $seller ?></i>
</div>
<div>
   <font class="productdetails">  Description:</font>
    <p><i><? echo $description ?></i></p>
</div>

<section style="clear:both;"  id="comment-wrap">
    <? echo $reviews ?>
    <? echo $reviewform ?>
</section>
