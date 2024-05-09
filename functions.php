<?php

/**
 * Store Locator UI functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Store_Locator_UI
 */

if (!function_exists('store_locator_ui_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function store_locator_ui_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Store Locator UI, use a find and replace
         * to change 'lsl-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('lsl-albia', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'lsl-theme'),
            'footer-menu-first-column' => esc_html__('footer-menu-1', 'lsl-theme'),
            'footer-menu-second-column' => esc_html__('footer-menu-2', 'lsl-theme'),
            'footer-menu-third-column' => esc_html__('footer-menu-3', 'lsl-theme'),
            'footer-menu-fourth-column' => esc_html__('footer-menu-4', 'lsl-theme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('store_locator_ui_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;

add_action('after_setup_theme', 'store_locator_ui_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function store_locator_ui_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('store_locator_ui_content_width', 640);
}

add_action('after_setup_theme', 'store_locator_ui_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function store_locator_ui_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'lsl-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'lsl-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'store_locator_ui_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function store_locator_ui_scripts()
{
    wp_enqueue_style('lsl-theme-style', get_stylesheet_uri());

    wp_enqueue_script('lsl-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('lsl-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'store_locator_ui_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load script JS and style CSS
 */
function lsl_enqueue_assets()
{
    global $post;

    $ver = wp_get_theme()->get('Version');
    $deps = array();

    // bootstrap.min.css
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';

    // bootstrap-select.min.css
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">';

    // google fonts css
    wp_register_style('google-font', 'https://fonts.googleapis.com/css?family=Merriweather|Open+Sans&display=swap', $deps, $ver);
    wp_enqueue_style('google-font', $deps, $ver);

    // style.css
    wp_dequeue_style('lsl-theme-style');
    wp_enqueue_style('lsl-style', get_template_directory_uri() . '/style.css', $deps, $ver);

    // main.css
    wp_enqueue_style('style', get_template_directory_uri() . '/css/main.css', $deps, $ver);

    // font-awesome css
    wp_enqueue_style('fontawesome-stylesheet', get_template_directory_uri() . '/vendor/fontawesome5.13.0/css/all.min.css', $deps, $ver);

    // jquery-3.4.1.min.js
    echo '<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>';

    // popper.min.js
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';

    // bootstrap.min.js
    echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';

    // main.js
    wp_enqueue_script('lsl-albia-main-js', get_template_directory_uri() . '/js/main.js', $deps, $ver);
    wp_localize_script('lsl-albia-main-js', 'lsl_data', lsl_get_page_info());

    // typeahead.bundle.js
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/typeahead.bundle.js" integrity="sha256-U7W3B28OSA8GrPiT408o6NZLYWdrQ0Tmir0L6kzvv9o=" crossorigin="anonymous"></script>';
    wp_enqueue_script('lsl-searchbox-autocomplete-script', get_template_directory_uri() . '/js/searchbox-autocomplete.js', [], $ver, true);
    wp_localize_script('lsl-searchbox-autocomplete-script', 'site_url', esc_url(site_url()));

    // geolocation.js
    wp_set_script_translations('lsl_geolocation', 'lyra-store-locator');
    wp_enqueue_script('lsl_geolocation', get_template_directory_uri() . '/js/geolocation.js', array('wp-i18n'), $ver, true);

    // bootstrap-select.min.js
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>';

    // Single centre template
    if (is_singular('lsl_centre')) {

        // google-maps library
        wp_enqueue_script('lsl_google_maps_api_url', "https://maps.googleapis.com/maps/api/js?key=" . get_option('lslp_g_maps_api_key', ''), [], $ver);

        // google-maps-centre.js
        wp_enqueue_script('lsl_centre_google_maps', get_template_directory_uri() . '/js/google-maps-centre.js', [], $ver);

        // Pass the data (centre coordinates) to the script
        wp_localize_script('lsl_centre_google_maps', 'lsl_centre_map_data', lsl_get_centre_map_data($post->ID));
    }
}

add_action('wp_head', 'lsl_enqueue_assets', 3);

/**
 * Add an admin pannel "Theme Option"
 */
function lsl_add_new_menu_items()
{
    add_menu_page(
        __("Theme Options", 'lsl'), // Title bar
        __("Theme Options", 'lsl'), // Menu text
        "manage_options", // Required capability
        "lsl_theme-options", // Unique identifier for this menu item.
        "lsl_theme_options_page", // Output callback
        "", // The URL to the menu item icon.
        80 // Position of the menu item in the menu.
    );
}

add_action("admin_menu", "lsl_add_new_menu_items");

/**
 * Output for the theme options page
 */
function lsl_theme_options_page()
{
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php

            //add_settings_section callback is displayed here. For every new section we need to call settings_fields.
            settings_fields('lsl_theme-options');

            // all the add_settings_field callbacks is displayed here
            do_settings_sections("lsl_theme-options");

            // Add the submit button to serialize the options
            submit_button();

            ?>
        </form>
    </div>
    <?php
}

/**
 * Add options, fields and sections for the Theme Options panel
 */
function lsl_theme_options()
{

    // ***********************
    // *** Header settings ***
    // ***********************

    add_settings_section(
        "lsl_header_section", // Section name
        __("Header Options", 'lsl'), // Display name
        null, // Callback to print content
        "lsl_theme-options" // Page id
    );

    add_settings_field(
        "lsl_header_logo_src",
        __("Logo source URL", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_header_logo_src" id="lsl_header_logo_src" value="<?php echo esc_attr(get_option('lsl_header_logo_src', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_header_section"
    );

    add_settings_field(
        "lsl_header_logo_link",
        __("Logo link URL", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_header_logo_link" id="lsl_header_logo_link" value="<?php echo esc_attr(get_option('lsl_header_logo_link', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_header_section"
    );

    register_setting("lsl_theme-options", "lsl_header_logo_src");
    register_setting("lsl_theme-options", "lsl_header_logo_link");


    // ***********************
    // *** Footer settings ***
    // ***********************

    add_settings_section(
        "lsl_footer_section", // Section name
        __("Footer options", 'lsl'), // Display name
        null, // Callback to print content
        "lsl_theme-options" // Page id
    );

    add_settings_field(
        "lsl_footer_logo_src",
        __("Logo source URL", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_footer_logo_src" id="lsl_footer_logo_src" value="<?php echo esc_attr(get_option('lsl_footer_logo_src', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    add_settings_field(
        "lsl_footer_logo_link",
        __("Logo link URL", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_footer_logo_link" id="lsl_footer_logo_link" value="<?php echo esc_attr(get_option('lsl_footer_logo_link', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    add_settings_field(
        "lsl_tel_text",
        __("Telephone text number", 'lsl'),
        function () {
    ?>
        <label for="lsl_tel_text"><?php _e('The telephone number to show to users.', 'lsl'); ?></label>
        <input type="text" name="lsl_tel_text" id="lsl_tel_text" value="<?php echo esc_attr(get_option('lsl_tel_text', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    add_settings_field(
        "lsl_tel_link",
        __("Telephone link number", 'lsl'),
        function () {
    ?>
        <label for="lsl_tel_link"><?php _e('The telephone number without blanks.', 'lsl'); ?></label>
        <input type="text" name="lsl_tel_link" id="lsl_tel_link" value="<?php echo esc_attr(get_option('lsl_tel_link', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    add_settings_field(
        "lsl_tel_2_text",
        __("Second telephone text number", 'lsl'),
        function () {
    ?>
        <label for="lsl_tel_2_text"><?php _e('The second telephone number to show to users.', 'lsl'); ?></label>
        <input type="text" name="lsl_tel_2_text" id="lsl_tel_2_text" value="<?php echo esc_attr(get_option('lsl_tel_2_text', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    add_settings_field(
        "lsl_tel_2_link",
        __("Second telephone link number", 'lsl'),
        function () {
    ?>
        <label for="lsl_tel_2_link"><?php _e('The second telephone number without blanks.', 'lsl'); ?></label>
        <input type="text" name="lsl_tel_2_link" id="lsl_tel_2_link" value="<?php echo esc_attr(get_option('lsl_tel_2_link', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_footer_section"
    );

    register_setting("lsl_theme-options", "lsl_footer_logo_src");
    register_setting("lsl_theme-options", "lsl_footer_logo_link");
    register_setting("lsl_theme-options", "lsl_tel_text");
    register_setting("lsl_theme-options", "lsl_tel_link");
    register_setting("lsl_theme-options", "lsl_tel_2_text");
    register_setting("lsl_theme-options", "lsl_tel_2_link");


    // *********************
    // *** Default image ***
    // *********************

    add_settings_section(
        "lsl_default_img_section", // Section name
        __("Default image options", 'lsl'), // Display name
        null, // Callback to print content
        "lsl_theme-options" // Page id
    );

    add_settings_field(
        "lsl_default_image_id",
        __("Default image id (post id)", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_default_image_id" id="lsl_default_image_id" value="<?php echo esc_attr(get_option('lsl_default_image_id', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_default_img_section"
    );

    add_settings_field(
        "lsl_default_centre_image_id",
        __("Default image id to be used in the module stores close to you (post id)", 'lsl'),
        function () {
    ?>
        <input type="text" name="lsl_default_centre_image_id" id="lsl_default_centre_image_id" value="<?php echo esc_attr(get_option('lsl_default_centre_image_id', '')); ?>" />
    <?php
        },
        "lsl_theme-options",
        "lsl_default_img_section"
    );

    register_setting("lsl_theme-options", "lsl_default_image_id");
    register_setting("lsl_theme-options", "lsl_default_centre_image_id");
}

add_action("admin_init", "lsl_theme_options");

/**
 * Get all provinces in the database
 */
function lsl_get_provinces($hide_empty = false)
{

    $args = array(
        'hide_empty' => $hide_empty, // also retrieve terms which are not used yet
        'meta_query' => array(
            array(
                'key'       => 'lsl_loc_type',
                'value'     => 'province',
            )
        ),
        'taxonomy'  => 'lsl_location',
    );

    $terms = get_terms($args);

    // Ensure we return an array, even if no services where found
    if (is_a($terms, 'WP_Error')) {
        $terms = array();
    }

    return $terms;
}

/**
 * Get all regions in the database
 */
function lsl_get_regions($hide_empty = false)
{

    $args = array(
        'hide_empty' => $hide_empty, // also retrieve terms which are not used yet
        'meta_query' => array(
            array(
                'key'       => 'lsl_loc_type',
                'value'     => 'region',
            )
        ),
        'taxonomy'  => 'lsl_location',
    );

    $terms = get_terms($args);

    // Ensure we return an array, even if no services where found
    if (is_a($terms, 'WP_Error')) {
        $terms = array();
    }

    return $terms;
}

/**
 * Get a page info array
 * @return    array    The page info array
 */
function lsl_get_page_info()
{
    $page_info = array();

    // is home?
    $page_info['is_home'] = is_front_page();

    // is hub?
    $page_info['is_hub'] = is_page('search') || is_tax('lsl_location');

    // is_centre?
    $page_info['is_centre'] = is_single() && get_post_type() === 'lsl_centre';

    return $page_info;
}

/**
 * Get centre data in an array to be passed to js
 * via wp_localize_script
 * @param     int       centre_id    The centre's id
 * @return    array                  The array with centre data
 */
function lsl_get_centre_map_data($centre_id)
{
    $centre_data = array();
    $coordinates = LSL_Centre_Data::get_centre_coordinates($centre_id);
    $plugin_url = '';

    if (class_exists('LSL_Core')) {
        $plugin_url = plugins_url() . '/lyra-store-locator/';
    }

    // Centre coordinates
    $centre_data['latitude'] = $coordinates['latitude'];
    $centre_data['longitude'] = $coordinates['longitude'];

    // Icons uri
    $centre_data['icons_uri'] = '';

    if (strlen($plugin_url) > 0) {
        $centre_data['icons_uri'] = $plugin_url . 'assets/img/icons';
    }

    return $centre_data;
}


// Added o prevent XSS atack in search form
add_action('init', function () {
    if (isset($_GET['query'])) {
        $_GET['query'] = sanitize_text_field($_GET['query']);
    }
});

add_action('wpcf7_init', function () {
    wpcf7_add_form_tag('post_id', function ($tag) {
        return '<input type="hidden" value="' . get_the_id() . '" name="post-id">';
    });
});

add_action('wpcf7_before_send_mail', function ($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    $posted_data = $submission->get_posted_data();

    $post_id = $posted_data['post-id'];
    $post = get_post($post_id);

    $lsl_center_data = apply_filters('lsl_centre_data', $post);
    $centre_id = $lsl_center_data['centre_id'];

    $centre_email = LSL_Centre_Data::get_centre_email($centre_id);

    $mailProp = $contact_form->get_properties('mail');
    $mailProp['mail']['recipient'] = $centre_email;

    $contact_form->set_properties(array('mail' => $mailProp['mail']));
}, 10, 1);


function get_device_info()
{
    $device_info = "";
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($userAgent, 'Android') !== false) {
        $device_info = 'Mobile (Android)';
    } elseif (stripos($userAgent, 'iPhone') !== false) {
        $device_info = 'Mobile (iPhone)';
    } elseif (stripos($userAgent, 'iPad') !== false) {
        $device_info = 'Tablet (iPad)';
    } elseif (stripos($userAgent, 'Windows') !== false) {
        $device_info = 'Desktop (Windows)';
    } elseif (stripos($userAgent, 'Macintosh') !== false) {
        $device_info = 'Desktop (Mac)';
    } elseif (stripos($userAgent, 'Linux') !== false) {
        $device_info = 'Desktop (Linux)';
    } else {
        $device_info = 'Other';
    }
    return $device_info;
}

add_action('wp_footer', 'applyDataLayer');
function applyDataLayer()
{ ?>
    <script>
        jQuery(document).ready(function() {
            $(".blog_desktop").click(function() {
                let location = $(this).attr('attr-location');
                let title = $(this).attr('attr-title');
                let link = $(this).attr('thref');
                dataLayer.push({
                    'event': 'Clic_Telefono',
                    'link_url': link,
                    'name_mortuary': title,
                    'location': location
                });
                setTimeout(() => {
                    window.location.href = link;
                }, 1000);

            });
            $(".blog_desktop_email").click(function() {
                let location1 = $(this).attr('attr-location');
                let title1 = $(this).attr('attr-title');
                let link1 = $(this).attr('thref');
                dataLayer.push({
                    'event': 'click_email',
                    'link_url': link1,
                    'location': location1
                });
                setTimeout(() => {
                    window.location.href = link1;
                }, 1000);

            });
        });
    </script>
<?php
}
