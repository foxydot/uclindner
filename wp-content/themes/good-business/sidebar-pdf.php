<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<aside>
<?php 
	//$organizational_list_page_id  = 327;
	//$list_data = get_page ( $organizational_list_page_id );
?>
    <h3 class="socialFeed" style="margin-bottom: 0px !important;">Newsletter</h3>
	 <div class="whiteBg">
		 <select name="newsletter_pdf" id="newsletter_pdf" class="newsletter_pdf_select" onChange="showNewsletter(this.value);">
		 <option value="">---Select---</option>
    <?php 
     $category_id = get_query_var('cat');
    wp_reset_query();
    $arg= array('post_type'=>'pdf');
    $array=get_posts($arg);
    $i=0;
   foreach ($array as $content){
	   $class = ($i%2) ? 'class="whiteBg"' : 'class="greyBg"';
	   $file_url  = get_post_meta( $content->ID, 'wpcf-enter-pdf', true );
    ?>
    <option value="<?php echo $file_url; ?>"><?php print $content->post_title;?></option>
		<!--
		<div <?php print $class;?> >
			<span style="cursor:pointer;" >
				<a target="_blank" href="<?php echo $file_url; ?>"><?php print $content->post_title;?></a>
			</span>
		</div>
		-->
	<?php $i++; } ?>
	</select>
	</div>
<!-- /aside -->
		<?php
		if($category_id == 21){
			print do_shortcode("[AIGetTwitterFeeds ai_username='lcbsat' ai_numberoftweets='3' ai_tweet_title='Latest Twitter Feeds']");
			print '<h3 class="facebook-title">Facebook Feeds</h3>';
			print do_shortcode("[fts facebook page id=studentactionteam]"); 
			
		} else {?>
		
		<fieldset class="newsletter">
			<label>Subscribe Newsletter</label>
			<div class="txtField">
				<span id="span_sign_news" >Sending....</span>
				<input type="text" name="sign_news" id="sign_news" placeholder="e-mail">
				<button id="btnPerspective" onclick="send_sign_newsletter();">GO</button>
			</div>
		</fieldset>
		<?php } ?>

</aside>
