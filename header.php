<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Store_Locator_UI
 */

?>
<html <?php language_attributes(); ?>>

<head>
    <script>
        var dataLayer = [{
            'page_language': '<?= get_bloginfo("language"); ?>',
            'site_country': '<?= get_locale(); ?>',
            'device_version': '<?= get_device_info(); ?>',
            'site_environment': 'development',
            'page_type': '<?= get_post_type(); ?>',
            'site_brand': '<?= get_bloginfo("name"); ?>',
            'site_department': 'albia',
            'page_url': '<?= get_permalink(); ?>',
            'page_referrer': '<?= get_permalink(); ?>',
            'loginStatus': '<?php if (is_user_logged_in()) {
                                echo "Login";
                            } else {
                                echo "logout";
                            } ?>',
            'page_title': '<?= get_the_title(); ?>',
            'page_name': '<?= get_the_title(get_the_ID()) ?>',
            'page_section1': 'Localizar un centro',
            'page_section2': 'Madrid',
            'page_section3': 'burial and cremation',
            'page_section4': '',
            'page_section5': '',
            'page_section6': '',
            'search_keyword': '',
            'search_error_field': '',
            'form_error_fields': '',
            'error_type': '',
            'error_code': '',
            'error_message': '',
            'error_expired_session': '',
            'searchResultNumber': '',
            'searchResultPage': '',
            'error_count': ''

        }];
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-ND9BRPD');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/favicons/cropped-favicon-32x32.png'); ?>" sizes="32x32" />
    <link rel="icon" href="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/favicons/cropped-favicon-192x192.png'); ?>" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/favicons/cropped-favicon-180x180.png'); ?>" />
    <meta name="msapplication-TileImage" content="<?php echo esc_url(get_bloginfo('stylesheet_directory') . '/img/favicons/cropped-favicon-270x270.png'); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <script src=https://cdn.cookielaw.org/scripttemplates/otSDKStub.js type="text/javascript" charset="UTF-8" data-domain-script="8bbe6e32-ce4c-4760-9f98-2f299cff33b5-test"></script>
    <script>
        // 	jQuery(document).ready(function(){
        //     document.getElementById('header_phone').addEventListener('click', function() {

        //    // Track a cabecera click event
        //    dataLayer.push({
        //         'event': 'click_cta_telefono', 
        //         'link_url': 'tel:900242420',
        // 	    'name_mortuary': 'Albia',
        //         'location': 'cabecera'

        //       }); 
        //     });
        //     document.querySelector('.homearticle_phone').addEventListener('click', function() {
        //    // Track a cerca_de_ti click event
        //    dataLayer.push({
        // 	    'event': 'click_cta_telefono', 
        //         'link_url': 'tel:916088306',
        // 	    'name_mortuary' : 'Albia Navalcarnero',
        //         'location': 'cerca_de_ti'
        //       }); 
        //     });
        //     document.getElementById('footer_phone').addEventListener('click', function() { 
        //    // Track a Footer click event  footer_phone
        //   dataLayer.push({ 
        // 	    'event': 'click_cta_telefono', 
        //         'link_url': 'tel:900242420',
        // 	    'name_mortuary' : 'Albia',
        //         'location': 'footer'
        //       });
        //     });
        //  document.querySelector('.menu_phone').addEventListener('click', function() { 
        //    // Track a menu_mobile click event
        //    dataLayer.push({  
        // 	    'event': 'click_cta_telefono',
        //         'link_url': 'tel:900242420',
        // 	    'name_mortuary' : 'Albia',
        //         'location': 'menu_mobile'
        //       }); 
        //    });
        //  document.querySelector('.callButton ').addEventListener('click', function() { 
        //     // Track a Oficina Central Madrid click event
        //    dataLayer.push({ 
        // 	    'event': 'click_cta_telefono', 
        //         'link_url': 'tel:917583937',
        // 	    'name_mortuary' : 'Albia',
        //         'location': 'ficha'
        //       }); 
        //    }); 

        //  document.getElementById('header_email').addEventListener('click', function() { 
        //   dataLayer.push({
        // 	    'event': 'click_email',
        //         'link_url': 'mailto:info@albia.es',
        //         'location': 'cabecera'
        //       });
        //   });
        //  document.querySelector('.mobile_email').addEventListener('click', function() { 
        //   dataLayer.push({
        // 	    'event': 'click_email', 
        //         'link_url': 'mailto:info@albia.es',
        //         'location': 'menu_mobile'
        //       });
        //   });

        //    });

        // $(".blog_desktop1").click(function() {
        //     alert("its working");
        // });
        // document.querySelector('.blog_desktop1').addEventListener('click', function() {
        //     alert("its working");
        //     //         let phoneNumber=$(this).attr("thref");

        //     // alet("its working");
        //     //    // Track a Albia Tanatorio Crematorio Vitoria-Gasteiz click event
        //     //    dataLayer.push({
        //     //         'event': 'click_cta_telefono', 
        //     //         'link_url': 'tel:917583937',
        //     //         'name_mortuary' : 'Albia Navalcarnero',
        //     //         'location': 'buscador'
        //     //       });

        // });
    </script>
    <?php

    if (!is_front_page()) :
        $pagename = get_the_title();

    ?>
        <script>
            jQuery(document).ready(function() {
                document.getElementById('pop_form').addEventListener('click', function() {
                    dataLayer.push({
                        'event': 'form_submit_ok',
                        'form_name': 'formulario_contacto_fichas',
                        'name_mortuary': '<?= $pagename; ?>'
                    })
                })
            });
        </script>
    <?php endif; ?>
