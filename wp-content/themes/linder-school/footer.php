<footer>
	<section class="inner">
    	<div class="footerCol">
        	<?php 
				$firstcol_pageid = 102;
				$firstcol_page_data = get_page ( $firstcol_pageid );
				// echo "<pre>"; print_r($page_data);
			?>
			<!--
            <div class="title">
				<?php echo $firstcol_page_data->post_title; ?>
				</div>
            <p>
				<?php echo apply_filters( 'the_content', $firstcol_page_data->post_content );  ?></p>
            <span>- <?php echo get_field('person_name',$firstcol_pageid)?><br>
                <small><?php echo get_field('person_designation',$firstcol_pageid)?></small>
            </span>
            -->
		   <div class="monthly">         
				<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				<?php endif; ?>
			 </div>       
            
        <!-- /footerCol --></div>
        
        <div class="footerCol gap">
            <div class="title">General</div>
            <ul>
            	<?php wp_nav_menu( array('menu' => 'general_nav' , 'items_wrap' => '%3$s')); ?>
            </ul>
            
            <div class="title mrgTop">Programs</div>
            <ul>
            	<?php wp_nav_menu( array('menu' => 'programs_nav' , 'items_wrap' => '%3$s')); ?>
            </ul>
        <!-- /footerCol --></div>
        <div class="lastCol" style="padding-top: 46px !important;">
        
            	<fieldset>
                	<label>Perspective Newsletter</label>
                    <div class="txtField">
						<span style="color: #FF0000;float: left;font-size: 11px;margin-top: -17px;position: absolute;display:none;" id="span_pre_news" >Sending....</span>
                    	<input type="text" name="pre_news" id="pre_news" placeholder="e-mail">
                        <button id="btnPerspective" onclick="send_pre_newsletter();">GO</button>
                    </div>
                </fieldset>
                <fieldset>
                	<label>LSAT LISTSERV</label>
						<div class="txtField">
							<span style="color: #FF0000;float: left;font-size: 11px;margin-top: -17px;position: absolute;display:none;" id="span_btnlistserv" >Sending....</span>
							<input type="text" name="last_news" id="last_news" placeholder="e-mail">
							<button id="btnlistserv" onclick="send_newsletter();">GO</button>
						</div>
                    <?php 
                      //dynamic_sidebar('First Front Page Widget Area'); 
					?>                        
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
						<?php //dynamic_sidebar( 'sidebar-5' ); ?>
					<?php endif; ?>
										
                    
					

                </fieldset>
            
            <div class="title">Connect With Us</div>
            <div class="socialLinks">
            	<ul>
                	<li class="linkedin"><a href="http://www.linkedin.com/company/lindner-college-of-business-student-action-team" title="Linkedin">Linkedin</a></li>
                    <li class="twitter"><a href="https://twitter.com/lcbsat" title="Twitter">Twitter</a></li>
                    <li class="facebook"><a href="https://www.facebook.com/studentactionteam" title="Facebook">Facebook</a></li>
                    <li class="rss"><a href="/feed/" title="RSS">RSS</a></li>
                </ul>
            </div>
        <!-- /lastCol --></div>
        
    <!-- /inner --></section>
    
	<div class="innerFooter">
        <section class="inner">
            <ul>
            	<li>Copyright to Lindner School of Business Student Action Team.</li>
                <li><a href="http://rou-lindner-school.landingpages.tv/privacy-policy/" title="PRIVACY POLICY">PRIVACY POLICY</a></li>
                <li><a href="http://rou-lindner-school.landingpages.tv/terms-of-use/" title="TERMS OF USE">TERMS OF USE</a></li>
            </ul>
            <p>The views and opinions expressed within this web site are strictly those of the page authors. The contents of this page and its subpages have not been reviewed or approved by the University of Cincinnati and the University accepts no responsibility for any of its content.  Comments regarding the site should be sent to the pages' authors.</p>
        <!-- /inner --></section>
    </div>
</footer>

<?php wp_footer(); $postid = get_the_ID();?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script> 

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.ticker.js"></script>
 <?php if ( 1 ) { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site.js"></script> 
<?php } ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/function.js"></script>

</body>
</html>
