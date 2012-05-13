<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 11:47 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1><? echo $make . " " . $model_no ?></h1>
<div>
    <? echo img($image_url); ?>
</div>
<div>
    Price: <? echo $price . "$" ?>
</div>
<div>
    Seller: <? echo $seller ?>
</div>
<div>
    Description:
    <p><? echo $description ?></p>
</div>

