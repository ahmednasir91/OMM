<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/1/12
 * Time: 12:08 AM
 * To change this template use File | Settings | File Templates.
 */

foreach($news as $news_item): ?>
    <h2><?php echo $news_item["title"] ?></h2>
    <div id = "main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href=<?php echo $news_item['slug'] ?> >View Article</a> </p>
<?php endforeach ?>
