<business-hero>
  <kemet-carousel>
    <kemet-carousel-prev slot="prev">
      <kemet-icon icon="chevron-left" size="72"></kemet-icon>
    </kemet-carousel-prev>

    <?php
      $heroArgs = [
        'post_type' => 'hero',
        'post_status' => 'publish',
        'posts_per_page' => 99,
        'order' => 'ASC'
      ];

      $heroLoop = new WP_Query($heroArgs);

      while ($heroLoop->have_posts()) : $heroLoop->the_post(); ?>
        <kemet-carousel-slide slot="slides"><?php the_content(); ?></kemet-carousel-slide>
      <?php endwhile;

      wp_reset_postdata();
    ?>

    <kemet-carousel-next slot="next">
      <kemet-icon icon="chevron-right" size="72"></kemet-icon>
    </kemet-carousel-next>
  </kemet-carousel>
</business-hero>
