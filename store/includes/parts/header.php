<?php

  global $user_ID;
  global $woocommerce;

  $siteLogoID = get_theme_mod('site-logo');
  $siteLogoURL = wp_get_attachment_url($siteLogoID);
  $siteMastheadBackgroundID = get_theme_mod('site-masthead-background');
  $siteMastheadBackgroundURL = wp_get_attachment_url($siteMastheadBackgroundID);
  $cartAmount = floatval(preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total()));
  $showCatNav = get_theme_mod('site-show-cat-nav');

  $headerMenuArgs = array(
    'menu'                 => 'Store Navigation',
    'container'            => 'nav',
    'container_class'      => 'header',
    'echo'                 => true,
    'items_wrap'           => '%3$s',
    'theme_location'       => 'header',
  );

  $topNavMenuArgs = array(
    'menu'                 => 'Store Navigation',
    'container'            => false,
    'echo'                 => true,
    'items_wrap'           => '%3$s',
    'theme_location'       => 'top-nav',
  );

  $productCatArgs = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false
  );
?>

<business-header
  home="<?php echo get_home_url(); ?>"
  logo="<?php echo $siteLogoURL; ?>"
  name="<?php echo get_bloginfo('name'); ?>"
  logout="<?php echo wp_logout_url(get_home_url()); ?>"
  total="$<?php echo WC()->cart->total; ?>"
  count="<?php echo WC()->cart->get_cart_contents_count(); ?>"
  <?php if ($user_ID) echo 'logged-in'; ?>
>
  <?php wp_nav_menu($headerMenuArgs); ?>
</business-header>

<business-nav-top>
  <nav class="top-nav">
    <?php if ($showCatNav) { ?>
    <li>
      <kemet-popper effect="fade" placement="bottom-start">
        <a slot="trigger" href="<?php echo home_url('/shop'); ?>">All Categories</a>
        <business-nav-cat slot="content">
          <ul>
            <?php
              foreach (get_categories($productCatArgs) as $category) {
                $thumbnailID = get_term_meta($category->term_id, 'thumbnail_id', true);
                $thumbnailSRC = wp_get_attachment_url($thumbnailID);
                $catURL = home_url('/product-category/' . $category->slug);
                $catIMG = $thumbnailSRC ? "<img src='{$thumbnailSRC}' alt='{$category->name}' />" : '';

                if ($category->name !== 'Uncategorized') {
                  echo "
                    <li>
                      <a href='{$catURL}'>
                        {$catIMG}
                        <div>
                          <h3>{$category->name}</h3>
                          <p>$category->description</p>
                        </div>
                      </a>
                    </li>
                  ";
                }
              };
            ?>
          </ul>
        </business-nav-cat>
      </kemet-popper>
    </li>
    <?php } ?>
    <?php wp_nav_menu($topNavMenuArgs); ?>
  </nav>
</business-nav-top>
<business-page-main>
