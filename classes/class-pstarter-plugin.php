<?php

namespace PStarter_Plugin_Namespace;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'PStarter_Plugin_Class' ) ){
    class PStarter_Plugin_Class {
        /**
         * Main PStarter_Plugin Class.
         *
         * @package		pstarter-plugin
         * @subpackage	Classes/PStarter_Plugin_Class
         * @since		1.0.0
         * @author		EL PATO
         */

        /**
		 * assets object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|PStarter_Plugin_Class
		 */
		private $assets;

        /**
         * Initialize the class properties
         */
        function __construct() {
            /**
             * Call nested classes
             */
            require_once PSTARTER_DIR . 'classes/class-pstarter-assets.php';
            $this->assets = new \PStarter_Plugin_Namespace\PStarter_Plugin_Assets;
            $this->assets;
            /*****************************************************
             * Initialize plugin
             ****************************************************/
            /**
             * Loading a language file in the plugin initialization.
             */
            add_action('init', [ $this, 'pstarter_load_textdomain' ]);
            /*****************************************************
             * END Initialize plugin
             ****************************************************/
        }

         /**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function pstarter_load_textdomain() {
			load_plugin_textdomain( 'pstarter-plugin', FALSE, dirname( plugin_basename( PSTARTER_NAME ) ) . '/languages/' );
		}
    }
}

/**
 * Load class
 */
$pil_fhooks = new \PStarter_Plugin_Namespace\PStarter_Plugin_Class;