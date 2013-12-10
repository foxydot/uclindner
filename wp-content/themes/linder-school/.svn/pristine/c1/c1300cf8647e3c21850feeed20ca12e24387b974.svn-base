<?php
/**
 * Template Name: Featured Stories Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="innerContainer">
	<section class="inner">
		<article>
        	<div class="articleTitle"><h2><?php the_title(); ?></h2></div>
        	<section class="blogOutr">
        	<?php 
        	$posts = get_posts('numberposts=3&offset=0&cat=7,9,10');
			foreach ($posts as $post_content) {
        	 ?>
        
			
            	<h3><?php echo $post_content->post_title; ?></h3>
				<p><?php echo $post_content->post_content; ?></p>
                <?php } ?>
            </section>
           
		</article>
        <aside>
		<?php get_sidebar(); ?>
        </aside>
	</section>	
</div>
<?php get_footer(); ?>
