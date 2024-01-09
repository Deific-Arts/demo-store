<?php
namespace business;

Class ShortCodes {
  public static function init() {
    add_shortcode('business-form', array(get_class(), 'render_business_forms'));
  }

  public static function render_business_forms($props) {
    $default = array(
        'name' => 'contact',
        'to' => get_option('admin_email'),
        'from_name' => get_bloginfo('name'),
        'from_email' => get_option('admin_email'),
        'subject' => 'You have mail',
    );

    $attributes = shortcode_atts($default, $props);

    return '<business-form-'. $attributes['name'] .' to="'. $attributes['to'] .'" subject="'. $attributes['subject'] .'" from-name="'. $attributes['from_name'] .'" from-email="'. $attributes['from_email'] .'"></business-form-'. $attributes['name'] .'>';
  }
}
ShortCodes::init();