<style type="text/css">
    a.blog_desktop {
    cursor: pointer;
}
</style>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'lsl-theme'); ?></a>

        <header id="masthead" class="site-header">
            <div class="containerNavMobile">
                <div class="container">
                    <div class="row d-flex justify-content-between align-items-center albia-header-top">
                        <!-- logo for desktop -->
                        <a href="<?php echo esc_url(get_option('lsl_header_logo_link', '')); ?>" class="col-lg-3 pageLogo hiddenContent">
                            <img src="<?php echo esc_url(get_option('lsl_header_logo_src', '')); ?>" alt="logo de Albia">
                        </a>
                        <!-- Mobile Menu -->
                        <a class="col-6 d-lg-none" id="menu_mobile" href="#"><i class="fas fa-bars fa-lg" style="color: #606a71;"></i></a>
                        <div class="mobile-menu d-none">
                            <?php
                            // wp_nav_menu(array(
                            // 'theme_location' => 'Mobile menu', 
                            // 'container' => false,
                            // 'menu_class' => 'px-1', 
                            // ));
                            wp_nav_menu(array(
                                'menu'              => "Mobile menu",
                                'menu_class'        => "px-1",
                                'container'           => false

                            ));

                            ?>
                            <ul>
                                <li>
                                    <a thref="tel:+34900242420" data-phone="900242420" class="blog_desktop" attr-location="Mobile Menu Phone" attr-title="Albia">900 24 24 20</a></li>
                                <li>
                                    <a thref="mailto:info@albia.es" data-phone="info@albia.es" class="blog_desktop_email" attr-location="Mobile Menu Email" attr-title="<?= get_the_title(); ?>">info@albia.es</a></li>
                            </ul>
                        </div>
                        <script>
                            jQuery(document).ready(function($) {
                                $('#menu_mobile').click(function(event) {
                                    event.preventDefault();
                                    $('.mobile-menu').toggleClass('d-none d-block');
                                });

                                $('.mobile-menu .menu-item-has-children > a').click(function(event) {
                                    event.preventDefault();
                                    $(this).parent().toggleClass('open-submenu');
                                });
                            });
                        </script>
                        <!-- logo responsive for mobile or tablet -->
                        <a href="<?php echo esc_url(get_option('lsl_header_logo_link', '')); ?>" class="col-6 col-lg-3 pageLogo hiddenBoxMoreMd">
                            <img src="<?php echo esc_url(get_option('lsl_header_logo_src', '')); ?>" alt="logo de Albia">
                        </a>
                        <!-- Contact section -->
                        <div class="header-contact-info hiddenContent d-flex flex-column align-items-end">
                            <div>
                                <a thref="<?php echo esc_url('tel:+34' . get_option('lsl_tel_link', '')); ?>" data-phone="<?php echo get_option('lsl_tel_link'); ?>" class="blog_desktop" attr-location="header Phone" attr-title="Albia">
                                    <i class="fas fa-phone"></i>
                                    <?php echo esc_html(get_option('lsl_tel_text', '')); ?>
                                </a>
                            </div>
                            <div>TLF. GRATUITO - 24H</div>
                            <div>
                        <a thref="mailto:info@albia.es" data-phone="info@albia.es'" class="blog_desktop_email" attr-location="header Email" attr-title="<?php echo get_the_title(); ?>"><i class="far fa-envelope"></i>info@albia.es</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- .OldId : site-navigation-->
                        <nav id="primary_nav_wrap" class="main-navigation pageNav d-flex justify-content-around hiddenContent">
                            <?php

                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'container'      => ''
                            ));
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->

        <div id="content" class="site-content">