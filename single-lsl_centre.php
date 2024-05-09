<?php

/**
 * Template for lsl_single_center
 */
// Variables
$lsl_center_data = apply_filters('lsl_centre_data', $post);
$lsl_centre_url = $lsl_center_data['additional_info_url'];
$lsl_comments_args = apply_filters('lsl_comments_args', 1);

?>
<?php get_header(); ?>
<style>
    @media only screen and (min-width: 768px) {
        a#centerCallButton.blog_phone {
            display: none;
        }
    }

    @media only screen and (max-width: 767px) {
        a#centerCallButton.blog_desktop {
            display: none;
        }
    }
</style>
<div class="commentFormPageContainer" id="popUp">
    <div class="commentFormScrollContainer">
        <div class="commentFormContainer">
            <a href="#" class="closePopUp" id="closePopUp"></a>
            <!--FORMULARIO ANTIGUO BASADO EN COMMENTS-->
            <?php //comment_form( $lsl_comments_args ); 
            ?>
            <!-- <div id="contactResult"></div> -->
            <?php echo do_shortcode('[contact-form-7 id="3694" title="Formulario de contacto 1"]'); ?>
        </div>
    </div>
</div>
<div class="commentFormPageContainer" id="virtualTourPopUp">
    <div class="commentFormContainer">
        <a href="" class="closePopUp" id="virtualTourClosePopUp"></a>
        <h3><?php echo esc_html(__('Tour virtual', 'lsl-albia')); ?></h3>

        <?php if (!empty($lsl_center_data['virtual_tour_url'])) : ?>
            <iframe src="<?php echo esc_url($lsl_center_data['virtual_tour_url']); ?>"></iframe>
        <?php endif; ?>
    </div>
</div>
<div class="container paddingContainer breadcrumbs">
    <nav class="internNav fixTop" id="homeInternNav">
        <?php do_action('lsl_single_center_breadcrumbs', $post); ?>
    </nav>
</div>
<div class="container pageMarginTop">
    <div class="row">
        <div class="col-12 col-md-5 pageIndex">
            <div class="sticky-top">
                <div class="row searchToolParent">
                    <form action="<?php echo esc_url(site_url() . '/search'); ?>" method="GET" class="searchToolCenter">
                        <button type="button" href="" class="rounded-left localisationButton">
                            <img src="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/icons/gps-location.svg'); ?>" alt="">
                        </button>
                        <input class="searchBox typeahead" autocomplete="off" type="city" placeholder="Ciudad, código postal" name="query">
                        <button type="submit" href="" class="rounded-right searchButton">
                            <img src="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/icons/magnifying-glass.svg'); ?>" alt="">
                        </button>
                    </form>
                    <div class="col-12 contactBox">
                        <div class="row justify-content-center infosBar rounded">
                            <div class="col-auto">
                                <?php if (get_field('h1_seo')) : ?>
                                    <h2 class="text-center" id="centerPage"><?php echo esc_html($post->post_title); ?></h2>
                                <?php else : ?>
                                    <h1 class="text-center" id="centerPage"><?php echo esc_html($post->post_title); ?></h1>
                                <?php endif; ?>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-auto">
                                <address class="text-center">
                                    <?php echo apply_filters('lsl_centre_full_address', $post->ID); ?>
                                </address>
                            </div>
                            <div class="w-100"></div>
                            <a thref="<?php echo esc_url('tel:+34' . $lsl_center_data['phone']); ?>" data-phone="<?php echo esc_attr($lsl_center_data['phone']); ?>" class="col-8 align-self-center rounded callButton blog_desktop" attr-location="<?= get_post_type(); ?>" attr-title="<?php echo esc_html($post->post_title); ?>">
                            </a>

                            <div class="w-100"></div>
                            <p class="phoneAvailability">
                                <?php echo esc_html($lsl_center_data['phone_availability']); ?>
                            </p>

                            <?php do_action('lsl_single_opening_times', $post); ?>
                            <?php do_action('lsl_single_centre_contact_button', $post->ID); ?>

                            <a href="<?php echo empty($lsl_centre_url) ? 'https://www.albia.es/NuestrosServicios/ServiciosFunerarios.html' : esc_url($lsl_centre_url); ?>" class="col-8 align-self-center moreInfosButton rounded"><?php esc_html_e('Más información', 'lsl-albia'); ?></a>

                            <div class="w-100"></div>
                            <a href="#howGo" class="col-8 align-self-center rounded howGoButton">
                                <?php echo esc_html(__('¿Cómo llegar?', 'lsl-albia')); ?>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">

            <div class="row">
                <div id="carouselExampleFade" class="col carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php do_action('lsl_single_centre_gallery', $post); ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo esc_html(__('Siguiente', 'lsl')); ?></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo esc_html(__('Anterior', 'lsl')); ?></span>
                    </a>

                </div>
                <div class="w-100"></div>
                <div class="col-12">
                    <h2><?php echo esc_html(sprintf(__('Instalaciones %s', 'lsl-albia'), get_the_title($post->ID))); ?></h2>
                </div>

                <?php
                /**
                 * Action to print the facilities module
                 */
                do_action('lsl_single_facilities', $post);
                ?>

                <div class="col-12">
                    <p>
                        <?php echo apply_filters('the_content', get_the_content(null, false, $post->ID)); ?>
                    </p>
                </div>

                <?php if (get_field('h1_seo')) : ?>
                    <div class="col-12 mt-4">
                        <?php the_field('h1_seo'); ?>
                    </div>
                <?php endif; ?>

                <div class="col-12 mt-4">
                    <h2><?php echo esc_html(__('Servicios', 'lsl-albia')); ?></h2>
                </div>

                <?php
                /**
                 * Action to print the services module
                 */
                do_action('lsl_single_services', $post);
                ?>

                <div class="col-12">
                    <h2><?php echo esc_html(__('Características de nuestras instalaciones', 'lsl-albia')); ?></h2>
                    <p><?php echo apply_filters('the_content', $lsl_center_data['additional_text']); ?></p>
                </div>

                <?php
                /**
                 * Action to print the button of the virtual tour
                 */
                do_action('lsl_single_centre_virtual_tour_button', $post->ID);
                ?>

                <div id="howGo"></div>

                <div class="col-12 extraInfos">

                    <h2><?php esc_html_e('¿Cómo llegar?', 'lsl-albia'); ?></h2>

                    <p><?php echo apply_filters('the_content', $lsl_center_data['accesses']); ?></p>
                </div>
                <div id="map" class="col-12">
                </div>
                <div id="accordion">
                    <?php if (get_field('h2_tit_seo_1')) : ?>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <?php the_field('h2_tit_seo_1'); ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <?php the_field('h2_desc_seo_1'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('h2_tit_seo_2')) : ?>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <?php the_field('h2_tit_seo_2'); ?>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <?php the_field('h2_desc_seo_2'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('h2_tit_seo_3')) : ?>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <?php the_field('h2_tit_seo_3'); ?>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <?php the_field('h2_desc_seo_3'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('lsl_single_centre_banner', $post); ?>

<?php get_footer(); ?>