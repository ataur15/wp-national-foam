<?php
/**
 * national-foam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package national-foam
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'national_foam_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function national_foam_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on national-foam, use a find and replace
         * to change 'national-foam' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'national-foam', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'header-menu' => esc_html__( 'Header', 'national-foam' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'widgets',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'national_foam_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        /**
		 * Add support for woocommerce
		 */
		add_theme_support('woocommerce');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

    }

endif;
add_action( 'after_setup_theme', 'national_foam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function national_foam_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'national_foam_content_width', 640 );
}

add_action( 'after_setup_theme', 'national_foam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function national_foam_widgets_init() {

    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog Sidebar', 'national-foam' ),
            'id'            => 'blog-sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Shop Sidebar', 'national-foam' ),
            'id'            => 'shop-sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Header Top', 'national-foam' ),
            'id'            => 'header-top',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<div id="%1$s" class="top-nav myContainer">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Social', 'national-foam' ),
            'id'            => 'footer-social',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<div id="%1$s" class="social-icon">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Menu', 'national-foam' ),
            'id'            => 'footer-menu',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<div id="%1$s" class="grid grid-cols-1 md:grid-cols-4 gap-x-10 gap-y-4 text-center md:text-left">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Bottom', 'national-foam' ),
            'id'            => 'footer-bottom',
            'description'   => esc_html__( 'Add widgets here.', 'national-foam' ),
            'before_widget' => '<div id="%1$s" class="copyright">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}

add_action( 'widgets_init', 'national_foam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function national_foam_scripts() {
    // unicons
    wp_enqueue_style( 'unicons', 'https://unicons.iconscout.com/release/v4.0.0/css/line.css' );
    // Tailwind CSS
    wp_enqueue_style( 'tailwind', 'https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' );
    // Responsive Menu CSS
    wp_enqueue_style( 'national-foam-meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), _S_VERSION );
    // Style sheet
    wp_enqueue_style( 'national-foam-style', get_stylesheet_uri(), array(), _S_VERSION );
    // Custom CSS
    wp_enqueue_style( 'national-foam-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), _S_VERSION );

    wp_style_add_data( 'national-foam-style', 'rtl', 'replace' );
    // wp_enqueue_script( 'national-foam-navigation', get_template_directory_uri() . '/assets/js/navigation_.js', array(), _S_VERSION, true );

    // Responsive Menu js
    wp_enqueue_script( 'national-foam-jquery.meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array( 'jquery' ), _S_VERSION, true );
    // My script
    wp_enqueue_script( 'national-foam-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'national_foam_scripts' );


/**
 * Custom product Search Form
 */

function national_foam_search_form(){
    $link = esc_url( get_home_url() );
    $newform = <<<FORM
<form role="search" method="get" class="woocommerce-product-search" action="$link">
    <div class="mySearch">
        <input type="search" placeholder="Search..." value="" name="s" autocomplete="off">
        <span class="search-icon"><i class="uil uil-search"></i></span>
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>
FORM;
    return $newform;
}

add_filter("get_product_search_form", "national_foam_search_form");


/**
 * page title remove from the shop page
 */

function national_foam_hide_shop_page_title( $title ) {
    $title = false;
    if ( is_shop() ) {
        return $title;
    }
}
// add_filter( 'woocommerce_show_page_title', 'national_foam_hide_shop_page_title' );

/**
 * Remove Title from Product Archive Pages (Shop, Category, Tag, etc.)
 */
add_filter( 'woocommerce_show_page_title', '__return_null' );



/**
 * Custom hooks
 */

if ( class_exists( 'WooCommerce' ) ) {
	require 'woocommerce/national-foam-woocommerce-template-hooks.php';
	require 'woocommerce/national-foam-woocommerce-template-functions.php';
}

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
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
