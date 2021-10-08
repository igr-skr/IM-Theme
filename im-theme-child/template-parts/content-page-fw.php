<?php
/**
 * 
 * Template part for displaying page content in page.php.
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package im-theme
 */

?>

<div id="post-<?php the_ID(); ?>" class="container-fluid">
	<div class="row page-title">
		<div class="col-md-12">
			<?php the_title( '<h3 itemprop="headline">', '</h3>' ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php the_content(); ?>
		</div>
	</div>
</div>