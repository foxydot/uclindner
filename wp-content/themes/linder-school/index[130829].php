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
            <?php $args=array('category'=>3);
			$posts=get_posts($args);
			foreach ($posts  as $postcontent){
			$img = wp_get_attachment_url(  get_post_thumbnail_id( $postcontent->ID ) ); 
			?>
                <li>
                    <div class="lftArea">
                        <img src="<?php echo $img; ?>" width="640" height="456" alt="banner">
                        <div class="transOutr">
                        <h2><?php echo $postcontent->post_title; ?></h2>
                          <?php echo $postcontent->post_content; ?>
                            
                      </div>
                    </div>
                </li>
                <?php } ?>
				 <?php wp_reset_postdata(); ?> 
            </ul>
      </div>
      
      <div class="rgtArea">
      
          	<section class="upcomingEvent">
            	<div>
                <img src="<?php bloginfo('template_url'); ?>/images/upcoming_event.jpg" width="291" height="141" alt="upcoming event">
                	<span>upcoming event</span>
                </div>
                <div class="upcomingDetails">
                	<h3>35 Years of Education Experience</h3>
                  <p>Since its beginnings in 1819 as Cincinnati College, the University of Cincinnati.</p>
                  <a href="javascript:void(0);" title="Signup Now">Signup Now</a>
                  <a href="javascript:void(0);" title="See All Events">See All Events</a>
                </div>
       		 </section>
             
             <section class="colum2">
       	     <img src="<?php bloginfo('template_url'); ?>/images/generate_img.jpg" width="91" height="136" alt="Generate powerful value perception"> 
             	<span class="title">by bhavik    july 12 2013</span>
                <div><h3>Generate powerful value perception</h3></div>
             </section>
      <!-- /rgtArea --></div>  
      
    <!-- /inner --></section>
<!-- /bannerOutr --></section>
<div class="latestNews">
	<section class="inner">
    	
        <ul id="js-news" class="js-hidden">
            <li class="news-item">Since its beginnings in 1819 as Cincinnati College, the University of Cincinnati has moved, grown</li>
            <li class="news-item">Cincinnati College, the University of Cincinnati has moved, grown</li>
            <li class="news-item">Since its beginnings in 1819 as Cincinnati College, the University of Cincinnati has moved, grown</li>
            <li class="news-item">Beginnings in 1819 as Cincinnati College, the University of Cincinnati has moved, grown</li>
            <li class="news-item">The University of Cincinnati has moved, grown</li>
            <li class="news-item">Since its beginnings in 1819 as Cincinnati College, the University of Cincinnati has moved, grown</li>
            <li class="news-item">Cincinnati College, the University of Cincinnati has moved, grown</li>
        </ul>
        <a href="javascript:void(0);" title="View All News">View All News</a>
  <!-- /inner --></section>
<!-- /latestNews --></div>
<div class="container">
	<section class="inner">
<div class="colOutr">
			<?php 
				$firstcol_pageid = 27;
				$firstcol_page_data = get_page ( $firstcol_pageid );
				// echo "<pre>"; print_r($page_data);
			?>
        	<div class="col">
			<?php $firstcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $firstcol_pageid ) ); ?>
           	  <img src="<?php echo $firstcol_img; ?>" width="278" height="137" alt="student spotlight">
              <span><?php echo get_field('post_sub_title',$firstcol_pageid)?></span>  
              <div class="upcomingDetails">
                	<h3><?php echo $firstcol_page_data->post_title; ?></h3>
                 
				  <?php
				  	$firstcol_content =  wp_trim_words($firstcol_page_data->post_content, 20); 
					echo apply_filters( 'the_content', $firstcol_content ); 
				   ?>
              
                  <a title="Read More" href="<?php echo get_permalink( $firstcol_pageid ); ?>">Read More </a>
              </div>
			<!-- /col --></div>
            
            <?php 
				$secondcol_pageid = 31;
				$secondtcol_page_data = get_page ( $secondcol_pageid );
				// echo "<pre>"; print_r($page_data);
			?>
        	<div class="col">
			<?php $secondcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $secondcol_pageid ) ); ?>
           	  <img src="<?php echo $secondcol_img; ?>" width="278" height="137" alt="student spotlight">
              <span><?php echo get_field('post_sub_title',$secondcol_pageid)?></span>  
              <div class="upcomingDetails">
                	<h3><?php echo $secondtcol_page_data->post_title; ?></h3>
                 
				  <?php
				  	$secondcol_content =  wp_trim_words($secondtcol_page_data->post_content, 15); 
					echo apply_filters( 'the_content', $secondcol_content ); 
				   ?>
                  
                  <a title="Read More" href="<?php echo get_permalink( $secondcol_pageid ); ?>">Read More </a>
              </div>
			<!-- /col --></div>
            
            <?php 
				$thirdcol_pageid = 34;
				$thirdcol_page_data = get_page ( $thirdcol_pageid );
				// echo "<pre>"; print_r($page_data);
			?>
        	<div class="col">
			<?php $thirdcol_img = wp_get_attachment_url(  get_post_thumbnail_id( $thirdcol_pageid ) ); ?>
           	  <img src="<?php echo $thirdcol_img; ?>" width="278" height="137" alt="student spotlight">
              <span><?php echo get_field('post_sub_title',$thirdcol_pageid)?></span>  
              <div class="upcomingDetails">
                	<h3><?php echo $thirdcol_page_data->post_title; ?></h3>
                 
				  <?php
				  	$thirdcol_content =  wp_trim_words($thirdcol_page_data->post_content, 15); 
					echo apply_filters( 'the_content', $thirdcol_content ); 
				   ?>
                 
                  <a title="Read More" href="<?php echo get_permalink( $thirdcol_pageid ); ?>">Read More </a>
              </div>
			<!-- /col --></div>
            
        </div>
    <!-- /inner --></section>
<!-- /container --></div>
<?php get_footer(); ?>
