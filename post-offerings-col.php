<section class="fullwidth colorSection">
	<section id="offerings" class="offerings-col full">
		<h1>Offerings</h1>
		
		<?php
			$aboutArray = null;
			$counter = 1;
			$args = array( 'post_type' => array('offerings'), 'order' => 'ASC', 'posts_per_page' => -1);
			$loop = new WP_Query($args);
			while ( $loop->have_posts() ) : $loop->the_post();
		
			//prepare title to be used as slug
			$aboutSlug = sanitize_title( get_the_title() );
			
			//check to get last post
			//if is last post, add 'last-child' class to it for styling purposes
			( $counter == $loop->post_count ? $lastchild = 'last-child' : $lastchild = null);
					
			//Put all data in single array
			//Save it for later so we don't have to re-query database
			//---- Used in post-offerings.php ----/
			$columnimg = get_post_meta( $post->ID, 'echov_columnimg', true);
			$meta1 = get_post_meta( $post->ID, 'echov_meta1', true);
			$meta2 = get_post_meta( $post->ID, 'echov_meta2', true);
			$meta3 = get_post_meta( $post->ID, 'echov_meta3', true);

			$meta1 = str_replace("&nbsp;", '<br>', $meta1);
			$meta2 = str_replace("&nbsp;", '<br>', $meta2);
			$meta3 = str_replace("&nbsp;", '<br>', $meta3);
			
			//Get url for our column image
			$columnimg = wp_get_attachment_url( $columnimg );
			
			$aboutArray[] = array(
								'id'			=> get_the_ID(),
								'title' 		=> get_the_title(),
								'the_slug'		=> $aboutSlug,
								'content' 		=> strip_tags( get_the_content() ),
								'featuredImg' 	=> wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'offeringthumb' ),
								'meta1' 		=> strip_tags($meta1, '<a><img><span><br>'),
								'meta2' 		=> strip_tags($meta2, '<a><img><span><br>'),
								'meta3' 		=> strip_tags($meta3, '<a><img><span><br>'),
							);
			// End of $aboutArray creation ----//
			
		?>
			<!-- Offering Image -->
			
			<a class="third noflicker <?php echo $lastchild; ?>" href="<?php echo bloginfo('url').'/#'.$aboutSlug;?>" title="">
				<?php if ($columnimg) { ?>
					<img src="<?php echo $columnimg; ?>" alt="<?php echo the_title(); ?>'s column image" title="<?php echo the_title(); ?>" />
				<?php } else { ?>
					<img src="<?php echo bloginfo('template_directory'); ?>/images/offercol-noimg.jpg" alt="<?php echo the_title(); ?>'s has no column image" title="<?php echo the_title(); ?>" />
				<?php }; ?>
			</a>
			
			<p class="offeringtxt"><?php echo strip_tags( get_the_content() ); ?></p>
			
		<?php $counter++; endwhile; wp_reset_query(); ?>
		
		<!-- Offering subtext -->
		<h4 class="full"> <a style="text-decoration: underline;" href="#contact" title="Contact <?php echo bloginfo('name'); ?>" >Contact</a> our experts today to see how <?php echo bloginfo('name'); ?> can change the way you do business</h4>
				
	</section>
</section>	
	
