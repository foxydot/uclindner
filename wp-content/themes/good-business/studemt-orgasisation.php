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
        <div class="enqDrop">
          <select class="enqDropIn">
            <option>Select on organization to filter</option>
            <option>Select 1</option>
            <option>Select 2</option>
            <option>Select 3</option>
            <option>Select 4</option>
          </select>
        </div>
      </div>
      <?php query_posts('cat=8&showposts=5'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section class="articleListing">
        <figure>
          <?php 
if ( has_post_thumbnail() ) { 
  the_post_thumbnail('thumbnail');
} 
?>
        </figure>
        <div class="articleDetails">
          <h3>
            <?php the_title();?>
          </h3>
          <span><strong>By:</strong>
          <?php the_author() ?>
          |
          <?php the_time('F jS, Y') ?>
          </span>
         
            <?php the_excerpt(); ?>
   	
          <a href="<?php the_permalink();?>" title="Continue Reading">Continue Reading</a> 
          <!-- /articleDetails --></div>
        <!-- /articleListing --></section>
      <?php endwhile; else: ?>
      <p>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
      </p>
      <?php endif; ?>
      <section class="seeMore"><a href="javascript:void(0);" title="See more posts">See more posts</a></section>
      <!-- /article --></article>
    <aside>
      <h3>Organizations List</h3>
      <p class="pdgLft25">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. </p>
      <div class="greyBg">
        <h4>Lorem ipsum dolor sit </h4>
        <p>Lorem ipsum dolor sit amet, conse ctetur</p>
        <span>John C. Smit</span> <small>Suspendisse iaculis facilisis</small>
        <ul>
          <li class="mail"><a href="javascript:void(0);">info@xyz.com</a></li>
          <li class="phone">91 123 1324 123</li>
          <li class="www">www.xyz.com</li>
        </ul>
      </div>
      <div class="whiteBg">
        <h4>Lorem ipsum dolor sit </h4>
        <p>Lorem ipsum dolor sit amet, conse ctetur</p>
        <span>John C. Smit</span> <small>Suspendisse iaculis facilisis</small>
        <ul>
          <li class="mail"><a href="javascript:void(0);">info@xyz.com</a></li>
          <li class="phone">91 123 1324 123</li>
          <li class="www">www.xyz.com</li>
        </ul>
      </div>
      <div class="greyBg">
        <h4>Lorem ipsum dolor sit </h4>
        <p>Lorem ipsum dolor sit amet, conse ctetur</p>
        <span>John C. Smit</span> <small>Suspendisse iaculis facilisis</small>
        <ul>
          <li class="mail"><a href="javascript:void(0);">info@xyz.com</a></li>
          <li class="phone">91 123 1324 123</li>
          <li class="www">www.xyz.com</li>
        </ul>
      </div>
      <!-- /aside --></aside>
    
    <!-- /inner --></section>
  <!-- /container --></div>
<?php get_footer(); ?>
