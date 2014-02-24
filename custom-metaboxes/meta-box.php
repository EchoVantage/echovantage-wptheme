<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them CAREFULLY
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */

/**
 * Add field type: 'taxonomy'
 *
 * Note: The class name must be in format "RWMB_{$field_type}_Field"
 */

/********************* META BOXES DEFINITION ***********************/

/**
 * Prefix of meta keys (optional)
 * Wse underscore (_) at the beginning to make keys hidden
 * You also can make prefix empty to disable it
 */
include_once 'meta-box-extensions.php';
$prefix = 'echov_';

global $meta_boxes;

$meta_boxes = array();

// SITE INFORMATION CUSTOM POST TYPE
$meta_boxes[] = array(
	'id' => $prefix.'postinfo',
	'title' => 'Post Meta Information',
	'pages' => array( 'offerings' ),
	'context' => 'normal',
	'priority' => 'high',

	'fields' => array(
		array(    
		// File type: text
			'name' => 'Offering Point One',
			'desc' =>'Text for the first offering point',
			'id' => $prefix . 'meta1',
			'type' => 'wysiwyg',
		),
		array(    
		// File type: text
			'name' => 'Offering Point Two',
			'desc' =>'Text for the second offering point',
			'id' => $prefix . 'meta2',
			'type' => 'wysiwyg',
		),
		array(    
		// File type: text
			'name' => 'Offering Point Three',
			'desc' =>'Text for the third offering point',
			'id' => $prefix . 'meta3',
			'type' => 'wysiwyg',
		),
	)
);

// SITE INFORMATION CUSTOM POST TYPE
$meta_boxes[] = array(
	'id' => $prefix.'postcolumn',
	'title' => 'Column Image',
	'pages' => array( 'offerings', 'blog' ),
	'context' => 'normal',
	'priority' => 'high',

	'fields' => array(
		array(    
		// File type: text
			'name' => 'Secondary Image',
			'desc' =>'Image to be used either as an offering column, or blogpost thumbnail',
			'id' => $prefix . 'columnimg',
			'type' => 'image_advanced',
		),
	)
);

// SITE INFORMATION CUSTOM POST TYPE
$meta_boxes[] = array(
	'id' => $prefix.'aboutinfo',
	'title' => 'Site Information',
	'pages' => array( 'about' ),
	'context' => 'normal',
	'priority' => 'high',

	'fields' => array(
		array(    
		// File type: image
			'name' => 'Address Line One',
			'desc' =>'Address Line One',
			'id' => $prefix . 'sitestreetline1',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'Address Line Two',
			'desc' =>'Address Line Two (Apartment Number, Suite, Etc)',
			'id' => $prefix . 'sitestreetline2',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'City',
			'desc' =>'What is the City',
			'id' => $prefix . 'sitecity',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'State',
			'desc' =>'What is the State',
			'id' => $prefix . 'sitestate',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'Zip Code',
			'desc' =>'What is the Zip Code',
			'id' => $prefix . 'sitezipcode',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'Phone Number',
			'desc' =>'Phone Number',
			'id' => $prefix . 'sitephonenumber',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: image
			'name' => 'Email',
			'desc' =>'What is this locations email address',
			'id' => $prefix . 'siteemail',
			'type' => 'text',
												// Value can be 0 or 1
		),
		array(    
		// File type: text
			'name' => 'Company Philosophy',
			'desc' =>'What is your companies philosophy?',
			'id' => $prefix . 'philosophy',
			'type' => 'wysiwyg',
		),

	)
);

// SITE INFORMATION CUSTOM POST TYPE
$meta_boxes[] = array(
	'id' => $prefix.'sitesocial',
	'title' => 'Site Social',
	'pages' => array( 'about' ),
	'context' => 'normal',
	'priority' => 'high',

	'fields' => array(
		array(    
		// File type: image
			'name' => 'Facebook',
			'desc' =>'Facebook URL',
			'id' => $prefix . 'facebook',
			'type' => 'text',
		),
		array(    
		// File type: image
			'name' => 'Twitter',
			'desc' =>'Twitter URL',
			'id' => $prefix . 'twitter',
			'type' => 'text',
		),
		array(    
		// File type: image
			'name' => 'LinkedIn',
			'desc' =>'LinkedIn URL',
			'id' => $prefix . 'linkedin',
			'type' => 'text',
		),
		array(    
		// File type: image
			'name' => 'Google',
			'desc' =>'Google URL',
			'id' => $prefix . 'google',
			'type' => 'text',
		),
	)
);

// Hook to 'admin_init' to make sure the meta box class is loaded before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'me_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function me_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}