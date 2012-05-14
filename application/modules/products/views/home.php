<br/><div class="fluid_container">
    	
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-thumb="/Assets/SLIDER/images/slides/thumbs/f-3.png" data-src="/Assets/SLIDER/images/slides/f-3.png">
                
            </div>
            <div data-thumb="/Assets/SLIDER/images/slides/thumbs/f-2.png" data-src="/Assets/SLIDER/images/slides/f-2.png">
                
            </div>
            <div data-thumb="/Assets/SLIDER/images/slides/thumbs/f-1.png" data-src="/Assets/SLIDER/images/slides/f-1.png">
                <div class="camera_caption fadeFromBottom">
                    <a href="#">Click Here</a> To See Hot Gallery List!
                </div>
            </div>
            
           
        </div><!-- #camera_wrap_1 -->
        
        

<div id="featured_shadow"></div>

						<div style="clear:both;" id="slogan">

				<p>Proudly Connecting 33,000 Sellers with Buyers Since 2008</p>

				<span id="right-quote"></span>

				<div id="top-quote-shadow"></div>

				<div id="bottom-quote-shadow"></div>

			</div>

			</div> <!-- end .container -->



	<div id="divider">

		<div class="container">

			<div></div>

		</div>

	</div>



	<div class="container">

										<div id="about">

						<h3>What's New About OMM?</h3>

						<p style="text-align:justify;"><b><font color="#121212">Welcome to OMM!</font></b> OMM is a global Online Market Place for all brands. OMM is popular for publishing product reviews and detailed stats on old and latest mobile handsets. Our directory has listed more than 33,000 used mobile brands with all details related to their prices, seller info, age and more. We connect sellers with buyers and thats what we have been enjoying doing successfully for over three years.</p>
						<a href="#" class="readmore"><span>Read More</span></a>

					</div> <!-- end #about -->

							

					<div id="recent-posts">

<h3>Recently Listed Products</h3>
<? foreach($products as $product): ?>
<div class="r-post clearfix">
<div class="thumb">
<a href="/products/show/<? echo $product["id"] ?>">
<img src="<? echo $product["thumb_url"] ?>" class='r-post-image'  alt='dummy' width='60px' height='60px' />
    <span class="overlay"></span>
</a>
</div> 	<!-- end .thumb -->
<h4 class="title"><a href="/products/show/<? echo $product["id"] ?>"><? echo $product["make"]  ." ". $product["model_no"] ?></a></h4>
<p><? echo (substr($product["description"], 0, 150)). "..." ?></p>
</div> <!-- end .r-post -->
<? endforeach; ?>

								

				<a href="/products" class="readmore"><span>Read More</span></a>

			</div> <!-- end #recent-posts -->

					

		<div class="clear"></div>
