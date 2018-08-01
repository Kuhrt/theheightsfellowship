<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Login form
 */
add_action('login_enqueue_scripts', function () {
   wp_enqueue_style(
       'thf-login.css',
       asset_path('images/login.css'),
       false,
       null
   );
}, 100);

/**
 * Admin footer text
 */
add_filter('admin_footer_text', function () {
   echo 'The Heights Fellowship | For support contact: <a href="mailto:kuhrt@kuhrt.codes">Kuhrt Cowan</a>';
});
