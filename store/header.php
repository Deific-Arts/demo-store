<?php wp_head(); ?>
<!DOCTYPE html>
<html lang="en">
<body <?php body_class(); ?>>
  <kemet-drawer overlay effect="slide" side="left" style="visibility:hidden;">
    <nav slot="navigation">
      <?php get_sidebar(); ?>
    </nav>
    <section slot="content">
      <?php get_template_part('includes/parts/header'); ?>
