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
    <h1 class="main_title">List New Product</h1>
</article>


<div id="form-1" class="responsive">

    <div id="et-contact-message"> </div>
    <?= validation_errors(); ?>

    <?= form_open_multipart('/products/create') ?>
    <?= form_hidden('seller_id', $seller_id)?>
    <div id="et_contact_left">
        <p class="clearfix">
            <label for = "make">Make</label>
            <input type="text" name="make" value = "<?= set_value('make'); ?>" id="make" class="input">
        </p>
        <p class="clearfix">
            <label for = "model_no">Model Number</label>
            <input type="text" name="model_no" value = "<?= set_value('model_no'); ?>" id="model_no" class="input">
        </p>
        <p class="clearfix">
            <label for = "price">Price(PKR)</label>
            <input type="text" name="price" value = "<?= set_value('price'); ?>" id="price" class="input">
        </p>
        <p class="clearfix">

            <? echo form_upload('image_url', set_value('image_url')); ?>
        </p>
    </div> <!-- #et_contact_left -->


    <div class="clear"></div>

    <p class="clearfix">
        <label for = "description">Description</label>
        <textarea class="input" id="description" name="description"  value = "<?= set_value('description'); ?>">Description</textarea>
    </p>
    <input class="form1_submit" type="submit" value="Submit" id="form1_submit">
    </form>
</div>