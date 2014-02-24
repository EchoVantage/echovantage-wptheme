<section class="fullwidth">
	<section id="blog" class="full">
	<h1>From Our Blog</h1>
	
		<?php
			$counter = 1;
			$args = array( 'post_type' => array('blog'), 'posts_per_page' => -1);
			$loop = new WP_Query($args);

			//Checks to see if the loop will return something
			//If postcount = 0, than return an error message
			$numPost = $loop->post_count;
			if ( $numPost == 0 ) echo '<p>Sorry, no blog post found.</p>';

			while ( $loop->have_posts() ) : $loop->the_post();
			$title = get_the_title();
			
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
	
	
		<?php endwhile; ?>
		
		<a class="clear-both" href="<?php echo bloginfo('url'); ?>/blog-page" title="<?php echo bloginfo('name'); ?> Blog Page" >Read more Blog Entries >> </a>
	
	</section>
</section>