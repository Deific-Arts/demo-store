<?php

$featuredImage = get_the_post_thumbnail_url();

if ($featuredImage) {
  ?>
    <business-featured-image style="background-image:url(<?php echo $featuredImage ?>);">
      <div>
        <h2><?php the_title(); ?></h2>
      </div>
    </business-featured-image>
  <?php
} else {
  echo '<h2>'. get_the_title() .'</h2>';
}
