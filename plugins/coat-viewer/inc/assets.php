<?php
if (!defined('ABSPATH')) exit;

function spcv_enqueue_assets() {
    $plugin_url = plugin_dir_url(__DIR__); // from /inc back to plugin root

    // BASE VIEWER STYLES
    wp_enqueue_style(
        'spcv-viewer-css',
        $plugin_url . 'assets/css/viewer.css',
        [],
        '1.0'
    );

    wp_enqueue_style(
        'spcv-coat-ui-css',
        $plugin_url . 'assets/css/coat-ui.css',
        ['spcv-viewer-css'],
        '1.0'
    );

    wp_enqueue_style(
        'spcv-ui-coat-selector-css',
        $plugin_url . 'assets/css/ui-coat-selector.css',
        ['spcv-coat-ui-css'],
        '1.0'
    );

    // VIEWER JS CORE
    wp_enqueue_script(
        'spcv-loader-utils',
        $plugin_url . 'assets/js/loader-utils.js',
        [],
        '1.0',
        true
    );

    wp_enqueue_script(
        'spcv-viewer-3d',
        $plugin_url . 'assets/js/viewer-3d.js',
        ['spcv-loader-utils'],
        '1.0',
        true
    );

    // COAT UI
    wp_enqueue_script(
        'spcv-coat-ui',
        $plugin_url . 'assets/js/coat-ui.js',
        ['spcv-loader-utils'],
        '1.0',
        true
    );

    // BREED UI
    wp_enqueue_script(
        'spcv-breed-ui',
        $plugin_url . 'assets/js/breed-ui.js',
        ['spcv-loader-utils'],
        '1.0',
        true
    );

    // SIZE UI
    wp_enqueue_script(
        'spcv-size-ui',
        $plugin_url . 'assets/js/size-ui.js',
        ['spcv-loader-utils'],
        '1.0',
        true
    );

    // Localize config shared by these UIs
    wp_localize_script('spcv-coat-ui', 'spcv_config', [
        'manifest_url' => $plugin_url . 'assets/images/manifest.json',
        'breeds_url'   => $plugin_url . 'assets/images/breeds.json',
        'images_base'  => $plugin_url . 'assets/images/',
        'coats_base'   => $plugin_url . 'assets/coats/',
        'size_scale'   => json_decode(
            file_get_contents(__DIR__ . '/../assets/config/size-scale.json'),
            true
        )
    ]);
}
add_action('wp_enqueue_scripts', 'spcv_enqueue_assets');
