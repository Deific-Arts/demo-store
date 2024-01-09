<?php
  $siteLogoID = get_theme_mod('site-logo');
  $siteLogoURL = wp_get_attachment_url($siteLogoID);
?>

<aside>
  <a href="<?php echo get_home_url(); ?>" class="mobile">
    <img src="<?php echo $siteLogoURL; ?>"  alt="Store Demo Logo" />
    <h2><?php echo get_bloginfo('name'); ?></h2>
  </a>
  <?php wp_nav_menu(); ?>
</aside>
