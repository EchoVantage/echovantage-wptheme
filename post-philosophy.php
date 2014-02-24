<section class="fullwidth colorSection">
	<section id="philosophy" class="full">
		<!-- Philosophy Title + About -->
		<h1>Our Philosophy</h1>
		<?php foreach( $aboutinfo as $item) {
			$content = strip_tags( $item['philocontent'] );
			echo "<p class='medium'>{$content}</p>";
		};
		?>
		
		
		
		<!-- Philosophy Post -->
		<?php
			$aboutArray = null;
			$counter = 1;
			$args = array( 'post_type' => array('philosophy'), 'posts_per_page' => -1);
			$loop = new WP_Query($args);
			while ( $loop->have_posts() ) : $loop->the_post();
		
			//prepare title to be used as slug
			$philosophySlug = sanitize_title( get_the_title() );
			
			//Check if post is even or odd
			//Remove marget if even
			( $counter % 2 == 0 ? $float = null : $lastchild = 'last-child');	
		?>
			
			<!--Post Title: <?php echo get_the_title(); ?>  |  Post ID: <?php echo get_the_ID(); ?> -->
			<article id="<?php echo $philosophySlug; ?>" class="half <?php echo $lastchild; ?>">			
				
				<!-- Post Image -->
				<?php $featuredImg = wp_get_attachment_url( get_post_thumbnail_id($post->ID)  ) ?>
				
				<img src="<?php echo $featuredImg; ?>" alt="<?php echo the_title(); ?>'s image" title="<?php echo the_title(); ?>" />
				
				<!-- Post Text -->
				<section class="two-third last-child">
					<h2><?php echo the_title(); ?></h2>
					<p><?php echo strip_tags( get_the_content() ); ?></p>
				</section>
			</article>
			
		<?php $counter++; endwhile; wp_reset_query(); ?>
		
				
	</section>
</section>

