<?php
/**
 * Template Name:Event blog
 
 */

get_header(); ?>


<div class="innerContainer">
	<section class="inner">
    	<article>
        	<div class="articleTitle">
				<h2>Events</h2>
            </div>
        	<?php 
        	// echo do_shortcode('[google-calendar-events id="1" type="list-grouped" title="" ]'); 
        	
			$args=array('post_type'=>'tribe_events','posts_per_page' => 2,
			'orderby' => 'post_date','order' => 'DESC'
			);
						
			print '<div id="page_data">';
			
			
			
			
			query_posts($args);
			
			$ii=0;
			while ( have_posts() ) : the_post();
			if($ii>1){
				continue;
			}
			$ii++;
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
			<?php endwhile;  // end of the loop. ?>
			</div>
            <section class="seeMore">
				<?php
				global $wp_query;
				//print "<pre>";
				//print_r($wp_query);
				$totalpost = $wp_query->post_count;
				if($totalpost > 2){
					print  '<a onclick="show_events(2,'.$totalpost.');" href="javascript:void(0);" title="See more posts">See more posts</a>';
				}
				?>
				
				<!--
				<a href="javascript:void(0);" title="See more posts">See more posts</a>
				-->
				<?php //pagination(); ?>			
			</section>
			
        <!-- /article --></article>
			<?php 
			
			if($category_id == 17 || $category_id == 21 ){
				get_sidebar('pdf');
			} else if($category_id == 19) {
			//} else if($category_id == 12 || $category_id == 18 || $category_id == 20 || $category_id == 13){
				//get_sidebar();
				get_sidebar('feeds');
			} else {
				
				get_sidebar('feeds');
			} 
			
			?>
        
    
    <!-- /inner --></section>
<!-- /container --></div>


<?php get_footer(); ?>

<script type="text/javascript"> 
function show_events(page,totalpost){
	var content_el = 'page_data';	
		jQuery.ajax({
		type: "GET",
		url: "http://rou-lindner-school.landingpages.tv/event-paging/?pageno="+page,
		beforeSend:  function() {
				jQuery('.seeMore').html('<img src="<?php echo get_bloginfo('url');?>/wp-content/plugins/wp-twitterfacebook-style-pagination/images/loading.gif" />');
		},
		success: function(html){
			//jQuery("#more").remove();
			var nopost = 'No more posts.';
				if(html == 'no'){
					alert(nopost);
					jQuery('.seeMore').html('See more posts');
					
				} else {
					page = page + 1;
					jQuery('.seeMore').html('<a onclick="show_events('+page+','+totalpost+');" href="javascript:void(0);" title="See more posts">See more posts</a>');
					//var html ='<section class="articleListing"><figure><img class="attachment-95x93 wp-post-image" width="95" height="86" alt="student-spotlight" src="http://rou-lindner-school.landingpages.tv/wp-content/uploads/2013/08/student-spotlight-150x137.jpg"></figure><div class="articleDetails"><h3>test2</h3><span><strong>By:</strong>admin | September 17, 2013</span>monthly message The University of Cincinnati Board of Trustees has established a licensing program to protect the name and identifying marks of the university and to prohibit the unauthorized use of university marks on commercial or other products. - See more at: http://rou-lindner-school.landingpages.tv/announcements/#sthash.uwyrXK9y.dpuf monthly message The University of Cincinnati Board of Trustees has established a […]<br><a title="Continue Reading" href="http://rou-lindner-school.landingpages.tv/test2/">Continue Reading</a></div></section>';
					jQuery("#"+content_el).append(html)
				}
			
		}
	});

}	

</script>
