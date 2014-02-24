<?php
/**
 * Template Name:get data
 
 */

 $args = array(
				'post_type'      => 'post',
				'cat'            => $_GET['category_id'],
				'order'          => 'DESC',
				'posts_per_page' => 2,
				'paged'        => $_GET['page_no']
			);

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


