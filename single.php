<!-- Header -->
<?php 
	//we get header this way so we don't have to set up a lot of globals to pull site information into the header
	require_once(dirname(__FILE__) . '/header.php'); 
?>


<section  id="blog" class="fullwidth colorSection">
	<section class="blog-single full">
		<!-- Post article -->
		<article class="three-fourth singlecontent">
			<?php 
			//echo out single post information
			while (have_posts()) : the_post();
				$pageID = get_the_ID();
				echo '<h1>'.get_the_title().'</h1>';
				echo '<h4 class="pub-time">Published on ' . get_the_date() . '</h4>';
				echo the_content();
			
			endwhile; wp_reset_query(); ?>
		</article>
		
		<!-- other blog post -->
		<section class="otherblog quarter last-child">
			<h2>Other Blog Post</h2>
			<?php
				$counter = 1;
				$args = array( 'post_type' => array('blog'), 'post__not_in' => array( $pageID ),  'posts_per_page' => 2);
				$loop = new WP_Query($args);
				
				//Checks to see if the loop will return something
				//If postcount = 0, than return an error message
				$numPost = $loop->post_count;
				if ( $numPost == 0 ) echo '<p>Sorry, no blog post found.</p>';
				
				//start loop
				while ( $loop->have_posts() ) : $loop->the_post();
				$title = get_the_title();

				//check to get last post
				//if is last post, add 'last-child' class to it for styling purposes
				( $counter == $loop->post_count ? $lastchild = 'last-child' : $lastchild = null);
								
				//Get 1200x425 img used for singles page
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogthumb' );
				
				//get 400x250 image used for blog thumbnail
				$blogthumb = wp_get_attachment_url( get_post_meta( $post->ID, 'echov_columnimg', true) );
		
				//prepare title to be used as slug
				$blogSlug = sanitize_title( get_the_title() );
			?>
		
				<!--Post Content -->
				<a class="noflicker" href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php echo $title; ?></a>
				<article id="<?php echo $blogSlug; ?>" class="full blog-article <?php echo $lastchild; ?>">			
					<!-- Post Image -->
					<a class="noflicker" href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>">
						<?php if ( $blogthumb ) {
							echo "<img class=\"full noflicker\" src=\"{$blogthumb}\" title=\"{$title}\" alt=\"{$title}\" />";
						} elseif ( $thumbnail ) {
							echo "<img class=\"full noflicker\" src=\"{$thumbnail[0]}\" title=\"{$title}\" alt=\"{$title}\" />";
						} else { ?>
							<img class="full noflicker" src="<?php echo bloginfo('template_directory'); ?>/images/blog-noimg.jpg" alt="<?php echo the_title(); ?> has no image" title="<?php echo the_title(); ?>" />
						<?php }; ?>
					</a>
				</article>
		
				<?php if ( empty($numPost) ) echo '<p>Sorry, no blog post found.</p>'; ?>
				
				<?php $counter++; endwhile; wp_reset_query(); ?>
				
				<a class="clear-both" style="float: none;" href="<?php echo bloginfo('url'); ?>/blog-page" title="<?php echo bloginfo('name'); ?> Blog Page" >See All Blog Entries >> </a>
						
			
		</section>
	
	</section>
</section>

<!-- Footer -->
<?php 
	//we get footer this way so we don't have to set up a lot of globals to pull site information into the footer
	require_once(dirname(__FILE__) . '/footer.php'); 
?>
