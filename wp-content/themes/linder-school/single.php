<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php /*
<article>
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</article>
<aside>
<?php //get_sidebar(); ?>
</aside>
* 
* 
* 
* 
<div class="innerContainer">
	<section class="inner">
		<article>
        	<div class="articleTitle"><h2><?php the_title(); ?></h2>
        	* </div>
        	<?php while ( have_posts() ) : the_post(); ?>
            
			<section class="blogOutr">
            	
				<p><?php the_content(); ?></p>
                <?php comments_template( '', true ); ?>
            </section>
            <?php endwhile; // end of the loop. ?>
		</article>
        <aside>
		<?php get_sidebar(); ?>
        </aside>
	</section>	
</div>
*/ ?>

<div class="innerContainer">
	<section class="inner">
		<div class="span12 floatL">
    	<article>
        	<div class="articleTitle">
				<h2>
				<?php 
					$post_id = get_the_ID();
					$args = array();
					$catdata = wp_get_post_categories( $post_id, $args ); 
					$category_id = $catdata[0];
				print get_cat_name( $catdata[0] ); 
				?>
				</h2>
            </div>
            <?php while ( have_posts() ) : the_post(); ?>
			<section class="blogOutr">
            	<h3 style="width:100%"><?php the_title(); ?></h3>
				<span style=" float: left; margin-left: 26px;">
					<strong>By:</strong> 
					<?php the_author() ?> | <?php the_date() ?>
				</span>
                
                <div class="widgets">
				</div>
				
                <div class="blogImgs">
					<?php echo the_post_thumbnail(array(302,623)); ?>	
				</div>
				<?php the_content(); ?>
				<div style="float: left; margin-left: 23px;margin-top: 15px;">
					<span class='st_facebook_hcount' displayText='Facebook'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
					<span class='st_googleplus_hcount' displayText='Google +'></span>
					<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
				
				</div>
				
                <div class="widgets">
				</div>
				<?php comments_template( '', true ); ?>
            </section>
            
			<?php endwhile; // end of the loop. ?>
            
        <!-- /article --></article>
        
        <div class="pagination">
			
			<?php if ($options['disable_single_pagination'] != true) { ?>
			   <?php previous_post_link('%link', 'Previous Post', TRUE); ?>
			  <?php next_post_link('%link', 'Next Post', TRUE); ?>
			 <?php } ?>			
			
			
			
        	<!--
        	<a href="javascript:void(0);" title="Last Story">Last Story</a>
            <a href="javascript:void(0);" title="Next Story">Next Story</a>
			-->
        </div>
        
        </div>

       
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


<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "5136418f-19eb-4a33-ae9d-bb1f958d4e0a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php 
	if ( is_user_logged_in() ) {
?>
<script type="text/javascript"> 
$(document).ready(function(){
	
	$('#submit').click(function(){
		 var comment = $('#comment').val();
		 
		 if(comment == ''){
			$('.comment-form-comment').append( "<span style='color: red; float: left; margin-left: -135px; margin-right: 5px;margin-top: 4px; position: absolute; z-index: 100;' id='comment_span'>Please enter comment.</span>" );
			return false;
		 } 	else {
			$('.comment-form-comment').find('#comment_span').remove();
		 }
	})
	$('#comment').mouseover(function() {
		$('.comment-form-comment').find('#comment_span').remove();
	});

}); 
</script>

<?php
	} else {
?>
<script type="text/javascript"> 
$(document).ready(function(){
	$('.comment-form-comment label').append('&nbsp;<span class="required">*</span>');
	
	$('#submit').click(function(){
		 var comment = $('#comment').val();
		 var author = $('#author').val();
		 var email = $('#email').val();
		 var captcha_code = $('#captcha_code').val();
		 var si_code_com = $('#si_code_com').val();
		 

		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		var error = new Array(); 
		 
		$('.comment-form-author').find('#author_span').remove();
		$('.comment-form-email').find('#email_span').remove();
		$('.comment-form-comment').find('#comment_span').remove();
		$('#captcha_code_label').find('#captcha_code_span').remove();
		 
		 if(author == ''){
			$('.comment-form-author').append( "<span style='color: red; float: left; margin-left: -118px; margin-right: 5px;margin-top: 4px; position: absolute; z-index: 100;' id='author_span'>Please enter author.</span>" );
			error.push('author');
		 } else {
			$('.comment-form-author').find('#author_span').remove();
		 }
		 
		 if(email == '' || !filter.test(email)){
			$('.comment-form-email').append( "<span style='color: red; float: left; margin-left: -161px; margin-right: 5px;margin-top: 4px; position: absolute; z-index: 100;' id='email_span'>Please enter email address.</span>" );
			error.push('email');
		 } else {
			$('.comment-form-email').find('#email_span').remove();
		 }
		
		 if(captcha_code == '' || checkCaptcha(captcha_code,si_code_com) === false ){
			$('#captcha_code_label').append( "<span style='color: red; float: left; margin-left: 95px; margin-right: 5px;margin-top: 2px; position: absolute; z-index: 100;' id='comment_span'>Please enter captcha.</span>" );
			error.push('captcha_code');
		 } else {
			$('#captcha_code_label').find('#captcha_code_span').remove();
		 }	
		 
		 if(comment == ''){
			$('.comment-form-comment').append( "<span style='color: red; float: left; margin-left: -135px; margin-right: 5px;margin-top: 4px; position: absolute; z-index: 100;' id='comment_span'>Please enter comment.</span>" );
			error.push('comment');
		 } 	else {
			$('.comment-form-comment').find('#comment_span').remove();
		 }
		 
		if(error.length>0){
			return false;
		}		 
		 	 
	})
	
	$('#author').mouseover(function() {
		$('.comment-form-author').find('#author_span').remove();
	});
	$('#email').mouseover(function() {
		$('.comment-form-email').find('#email_span').remove();
	});
	$('#comment').mouseover(function() {
		$('.comment-form-comment').find('#comment_span').remove();
	});
	

}); 

function checkCaptcha(captcha_code,si_code_com){

	var isSuccess = false;

	$.ajax({ url: "http://rou-lindner-school.landingpages.tv/check_captcha.php?captcha_code="+captcha_code+ '&si_code_com='+si_code_com, 
			type: "GET",
			async: false, 
			success: 
				function(html) {
				
					if(html == 'yes'){
						isSuccess = true;
					} else {
						isSuccess = false;
					}				
				
				}
		  });
	return isSuccess;	 

}
</script>

<?php
	}
?> 
