<?php
/**
 * Template Name:gallerie blog
 
 */
//http://wordpress.org/plugins/nextgen-gallery/installation/
get_header(); ?>

<div class="innerContainer">
	<section class="inner">
		
    	<article>
        	<div class="articleTitle">
				<h2><?php the_title(); ?></h2>
            </div>

			<section class="gallery">
				<!--
				<ul class="list1">
					<li><a href="2012-2013/">2012-2013</a></li>
					<li><a href="the-beginning-spring-2012/">The Beginning – Spring 2012</a></li>
					<li><a href="lcb-sat-cookout-august-28-2012/">LCB SAT Cookout – August 28, 2012</a></li>
					<li><a href="first-meeting-august-29-2012/">First Meeting! – August 29, 2012</a></li>
					<li><a href="impact-uc-gallery/">Impact UC Gallery</a></li>
					<li><a href="bearcatlaunchpad-gallery/">BearcatLaunchpad Gallery</a></li>
					<li><a href="career-fair-2012/">Career Fair 2012</a></li>
					<li><a href="intramurals-gallery/">Intramurals Gallery</a></li>
					<li><a href="speaker-series-gallery/">Speaker Series Gallery</a></li>
					<li><a href="cats-on-deck-gallery/">Cats on Deck Gallery</a></li>
					<li><a href="social-events/">Social Events</a></li>
					<li><a href="videos/">videos</a></li>
					<li><a href="sat-formal/">SAT Formal!</a></li>
					<li><a href="weekly-meeting-speakers/">Weekly Meeting Speakers</a></li>
					<li><a href="lindner-week-events/">Lindner Week Events</a></li>
					<li><a href="meeting-gallery/">Meeting Gallery</a></li>
				</ul>				
				-->	
				<br>
				<?php				
				$parent_page_id = get_top_parent_page_id();
				$children = wp_list_pages('depth=1&title_li=&child_of='.$parent_page_id.'&echo=0&sort_column=post_date&sort_order=DESC');

						
				?>		
				<ul class="list1">			
				<?php
						print $children;
				?>
				</ul>
				<br>
			</section>			
        </article>
			<?php get_sidebar('feeds'); ?>
        
    <!-- /inner --></section>
<!-- /container --></div>


<?php get_footer(); ?>
