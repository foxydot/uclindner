<?php
/**
 * Template Name:cat blog
 
 */

get_header(); ?>


<div class="innerContainer">
	<section class="inner">
		<?php $category_id = get_query_var('cat');
		$categories = get_the_category();
		//print "<pre>";		print_r($categories);
		$parent = 0;
		if($categories){
			foreach($categories as $category) {
				$parent = $category->parent;
				$slug = $category->slug;
			}
		}
		 ?>
    	<article>
        	<div class="articleTitle">
				<h2><?php print get_cat_name( $category_id ) ?></h2>
				<?php
					if($parent == 50) {
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
						<select  onChange="show_organization(this.value);" style="background: none repeat scroll 0 0 #FFFFFF; float: right; font-size: 14px; height: 31px; margin-right: 10px; margin-top: 7px; width: 242px; font-family: 'open_sansregular'; padding-top:4px;">
						<option value="" selected >Select on organization to filter</option>
							<?php 
							$i=1;
							foreach($organizationArray as $ok => $odata){
								if($ok == $slug){
									$sel = 'selected=selected';
								} else {
									$sel = '';
								}
								if($category_id == $parent){
									$sel = '';
								}
								
								print '<option '.$sel.' value="'.$ok.'">'.$odata.'</option>';
								$i++;
							}
							?>
						</select>

					<?php
					}
				?>
				
            </div>
        	<?php 

			   
        	
        	 $args = array(
				'post_type'      => 'post',
				'cat'            => $category_id,
				'order'          => 'DESC',
				'posts_per_page' => 2
			);
			if($parent == 50){
			    $data = get_page_by_path('/lcb-student-organizations/'.$slug);
                print '<section class="blogOutr">'.nl2br($data->post_content).'</section>';
			}
			if($category_id == 12) {
				print '<p style="margin-left:35px;margin-top: 10px;">
							<a class="twitter-btn" href="https://twitter.com/lcbsat" target="_blank" title="Follow Us on Twitter">Follow Us on Twitter</a>
						</p>';
				print '<p style="margin-left:35px;margin-top: 10px;">
							<a class="facebook-btn" href="https://www.facebook.com/studentactionteam" target="_blank" title="Follow Us on Facebook">Follow Us on Facebook</a>
						</p>';
			}
			
			if($category_id == 47) {
				$data = get_page(140);
				print '<section class="blogOutr">'.nl2br($data->post_content).'</section>';
					
			}
			
			if($category_id == 48) {
				$data = get_page(138);
		
				print '<section class="blogOutr">'
				.nl2br($data->post_content).
				'</section>';
					
			}
			
			if($category_id == 49) {
				$data = get_page(132);
				///print "<pre>";
				//print_r($data);
				print '<section class="blogOutr">'
				.nl2br($data->post_content).
				do_shortcode('[contact-form-7 id="983" title="20/20 Speaker Series"]').
				'</section>';
					
			}
			if($category_id == 16) {
				$data = get_page(136);
				///print "<pre>";
				//print_r($data);
                print '<section class="blogOutr">';
				print nl2br($data->post_content);
                print '</section>';
					
			}
			if($category_id == 17) {
				$data = get_page(1049);
				///print "<pre>";
				//print_r($data);
                print '<section class="blogOutr">';
                print nl2br($data->post_content);
				print '</section>';
			}
			if($category_id == 88) {
				$data = get_page(134);
				print '<section class="blogOutr">'
				.nl2br($data->post_content).'</section>';
			}
						
			print '<div id="page_data">';
			
			query_posts($args);
			while ( have_posts() ) : the_post();
			?>          
            
            <section class="articleListing">
            	<figure>
					<?php echo the_post_thumbnail(array(95,93)); ?>					
				</figure>
                <div class="articleDetails">
					 
                	<h3><?php the_title(); ?></h3>
                    <span>
						<strong>By:</strong> 
						<?php the_author() ?> | <?php the_time('F j, Y'); ?>
					</span>
                   	<?php $_output = get_the_excerpt(); echo excerpt_read_more_link($_output); ?>
                    <a href="<?php the_permalink(); ?>" title="Continue Reading">Continue Reading</a>
                
                <!-- /articleDetails --></div>
            <!-- /articleListing --></section>
			<?php endwhile; // end of the loop. ?>
			
			<?php
			if($category_id == 48) {
				print '<div style="float:left;margin-left:30px;">';
				print do_shortcode('[nggallery id=31]');
				print '</div>';
			}
			?>
			<?php
			if($category_id == 47) {
				print '<div style="float:left;margin-left:30px;">';
				print do_shortcode('[nggallery id=32]');
				print do_shortcode('[nggallery id=33]');
				print do_shortcode('[nggallery id=34]');
				print '</div>';
			}
			?>
			
			<?php
			if($category_id == 16) {
				print '<div style="float:left;margin-left:30px;">';
				print do_shortcode('[nggallery id=25]');
				print '</div>';
			}
			
			
			if($category_id == 88) {
                print '<section class="blogOutr">'
                .do_shortcode('[nggallery id=41]')
                .do_shortcode('[nggallery id=35]')
                .do_shortcode('[nggallery id=36]')
                .do_shortcode('[nggallery id=37]')
                .do_shortcode('[nggallery id=38]')
                .do_shortcode('[nggallery id=39]')
                .do_shortcode('[nggallery id=40]').'</section>';
            }
			
			if($category_id == 49) {
				print '<div style="float:left;margin-left:30px;">';
				print do_shortcode('[nggallery id=30]');
				print '</div>';
			}
			?>
			
			
			</div>
            <section class="seeMore">
				<!--
				<a href="javascript:void(0);" title="See more posts">See more posts</a>
				-->
			<?php 

				if(function_exists('twg_tfsp_paginate')) {
					twg_tfsp_paginate('getdata','page_data',$category_id);
				}
				
			
			?>				
			</section>
			
        <!-- /article --></article>
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
