<?php
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

add_theme_support( 'post-thumbnails' );
add_image_size('slider', 1200, 425, true);
add_image_size('philoicon', 85, 80, true);
add_image_size('blogthumb', 400, 250, true);
add_image_size('offeringthumb', 500, 500, true);


// REMOVES P TAGS FROM THE FOLLOWING -------------------------------------//
remove_filter( 'get_the_content', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// INCLUDES META-BOX.PHP -------------------------------------------------//
require_once(dirname(__FILE__) . '/custom-metaboxes/meta-box.php');
require_once(dirname(__FILE__) . '/addons/pagination.php');














function admin_changes() {
//if is director get rid of certain things. 
if( current_user_can( 'manage_options' ) && !current_user_can( 'activate_plugins' ) ) {
	global $menu;
  	$restricted = array(__('Posts'), __('Pages'), __('Media'), __('Links'), __('Comments'), __('Appearance'), __('Plugins'), __('Tools'), __('Settings'), __('Contact'));
  	
  	//remove custom plugins
  	remove_menu_page('cpt_main_menu');
  	//remove_menu_page('wpcf7');
  	
 	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
				unset($menu[key($menu)]);}
			}
	}

}
add_action('admin_menu', 'admin_changes');

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    	return array(
			'index.php', // this represents the dashboard link
			'edit.php?post_type=about',				// about
			'edit.php?post_type=offerings',			// offerings
			'edit.php?post_type=philosophy',		// philosophy
			'edit.php?post_type=blog',				// blog
			'edit.php?post_type=slider',			// slider	
 		);
	}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');




?>
