<?php

namespace PStarter_Plugin_Namespace;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'PStarter_Plugin_Assets' ) ){
    class PStarter_Plugin_Assets {

        function __construct(){
            /**
             * Load plugin assets - CSS and JS
             */
            add_filter( 'script_loader_src', function ( $src, $handle ) {
                if ( in_array( $handle, array( 'pstarter-plugin-scripts' ) ) ) {
                    if( ! strpos($src, '?ver=') )
                    $src .= ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '?ver=' . time() : '?ver=' . PSTARTER_VERSION;
                }
            
                return $src;
            }, 100, 2 );
            add_action( 'wp_enqueue_scripts', [ $this, 'pstarter_enqueue_backend_scripts_and_styles' ] );
        }

        /**
         * Enqueue the backend related scripts and styles for this plugin.
         * All of the added scripts andstyles will be available on every page.
         *
         * @access	public
         * @since	1.0.0
         *
         * @return	void
         */
        public function pstarter_enqueue_backend_scripts_and_styles() {
            $ver = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? time() : PSTARTER_VERSION;

            wp_enqueue_style( PSTARTER_TEXTDOMAIN . '-styles', PSTARTER_URL . 'assets/css/' . PSTARTER_TEXTDOMAIN . '-styles.css', array(), $ver, 'all' );
            wp_enqueue_script( PSTARTER_TEXTDOMAIN . '-scripts', PSTARTER_URL . 'assets/js/' . PSTARTER_TEXTDOMAIN . '-scripts.js', array(), $ver, true );
            wp_localize_script( PSTARTER_TEXTDOMAIN . '-scripts', str_replace("-", "_", PSTARTER_TEXTDOMAIN) . '_object', array(
                'ajaxurl'           => admin_url( 'admin-ajax.php' ),
                'plugin_name'       => __( PSTARTER_NAME, 'pstarter-plugin' ),
                'pstarter_security' => wp_create_nonce('pstarter-plugin-security')
            ));
        }

    }
}