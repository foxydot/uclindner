<?php
/**
 * Template Name:Event paging
 
 */

$args=array(
'post_type'=>'tribe_events','orderby' => 'post_date','order' => 'DESC'
);

$my_array = query_posts($args); // THIS WORKS FINE

//$my_array = array('a' => 'a', 'b' =>'b', 'c'=>'c'); // THIS DOESN'T WORK

$arr = $my_array; 

$rows_per_page = 2;

$numrows = count($arr);

// Calculate number of $lastpage
$lastpage = ceil($numrows/$rows_per_page);

// condition inputs/set default
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
}

// validate/limit requested $pageno
$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   //$pageno = $lastpage;
}
if ($pageno < 1) {
   $pageno = 1;
}

// Find start and end array index that corresponds to the requested pageno
$start = ($pageno - 1) * $rows_per_page;
$end = $start + $rows_per_page -1;

// limit $end to highest array index
if($end > $numrows - 1){
    $end = $numrows - 1;
}
//print $lastpage."=".$pageno;
if ($pageno > $lastpage) {
	print 'no';
} else {
	// display array from $start to $end
	for($i = $start;$i <= $end;$i++){
		
	$autor_id = $arr[$i]->post_author;
			
	?>
		<section class="articleListing">
		<figure>
			<?php //echo the_post_thumbnail(array(95,93));
			 echo get_the_post_thumbnail( $arr[$i]->ID, array(95,93));
			 ?>					
		</figure>
		<div class="articleDetails">
			 
			<h3><?php print $arr[$i]->post_title; ?></h3>
			<span>
				<strong>By:</strong> 
				<?php the_author_meta('user_nicename', $autor_id); ?> | <?php print date('F j, Y', strtotime($arr[$i]->post_date)); ?>
			</span>
			<?php  
			$len = strlen($arr[$i]->post_content);
			if($len>364){
				$ht = substr($arr[$i]->post_content,0,364).'[...]';
			} else {
				$ht = $arr[$i]->post_content;
			}
			print $ht;
			
			 ?>
			 <br>
			<?php $elink1 = 'http://rou-lindner-school.landingpages.tv/calendar/'.$arr[$i]->post_name; ?>

			<a href="<?php print $elink1 ?>" title="Continue Reading">Continue Reading</a>
		
		<!-- /articleDetails --></div>
	<!-- /articleListing --></section>
	<?php
		
		
	}

}

?>
