<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package im-theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="page_header" class="page-subheader page-subheader--auto page-subheader--inherit-hp zn_def_header_style  psubhead-stheader--absolute sh-tcolor--dark">
			<div id="page_header" class="page-subheader page-subheader--auto page-subheader--inherit-hp zn_def_header_style  psubhead-stheader--absolute sh-tcolor--dark">
				<div class="ph-content-wrap">
					<div class="ph-content-v-center">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
		<div class="col-ld-9 col-md-9 col-sm-12">
			<?php get_template_part( 'template-parts/content', 'page-nf' );	?>
		</div>
			<?php get_sidebar(); ?>
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer();