<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		<div class="col-lg-12 col-md-12 col-sm-12">
			<?php woocommerce_content(); ?>
		</div>
		<?php //get_sidebar(); ?>
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer();
