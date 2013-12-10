<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="innerContainer">
	<section class="inner">
		<article>
        	<div class="articleTitle">
				<?php
					$req_uri = explode('/',$_SERVER['REQUEST_URI']);
					$pageurl = $req_uri[1];
					$pageurl2 = @$req_uri[2];
				?>
				
				
				<h2><?php 
				
				if($pageurl == 'calendar'){
					print 'Events Details';
				} else {
					the_title();
				}
				?>
				
				</h2>
				
				</div>
        	<?php while ( have_posts() ) : the_post(); ?>
            
			<section class="blogOutr">
            	
				<p><?php the_content(); ?></p>
                
            </section>
            <?php endwhile; // end of the loop. ?>
		</article>
       
		<?php get_sidebar('feeds'); ?>
        
	</section>	
</div>
	

<?php get_footer(); ?>
