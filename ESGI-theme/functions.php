<?php
// Logique du thème

// Intégrer la feuille de style principale
add_action('wp_enqueue_scripts', 'esgi_enqueue_assets');
function esgi_enqueue_assets()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/main.js',);

    // Injection de variables dans js
    $big = 999999999; // need an unlikely integer
    $base = str_replace($big, '%#%', esc_url(get_pagenum_link($big)));

    $vars = [
        'ajaxURL' => admin_url('admin-ajax.php'),
        'basePagination' => $base
    ];

    wp_localize_script('main', 'esgi', $vars);
}



// Ajout des supports au thème
add_action('after_setup_theme', 'esgi_theme_setup');
function esgi_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'esgi_register_nav_menu', 0);
function esgi_register_nav_menu()
{
    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'ESGI'),
        'footer_menu'  => __('Footer Menu', 'ESGI'),
    ]);
}


// Fonction "helper" de génération d'icones svg
function esgi_getIcon($name)
{

    $logo = '<svg width="140" height="42" viewBox="0 0 140 42" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M129 29H140V38H129V29Z" fill="url(#paint0_linear_51_105)"/>
    <path d="M27.2461 38H3.24707V2.99023H27.2461V9.99707H10.2539V17.0039H21.7529V24.0107H10.2539V30.9932H27.2461V38Z" fill="black"/>
    <path d="M35.7119 13.4883C35.7119 12.0397 35.9886 10.6807 36.542 9.41113C37.0954 8.1416 37.8441 7.03483 38.7881 6.09082C39.7484 5.13053 40.8633 4.3737 42.1328 3.82031C43.4023 3.26693 44.7614 2.99023 46.21 2.99023H62.2744V9.99707H46.21C45.7217 9.99707 45.2659 10.0866 44.8428 10.2656C44.4196 10.4447 44.0452 10.6969 43.7197 11.0225C43.4105 11.3317 43.1663 11.6979 42.9873 12.1211C42.8083 12.5443 42.7188 13 42.7188 13.4883C42.7188 13.9766 42.8083 14.4404 42.9873 14.8799C43.1663 15.3031 43.4105 15.6774 43.7197 16.0029C44.0452 16.3122 44.4196 16.5563 44.8428 16.7354C45.2659 16.9144 45.7217 17.0039 46.21 17.0039H53.2168C54.6654 17.0039 56.0244 17.2806 57.2939 17.834C58.5798 18.3711 59.6947 19.1198 60.6387 20.0801C61.599 21.0241 62.3477 22.139 62.8848 23.4248C63.4382 24.6943 63.7148 26.0534 63.7148 27.502C63.7148 28.9505 63.4382 30.3096 62.8848 31.5791C62.3477 32.8486 61.599 33.9635 60.6387 34.9238C59.6947 35.8678 58.5798 36.6165 57.2939 37.1699C56.0244 37.7233 54.6654 38 53.2168 38H37.665V30.9932H53.2168C53.7051 30.9932 54.1608 30.9036 54.584 30.7246C55.0072 30.5456 55.3734 30.3014 55.6826 29.9922C56.0081 29.6667 56.2604 29.2923 56.4395 28.8691C56.6185 28.446 56.708 27.9902 56.708 27.502C56.708 27.0137 56.6185 26.5579 56.4395 26.1348C56.2604 25.7116 56.0081 25.3454 55.6826 25.0361C55.3734 24.7106 55.0072 24.4583 54.584 24.2793C54.1608 24.1003 53.7051 24.0107 53.2168 24.0107H46.21C44.7614 24.0107 43.4023 23.734 42.1328 23.1807C40.8633 22.6273 39.7484 21.8786 38.7881 20.9346C37.8441 19.9743 37.0954 18.8594 36.542 17.5898C35.9886 16.304 35.7119 14.9368 35.7119 13.4883Z" fill="black"/>
    <path d="M102.186 34.46C100.558 35.8434 98.7432 36.9095 96.7412 37.6582C94.7393 38.3906 92.6559 38.7568 90.4912 38.7568C88.8311 38.7568 87.2279 38.5371 85.6816 38.0977C84.1517 37.6745 82.7194 37.0723 81.3848 36.291C80.0501 35.4935 78.8294 34.5495 77.7227 33.459C76.6159 32.3522 75.6719 31.1315 74.8906 29.7969C74.1094 28.446 73.499 26.9974 73.0596 25.4512C72.6364 23.9049 72.4248 22.3018 72.4248 20.6416C72.4248 18.9814 72.6364 17.3864 73.0596 15.8564C73.499 14.3265 74.1094 12.8942 74.8906 11.5596C75.6719 10.2087 76.6159 8.98796 77.7227 7.89746C78.8294 6.79069 80.0501 5.84668 81.3848 5.06543C82.7194 4.28418 84.1517 3.68197 85.6816 3.25879C87.2279 2.81934 88.8311 2.59961 90.4912 2.59961C92.6559 2.59961 94.7393 2.97396 96.7412 3.72266C98.7432 4.45508 100.558 5.51302 102.186 6.89648L98.5234 13C97.4655 11.9258 96.2448 11.0876 94.8613 10.4854C93.4779 9.86686 92.0212 9.55762 90.4912 9.55762C88.9613 9.55762 87.5208 9.85059 86.1699 10.4365C84.8353 11.0225 83.6634 11.82 82.6543 12.8291C81.6452 13.8219 80.8477 14.9938 80.2617 16.3447C79.6758 17.6794 79.3828 19.1117 79.3828 20.6416C79.3828 22.1878 79.6758 23.6364 80.2617 24.9873C80.8477 26.3382 81.6452 27.5182 82.6543 28.5273C83.6634 29.5365 84.8353 30.334 86.1699 30.9199C87.5208 31.5059 88.9613 31.7988 90.4912 31.7988C91.3701 31.7988 92.2246 31.693 93.0547 31.4814C93.8848 31.2699 94.6742 30.9769 95.4229 30.6025V20.6416H102.186V34.46Z" fill="black"/>
    <path d="M120.588 38H113.581V2.99023H120.588V38Z" fill="black"/>
    <defs>
    <linearGradient id="paint0_linear_51_105" x1="130.875" y1="25.898" x2="139.959" y2="26.8701" gradientUnits="userSpaceOnUse">
    <stop stop-color="#FFD0A8"/>
    <stop offset="0.9995" stop-color="#FF4FC0"/>
    </linearGradient>
    </defs>
    </svg>';

    $menu = '<svg width="40" height="10" viewBox="0 0 40 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="40" height="3" fill="#050A3A"/>
    <rect x="19" y="7" width="21" height="3" fill="#050A3A"/>
    </svg>';

    $closeMenu = '<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="2.13605" y="0.0147705" width="21" height="3" transform="rotate(45 2.13605 0.0147705)" fill="white"/>
    <rect x="16.9706" y="2.12134" width="21" height="3" transform="rotate(135 16.9706 2.12134)" fill="white"/>
    </svg>
    ';

    $twitter = '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M18 1.6875C17.325 2.025 16.65 2.1375 15.8625 2.25C16.65 1.8 17.2125 1.125 17.4375 0.225C16.7625 0.675 15.975 0.9 15.075 1.125C14.4 0.45 13.3875 0 12.375 0C10.4625 0 8.775 1.6875 8.775 3.7125C8.775 4.05 8.775 4.275 8.8875 4.5C5.85 4.3875 3.0375 2.925 1.2375 0.675C0.9 1.2375 0.7875 1.8 0.7875 2.5875C0.7875 3.825 1.4625 4.95 2.475 5.625C1.9125 5.625 1.35 5.4 0.7875 5.175C0.7875 6.975 2.025 8.4375 3.7125 8.775C3.375 8.8875 3.0375 8.8875 2.7 8.8875C2.475 8.8875 2.25 8.8875 2.025 8.775C2.475 10.2375 3.825 11.3625 5.5125 11.3625C4.275 12.375 2.7 12.9375 0.9 12.9375C0.5625 12.9375 0.3375 12.9375 0 12.9375C1.6875 13.95 3.6 14.625 5.625 14.625C12.375 14.625 16.0875 9 16.0875 4.1625C16.0875 4.05 16.0875 3.825 16.0875 3.7125C16.875 3.15 17.55 2.475 18 1.6875Z" fill="#1A1A1A"/>
    </svg>';

    $facebook = '<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M3.4008 18L3.375 10.125H0V6.75H3.375V4.5C3.375 1.4634 5.25545 0 7.9643 0C9.26187 0 10.3771 0.0966038 10.7021 0.139781V3.3132L8.82333 3.31406C7.35011 3.31406 7.06485 4.01411 7.06485 5.04139V6.75H11.25L10.125 10.125H7.06484V18H3.4008Z" fill="#1A1A1A"/>
    </svg>';

    $google = '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path id="Vector" d="M9.12143 7.71429V10.8H14.3929C14.1357 12.0857 12.85 14.6571 9.25 14.6571C6.16429 14.6571 3.72143 12.0857 3.72143 9C3.72143 5.91429 6.29286 3.34286 9.25 3.34286C11.05 3.34286 12.2071 4.11429 12.85 4.75714L15.2929 2.44286C13.75 0.9 11.6929 0 9.25 0C4.23572 0 0.25 3.98571 0.25 9C0.25 14.0143 4.23572 18 9.25 18C14.3929 18 17.8643 14.4 17.8643 9.25714C17.8643 8.61428 17.8643 8.22857 17.7357 7.71429H9.12143Z" fill="#1A1A1A"/>
    </svg>';

    $linkedin = '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.9698 0H1.64687C1.19966 0 0.864258 0.335404 0.864258 0.782609V17.2174C0.864258 17.5528 1.19966 17.8882 1.64687 17.8882H18.0816C18.5289 17.8882 18.8643 17.5528 18.8643 17.1056V0.782609C18.7525 0.335404 18.4171 0 17.9698 0ZM3.54749 15.205V6.70807H6.23072V15.205H3.54749ZM4.8891 5.59006C3.99469 5.59006 3.32389 4.80745 3.32389 4.02484C3.32389 3.13043 3.99469 2.45963 4.8891 2.45963C5.78351 2.45963 6.45432 3.13043 6.45432 4.02484C6.34252 4.80745 5.67171 5.59006 4.8891 5.59006ZM16.0692 15.205H13.386V11.0683C13.386 10.0621 13.386 8.8323 12.0444 8.8323C10.7028 8.8323 10.4792 9.95031 10.4792 11.0683V15.3168H7.79593V6.70807H10.3674V7.82609C10.7028 7.15528 11.5972 6.48447 12.827 6.48447C15.5102 6.48447 15.9574 8.27329 15.9574 10.5093V15.205H16.0692Z" fill="#1A1A1A"/>
    </svg>';

    return $$name;  // nom de variable dynamique

}


