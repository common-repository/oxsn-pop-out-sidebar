<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Pop Out Sidebar
Plugin URI: https://wordpress.org/plugins/oxsn-pop-out-sidebar/
Description: This plugin adds helpful pop out sidebar shortcodes with quicktags!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.7
*/


define( 'oxsn_pop_out_sidebar_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_pop_out_sidebar_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_pop_out_sidebar_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_pop_out_sidebar_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_pop_out_sidebar_settings_link', 10, 2 );
	function oxsn_pop_out_sidebar_settings_link( $links, $file ) {

		if ( $file != oxsn_pop_out_sidebar_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-pop-out-sidebar', false ) . '">' . esc_html( __( 'Settings', 'oxsn-pop-out-sidebar' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_pop_out_sidebar_plugin_tab_nav_item', 99);
	function oxsn_pop_out_sidebar_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Pop Out Sidebar', 'Pop Out Sidebar', 'manage_options', 'oxsn-pop-out-sidebar', 'oxsn_pop_out_sidebar_plugin_tab');

	}

}

if ( !function_exists('oxsn_pop_out_sidebar_plugin_tab') ) {

	function oxsn_pop_out_sidebar_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Pop Out Sidebar Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-pop-out-sidebar" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Shortcodes */

//[oxsn_pop_out_sidebar side="left" class=""]
if ( ! function_exists ( 'oxsn_pop_out_sidebar_shortcode' ) ) {

	add_shortcode('oxsn_pop_out_sidebar', 'oxsn_pop_out_sidebar_shortcode');
	function oxsn_pop_out_sidebar_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'side' => 'left',
		), $atts );

		$oxsn_pop_out_sidebar_class = esc_attr($a['class']);
		if ($oxsn_pop_out_sidebar_class != '') :

			$oxsn_pop_out_sidebar_class = ' class="oxsn_pop_out_sidebar_nav_link toggle_pop_out ' . $oxsn_pop_out_sidebar_class . '" ';

		else : 

			$oxsn_pop_out_sidebar_class = ' class="oxsn_pop_out_sidebar_nav_link toggle_pop_out" ';

		endif;

		$oxsn_pop_out_sidebar_id = esc_attr($a['id']);
		if ($oxsn_pop_out_sidebar_id != '') :

			$oxsn_pop_out_sidebar_id = ' id="' . $oxsn_pop_out_sidebar_id . '" ';

		endif;

		$oxsn_pop_out_sidebar_side = esc_attr($a['side']);
		if ($oxsn_pop_out_sidebar_side != '') :

			$oxsn_pop_out_sidebar_side = strtolower($oxsn_pop_out_sidebar_side);
			$oxsn_pop_out_sidebar_side = ' side="' . $oxsn_pop_out_sidebar_side . '" ';

		endif;

		$output=
		'<div ' . $oxsn_pop_out_sidebar_id . ' ' . $oxsn_pop_out_sidebar_class . ' ' . $oxsn_pop_out_sidebar_side . '">' .
			'<a class="hamburger-icon-link">' .
				'<i class="hamburger-icon"></i>' .
			'</a>' .
		'</div>';

		return $output;

	}

}


?><?php


/* OXSN Quicktags */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_pop_out_sidebar_quicktags' );
	function oxsn_pop_out_sidebar_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">

				QTags.addButton( 'oxsn_pop_out_sidebar_quicktag', '[oxsn_pop_out_sidebar]', '[oxsn_pop_out_sidebar side="left" class=""]', '', 'oxsn_pop_out_sidebar', 'Quicktags POP OUT SIDEBAR', 301 );

			</script>

		<?php

		}

	}

}


?><?php


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_inc_css' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_pop_out_sidebar_inc_css' );
	function oxsn_pop_out_sidebar_inc_css() {

		wp_enqueue_style( 'oxsn_pop_out_sidebar_css', oxsn_pop_out_sidebar_plugin_dir_url . 'inc/css/pop_out_sidebar.css', array(), '1.0.0', 'all' ); 

	}

}


?><?php


/* OXSN Include JS */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_inc_js' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_pop_out_sidebar_inc_js' );
	function oxsn_pop_out_sidebar_inc_js() {

		wp_enqueue_script( 'oxsn_pop_out_sidebar_js', oxsn_pop_out_sidebar_plugin_dir_url . 'inc/js/pop_out_sidebar.js', array(), '1.0.0', 'all' ); 

	}

}


?><?php


/* OXSN Customizer */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_customizer' ) ) {

	add_action( 'customize_register', 'oxsn_pop_out_sidebar_customizer' );
	function oxsn_pop_out_sidebar_customizer( $wp_customize ) {
	   
		$wp_customize->add_panel( 'oxsn_plugin_panel', array(
			'priority'       => '',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'OXSN Plugins',
			'description'    => '',
		) );

			$wp_customize->add_section( 'oxsn_pop_out_sidebar_section' , array(
				'priority'       => '',
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => 'Pop Out Sidebar',
				'description'    => '',
				'panel'  => 'oxsn_plugin_panel',
			) );

				$close_text = 'Return to ' . get_bloginfo('name') . ' →';
				$wp_customize->add_setting( 'oxsn_pop_out_sidebar_close_text_control', array(
					'type' => 'option',
					'default' => $close_text,
				) );

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_pop_out_sidebar_close_text_control', array(
					'type'     => '',
					'priority' => '',
					'section'  => 'oxsn_pop_out_sidebar_section',
					'label'    => 'Close Text',
				) ) );

	}

}

?><?php


/* OXSN Include Sidebar */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_one_sidebar' ) ) {

	add_action( 'wp_loaded', 'oxsn_pop_out_sidebar_one_sidebar' );
	function oxsn_pop_out_sidebar_one_sidebar(){
		register_sidebar(
			array(
				'name'=> 'Pop Out Sidebar',
				'id' =>'pop-out-sidebar',
				'before_widget' => '<div id="%1$s" class="oxsn_pop_out_sidebar_widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="pop-out-sidebar-one-widget-title">',
				'after_title' => '</h3>',
			)
		);
	}

}


?><?php


/* OXSN Include in Footer */

if ( ! function_exists ( 'oxsn_pop_out_sidebar_footer_inc' ) ) {

	add_action( 'wp_footer', 'oxsn_pop_out_sidebar_footer_inc');
	function oxsn_pop_out_sidebar_footer_inc() { 

		$sidebar = '<div class="oxsn_pop_out_sidebar">';
			ob_start();
			include( oxsn_pop_out_sidebar_plugin_dir_path . 'inc/php/pop-out-sidebar.php');
			$sidebar .= ob_get_contents();
			ob_end_clean();
		$sidebar .= '</div><div class="oxsn_pop_out_sidebar_body_bg"></div>';

		echo $sidebar;

	}

}


?>