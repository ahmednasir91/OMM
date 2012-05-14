<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/14/12
 * Time: 10:36 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="footer-widget footer-col2">
    <div id="text-3" class="f_widget widget_text">
        <h4 class="widgettitle">New Users</h4>
        <div class="textwidget">
            <ul>
                <? foreach($users as $user): ?>
                <li><? echo $user->first_name . " " . $user->last_name ?></li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
</div> <!-- end . footer-widget -->