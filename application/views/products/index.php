<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/4/12
 * Time: 3:54 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1>Recently Listed Products</h1>
<?php if($zerorows): ?>
    <p style="color: red" align="center">There are not any products.</p>
<?php else: ?>
<ul>
<?php foreach($products as $product): ?>
    <li>
        <div><? echo img($product['thumb_url']); ?></div>
        <div><? echo $product['make'] . " " . $product['model_no'] ?></div>
        <div><? echo "Price: " . $product['price'] . "$" ?></div>
        <div><? echo "Seller: " . $product['seller'] ?></div>
        <div><? echo anchor('/products/show/' . $product['id'], "See More")?></div>
    </li>
<? endforeach; ?>
</ul>
<? endif; ?>