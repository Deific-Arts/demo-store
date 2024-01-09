<?php

Class TopNavWalker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
    // print "<pre>";
    // print_r($args->walker->has_children);
    // print "</pre>";

    // $args->walker->has_children

    // if ($args->walker->has_children) {
    //   print_r($item->title);
    // }

    if ($depth === 0) {
      $isActive = $item->current || $item->current_item_parent ? 'active' : null;
      $children = $args->walker->has_children ? 'children' : null;
      $output .= '<kemet-popper effect="fade" placement="bottom" '. $isActive .' '. $children .'><a slot="trigger" href="'. $item->url .'">'. $item->title . '</a><div slot="content">';
    } else {
      $output .= 'GET THE CATEGORIES<li><a href="' . $item->url . '">'. $item->title;
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    if ($depth == 0) {
      $output .= '</div></kemet-popper>';
    } else {
      $output .= '</a></li>';
    }
  }
}
