<?php
  
  // https://gist.github.com/rchrd2/c94eb4701da57ce9a0ad4d2b00794131
  // $ curl --basic --user XXX:XXX "https://example.com/wp-content/plugins/daystatus/connect.php"
  
  // if ( ! defined( 'WPINC' ) ) {die;} // end if

  header('Cache-Control: no-cache, must-revalidate, max-age=0');

  require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-blog-header.php' );
  require_once( './core-init.php' );

  $data = new DRequestPage();
  $set = explode(':', $data->getToken());

  $AUTH_USER = $set[0];
  $AUTH_PASS = $set[1];

  $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
  
  $is_not_authenticated = (
    !$has_supplied_credentials ||
    $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
    $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
  );

  if ($is_not_authenticated)
  {
    header('HTTP/1.1 401 Authorization Required');
    header('WWW-Authenticate: Basic realm="Access denied"');
    exit;
  }
  
  echo get_bloginfo('version');
