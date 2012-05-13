<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/13/12
 * Time: 2:23 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div id = "makes" class = "widget">
    <h3 class="widgettitle">Makes</h3>
    <ul>
        <?php foreach($makes as $make): ?>
        <li><a href="<? echo "/products/make/" . $make->make ?>"><? echo $make->make ?></a></li>
        <? endforeach; ?>
    </ul>
</div>