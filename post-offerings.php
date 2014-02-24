<section id="offerings-post">
	<?php
		$counter = 0;
		foreach( $aboutArray as $item ) {

		//if post is even, float the image to the right
		//images/text will alternate
		( $counter % 2 != 0 ? $lastchild = null : $lastchild = 'last-child');
		( $counter % 2 == 0 ? $colorSection = null : $colorSection = 'colorSection');

	?>
		<section class="fullwidth <?php echo $colorSection; ?>">		
		
			<!--Post Content -->
			<article class="full noflicker" id="<?php echo $item['the_slug']; ?>">
				
				<?php if ( $counter % 2 == 0 ) { //if even, place image on left side of text
					if ( $item['featuredImg'] ) { ?>
							<img class="half featuredimg" src="<?php echo $item['featuredImg']; ?>" alt="<?php echo $item['title']; ?>'s featured image" title="<?php echo $item['title']; ?>" />
					<?php } else { ?>
							<img class="half featuredimg" src="<?php echo bloginfo('template_directory'); ?>/images/offerings-noimg.jpg" alt="<?php echo $item['title']; ?>'s featured image" title="<?php echo $item['title']; ?>" />
					<?php };		
				}; ?>
				
				
				<section class="offeringtxt <?php echo $lastchild; ?> half">
					<h1><?php echo $item['title']; ?></h1>
					<p class="medium offer-content"><?php echo $item['content']; ?></p>
					
					<p class="meta"><?php echo $item['meta1']; ?></p>
					<p class="meta"><?php echo $item['meta2']; ?></p>
					<p class="meta"><?php echo $item['meta3']; ?></p>
				</section>

				<?php if ( $counter % 2 != 0 ) { //if even, place image on right side of text
					if ( $item['featuredImg'] ) { ?>
							<img class="half featuredimg last-child" src="<?php echo $item['featuredImg']; ?>" alt="<?php echo $item['title']; ?>'s featured image" title="<?php echo $item['title']; ?>" />
					<?php } else { ?>
							<img class="half featuredimg last-child" src="<?php echo bloginfo('template_directory'); ?>/images/offerings-noimg.jpg" alt="<?php echo $item['title']; ?>'s featured image" title="<?php echo $item['title']; ?>" />
					<?php };		
				}; ?>
				
			</article>
		</section>

	<?php $counter++; }; ?>


</section>