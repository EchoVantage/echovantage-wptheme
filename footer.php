<a href="#mama-wrapper" title="Back to Top">Back to Top</a>
<footer class="fullwidth">
	<section class="full overflowshow">
		<!-- Contact Form -->
		<section id="contact" class="two-third">
			<section class="fullwidth footer-social">
				<h1>Contact</h2>
				
				<article class="social-icon">
					<?php foreach( $aboutinfo as $item ) { ?>				
						<a class="facebook" href="<?php echo $item['facebook']; ?>" title="<?php echo $item['facebook']; ?>" target="_blank"> facebook </a>
						<a class="twitter" href="<?php echo $item['twitter']; ?>" title="<?php echo $item['twitter']; ?>" target="_blank"> twitter </a>
						<a class="linkedin" href="<?php echo $item['linkedin']; ?>" title="<?php echo $item['linkedin']; ?>" target="_blank"> linkedin </a>
						<a class="google last-child" href="<?php echo $item['google']; ?>" title="<?php echo $item['google']; ?>"  target="_blank"> google </a>
					<?php }; ?>
				</article>
				
				<p class="clear-both">Contact our experts today to see how <?php echo bloginfo('name'); ?> can change the way you do business.</p>
			</section>
			
			<?php echo do_shortcode( '[contact-form-7 id="4" title="Footer Contact Form"]' ); ?>
		</section>
	
		<!-- Newsletter Form -->
		<section id="newsletter" class="third last-child newsletter">
			<h2><?php echo bloginfo('name'); ?></h2>
			<?php foreach( $aboutinfo as $item ) { ?>
				<p><?php echo $item['addy1']; ?> <?php echo $item['addy2']; ?></p>
				<p><?php echo $item['city']; ?>, <?php echo $item['state']; ?> <?php echo $item['zip']; ?></p>
				<a href="mailto:<?php echo $item['email']; ?>" title="<?php echo $item['email']; ?>" ><?php echo $item['email']; ?></a>
				<p><?php echo $item['phone']; ?></p>
			<?php }; ?>
			
			<h1>Newsletter Signup</h1>
			<?php echo do_shortcode( '[mc4wp_form]' ); ?>
		</section>
	</section>
</footer>
</section> <!-- mama-wrapper -->


<!-- jQuery Plugins -->

<!-- Flexslider -->
<script src="<?php bloginfo('template_directory'); ?>/javascript/flexslider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css" media="screen">

<?php wp_footer(); ?>
</body>
</html>
