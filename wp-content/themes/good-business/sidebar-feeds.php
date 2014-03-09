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
    <h3 class="socialFeed">Social Feed</h3>
		
	<?php 
		//do_shortcode("[fts twitter twitter_name=lcbsat]");
		
		print do_shortcode("[AIGetTwitterFeeds ai_username='lcbsat' ai_numberoftweets='3' ai_tweet_title='Latest Twitter Feeds']");
		print '<h3 class="facebook-title">Facebook Feeds</h3>';
		print do_shortcode("[fts facebook page id=studentactionteam]"); 
	?>	
	  
<!-- /aside -->

</aside>
