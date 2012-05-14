<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/14/12
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="footer-widget footer-col2">
    <div id="text-3" class="f_widget widget_text">
        <h4 class="widgettitle"><? echo $title ?>Products</h4>
            <ul>
                <? foreach($products as $product): ?>
                <li><? echo "<a href=\"/products/show/". $product->id . "\">" . $product->make .  " " . $product->model_no . "</a>"?></li>
                <? endforeach; ?>
            </ul>
    </div>
</div> <!-- end . footer-widget -->