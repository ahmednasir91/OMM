<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/5/12
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html>

<html dir="ltr" lang="en-US" class="js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">

    <title>{title}</title>
    <link rel="stylesheet" href="/Assets/Images-CSS/style.css" type="text/css" media="screen">
    <script type="text/javascript">
        document.documentElement.className = 'js';
    </script>
    <link rel="stylesheet" id="et-shortcodes-css-css" href="/Assets/Images-CSS/shortcodes.css" type="text/css" media="all">
    <link rel="stylesheet" id="wp-pagenavi-css" href="/Assets/Images-CSS/pagenavi-css.css" type="text/css" media="all">
    <link type="text/css" rel="stylesheet" href="data:text/css,">
    <link rel="stylesheet" id="fancybox-css" href="/Assets/Images-CSS/jquery.fancybox-1.3.4.css" type="text/css" media="screen">
    <link rel="stylesheet" id="et_page_templates-css" href="/Assets/Images-CSS/page_templates.css" type="text/css" media="screen">
    <script type="text/javascript" src="/Assets/Images-CSS/jquery.js"></script>
    <script type="text/javascript" src="/Assets/Images-CSS/et_shortcodes_frontend.js"></script>
    <link rel="stylesheet" href="/Assets/Images-CSS/flexslider.css" type="text/css" media="screen">
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>
<body>
<div id="page-wrap">
<header id="main">
    <div class="container top-info">
        <a href="/">
            <img src="/Assets/Images-CSS/logo.png" alt="Evolution Theme" id="logo">
        </a>
    </div> <!-- end .container -->
    <div id="navigation">
        <div class="container clearfix">
            <nav id="top-menu">
                <ul id="menu-new-menu" class="nav sf-js-enabled"><li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a href="/">Home</a></li>
                    <li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12"><a href="/products">Products</a></li>
                    <li id="menu-item-396" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-396"><a href="/products/addnew/">Sell Product</a></li>
                    <li id="menu-item-408" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-408"><a href="/contact-us/">Contact Us</a></li>
                </ul>
            </nav>


            <div class="search-form">
                <?php echo form_open('products/pre_search');?>
                <label for="searchinput">Search here</label>
                    <input type="text" name="keyword" id="searchinput">
                    <input type="image" src="/Assets/Images-CSS/search_btn.png" id="searchsubmit">
                </form>
            </div>

            <!-- end #search-form -->
            <div id="top-menu-shadow"></div>
            <div id="bottom-menu-shadow"></div>
        </div> <!-- end .container -->
    </div> <!-- end #navigation -->
</header> <!-- end #main -->

<div id="main-area">
<div class="container">
    <? if($nothome): ?>
<div id="content_area" class="clearfix">
<div id="main_content">

    <div id="breadcrumbs">
        {message}
        {login}
    </div> <!-- end #breadcrumbs -->
    {content}
</div> <!-- end #main_content -->
<div id="sidebar">
    {makeslist}
    {pricelist}
</div> <!-- end #sidebar -->
</div> <!-- end #content_area -->
    <? else: ?>
    {content}
    <? endif; ?>

</div> <!-- end .container -->
</div> <!-- end #main-area -->
</div> <!-- end #page-wrap -->

<footer id="main-footer">
    <div class="container clearfix">
        <div id="footer-top-shadow"></div>

        <div id="footer-widgets" class="clearfix">
            <!-- end . footer-widget --><div class="footer-widget footer-col2">
            <div id="meta-3" class="f_widget widget_meta"><h4 class="widgettitle">Meta</h4>
        <ul>
            <li><a href="/wp-login.php">Log in</a></li>
            <li><a href="/feed/" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="/comments/feed/" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
        </ul>
        </div></div> <!-- end . footer-widget -->
            <div class="footer-widget footer-col4 last">
                <div id="text-3" class="f_widget widget_text">
                    <h4 class="widgettitle">Custom Text Widget</h4>
                    <div class="textwidget">Quisque ullamcorper enim vel tellus rhoncus et fermentum diam congue.
                        Phasellus eu turpis lorem, id gravida nunc. In bibendum nulla vel quam pretium a fringilla erat ornare.
                        Etiam hendrerit quam sed orci congue posuere laoreet urna condimentum. Nam vestibulum gravida
                        semper</div>
        </div></div> <!-- end . footer-widget -->
        </div> <!-- end #footer-widgets -->

        <p id="copyright">Designed by  <a href="#" title="">Ahmed</a> | Powered by  <a href="#">CodeIgniter</a></p>
    </div> <!-- end .container -->
</footer> <!-- end #main-footer -->




<script type="text/javascript" src="/Assets/Images-CSS/superfish.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/jquery.fitvids.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/custom.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/Assets/Images-CSS/et-ptemplates-frontend.js"></script>

</body></html>