<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<section class="bannerOutr pdgTop25">
	<section class="inner">
    	<div id="mainSlider">
        	<ul class="slides">
            <?php 
            $args=array('category'=>3,
						'order' => 'DESC',
						'orderby'=> 'post_date',
						'posts_per_page'   => 3
						);
			$posts=get_posts($args);
			foreach ($posts  as $postcontent){
				//print "<pre>";
				//print_r($postcontent);

			$img = wp_get_attachment_url(  get_post_thumbnail_id( $postcontent->ID ) ); 
			?>
                <li>
                    <div class="lftArea">
                        <img src="<?php echo $img; ?>" width="640" height="456" alt="banner">
                        <div class="transOutr">
                        <h2><?php echo $postcontent->post_title; ?></h2>
                          <?php echo substr($postcontent->post_content,0,200).'...'; ?>
                          <br> <br>
							<div class="learnMore">
								<a title="Learn More" href="<?php echo $postcontent->post_name; ?>">Learn More</a>
							</div>
                      </div>
                    </div>
                </li>
                <?php } ?>
				 <?php wp_reset_postdata(); ?> 
            </ul>
      </div>
      
      <div class="rgtArea">
      
	<?php 
	$args=array('post_type'=>'tribe_events','orderby' => 'post_date','order' => 'DESC');
	
	$array_content = get_posts($args);
	foreach($array_content as $eventpost){
		$Epost_name = $eventpost->post_name;
		$EeventID = $eventpost->ID;
		$Epost_title = $eventpost->post_title;
		$Epost_content = $eventpost->post_content;
	}
	//print $post_name;
	//global $wpdb;
	//echo $wpdb->last_query;
	//print "<pre>";
	//print_r($array_content);
	$author = get_the_author();
	?> 
          	<section class="upcomingEvent" >
				<?php $elink = 'http://rou-lindner-school.landingpages.tv/calendar/'.$Epost_name; ?>
				<a href="<?php print $elink;?>">
            	<div style="float: left; overflow: hidden;     width: 290px; height:141px;">
					<!--
                <img src="<?php bloginfo('template_url'); ?>/images/upcoming_event.jpg" width="291" height="141" alt="upcoming event">
                -->
                <?php echo get_the_post_thumbnail( $EeventID ); ?>	
                	<span>upcoming event</span>
                </div>
                <div class="upcomingDetails" style="height:112px !important;">
                	<h3><?php print $Epost_title;?></h3>
                  <p><?php print substr($Epost_content,0,85).'..';?></p>
                  <a href="<?php print $elink;?>" title="Signup Now">Signup Now</a>
                  <a href="/events/" title="See All Events">See All Events</a>
                </div>
                </a>
       		 </section>
       		 
       		 <?php
				 $args1 = array(
						'post_type'      => 'post',
						'cat'            => 17,
						'order'          => 'DESC',
						'posts_per_page' => 1
					);
				$array_content2 = query_posts($args1);
       		 ?>
       		 
       		 
             <?php $elink1 = 'http://rou-lindner-school.landingpages.tv/'.$array_content2[0]->post_name; ?>
			 <a href="<?php print $elink1;?>">
             <section class="colum2">
       	     <!--
       	     <img src="<?php bloginfo('template_url'); ?>/images/generate_img.jpg" width="91" height="136" alt="Generate powerful value perception"> 
				-->
				<?php echo get_the_post_thumbnail( $array_content2[0]->ID, array(91,136));?>
				 <span class="title">by <?php print $author;?>    <?php print date('M d Y', strtotime($array_content2[0]->post_date));?></span>

                <div><h3><?php print $array_content2[0]->post_title;?></h3></div>
				
             </section>
             </a>
             
             
             
      <!-- /rgtArea --></div>  
      
    <!-- /inner --></section>
<!-- /bannerOutr --></section>

<div class="latestNews">
	<section class="inner">
    	 <ul id="js-news" class="js-hidden">
		   <?php 
			$category_id = get_cat_ID('announcements'); 
		    $args_new=array('category'=>$category_id,'order'=> 'DESC');
			$posts_new_stripes=get_posts($args_new);
			
			foreach ($posts_new_stripes  as $posts_new_stripes_content){	
			?>	 
            <li class="news-item"><?php echo $posts_new_stripes_content->post_content; ?></li>
		<?php } ?>
        </ul>
        <a href="/category/announcements/" title="View All News">View All News</a>
  <!-- /inner --></section>
