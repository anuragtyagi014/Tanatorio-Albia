<?php
/**
 * The template for displaying location based hubs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Store_Locator_UI
 */

get_header();
$hub = get_post( get_option( 'lslp_search_page_id' ) );
$content = do_shortcode( $hub->post_content );

$term = get_queried_object();

$tit1		= get_field('h2_tit_seo_1_tax', $term);
$text1		= get_field('h2_desc_seo_1_tax', $term);
$tit2		= get_field('h2_tit_seo_2_tax', $term);
$text2		= get_field('h2_desc_seo_2_tax', $term);
$tit3		= get_field('h2_tit_seo_3_tax', $term);
$text3		= get_field('h2_desc_seo_3_tax', $term);
$catdesc	= get_field('catdesc', $term);
?>
<div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php echo $content; ?>
			<div class="textosSeo">
				<div class="container col-10">
					<div id="location-description">
						<p><?php echo $catdesc; ?></p>
					</div>
					<div id="accordion">
						<?php if ( $tit1 ) : ?>
							<div class="card">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<?php echo $tit1; ?>
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<?php echo $text1; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( $tit2 ) : ?>
						<div class="card">
							<div class="card-header" id="headingTwo">
							<h2 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<?php echo $tit2; ?>
								</button>
							</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								<?php echo $text2; ?>
							</div>
							</div>
						</div>
						<?php endif; ?>
						<?php if ( $tit3 ) : ?>
						<div class="card">
							<div class="card-header" id="headingThree">
							<h2 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<?php echo $tit3; ?>
								</button>
							</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
								<?php echo $text3; ?>
							</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
