<!DOCTYPE html>
<html <?php language_attributes(); require_once(dirname(__FILE__) . '/_siteGlobal.php');  ?> >
<head>

	<!-- Echo Vantage -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- feeds -->
	<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>

	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fonts.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/responsive.css" media="screen">

<!--[if lt IE 9]>
	<?php $IEDirectory = get_bloginfo('template_directory'); echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$IEDirectory}/css/iefix.css\" "; ?> 
<![endif]-->

	<!-- scripts -->
	<script src="<?php bloginfo('template_directory'); ?>/javascript/modernizr.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/javascript/script.js"></script>


</head>

<body <?php body_class(); ?> >

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-G77K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-G77K');</script>
<!-- End Google Tag Manager -->

<section id="mama-wrapper">

<header class="fullwidth">
	<nav <?php echo ( is_user_logged_in() ? "style=\"margin-top: 32px;\" " : " "); ?> >
		<ul>
			<!-- Header navigation links -->
			<li class="quarter">
				<a href="<?php echo bloginfo('url'); ?>/" title="<?php echo bloginfo('name'); ?>" >
					<img src="<?php bloginfo('template_directory'); ?>/images/site-logo.png" alt="<?php bloginfo('name'); ?>'s logo" title="<?php bloginfo('name'); ?>" />
				</a>
			</li>
			
			<section class="three-fourth last-child menu-links">
					<?php wp_nav_menu( array( 'items_wrap' => '%3$s' ) ); ?>
			</section>
		</ul>
		<div class="menu" onclick="return false"></div>
	</nav>
</header>

<?php
	//if is home -> fun flexslider
	if ( is_home() ) { ?>
<section class="fullwidth">
	<section class="full">
		<section class="flexslider">
			<ul class="slides">
			<?php 
				$args = array( 'post_type' => array('slider'), 'order' => 'ASC', 'posts_per_page' => -1);
				$loop = new WP_Query($args);
				while ( $loop->have_posts() ) : $loop->the_post();
				$featuredimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'slider' );
				$title = get_the_title();
					echo '<li>';
					echo 	"<img src=\"{$featuredimg}\" title=\"{$title}\" alt=\"{$title}\" />";
					echo '</li>';
				endwhile; wp_reset_query();
			?>
	
			</ul>
		</section>
	</section>
</section>
<?php } elseif ( is_single() || is_page() ) { 
	//if is single or paege
	while (have_posts()) : the_post();
	$slidernoimg = get_bloginfo('template_directory');
	$featuredimg = wp_get_attachment_url( get_post_thumbnail_id(), 'slider' );	
	$title = get_the_title();
	
	if ( $featuredimg ) { 
		echo "<img class=\"full\" src=\"{$featuredimg}\" title=\"{$title}\" alt=\"{$title}\" />";
	} else {
		echo "<img class=\"full\" src=\"{$slidernoimg}/images/slider-noimg.jpg\" title=\"{$title}\" alt=\"{$title}\" />";
	}
	
?>





<?php endwhile; }; ?>



