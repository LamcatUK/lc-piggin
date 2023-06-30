<?php

function parse_phone($phone)
{
    $phone = preg_replace('/\s+/', '', $phone);
    $phone = preg_replace('/\(0\)/', '', $phone);
    $phone = preg_replace('/[\(\)\.]/', '', $phone);
    $phone = preg_replace('/-/', '', $phone);
    $phone = preg_replace('/^0/', '+44', $phone);
    return $phone;
}

function split_lines($content) {
    $content = preg_replace('/<br \/>/','<br/>&nbsp;<br/>',$content);
    return $content;
}

add_shortcode('contact_phone', function($atts){
    $a = shortcode_atts( array(
        'class' => '',
    ), $atts );
    if (get_field('contact_phone','options')) {
        $output = '<a href="tel:' . parse_phone(get_field('contact_phone','options')) . '" class="phone ' . $a['class'] . '">' . get_field('contact_phone','options') . '</a>';
    }
    return $output;
});
add_shortcode('contact_email', function($atts){
    $a = shortcode_atts( array(
        'class' => '',
    ), $atts );    
    if (get_field('contact_email','options')) {
        $output = '<a href="mailto:' . get_field('contact_email','options') . '" class="email ' . $a['class'] . '">' . get_field('contact_email','options') . '</a>';
    }
    return $output;
});

add_shortcode('epa_email', function($atts){
    $a = shortcode_atts( array(
        'class' => '',
    ), $atts );    
    if (get_field('epa_email','options')) {
        $output = '<a href="mailto:' . get_field('epa_email','options') . '" class="email ' . $a['class'] . '">' . get_field('epa_email','options') . '</a>';
    }
    return $output;
});

add_shortcode('training_email', function($atts){
    $a = shortcode_atts( array(
        'class' => '',
    ), $atts );    
    if (get_field('training_email','options')) {
        $output = '<a href="mailto:' . get_field('training_email','options') . '" class="email ' . $a['class'] . '">' . get_field('training_email','options') . '</a>';
    }
    return $output;
});

add_shortcode('social_fb_icon', function () {
    $social = get_field('social', 'options');
    $fburl = $social['facebook_url'];
    if ($fburl != '') {
        $output = '<a href="' . $fburl . '" target="_blank"><i class="fa fa-facebook-square"></i></a>';
    }
    return $output;
});
add_shortcode('social_ig_icon', function () {
    $social = get_field('social', 'options');
    $igurl = $social['instagram_url'];
    if ($igurl != '') {
        $output = '<a href="' . $igurl . '" target="_blank"><i class="fa fa-instagram"></i></a>';
    }
    return $output;
});
add_shortcode('social_tw_icon', function () {
    $social = get_field('social', 'options');
    $twurl = $social['twitter_url'];
    if ($twurl != '') {
        $output = '<a href="' . $twurl . '" target="_blank"><i class="fa fa-twitter-square"></i></a>';
    }
    return $output;
});
add_shortcode('social_li_icon', function () {
    $social = get_field('social', 'options');
    $liurl = $social['linkedin_url'];
    if ($liurl != '') {
        $output = '<a href="' . $liurl . '" target="_blank"><i class="fa fa-linkedin-square"></i></a>';
    }
    return $output;
});

function social_icons() {
    ob_start();
    $social = get_field('social', 'options');
    if ($social['twitter_url']) {
        ?>
    <a href="<?=$social['twitter_url']?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
        <?php
    }
    if ($social['facebook_url']) {
        ?>
    <a href="<?=$social['facebook_url']?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
        <?php
    }
    if ($social['linkedin_url']) {
        ?>
    <a href="<?=$social['linkedin_url']?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
        <?php
    }
    if ($social['instagram_url']) {
        ?>
    <a href="<?=$social['instagram_url']?>" target="_blank"><i class="fa fa-instagram"></i></a>
        <?php
    }
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}
add_shortcode( 'social_icons', 'social_icons' );



/**
 * Grab the specified data like Thumbnail URL of a publicly embeddable video hosted on Vimeo.
 *
 * @param  str $video_id The ID of a Vimeo video.
 * @param  str $data 	  Video data to be fetched
 * @return str            The specified data
 */
function get_vimeo_data_from_id( $video_id, $data ) {
    // width can be 100, 200, 295, 640, 960 or 1280
	$request = wp_remote_get( 'https://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id . '&width=960');
	
	$response = wp_remote_retrieve_body( $request );
	
	$video_array = json_decode( $response, true );
	
	return $video_array[$data];
}


function gb_gutenberg_admin_styles() {
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1040px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');


function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

function cb_json_encode($string) {
    // $value = json_encode($string);
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $string);
    $result = json_encode($result);
    return $result;
}

function cb_time_to_8601($string) {
    $time = explode(':',$string);
    $output = 'PT' . $time[0] . 'H' . $time[1] . 'M' . $time[2] . 'S';
    return $output;
}


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function lcdump($var) {
    echo '<pre class="small">';
    print_r($var);
    echo '</pre>';
    return;
}

function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
    // $bytes /= pow(1024, $pow);
    $bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 