<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php bloginfo('template_url'); ?>/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/main.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/flexslider.css" rel="stylesheet" type="text/css">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<script>
function search()
{
	//var s = document.getElementById('s').value;
	//location.href="<?php print home_url(); ?>/?s="+s
}
</script>
</head>

<body <?php body_class(); ?>>

<header>
  <section class="inner">
    <h1><a href="<?php echo $blog_title = get_bloginfo('home'); ?>" title="Student Action Team">Student Action Team</a></h1>
    <div class="topNav">
        <div class="searchOutr" onclick="search();">
			<form action="<?php print home_url(); ?>">
            	<input type="text" id="s" name="s" value="">
            	<input type="submit"  value="">
            </form>
        </div>
        <ul>
            <li><a href="/wp-admin" title="Student Organization Login">Student Organization Login</a></li>
            <li><a href="/contact/" title="Contact">Contact</a></li>
            <li><a href="/alumni-register" title="Alumni Register">Alumni Register</a></li>
        </ul>
    </div>
    
    <nav>
        <ul>
        	<?php wp_nav_menu( array('menu' => 'main_menu' , 'items_wrap' => '%3$s')); ?>
        </ul>
    <!-- /nav --></nav>
    <div class="clear"></div>
   <!-- /inner --></section>
<!-- /header --></header>
