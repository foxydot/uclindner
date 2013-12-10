<?php
/**
 * Template Name:In the press
 
 */

get_header(); ?>

<div class="innerContainer">
	<section class="inner">
		<article>
        	<div class="articleTitle"><h2><?php the_title(); ?></h2></div>
        	
        	<?php 
        	//$args=array();
        	query_posts( 'cat=11' );
        	?>
        	<?php while ( have_posts() ) : the_post(); ?>
            
			<section class="blogOutr">
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
	
<?php get_footer(); ?>
