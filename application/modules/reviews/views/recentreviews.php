<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/14/12
 * Time: 9:57 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="footer-widget footer-col2">
    <div id="recent-comments-3" class="f_widget widget_text">
        <h4 class="widgettitle">Recent Reviews</h4>
        <ul id = "recentcomments">
            <? foreach($reviews as $review): ?>
                <li class = "recentcomments"><? echo $review->first_name . " " . $review->last_name. " on <a href=\"/products/show/" . $review->productid . "\" class = 'url'>".$review->make . " " . $review->model_no . " </a>"?></li>
            <? endforeach; ?>
        </ul>
    </div>
</div> <!-- end . footer-widget -->