<?php
/**
 * The template for displaying Search Results pages.
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
				<h2>Result Found For : 
				<?php
				if(isset($_GET['s'])){
					print $_GET['s'];
				} 
				?>
				</h2>
            </div>

		<?php if ( have_posts() ) : ?>


			<?php /* Start the Loop */ 
			
			?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			
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
			

			<?php endwhile; ?>
<?php pagination(); ?>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

				<div class="entry-content">
					<p>
					<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

        <!-- /article --></article>
			<?php get_sidebar(); ?>
        
    <!-- /inner --></section>
<!-- /container --></div>
<?php get_footer(); ?>
