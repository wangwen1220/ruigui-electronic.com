<?php

// loads wordpress
require_once('get_wp.php'); // loads wordpress stuff

// gets shortcode
$shortcode = base64_decode( trim( $_GET['sc'] ) );

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link type="text/css" rel="stylesheet" href="<?php echo ASSETS_URI.'/css/common.css?ver='.THEME_VERSION; ?>" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo ASSETS_URI.'/style.css?ver='.THEME_VERSION; ?>" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo ASSETS_URI.'/css/shortcodes.css?ver='.THEME_VERSION; ?>" media="screen" />
<?php wp_head(); ?>
<style type="text/css">
html {
	margin: 0 !important;
}
body {
	padding: 20px 15px;
	background: none;
}
</style>
</head>
<body>
<?php echo do_shortcode( $shortcode ); ?>
</body>
</html>