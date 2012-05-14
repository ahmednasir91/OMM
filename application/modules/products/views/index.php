<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 3:54 PM
 * To change this template use File | Settings | File Templates.
 */
?>

<?php if($zerorows): ?>
<p style="color: red" align="center">There are not any products.</p>
<?php else: ?>
<? $even_odd = "even" ?>
<?php foreach($products as $product): ?>
    <? $even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even'; ?>
    <article class = "entry post clearfix"  <? echo ($even_odd == "odd") ? "style = \"border-right: 1px solid #f1f1f1;\"" : ""; ?> >
        <h1 class = "title">
            <a href = "/products/show/<? echo $product['id']; ?>"><? echo $product['make'] . " " . $product['model_no'] ?>
            </a>
        </h1>
        <div class = "entry_content">
            <div class = "postmeta">
                <? if($product["sold"] !== "0") echo '<p style="color: red;"><b>Sold!</b></p>' ?>
                <div style="margin-bottom:5px;"> <img style="margin:-4px 0px 0 0; display:inline;" " src="/Assets/Images-CSS/images/price.png" align="left"/><b><? echo $product['price']?></b> PKR</div>
                <div style="margin-bottom:5px;"><img style="margin:-4px 0px 0 0; display:inline;" " src="/Assets/Images-CSS/images/seller.png" align="left"/><b><? echo $product['seller']  ?></b></div>
                <p><? echo substr($product["description"], 0, 75) . "..." ?></p>
                <a href = "/products/show/<? echo $product['id']; ?>" class = "readmore" ><span>More Details</span></a>
            </div>

            <div class = "post-thumbnail">
                <a href = "/products/show/<? echo $product['id']; ?>" >
                    <img  src = "<? echo $product['thumb_url']; ?>" hieght = "147px" width = "147px" />
                    <span class="post-overlay"></span>
                </a>
            </div>

        </div>
    </article>
    <? endforeach; ?>
<div class="wp-pagenavi">
    <? if(isset($links)) echo $links; ?>
</div>
<? endif; ?>
