<?php 

	//------------------
	//Global variables to be used across the site
	//Set by the 'about' custom post type
	//------------------
	
	$aboutinfo = array();
	$args = array( 'post_type' => array('about'), 'posts_per_page' => 1);
	$loop = new WP_Query($args);
	while ( $loop->have_posts() ) : $loop->the_post();
		//get meta information and save it in one large array
		$aboutinfo[] = array(
			'facebook' 	=> get_post_meta( $post->ID, 'echov_facebook', true),
			'twitter' 	=> get_post_meta( $post->ID, 'echov_twitter', true),
			'linkedin' 	=> get_post_meta( $post->ID, 'echov_linkedin', true),
			'google' 	=> get_post_meta( $post->ID, 'echov_google', true),

			'addy1' 	=> get_post_meta( $post->ID, 'echov_sitestreetline1', true),
			'addy2' 	=> get_post_meta( $post->ID, 'echov_sitestreetline2', true),
			'city' 		=> get_post_meta( $post->ID, 'echov_sitecity', true),
			'state' 	=> get_post_meta( $post->ID, 'echov_sitestate', true),
			'zip' 		=> get_post_meta( $post->ID, 'echov_sitezipcode', true),
			'phone'		=> get_post_meta( $post->ID, 'echov_sitephonenumber', true),
			'email' 	=> get_post_meta( $post->ID, 'echov_siteemail', true),
			'philocontent' 	=> get_post_meta( $post->ID, 'echov_philosophy', true),
			'maincontent'	=> strip_tags( get_the_content(), '<a><span>' )
		);
	endwhile; wp_reset_query();
?>		
