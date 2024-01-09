<?php
namespace business;

Class Endpoints {
  public static function init() {
    // add_action('rest_api_init', array(get_class(), 'add_user_registration'));
    // add_action('rest_api_init', array(get_class(), 'add_contact_form'));
  }

  public static function add_user_registration() {
    register_rest_route('business/v1', 'register', array(
      'methods' => 'POST',
      'callback' => function ($request) {
        // Reference: https://developer.wordpress.org/reference/classes/wp_rest_request/
        $userData = wp_create_user($request->get_param('user_name'), $request->get_param('user_pass'), $request->get_param('user_email'));

        if (is_int($userData)) {
          return array(
            'status' => 'ok',
            'message' => 'Successfully created '. $request->get_param('user_name') .'.',
            'data' => array(
              'user_id' => $userData,
              'user_name' => $request->get_param('user_name'),
              'user_email' => $request->get_param('user_email'),
              'user_pass' => $request->get_param('user_pass'),
            )
          );
        } else {
          return array(
            'status' => 'error',
            'message' => 'There was a problem creating the user.',
            'data' => $userData
          );
        }
      },
    ));
  }

  public static function add_contact_form() {
    register_rest_route('business/v1', 'forms/contact', array(
      'methods' => 'POST',
      'callback' => function ($request) {
        $files = $request->get_file_params();
        $contactDir = ABSPATH . 'wp-content/uploads/contact/';

        if (!file_exists($contactDir)) {
          mkdir($contactDir);
          chmod($contactDir, 0777);
        }

        move_uploaded_file($files["file"]["tmp_name"],  $contactDir . $files["file"]["name"]);

        $to = $request->get_param('to');
        $subject = $request->get_param('subject');
        $fullName = $request->get_param('fullname');
        $phone = $request->get_param('phone');
        $email = $request->get_param('email');

        $message = '
          User Information
          --------------------------------
          Name: '. $fullName .'
          Phone: '. $phone .'
          Email: '. $email .'

          User Message
          --------------------------------
          '. $request->get_param('message') .'
        ';

        $headers = array('From: '. $request->get_param('from-name') .' <'. $request->get_param('from-email') .'>');
        $headers = implode( PHP_EOL, $headers );
        $attachments = array($contactDir . $files["file"]["name"]);

        $sent = wp_mail($to, $subject, $message, $headers, $attachments);

        if ($sent) {
          return array(
            'status' => 'ok',
            'message' => 'Alright your message was sent!',
          );
        } else {
          return array(
            'status' => 'error',
            'message' => 'Oops. There was a problem sending your message.',
          );
        }

        unlink($contactDir . $files["file"]["name"]);
      }
    ));
  }
}
Endpoints::init();
