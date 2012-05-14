<h1 id="comments" style="padding-bottom:0"><? echo $message->subject ?></h1>
<ol class="commentlist clearfix">
    <li class="comment even thread-even depth-1">
        <div class="comment-body clearfix">
            <div class="avatar-box">
                <img alt='' src='/Assets/Images-CSS/images/avatar.jpg' class='avatar' height='62' width='62' />
                <span class="avatar-overlay"></span>
            </div> <!-- end .avatar-box -->
            <div class="comment-wrap clearfix">
                <div class="comment-meta commentmetadata"><span class="fn"><? echo $message->sender ?></span>
                    <span class="comment_date">
                        <? echo $message->date ?>
                    </span>
                </div><!-- .comment-meta .commentmetadata -->
                <div class="comment-content"><p>
                    <? echo $message->description ?>
                </p>
                </div> <!-- end comment-content-->
                <div class="reply-container"><a class="comment-reply-link" href="<? echo $message->reply_link ?>">Reply</a></div>
            </div> <!-- end comment-wrap -->
        </div> <!-- end comment-body -->
    </li>
</ol>