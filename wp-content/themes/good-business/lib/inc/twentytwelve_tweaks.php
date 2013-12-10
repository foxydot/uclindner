<?php
function good_business_widgets_init(){
        register_sidebar( array(
        'name' => __( 'Monthly Widget Area', 'twentytwelve' ),
        'id' => 'sidebar-4',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );    
    register_sidebar( array(
        'name' => __( 'Email Newsletter', 'twentytwelve' ),
        'id' => 'sidebar-5',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );    
}

add_action( 'widgets_init', 'good_business_widgets_init' );

function excerpt_read_more_link($output) {
 global $post;
 return $output.'<br>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');


function pagination($pages = '', $range = 4){  
 $showitems = ($range * 2)+1;  

 global $paged;
 if(empty($paged)) $paged = 1;

 if($pages == '')
 {
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     if(!$pages)
     {
         $pages = 1;
     }
 }   

 if(1 != $pages)
 {
     echo "<div class=\"pagination\" style='margin: 10px !important;'><span>Page ".$paged." of ".$pages."</span>&nbsp;&nbsp;&nbsp;&nbsp;";
     if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>&nbsp;&nbsp;&nbsp;&nbsp;";
     if($paged > 1 && $showitems < $pages) echo "<a style='color:#000;' href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>&nbsp;&nbsp;";

     for ($i=1; $i <= $pages; $i++)
     {
         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         {
             echo ($paged == $i)? "<span class=\"current\">".$i."</span>&nbsp;&nbsp;":"<a style='color:#000;' href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>&nbsp;&nbsp;";
         }
     }

     if ($paged < $pages && $showitems < $pages) echo "<a style='color:#000;' href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>&nbsp;&nbsp;";  
     if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a style='color:#000;' href='".get_pagenum_link($pages)."'>Last &raquo;</a>&nbsp;&nbsp;";
     echo "</div>\n";
 }
}

function get_top_parent_page_id() {
    global $post;

    if ($post->ancestors) {
        return end($post->ancestors);
    } else {
        return $post->ID;
    }
}