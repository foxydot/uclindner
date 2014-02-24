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
    <h3 class="socialFeed" style="margin-bottom: 0px !important;">Organizations List</h3>
		
	<?php /*
		//echo apply_filters( 'the_content', $list_data->post_content ); 

	$args = array(
	); 
	$data = get_users( $args );
	$i=0;
	foreach($data as $row){
			
	if($row->data->user_login == 'admin') {
		continue;
	}	
	
	$class = ($i%2) ? 'class="whiteBg"' : 'class="greyBg"';
	$sql = "SELECT * FROM `wp_cimy_uef_data` WHERE `USER_ID` = ".$row->data->ID." AND `FIELD_ID` =1";		
	$field_data = $wpdb->get_results($sql, OBJECT);
	
	$sql1 = "SELECT * FROM `wp_cimy_uef_data` WHERE `USER_ID` = ".$row->data->ID." AND `FIELD_ID` =14";		
	$field_data1 = $wpdb->get_results($sql1, OBJECT);
	
	?>	
		


		<div <?php print $class;?> >
			<span style="cursor:pointer;" onclick="show_organization(<?php print $i;?>);" id="org_name<?php print $i;?>" ><?php print $row->data->display_name;?></span>
			<div id="org_info<?php print $i;?>" style="float:left;display:none;padding-top:5px;">
				<small><?php print $field_data[0]->VALUE;?></small>
				<ul>
					<li class="mail"><a href="javascript:void(0);"><?php print $row->data->user_email;?></a></li>
					<li class="phone"><?php print $field_data1[0]->VALUE;?></li>
					<li class="www"><?php print $row->data->user_url;?></li>
				</ul>
			</div>
		</div>
		

			
	<?php
	$i++;	
	}
	* */
	//print "<pre>";
	$data = get_page(878);
	//print_r($data);	
	print $data->post_content;
	?>
	<!--
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(1);" id="org_name1" >A.P.I.C.S.</span>
			<div id="org_info1" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Matthew Dietz</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">dietzmw@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
		
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(2);" id="org_name2" >Alpha Kappa Psi</span>
			<div id="org_info2" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px;margin-top: 5px;">
					<small>Margaret Hetrick</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">hetricmt@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Tania Teran</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">terantc@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Tori Coneglio</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">conegivm@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
	
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(3);" id="org_name3" >Ambassadors</span>
			<div id="org_info3" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Meghan Pope</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">popemme@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Michaela Harper</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">harperm7@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
		
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(4);" id="org_name4" >American Marketing Association </span>
			<div id="org_info4" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Allison Stepaniak</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">stepanak@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Cara Ding</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">schneigb@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Gabrielle Schneider</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">schneigb@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Jill Schmidt</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">schmijl@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Mason Wolfe</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">wolfemf@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Brandy Riddle</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">riddlebl@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
		
		
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(5);" id="org_name5" >Beta Alpha Psi</span>
			<div id="org_info5" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Ian Clark</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">ianclark2992@yahoo.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Punit Akkinepalli</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">akkinepk@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Xandria Koebel</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">koebelxl@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(6);" id="org_name6" >Black Business Student Association</span>
			<div id="org_info6" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Chelsea Wright</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">wrighcc@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Kyle Hatcher</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">hatchekr@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Malada Matthews</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">matthemd@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(7);" id="org_name7" >Delta Sigma Pi</span>
			<div id="org_info7" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Brendan O'Brien</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">obrienbd@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>
					
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(8);" id="org_name8" >Entrepreneurship Club</span>
			<div id="org_info8" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Ronald Gillespie</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">gillesrp@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>
					
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(9);" id="org_name9" >Finance Club</span>
			<div id="org_info9" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Andrew Garcia</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">garciaaw@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Anurag Gogineni</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">anurag.gogineni@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(10);" id="org_name10" >KBSA</span>
			<div id="org_info10" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Mark Rapien</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">mark.rapien@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Sam Gaier</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">sgaier3@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Alex Engen</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">alexengen24@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Jake Behringer</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">jacob.behringer@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(11);" id="org_name11" >Kolodzik Business Scholars Association </span>
			<div id="org_info11" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Drew Harmon</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">andrewharms@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Jeremy Fernandes</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">fernanjw@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Tori Roser</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">vlroser@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Tyler Smith</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">smith3t5@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(12);" id="org_name12" >Lindner Finance Club</span>
			<div id="org_info12" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Tyler Thinnes</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">thinnetn@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>
					
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(13);" id="org_name13" >Pi Sigma Epsilon</span>
			<div id="org_info13" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Jill Demboski</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">dembosjm@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Katherine Smanik</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">smanikkg@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(14);" id="org_name14" >Sales Leadership Club</span>
			<div id="org_info14" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Emily Mehl</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">emilybmehl@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(15);" id="org_name15" >SAT/Ambassadors</span>
			<div id="org_info15" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Christine Pope</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">popech@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Lauren Mayernik</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">mayernlm@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(16);" id="org_name16" >Student Action Team</span>
			<div id="org_info16" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Ginger Clark</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">clarkv@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Jack Johnson</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">johns3jk@gmail.com</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Nick Partie</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">partient@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>		
			
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(17);" id="org_name17" >Student Government</span>
			<div id="org_info17" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Christina Beer</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">beerca@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="whiteBg" >
			<span style="cursor:pointer;" onclick="show_organization(18);" id="org_name18" >UC AMA Catalyst Marketing </span>
			<div id="org_info18" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Ric Sweeney</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">ric.sweeney@uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Ryan Deffinger</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">deffinrp@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>	
				
		<div class="greyBg" >
			<span style="cursor:pointer;" onclick="show_organization(19);" id="org_name19" >UC Informs</span>
			<div id="org_info19" style="float:left;display:none;padding-top:5px;">
				<div style="float:left;margin-bottom: 5px; margin-top: 5px;">
					<small>Elham Torabi</small>
					<ul>
						<li class="mail"><a href="javascript:void(0);">torabiem@mail.uc.edu</a></li>
						<li class="phone"></li>
						<li class="www"></li>
					</ul>
				</div>
			</div>
		</div>			
		-->
			
<!-- /aside -->

</aside>
