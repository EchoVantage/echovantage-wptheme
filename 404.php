<!-- Header -->
<?php
	//we get header this way so we don't have to set up a lot of globals to pull site information into the header
	require_once(dirname(__FILE__) . '/header.php'); 
?>


<section id="blog" class="fullwidth colorSection">
	<section class="blog-page full">
		<h1>404 Page</h1>
		<p>Opps, you've found yourself lost on our website. We're sorry about that, but hopefully you can try one of the links below to find your way.</p>

		<?php
			
			//Get all custom post types to echo out links
			$args = array('public'   => true, '_builtin' => false );
			$output = 'names'; // names or objects, note names is the default
			$operator = 'and'; // 'and' or 'or'
			
			//array for loop
			$post_types = get_post_types( $args, $output, $operator ); 
			
			foreach ( $post_types  as $item ) {
				//Check if post is even or odd
				( $item == 'blog' ? $lastchild = 'last-child' : $lastchild = null);
				
				//only show the post types I want to show				
				if ( $item == 'offerings' || $item == 'philosophy' || $item == 'blog' ) {
		?>		
				<a class="third errorlink <?php echo $lastchild; ?>" href="<?php echo bloginfo('url').'/#'.$item; ?>" title="<?php echo ucfirst($item); ?>" >
					<div class="errorblock" ><p><?php echo ucfirst($item); ?></p></div>
					
				</a> 
				<?php }; ?>
		<?php }; ?>

	</section>
</section>




<!-- Footer -->
<?php 
	//we get footer this way so we don't have to set up a lot of globals to pull site information into the footer
	require_once(dirname(__FILE__) . '/footer.php'); 
?>