<!-- /latestNews --></div>
<div class="container">
	<section class="inner">
<div class="colOutr">
	
 <?php
	 $args = array(
			'post_type'      => 'post',
			'cat'            => 19,
			'order'          => 'DESC',
			'posts_per_page' => 1
		);
		
	$StudentSpotlights = query_posts($args);
	$cat_data = get_category(19);
	$cat_name = $cat_data->name;
 ?>
	
<!--first colunm-->
	<div class="categoriesSlides">
		<ul class="slides1">

			<li>		
        	<div class="col">
			<?php $firstcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $StudentSpotlights[0]->ID ) ); ?>
           	  <div style="height:137px;overflow:hidden;">
           	  <img src="<?php echo $firstcol_img; ?>" width="278"   alt="student spotlight">
              </div>
              <span><?php print $cat_name;?></span>  
              <div class="upcomingDetails">
                	<h3><?php echo $StudentSpotlights[0]->post_title; ?></h3>
                 
				  <?php
				  	$firstcol_content =  wp_trim_words($StudentSpotlights[0]->post_content, 20); 
					echo apply_filters( 'the_content', $firstcol_content ); 
				   ?>
              
                  <a title="Read More" href="<?php echo get_permalink( $StudentSpotlights[0]->ID ); ?>">Read More </a>
              </div>
			</div>
			</li>
    </ul>
    </div>
  <!--  first colunm ends-->
    
		<!--second colunm starts-->
<div class="categoriesSlides">
	
 <?php
	 $args = array(
			'post_type'      => 'post',
			'cat'            => 18,
			'order'          => 'DESC',
			'posts_per_page' => 1
		);
		
	$OrganizationSpotlight = query_posts($args);
	$cat_data = get_category(18);
	$cat_name = $cat_data->name;
 ?>	
	
			<ul class="slides2">
			<li>
        	<div class="col">
			<?php $secondcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $OrganizationSpotlight[0]->ID ) ); ?>
           	  <div style="height:137px;overflow:hidden;">
           	  <img src="<?php echo $secondcol_img; ?>" width="278" alt="student spotlight">
              </div>
              <span><?php echo $cat_name; ?></span>  
              <div class="upcomingDetails">
                	<h3><?php 
						$post_title = $OrganizationSpotlight[0]->post_title; 
						print substr($post_title,0,15).'...';
                	?></h3>
                 
				  <?php
				  	$secondcol_content =  wp_trim_words($OrganizationSpotlight[0]->post_content, 15); 
					echo apply_filters( 'the_content', $secondcol_content ); 
				   ?>
                  
                  <a title="Read More" href="<?php echo get_permalink( $OrganizationSpotlight[0]->ID ); ?>">Read More </a>
              </div>
			<!-- /col --></div>
			</li>
			</ul>
			</div>
    
         <!--second colunm ends-->   
           
           
           
           
           
		<!--third colunm starts-->
<div class="categoriesSlides">
	
 <?php
	 $args = array(
			'post_type'      => 'post',
			'cat'            => 20,
			'order'          => 'DESC',
			'posts_per_page' => 1
		);
		
	$AlumniSpotlights = query_posts($args);
	$cat_data = get_category(20);
	$cat_name = $cat_data->name;
 ?>		
	
			<ul class="slides3">

			<li>
        	<div class="col">
			<?php $secondcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $AlumniSpotlights[0]->ID ) ); ?>
           	   <div style="height:137px;overflow:hidden;">
           	  <img src="<?php echo $secondcol_img; ?>" width="278"  alt="student spotlight">
              </div>
              <span><?php echo $cat_name; ?></span>  
              <div class="upcomingDetails">
                	<h3><?php echo $AlumniSpotlights[0]->post_title; ?></h3>
                 
				  <?php
				  	$secondcol_content =  wp_trim_words($AlumniSpotlights[0]->post_content, 20); 
					echo apply_filters( 'the_content', $secondcol_content ); 
				   ?>
                  
                  <a title="Read More" href="<?php echo get_permalink( $AlumniSpotlights[0]->ID ); ?>">Read More </a>
              </div>
			<!-- /col --></div>
			</li>

			</ul>
			</div>
    
         <!--third colunm ends-->   
            
        </div>
    <!-- /inner --></section>
<!-- /container --></div>
<?php get_footer(); ?>
