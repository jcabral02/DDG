<?php
/**
 * WP Theme Header
 *
 * Displays all of the <head> section
 *
 * @package Hind
 */
global $hind_theme_options;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['search_position']) ) {
  $hind_theme_options['search_position'] = esc_html($_GET['search_position']);
}
if ( defined('DEMO_MODE') && isset($_GET['header_logo_position']) ) {
  $hind_theme_options['header_logo_position'] = esc_html($_GET['header_logo_position']);
}
if ( defined('DEMO_MODE') && isset($_GET['header_fullwidth']) ) {
  if($_GET['header_fullwidth'] == 0) {
    $hind_theme_options['header_fullwidth'] = false;
  }
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="//cloud.webtype.com/css/defc170f-5d71-4641-83db-744bec40a69c.css" rel="stylesheet" type="text/css">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ed208039-fae1-46e3-9178-ee18ca956ec2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php echo body_class(); ?>>

<?php do_action( 'before' ); ?>

<?php

// Center logo
if(isset($hind_theme_options['header_logo_position']) && $hind_theme_options['header_logo_position'] == 'center') {
  $header_container_add_class = ' header-logo-center';
} else {
  $header_container_add_class = '';
}
if(isset($hind_theme_options['header_fullwidth']) && $hind_theme_options['header_fullwidth']) {
  $header_container_class = 'container-fluid';
} else {
  $header_container_class = 'container';
}
// Sticky header

if(isset($hind_theme_options['enable_sticky_header']) && $hind_theme_options['enable_sticky_header']) {
  $header_add_class = 'sticky-header main-header';
} else {
  $header_add_class = 'main-header';
}

if(isset($hind_theme_options['enable_preloader']) && $hind_theme_options['enable_preloader']) {
  hind_show_site_preloader();
}
?>
<header class="<?php echo esc_attr($header_add_class); ?>">
<div class="<?php echo esc_attr($header_container_class); ?><?php echo esc_attr($header_container_add_class); ?>">
  <div class="row">
    <div class="col-md-12">

      <div class="header-left logo">
        <?php
        // Center logo
        if(isset($hind_theme_options['header_logo_position']) && $hind_theme_options['header_logo_position'] == 'center'): ?>
          <?php hind_header_center_show(); ?>
        <?php else: ?>
          <?php hind_header_left_show(); ?>
        <?php endif;
        // Center logo END
        ?>
      </div>

      <div class="header-center">
      <?php
      // Center logo
      if(isset($hind_theme_options['header_logo_position']) && $hind_theme_options['header_logo_position'] == 'center'):
      ?>
        <?php hind_header_left_show(); ?>
      <?php else: ?>
        <?php hind_header_center_show(); ?>
      <?php
      endif;
      // Center logo END
      ?>
      </div>

      <div class="header-right">
        <?php hind_header_right_show(); ?>
      </div>
    </div>
  </div>

</div>
<?php hind_menu_below_header_show(); ?>
</header>
