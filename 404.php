<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Store_Locator_UI
 */

get_header();
$home = get_post( get_option( 'lslp_home_page_id' ) );
$content = do_shortcode( $home->post_content );
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php echo do_shortcode("[lsl_error_404_message]") ?>
            <?php echo $content; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
