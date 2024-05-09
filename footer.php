<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Store_Locator_UI
 */
$lsl_regions = lsl_get_regions( true );
?>
</div><!-- #content -->
    <div class="container-fluid provinceNavContainer">
        <div class="container provinceNav">
            <div class="row">
                <nav class="col-12 col-sm-12">
                    <ul>
                        <?php foreach ($lsl_regions as $region): ?>
                            <li><a href="<?php echo esc_url( get_term_link($region) ); ?>"><?php echo esc_html( $region->name ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer id="colophon" class="site-footer">
        <div class="bgcFooter">
            <div class="container">
                <footer>
                    <div class="row paddingTop">
                        <div class="footer-column col-sm-3 col-lg-2 visibilityHidden">
                            <div class="footer-menu-title">Nuestros servicios</div>
                            <nav>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-menu-first-column',
                                        'menu_id'        => 'footer-menu-1',
                                        'container'      => ''
                                    ) );
                                ?>
                            </nav>
                        </div>
                        <div class="footer-column col-sm-3 col-lg-2 visibilityHidden">
                            <div class="footer-menu-title">Información de interés</div>
                            <nav>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-menu-second-column',
                                        'menu_id'        => 'footer-menu-2',
                                        'container'      => ''
                                    ) );
                                ?>
                            </nav>
                        </div>
                        <div class="footer-column col-sm-3 col-lg-2 visibilityHidden">
                            <div class="footer-menu-title">Quiénes somos</div>
                            <nav>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-menu-third-column',
                                        'menu_id'        => 'footer-menu-3',
                                        'container'      => ''
                                    ) );
                                ?>
                            </nav>
                        </div>
                        <div class="footer-column col-sm-3 col-lg-2 visibilityHidden">
                            <div class="footer-menu-title">Contacto</div>
                            <nav>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'footer-menu-fourth-column',
                                        'menu_id'        => 'footer-menu-4',
                                        'container'      => ''
                                    ) );
                                ?>
                            </nav>
                        </div>
                        <div class="col-sm-12 col-lg-4 numberBox">
                            <?php if( ! empty( get_option( 'lsl_tel_link' ) ) && ! empty( get_option( 'lsl_tel_text' ) ) ): ?>
                            <div>
                            <a thref="<?php echo esc_url( 'tel:+34' . get_option( 'lsl_tel_link', '' ) ); ?>" data-phone="<?php echo get_option('lsl_tel_link'); ?>" class="blog_desktop" attr-location="Footer" attr-title="Albia">
                            <i class="fas fa-phone"></i>
                            <?php echo esc_html( get_option( 'lsl_tel_text', '' ) ); ?>
                            </a>
                            </div>
                            <?php endif; ?>

                            <?php if( ! empty( get_option( 'lsl_tel_2_link' ) ) && ! empty( get_option( 'lsl_tel_2_text' ) ) ): ?>
                            <div>
                                <a id="footer_phone" href="<?php echo esc_url( 'tel:+34' . get_option( 'lsl_tel_2_link', '' ) ); ?>">
                                    <i class="fas fa-phone"></i>
                                    <?php echo esc_html( get_option( 'lsl_tel_2_text', '' ) ); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
	</footer><!-- #colophon -->
    <article class="footer-bottom">
        <ul class="d-flex justify-content-center flex-column flex-sm-row">
            <li class="text-center"><a href="http://www.albia.es/Accesibilidad.html">Accesibilidad</a></li>
            <li class="text-center"><a href="http://www.albia.es/PoliticaDePrivacidad.html">Política de privacidad</a></li>
            <li class="text-center"><a href="https://tanatorio.albia.es/politica-de-cookies">Política de cookies</a></li>
            <li class="text-center"><a href="http://www.albia.es/AvisoLegal.html">Aviso Legal</a></li>
            <li class="text-center"><a href="http://www.albia.es/MapaDelSitio.html">Mapa del Sitio</a></li>
        </ul>
    </article>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ND9BRPD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>
