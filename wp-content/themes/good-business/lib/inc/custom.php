<?php
class MSDLAB{
    public function recent_events_hp_widget(){
    $today = current_time('mysql');
    //first get events
    $args = array(
        'post_type'=>'tribe_events',
        'posts_per_page' => 1,
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_key' => '_EventStartDate',
        'meta_query' => array(
            array(
                'key' => '_EventStartDate',
                'value' => $today,
                'compare' => '>'
            ),
         ),
        );
        
     // The Query
     $the_query = new WP_Query( $args );
     // The Loop
     if ( $the_query->have_posts() ) {
     $i = 0;
        while ( $the_query->have_posts() && $i<1 ) {
            $the_query->the_post();
            $elink = '/calendar/'.get_permalink();
            $thumb = get_the_post_thumbnail( get_the_ID() );
            $ret .= '<section class="upcomingEvent" >
                    <a href="'.$eLink.'">
                    <div style="float: left; overflow: hidden; width: 290px; height:141px;">
                    '.$thumb.'  
                        <span>upcoming event</span>
                    </div>
                    <div class="upcomingDetails" style="height:112px !important;">
                        <h3>'.get_the_title().'</h3>
                      <p>'.substr(get_the_content(),0,85).'&hellip;</p>
                      <a href="'.$elink.'" title="Signup Now">Signup Now</a>
                      <a href="/events/" title="See All Events">See All Events</a>
                    </div>
                    </a>
                 </section>';
           $i++;
        }
    } else {
        // no posts found
        /*$args = array(
            'post_type'=>'tribe_events',
            'numberposts' => 1,
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_key' => '_EventStartDate',
            'tribe_is_past' => true,
            );
            // The Query
            wp_reset_query();
            $the_query = new WP_Query( $args );
            // The Loop
            if ( $the_query->have_posts() ) {
                $i = 0;
                while ( $the_query->have_posts() && $i<1) {
                    $the_query->the_post();
                    $elink = '/calendar/'.get_permalink();
                    $thumb = get_the_post_thumbnail( get_the_ID() );
                    $ret .= '<section class="upcomingEvent" >
                            <a href="'.$eLink.'">
                            <div style="float: left; overflow: hidden; width: 290px; height:141px;">
                            '.$thumb.'  
                                <span>recent event</span>
                            </div>
                            <div class="upcomingDetails" style="height:112px !important;">
                                <h3>'.get_the_title().'</h3>
                              <p>'.substr(get_the_content(),0,85).'&hellip;</p>
                              <a href="/events/" title="See All Events">See All Events</a>
                            </div>
                            </a>
                         </section>';
                  $i++;
                }
            }
         * 
         */
         $ret .= '<section class="upcomingEvent" >
                            <div style="float: left; overflow: hidden; width: 290px; height:141px;">
                                <span>upcoming event</span>
                            </div>
                            <div class="upcomingDetails" style="height:112px !important;">
                                <h3>There are No Upcoming Events</h3>
                              <p>Please check again later</p>
                              <a href="/events/" title="See All Events">See All Events</a>
                            </div>
                            </a>
                         </section>';
    }
    return $ret;
    }
}
function ungobble($query){
    if($query->tribe_is_past){
        $query->set('tribe_is_past',true);
    }
}
add_filter('pre_get_posts','ungobble',2);