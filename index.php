<!-- Header -->
<?php 
	//we get header this way so we don't have to set up a lot of globals to pull site information into the header
	require_once(dirname(__FILE__) . '/header.php'); 
?>

<!-- About Columns -->
<?php require_once(dirname(__FILE__) . '/post-about.php'); ?>

<!-- Offerings Columns -->
<?php require_once(dirname(__FILE__) . '/post-offerings-col.php'); ?>

<!-- Offerings Segment Post -->
<?php require_once(dirname(__FILE__) . '/post-offerings.php'); ?>

<!-- Philosophy Segment Post -->
<?php require_once(dirname(__FILE__) . '/post-philosophy.php'); ?>

<!-- Blog Segment Post -->
<?php require_once(dirname(__FILE__) . '/post-blog.php'); ?>

<!-- Footer -->
<?php 
	//we get footer this way so we don't have to set up a lot of globals to pull site information into the footer
	require_once(dirname(__FILE__) . '/footer.php'); 
?>
