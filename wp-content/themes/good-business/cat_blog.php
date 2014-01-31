<?php
/**
 * Template Name:cat blog
 
 */

get_header(); ?>
<?php/*
<div class="innerContainer">
	<section class="inner">
		<article>
        	<div class="articleTitle">
        	* <h2><?php the_title(); ?></h2>
        	* </div>
        	
        	<?php 
        	
        	$category = get_the_category();
        	print_r($category);
			print $category_id = $category->cat_ID;
        	
        	//$args=array();
        	query_posts( 'cat=12' );
        	
        	?>
        	<p>
        	<!--Be sure to follow us on <a href="https://twitter.com/lcbsat">Twitter:@lcbsat</a>-->
			<a class="twitter-btn" href="https://twitter.com/lcbsat" target="_blank" title="Follow Us on Twitter">Follow Us on Twitter</a>
            </p>
			<p>
			<!--Like our page on Facebook: <a href="https://www.facebook.com/studentactionteam">www.facebook.com/studentactionteam</a>-->
            <a class="facebook-btn" href="https://www.facebook.com/studentactionteam" target="_blank" title="Follow Us on Facebook">Follow Us on Facebook</a>
        	</p>
        	<br>
        	<?php while ( have_posts() ) : the_post(); ?>
            
			<section class="blogOutr">
				<?php the_title(); ?>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" >read more</a>
                
            </section>
            <?php endwhile; // end of the loop. ?>
		</article>
        <aside>
		<?php get_sidebar(); ?>
        </aside>
        
        
        
	</section>	
	
	
	
</div>
*/ ?>

<div class="innerContainer">
	<section class="inner">
		
    	<article>
        	<div class="articleTitle">
				<h2><?php the_title(); ?></h2>
            </div>
        	<?php 
        	$postid = get_the_ID();
        	$piid = get_the_title($postid);
			$category_id = get_cat_ID($piid);  
        	
        	 $args = array(
				'post_type'      => 'post',
				'cat'            => $category_id,
				'order'          => 'DESC',
			);
			
			if($category_id == 12) {
				print '<p style="margin-left:35px;margin-top: 10px;">
							<a class="twitter-btn" href="https://twitter.com/lcbsat" target="_blank" title="Follow Us on Twitter">Follow Us on Twitter</a>
						</p>';
				print '<p style="margin-left:35px;margin-top: 10px;">
							<a class="facebook-btn" href="https://www.facebook.com/studentactionteam" target="_blank" title="Follow Us on Facebook">Follow Us on Facebook</a>
						</p>';
			}
			print '<div id="page_data">';
        	query_posts($args);
			while ( have_posts() ) : the_post();
			?>          
            
            <section class="articleListing">
            	<figure>
					<?php echo the_post_thumbnail(array(95,93)); ?>					
				</figure>
                <div class="articleDetails">
					 
                	<h3><?php the_title(); ?></h3>
                    <span>
						<strong>By:</strong> 
						<?php the_author() ?> | <?php the_time('F j, Y'); ?>
					</span>
                   	<?php $_output = get_the_excerpt(); echo excerpt_read_more_link($_output); ?>
                    <a href="<?php the_permalink(); ?>" title="Continue Reading">Continue Reading</a>
                
                <!-- /articleDetails --></div>
            <!-- /articleListing --></section>
			<?php endwhile; // end of the loop. ?>
			</div>
            <section class="seeMore">
				<!--
				<a href="javascript:void(0);" title="See more posts">See more posts</a>
				-->
			<?php 

				if(function_exists('twg_tfsp_paginate')) {
					twg_tfsp_paginate('getdata','page_data',$category_id);
				}
				
			
			?>				
			</section>
			
        <!-- /article --></article>
			<?php get_sidebar('feeds'); ?>
        
    <!-- /inner --></section>
<!-- /container --></div>


<?php get_footer(); ?>
