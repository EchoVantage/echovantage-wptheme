<!-- Header -->
<?php
	/* Template Name: Blog Page */
	
	//we get header this way so we don't have to set up a lot of globals to pull site information into the header
	require_once(dirname(__FILE__) . '/header.php'); 
?>


<section id="blog" class="fullwidth colorSection">
	<section class="blog-page full">
		<h1>From Our Blog</h1>
	
		<?php
		    //Fix homepage pagination
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
			$temp = $wp_query;  // re-sets query
			$wp_query = null;   // re-sets query
			$args = array( 'post_type' => array('blog'), 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 3, 'paged' => $paged);
			$wp_query = new WP_Query();
			$wp_query->query( $args );
			
			//while loop
			$counter = 1;
			if ( have_posts() ) { while ($wp_query->have_posts()) : $wp_query->the_post();
			$title = get_the_title();
			
			//get number of post in loop so we can do stuff with it
			$numbPost = $wp_query->post_count;
			
			//Get 1200x425 img used for singles page
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogthumb' );
			
			//get 400x250 image used for blog thumbnail
			$blogthumb = wp_get_attachment_url( get_post_meta( $post->ID, 'echov_columnimg', true) );
	
			//prepare title to be used as slug
			$blogSlug = sanitize_title( get_the_title() );
		
			//Check if post is even or odd
			//Remove marget if even
			( $counter % 2 == 0 ? $float = null : $lastchild = 'last-child');
		?>
	
			<!--Post Content -->
			<article id="<?php echo $blogSlug; ?>" class="fullwidth blog-article <?php echo $lastchild; ?>">			
				
				<!-- Post Image -->
				<a class="featured noflicker" href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>">
					<?php if ( $blogthumb ) {
						echo "<img class=\"third noflicker\" src=\"{$blogthumb}\" title=\"{$title}\" alt=\"{$title}\" />";
					} elseif ( $thumbnail ) {
						echo "<img class=\"third noflicker\" src=\"{$thumbnail[0]}\" title=\"{$title}\" alt=\"{$title}\" />";
					} else { ?>
						<img class="third noflicker" src="<?php echo bloginfo('template_directory'); ?>/images/blog-noimg.jpg" alt="<?php echo the_title(); ?> has no image" title="<?php echo the_title(); ?>" />
					<?php }; ?>
				</a>
				
				<!-- Post Text -->
				<section class="two-third last-child">
					<a class="noflicker" href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>"><h2><?php echo the_title(); ?></h2></a>
					<p><?php echo substr( strip_tags( get_the_content(), '<a>' ), 0, 800 ); //shortens content to # of characters. ?></p>
					<a class="noflicker" href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>">[ Read More ]</a>
				</section>
			</article>
		
		
		<?php $counter++; endwhile;
				echo '<nav>';
				  paginate(); $wp_query = null; $wp_query = $temp; // Reset
				echo '</nav>';
		} else { 
			echo '<p>Sorry, no blog post found.</p>'; 
		}; ?>

	
			
	</section>
</section>




<!-- Footer -->
<?php 
	//we get footer this way so we don't have to set up a lot of globals to pull site information into the footer
	require_once(dirname(__FILE__) . '/footer.php'); 
?>