// Customizer du thème
add_action('customize_register', 'esgi_customize_register');
function esgi_customize_register($wp_customize)
{
    // ajout d'une section
    $wp_customize->add_section('esgi_section', [
        'title' => __('Paramètres ESGI'),
        'description' => __('Customisation du thème !'),
        'panel' => '', // Not typically needed.
        'priority' => 0,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ]);

    // ajout d'un setting
    $wp_customize->add_setting('main_color', [
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '#3f51b5',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => '', // Basically to_json.
    ]);

    // ajout d'un controle
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', [
        'label' => __('Couleur principale', 'ESGI'),
        'section' => 'esgi_section',
    ]));

    // ajout d'un setting
    $wp_customize->add_setting('is_dark', [
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'esgi_bool_sanitize',
        'sanitize_js_callback' => '', // Basically to_json.
    ]);

    // Ajout d'un control
    $wp_customize->add_control('is_dark', [
        'type' => 'checkbox',
        'priority' => 1, // Within the section.
        'section' => 'esgi_section', // Required, core or custom.
        'label' => __('Dark mode'),
        'description' => __('Black is beautiful :)'),
    ]);

    // ajout d'un setting
    $wp_customize->add_setting('has_sidebar', [
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'esgi_bool_sanitize',
        'sanitize_js_callback' => '', // Basically to_json.
    ]);

    // Ajout d'un control
    $wp_customize->add_control('has_sidebar', [
        'type' => 'checkbox',
        'priority' => 1, // Within the section.
        'section' => 'esgi_section', // Required, core or custom.
        'label' => __('Afficher la sidebar'),
        'description' => __('(Uniquement sur les articles)'),
    ]);

    // Paramètre pour affichier ou non le formulaire de recherche dans le footer
    $wp_customize->add_setting( 'has_footer_search', array(
        'default'   => 'false',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( 'has_footer_search_control', array(
        'label'    => __( 'Afficher la recherche dans le footer', 'esgi-theme' ),
        'priority' => 1,
        'section'  => 'esgi_section',
        'settings' => 'has_footer_search',
        'type'     => 'checkbox',
    ));

    // Paramètre pour ajouter des différents liens pour les réseaux sociaux
    $social_networks = ['twitter', 'facebook', 'google', 'linkedin'];
    foreach ( $social_networks as $network ) {
        $wp_customize->add_setting( 'url_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'url_' . $network, array(
            'label' => ucfirst( $network ) . ' URL',
            'section' => 'esgi_section',
            'type' => 'url',
        ) );
    }

     // Section Partners
     $wp_customize->add_section('partners_section', array(
        'title' => __('Partners', 'mon_theme'),
        'priority' => 30,
    ));
    
    // Number of partners to display
    $wp_customize->add_setting('num_partners', array(
        'default' => 6,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('num_partners_control', array(
        'label' => __('Number of Partners to Display', 'mon_theme'),
        'section' => 'partners_section',
        'settings' => 'num_partners',
        'type' => 'number',
    ));
    
    // Partner logos
    for ($i = 1; $i <= 6; $i++) {
        $partner_logo_setting = 'partner_logo_' . $i;
        $partner_logo_control = 'partner_logo_' . $i . '_control';
        
        $wp_customize->add_setting($partner_logo_setting, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $partner_logo_control, array(
            'label' => __('Partner Logo ' . $i, 'mon_theme'),
            'section' => 'partners_section',
            'settings' => $partner_logo_setting,
        )));
    }
}

function esgi_bool_sanitize($value)
{
    return is_bool($value) ? $value : false;
}


// Application des styles du customizer
add_action('wp_head', 'esgi_custom_style');
function esgi_custom_style()
{
    echo '<style>
            :root{
                --main-color:' . get_theme_mod('main_color') . ';
            }
            </style>';
}


add_filter('body_class', 'esgi_body_class', 999, 1);
function esgi_body_class($classes)
{
    if (get_theme_mod('is_dark')) {
        $classes[] = 'dark';
    }
    return $classes;
}


// Déclaration des routes ajax
add_action('wp_ajax_load_posts', 'ajax_load_posts'); // action déclenchée par un call contenant une propriété action = 'load_posts'
add_action('wp_ajax_nopriv_load_posts', 'ajax_load_posts');

function ajax_load_posts()
{
    $page = $_GET['page'];
    $base = $_GET['base'];
    // Ouverture du buffer
    ob_start();
    // inclusion posts-list
    include('template-parts/posts-list.php');
    // echo le contenu du buffer
    echo ob_get_clean();
    wp_die();
}

function esgi_register_menus() {
    register_nav_menus(
        array(
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'init', 'esgi_register_menus' );
function esgi_footer_menu() {
    if ( has_nav_menu( 'footer-menu' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'container' => 'nav',
            'container_id' => 'footer-navigation',
            'container_class' => 'footer-navigation',
        ) );
    }
}
// add_action( 'wp_footer', 'esgi_footer_menu' );
// function esgi_widgets_init() {
//     register_sidebar( array(
//         'name'          => 'Zone de widgets du footer',
//         'id'            => 'footer-widget-area',
//         'before_widget' => '<div class="footer-widget">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h2 class="widget-title">',
//         'after_title'   => '</h2>',
//     ) );
// }
// add_action( 'widgets_init', 'esgi_widgets_init' );

function esgi_footer_widgets() {
    if ( is_active_sidebar( 'footer-widget-area' ) ) {
        dynamic_sidebar( 'footer-widget-area' );
    }
}
add_action( 'wp_footer', 'esgi_footer_widgets', 5 );

// Autoriser le téléchargement de fichiers SVG
function mon_theme_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'mon_theme_mime_types');

// Corriger l'affichage des SVG dans la médiathèque
function mon_theme_fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'mon_theme_fix_svg');
