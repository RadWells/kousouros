<?php
/**
 * The header template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $daisychain_options;
foreach ($daisychain_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?>  
<?php if ($daisychain_favicon_url != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($daisychain_favicon_url); ?>" />
<?php } ?>
<?php wp_head(); ?> 
<?php if ($daisychain_own_javascript_header != ''){ ?>
<?php echo stripslashes_deep($daisychain_own_javascript_header); ?>
<?php } ?> 
</head>
 
<body <?php body_class(); ?> id="wrapper">  
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'top-navigation' ) || $daisychain_header_facebook_link != '' || $daisychain_header_twitter_link != '' || $daisychain_header_google_link != '' || $daisychain_header_rss_link != '' ) {  ?>
  <div id="top-navigation-wrapper">
    <div class="top-navigation">
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation' ) ); } ?>     
      <div class="header-icons">
<?php if ($daisychain_header_facebook_link != ''){ ?>
        <a class="social-icon facebook-icon" href="<?php echo esc_url($daisychain_header_facebook_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-facebook.png" alt="Facebook" /></a>
<?php } ?>
<?php if ($daisychain_header_twitter_link != ''){ ?>
        <a class="social-icon twitter-icon" href="<?php echo esc_url($daisychain_header_twitter_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-twitter.png" alt="Twitter" /></a>
<?php } ?>
<?php if ($daisychain_header_google_link != ''){ ?>
        <a class="social-icon google-icon" href="<?php echo esc_url($daisychain_header_google_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-google.png" alt="Google +" /></a>
<?php } ?>
<?php if ($daisychain_header_rss_link != ''){ ?>
        <a class="social-icon rss-icon" href="<?php echo esc_url($daisychain_header_rss_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-rss.png" alt="RSS" /></a>
<?php } ?>
      </div>
    </div>
  </div>
<?php }} ?>

  <div id="container">
  <header id="header">    
    <div class="header-content">
<?php if ( $daisychain_logo_url == '' ) { ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($daisychain_logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
<?php if ( $daisychain_display_site_description != 'Hide' ) { ?>
      <p class="site-description"><?php bloginfo( 'description' ); ?></p>
<?php } ?>
<?php if ( $daisychain_display_search_form != 'Hide' && !is_page_template('template-landing-page.php') ) { ?>
<?php get_search_form(); ?>
<?php } ?>
    </div>

    <!--<div class="line-top"></div> -->
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
    <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
<?php } ?>    
<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( dynamic_sidebar( 'sidebar-7' ) ) : else : ?>
<?php if ( get_header_image() != '' ) { ?>    
    <div class="header-image"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></div>
<?php } ?>
<?php endif; ?>
<?php } else { ?>
<?php if ( get_header_image() != '' && $daisychain_display_header_image != 'Only on Homepage' ) { ?>    
    <div class="header-image"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></div>
<?php } ?>
<?php } ?>  
  </header> <!-- end of header -->
  <div id="main-content">  
  <div id="main-content-inner">
    <div id="content">