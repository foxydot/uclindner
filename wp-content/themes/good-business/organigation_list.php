<?php
/**
 * Template Name:Organization List
 
 */

get_header(); ?>


<div class="innerContainer">
	<section class="inner">
    	<article>
        	<div class="articleTitle">
				<h2>Organization Lists</h2>
            </div>
			<section class="blogOutr">
				<p>
					The Carl H. Lindner College of Business has top-notch student groups for students of every major. Check out all our groups on this page.
				</p>
				
				<?php
						$organizationArray = array(
							'alpha-kappa-psi' => 'Alpha Kappa Psi',
							'alpha-rho-epsilon' => 'Alpha Rho Epsilon',
							'american-marketing-association' => 'American Marketing Association',
							'apics' => 'APICS: Society for Operations Management',
							'beta-alpha-psi' => 'Beta Alpha Psi',
							'beta-gamma-sigma' => 'Beta Gamma Sigma',
							'black-business-students-association' => 'Black Business Students Association',
							'delta-sigma-pi' => 'Delta Sigma Pi',
							'entrepreneurship-club' => 'Entrepreneurship Club',
							'finance-club' => 'Finance Club',
							'international-business-club' => 'International Business Club',
							'kbs-student-association' => 'KBS Student Association',
							'lindner-college-of-business-ambassadors' => 'Lindner College of Business Ambassadors',
							'national-association-of-black-accountant' => 'National Association of Black Accountant',
							'net-impact' => 'Net Impact',
							'pi-sigma-epsilon' => 'Pi Sigma Epsilon',
							'uc-informs-student-chapter' => 'UC INFORMS Student Chapter',
							'uc-sales-leadership-club' => 'UC Sales Leadership Club',
							'ug-economics-society' => 'UG Economics Society'
						);
					?>
						<ul class="list1">

							<?php 
							$i=1;
							foreach($organizationArray as $ok => $odata){
								
								print '<li><a href="../category/organization-lists/'.$ok.'">'.$odata.'</a></li>';
								$i++;
							}
							?>
						</ul>

		
			</section>
			
			
        <!-- /article --></article>
			<?php 
				
				get_sidebar('feeds');
			
			?>
        
    
    <!-- /inner --></section>
<!-- /container --></div>


<?php get_footer(); ?>

<script type="text/javascript"> 
function show_events(page,totalpost){
	var content_el = 'page_data';	
		jQuery.ajax({
		type: "GET",
		url: "http://rou-lindner-school.landingpages.tv/event-paging/?pageno="+page,
		beforeSend:  function() {
				jQuery('.seeMore').html('<img src="<?php echo get_bloginfo('url');?>/wp-content/plugins/wp-twitterfacebook-style-pagination/images/loading.gif" />');
		},
		success: function(html){
			//jQuery("#more").remove();
			var nopost = 'No more posts.';
				if(html == 'no'){
					alert(nopost);
					jQuery('.seeMore').html('See more posts');
					
				} else {
					page = page + 1;
					jQuery('.seeMore').html('<a onclick="show_events('+page+','+totalpost+');" href="javascript:void(0);" title="See more posts">See more posts</a>');
					//var html ='<section class="articleListing"><figure><img class="attachment-95x93 wp-post-image" width="95" height="86" alt="student-spotlight" src="http://rou-lindner-school.landingpages.tv/wp-content/uploads/2013/08/student-spotlight-150x137.jpg"></figure><div class="articleDetails"><h3>test2</h3><span><strong>By:</strong>admin | September 17, 2013</span>monthly message The University of Cincinnati Board of Trustees has established a licensing program to protect the name and identifying marks of the university and to prohibit the unauthorized use of university marks on commercial or other products. - See more at: http://rou-lindner-school.landingpages.tv/announcements/#sthash.uwyrXK9y.dpuf monthly message The University of Cincinnati Board of Trustees has established a […]<br><a title="Continue Reading" href="http://rou-lindner-school.landingpages.tv/test2/">Continue Reading</a></div></section>';
					jQuery("#"+content_el).append(html)
				}
			
		}
	});

}	

</script>
