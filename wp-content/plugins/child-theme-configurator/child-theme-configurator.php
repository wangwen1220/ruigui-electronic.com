<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/*
    Plugin Name: Child Theme Configurator
    Plugin URI: http://www.lilaeamedia.com/plugins/child-theme-configurator/
    Description: Create a Child Theme and customize the stylesheet and templates. Fast CSS editor lets you search, preview and modify by selector, rule or value.
    Version: 1.6.5
    Author: Lilaea Media
    Author URI: http://www.lilaeamedia.com/
    Text Domain: chld_thm_cfg
    Domain Path: /lang
    License: GPLv2
    Copyright (C) 2014-2015 Lilaea Media
*/

    defined( 'LF' ) or define( 'LF',            "\n"                        );
    define( 'CHLD_THM_CFG_OPTIONS',             'chld_thm_cfg_options'      );
    define( 'CHLD_THM_CFG_VERSION',             '1.6.5'                     );
    define( 'CHLD_THM_CFG_MIN_WP_VERSION',      '3.7'                       );
    define( 'CHLD_THM_CFG_BPSEL',               '2500'                      );
    define( 'CHLD_THM_CFG_MAX_RECURSE_LOOPS',   '1000'                      );
    define( 'CHLD_THM_CFG_MENU',                'chld_thm_cfg_menu'         );
    define( 'CHLD_THM_CFG_DIR',                 dirname( __FILE__ )         );
    define( 'CHLD_THM_CFG_URL',                 plugin_dir_url( __FILE__ )  );

    class ChildThemeConfigurator {
        static $instance;
        static function init() {
            // initialize languages
	    	load_plugin_textdomain( 'chld_thm_cfg', FALSE, basename( CHLD_THM_CFG_DIR ) . '/lang' );
            // verify WP version support
            global $wp_version;
            if ( version_compare( $wp_version, CHLD_THM_CFG_MIN_WP_VERSION ) < 0 ):
                add_action( 'admin_notices',    'ChildthemeConfigurator::version_notice' );
                return;
            endif; 	
            // setup admin hooks
            if ( is_multisite() )
                add_action( 'network_admin_menu',   'ChildThemeConfigurator::network_admin' );
            else
                add_action( 'admin_menu',           'ChildThemeConfigurator::admin' );
            // setup ajax actions
            add_action( 'wp_ajax_ctc_update',   'ChildThemeConfigurator::save' );
            add_action( 'wp_ajax_ctc_query',    'ChildThemeConfigurator::query' );
        }
        static function ctc() {
            // create admin object
            global $chld_thm_cfg; /// backward compat
            if ( !isset( self::$instance ) ):
                include_once( CHLD_THM_CFG_DIR . '/includes/class-ctc.php' );
                self::$instance = new ChildThemeConfiguratorAdmin( __FILE__ );
            endif;
            $chld_thm_cfg = self::$instance; /// backward compat
            return self::$instance;
        }
        static function save() {
            // ajax write
            self::ctc()->ajax_save_postdata();
        }
        static function query() {
            // ajax read
            self::ctc()->ajax_query_css();
        }        
        static function network_admin() {
            $hook = add_theme_page( 
                    __( 'Child Theme Configurator', 'chld_thm_cfg' ), 
                    __( 'Child Themes', 'chld_thm_cfg' ), 
                    'install_themes', 
                    CHLD_THM_CFG_MENU, 
                    'ChildThemeConfigurator::render' 
            );
            add_action( 'load-' . $hook, 'ChildThemeConfigurator::page_init' );        
        }
        static function admin() {
            $hook = add_management_page(
                    __( 'Child Theme Configurator', 'chld_thm_cfg' ), 
                    __( 'Child Themes', 'chld_thm_cfg' ), 
                    'install_themes', 
                    CHLD_THM_CFG_MENU, 
                    'ChildThemeConfigurator::render' 
            );
            add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ChildThemeConfigurator::action_links' );
            add_action( 'load-' . $hook, 'ChildThemeConfigurator::page_init' );        
        }
        static function action_links( $actions ) {
            $actions[] = '<a href="' . admin_url( 'tools.php?page=' . CHLD_THM_CFG_MENU ). '">' 
                . __( 'Child Themes', 'chld_thm_cfg' ) . '</a>' . LF;
            return $actions;
        }
        static function page_init() {
            // start admin controller
            self::ctc()->ctc_page_init();
        }
        static function render() {
            // display admin page
            self::ctc()->render();
        }
        static function version_notice() {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            unset( $_GET[ 'activate' ] );
            echo '<div class="update-nag"><p>' . sprintf( __( 'Child Theme Configurator requires WordPress version %s or later.', 'chld_thm_cfg' ), CHLD_THM_CFG_MIN_WP_VERSION ) . '</p></div>' . LF;
        }
    }
    
    if ( is_admin() ) 
        add_action( 'plugins_loaded', 'ChildThemeConfigurator::init' );
    
    register_uninstall_hook( __FILE__, 'chld_thm_cfg_uninstall' );

    function chld_thm_cfg_uninstall() {
        delete_option( CHLD_THM_CFG_OPTIONS );
        delete_option( CHLD_THM_CFG_OPTIONS . '_configvars' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_qs' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_sel' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_query' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_rule' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_val' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_dict_seq' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_sel_ndx' );
        delete_option( CHLD_THM_CFG_OPTIONS . '_val_ndx' );
    }
   