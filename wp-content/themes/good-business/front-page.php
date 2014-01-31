<?php
/**
 * Home Page Template
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

            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $postcontent->ID ), 'homepage-slider' );
            ?>
                <li>
                    <div class="lftArea">
                        <img src="<?php echo $img[0]; ?>" alt="banner">
                        <div class="transOutr">
                        <h2><?php echo $postcontent->post_title; ?></h2>
                          <?php //echo substr($postcontent->post_content,0,200).'...'; ?>
                          <?php echo msd_trim_content($postcontent->post_content); ?>
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
      
    <?php print MSDLAB::recent_events_hp_widget(); ?>
             
             <?php
                 $args1 = array(
                        'post_type'      => 'post',
                        'cat'            => 17,
                        'order'          => 'DESC',
                        'posts_per_page' => 1
                    );
                $array_content2 = query_posts($args1);
             ?>
             
             
             <?php $elink1 = '/'.$array_content2[0]->post_name; ?>
             <a href="<?php print $elink1;?>">
             <section class="colum2">
             <!--
             <img src="<?php bloginfo('template_url'); ?>/images/generate_img.jpg" width="91" height="136" alt="Generate powerful value perception"> 
                -->
                <?php echo get_the_post_thumbnail( $array_content2[0]->ID, 'newsletter-thumbnail-size');?>
                 <span class="title">by <?php print $author;?>    <?php print date('M d Y', strtotime($array_content2[0]->post_date));?></span>

                <div><h3><?php print $array_content2[0]->post_title;?></h3></div>
                
             </section>
             </a>
             
             
             
      <!-- /rgtArea --></div>  
      
    <!-- /inner --></section>
<!-- /bannerOutr --></section>
<?php
    $args = array('category_name'=>'announcements','order'=> 'DESC');
    $posts_new_stripes=get_posts($args);
?>
<div class="latestNews">
    <section class="inner">
         <ul id="js-news" class="js-hidden">
           <?php 
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
            <?php $firstcol_img = get_the_post_thumbnail( $StudentSpotlights[0]->ID, 'homepage-footer',array("alt"=>"student spotlight")); ?>
              <div style="height:137px;overflow:hidden;">
              <?php echo $firstcol_img; ?>
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
              <?php $secondcol_img = get_the_post_thumbnail( $OrganizationSpotlight[0]->ID, 'homepage-footer',array("alt"=>"organization spotlight")); ?>
              <div style="height:137px;overflow:hidden;">
              <?php echo $secondcol_img; ?>
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
              <?php $thirdcol_img = get_the_post_thumbnail( $AlumniSpotlights[0]->ID, 'homepage-footer',array("alt"=>"alumni spotlight")); ?>
               <div style="height:137px;overflow:hidden;">
              <?php echo $thirdcol_img; ?>
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
