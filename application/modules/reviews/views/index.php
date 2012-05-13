<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/13/12
 * Time: 7:40 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1 id="comments"><? if($totalReviews !== 0) echo $totalReviews ?> Reviews</h1>
<ol class="commentlist clearfix">
    <? if($totalReviews === 0): ?>
        <p class = "comment-notes">There are no reviews for this product.</p>
    <? endif; ?>
    <? foreach($reviews as $review): ?>
    <li class="comment even thread-even depth-1">
        <div class="comment-body clearfix">
            <div class="avatar-box">
                <img alt='' src='/Assets/Images-CSS/images/avatar.jpg' class='avatar' height='62' width='62' />
                <span class="avatar-overlay"></span>
            </div> <!-- end .avatar-box -->
            <div class="comment-wrap clearfix">
                <div class="comment-meta commentmetadata"><span class="fn"><? echo $review->user ?></span>
                    <span class="comment_date">
                    <? echo $review->date ?>
                    </span>
                </div><!-- .comment-meta .commentmetadata -->
                <div class="comment-content"><p><? echo $review->description ?></p>
                </div> <!-- end comment-content-->
            </div> <!-- end comment-wrap -->
        </div> <!-- end comment-body -->
    </li>
    <? endforeach; ?>
</ol>
