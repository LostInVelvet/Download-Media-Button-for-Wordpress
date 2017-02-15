<?php
	/*
	Plugin Name: Insert Music Button
	Description: This plugin will add a "download media" button onto the page editor.
	Version: 1.0
	Author: Tara Rowland
	*/


function add_my_media_button() {
	echo '<a href="#" id="insert-my-media" class="button">Insert Download Button</a>';
}
add_action('media_buttons', 'add_my_media_button');

function include_media_button_js_file() {
	wp_enqueue_script('media_button', plugins_url('download_media.js', __FILE__), array('jquery'), '1.0', true);

}
add_action('wp_enqueue_media', 'include_media_button_js_file');



function make_dl_btn( $atts ) {
	$atts = shortcode_atts(
		array(
			'id' => '#',
			'bg_color' => '',
			'font_color' => '',
			'text' => 'DOWNLOAD SONG',
			'font_size' => '',
		), $atts, 'dl_media' );


        $btn_maker = '<a href="'.wp_get_attachment_url( $atts['id'] );
	$btn_maker = $btn_maker.'" download><button style="background-color:';
        if( '#' != substr($atts['bg_color'], 0, 1)){
	        $btn_maker = $btn_maker.'#';
        }
        $btn_maker = $btn_maker.$atts['bg_color'].'; ';


        $btn_maker = $btn_maker.'color:';
        if( '#' != substr($atts['font_color'], 0, 1)){
	        $btn_maker = $btn_maker.'#';
        }
        $btn_maker = $btn_maker.$atts['font_color'].'; font-size:'.$atts['font_size'].'px; ';

        $btn_maker = $btn_maker.'border: none; padding: 5px"><b>'.$atts['text'].'</b></button></a>';

        return $btn_maker;
}
add_shortcode( 'dl_media', 'make_dl_btn' );

?>