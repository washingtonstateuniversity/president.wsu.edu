<?php

class WSUWP_President_Map_Shortcode {
	public function __construct() {
		add_shortcode( 'wsu_home_map', array( $this, 'display_home_map' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	public function wp_enqueue_scripts() {
		$post = get_post();
		if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'wsu_home_map' ) ) {
			wp_enqueue_style( 'jquery-ui-smoothness', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.min.css', array(), false );
			wp_enqueue_style( 'wsu-home-map-style', 'https://beta.maps.wsu.edu/content/dis/css/map.view.styles.css', array(), false );
			wp_enqueue_script( 'wsu-home-map', 'https://beta.maps.wsu.edu/embed/wsu-home', array( 'jquery' ), false, true );
		}
	}

	public function display_home_map( $atts ) {
		$default_atts = array(
			'version' => '',
			'scheme' => 'https',
			'map' => '',
		);
		$atts = shortcode_atts( $default_atts, $atts );

		$map_path = sanitize_title_with_dashes( $atts['map'] );

		if ( empty( $map_path ) ) {
			return '';
		}

		$content = '<div id="map-embed-' . $map_path . '"></div>';
		$content .= '<script>var map_view_scripts_block = true; var map_view_id = "map-embed-' . esc_js( $map_path ) .'";</script>';

		return $content;
	}
}
new WSUWP_President_Map_Shortcode();
