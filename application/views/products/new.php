<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 12:42 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h2>List New Product</h2>
<?= validation_errors(); ?>
<?= form_open('products/create') ?>
<?= form_hidden('seller_id', 1)?>
<table>
    <tr>
        <td><label for = "make">Make</label></td>
        <td><input type = "input" name = "make" value = "<?= set_value('make'); ?>" /><br /></td>
    </tr>
    <tr>
        <td><label for = "model_no">Model Number</label></td>
        <td><input type = "input" name = "model_no" value = "<?= set_value('model_no'); ?>"/><br /></td>
    </tr>
    <tr>
        <td><label for = "description">Description</label></td>
        <td><textarea rows="5" cols="20" name = "description" value = "<?= set_value('description'); ?>"></textarea></td>
    </tr>
    <tr>
        <td><label for = "price">Price</label></td>
        <td><input type = "input" name = "price" value = "<?= set_value('price'); ?>"/></td>
    </tr>
    <tr>
        <td colspan="2"><?= form_submit('submit', 'Submit'); ?></td>
    </tr>
</form>
</table>