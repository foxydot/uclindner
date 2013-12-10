<?php
/**
 * @package WP Twitter/Facebook Style Pagination
 * @version 1.0.1
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */
 

add_action('init','init_js_scipts');
add_action('wp_head','init_pagination_js');
add_action('wp_ajax_paginate', 'wp_ajaxpaginate');
add_action('wp_ajax_nopriv_paginate', 'wp_ajaxpaginate');

$loopFile  = get_option('twg_tfsp_loop_file');
$contentEl = get_option('twg_tfsp_content_el_id');


function init_js_scipts(){
   wp_enqueue_script('jquery');
}

function wp_ajaxpaginate(){ 
    global $wp_query,$loopFile,$paged;

	$loop_file 		 = $_POST['loop_file'];
	if($loop_file)
	  $loopFile = $loop_file;

	$paged 		     = $_POST['page_no'];
	$posts_per_page  = get_option('posts_per_page');
	
	# Load the posts
	query_posts(array('paged' => $paged )); 
    
	# This action hook can be used to override the query_post used above
	do_action('twg_tfsp_query_posts');
	
	get_template_part( $loopFile );
		
	exit;
}


/***** Your custom query post hook  [Add this in your functions.php]
add_action('twg_tfsp_query_posts','twg_tfsp_custom_query_posts');

function twg_tfsp_custom_query_posts(){
  global $paged;
  # You can add any parameters here but the 'paged' parameter is a must	
  query_posts(array('post_type' => 'custom_post_type', 'paged' => $paged));
}
*/


function init_pagination_js(){
  global $wp_query,$contentEl,$loopFile,$maxpage;


?>
	<script type="text/javascript">
	  var content_el = '<?php echo $contentEl; ?>';
	  var loop_file  = '<?php echo $loopFile; ?>';
	  var page = 2;
		jQuery(function() {
		
			jQuery('.load_more').live("click",function() {
				var last_post_id = jQuery(this).attr("id");
				var category_id = $('#category_id').val();
				var max_page = $('#max_num_pages').val();
				//alert(category_id);
				if(max_page < page){
					alert('No more posts.');
					return false;
				}

				var a = '<?php echo  admin_url( 'admin-ajax.php' )?>';

					jQuery.ajax({
						type: "POST",
						url: "http://rou-lindner-school.landingpages.tv/getdata/?page_no="+page+ '&action=paginate&category_id='+category_id,
						data: "page_no="+page+ '&action=paginate&category_id='+category_id, 
						beforeSend:  function() {
								jQuery('a.load_more').html('<img src="<?php echo get_bloginfo('url');?>/wp-content/plugins/wp-twitterfacebook-style-pagination/images/loading.gif" />');
						},
						success: function(html){
							//jQuery("#more").remove();
							page = page + 1;
							jQuery('a.load_more').html('See more posts');
							
							//var html ='<section class="articleListing"><figure><img class="attachment-95x93 wp-post-image" width="95" height="86" alt="student-spotlight" src="http://rou-lindner-school.landingpages.tv/wp-content/uploads/2013/08/student-spotlight-150x137.jpg"></figure><div class="articleDetails"><h3>test2</h3><span><strong>By:</strong>admin | September 17, 2013</span>monthly message The University of Cincinnati Board of Trustees has established a licensing program to protect the name and identifying marks of the university and to prohibit the unauthorized use of university marks on commercial or other products. - See more at: http://rou-lindner-school.landingpages.tv/announcements/#sthash.uwyrXK9y.dpuf monthly message The University of Cincinnati Board of Trustees has established a […]<br><a title="Continue Reading" href="http://rou-lindner-school.landingpages.tv/test2/">Continue Reading</a></div></section>';
							jQuery("#"+content_el).append(html)
							
						}
					});
			return false;
			
			});
		});
	
	</script>
<?php
}

function twg_tfsp_paginate($loop_file='',$content_el='',$category_id){
global $wp_query,$contentEl,$loopFile;

if($loop_file) 
 $loopFile = $loop_file;


if($content_el)
 $contentEl = $content_el;

$page_no = $_POST['page_no'];

if(empty($page_no)) $page_no = 1;

if($page_no <= $wp_query->max_num_pages):
	 
	if (  $wp_query->max_num_pages > 1 ) :  
?>      <script>content_el ='<?php  echo $contentEl; ?>'; loop_file ='<?php  echo $loopFile; ?>';  </script>
		<input type="hidden" name="category_id" id="category_id" value="<?php print $category_id;?>">
		<input type="hidden" name="max_num_pages" id="max_num_pages" value="<?php print $wp_query->max_num_pages;?>">
		<div id="more" class="navigation" style="cursor:pointer">
			<a  id="<?php echo $page_no+1;?>" class="load_more" href="#">
			<!--
			<img src="<?php echo get_bloginfo('url');?>/wp-content/plugins/wp-twitterfacebook-style-pagination/images/loadmore.png" />
			-->
			See more posts
			</a>
		</div>
<?php	
	endif; 
	
endif; 

}
?>
