<?php
  $siteLogoID = get_theme_mod('site-logo');
  $siteLogoURL = wp_get_attachment_url($siteLogoID);

  $drawerMenuArgs = array(
    'menu'                 => 'Store Navigation',
    'container'            => 'ul',
    'container_class'      => 'drawer',
    'echo'                 => true,
    'theme_location'       => 'drawer',
  );
?>

<aside>
  <business-sidebar-header>
    <a href="<?php echo get_home_url(); ?>">
      <img src="<?php echo $siteLogoURL; ?>" alt="<?php echo get_bloginfo('name'); ?> logo"/>
      <h2><?php echo get_bloginfo('name'); ?></h2>
    </a>
    <kemet-button variant="text">
      <kemet-icon icon="x-lg" size="24"></kemet-icon>
    </kemet-button>
  </business-sidebar-header>
  <kemet-tabs selected="links" panel-effect="none" placement="top" tabs-align="center" divider>
    <kemet-tab slot="tab" link="links" role="tab">
      <kemet-icon icon="link"></kemet-icon>&nbsp;Links
    </kemet-tab>
    <kemet-tab slot="tab" link="account" role="tab">
      <kemet-icon icon="person-circle"></kemet-icon>&nbsp;Account
    </kemet-tab>
    <kemet-tab-panel panel="links" slot="panel">
      <?php wp_nav_menu($drawerMenuArgs); ?>
    </kemet-tab-panel>
    <kemet-tab-panel panel="account" slot="panel">
        <?php
          if (is_plugin_active('woocommerce/woocommerce.php')) {
            if (is_user_logged_in()) {
              do_action('woocommerce_account_navigation');
            } else {
              ?>
                <business-account-forms>
                  <?php wc_get_template('myaccount/form-login.php'); ?>
                </business-account-forms>
              <?php
            }
          }
        ?>
    </kemet-tab-panel>
  </kemet-tabs>
</aside>
