<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/1/12
 * Time: 12:28 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<h2>Create News Item</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('news/create') ?>
<?= form_hidden('seller_id', '1'); ?>
    <label for = "title">Title</label>
    <input type = "input" name = "title" /><br />
    <label for = "text">Text</label>
    <textarea name = "text" ></textarea><br />
    <input type = "submit" name = "submit" value = "create news item" />
</form>