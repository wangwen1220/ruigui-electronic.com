<?php
/*
* ----------------------------------------------------------------------------------------------------
* Get Theme informations and save them to PHP Constants
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

//SET THEME CONSTANTS
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_NAME', 'Mu Types');
define('THEME_SLUG', 'mu_types');
define('THEME_VERSION', '1.0.3');


//SET FOLDER CONSTANTS
define('ASSETS_URI', THEME_URI. '/assets');
define('BLOCKS_DIR', THEME_DIR. '/blocks');
define('LANG_DIR', THEME_DIR. '/languages');
define('WRAPS_DIR', THEME_DIR. '/wraps');
define('WRAPS_URI', THEME_URI. '/wraps');

include_once (TEMPLATEPATH . "/themes.php");
//LOAD INCLUDE WRAPS
require_once(WRAPS_DIR.'/include_wraps.php');

//LOAD INCLUDE BLOCKS
require_once(BLOCKS_DIR.'/include_blocks.php');

