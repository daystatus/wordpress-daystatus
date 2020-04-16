<?php
  
  // https://gist.github.com/rchrd2/c94eb4701da57ce9a0ad4d2b00794131
  // $ curl -X GET -s 'https://domain.com/wp-content/plugins/daystatus/connect.php?XXX:XXX'
  
  // if ( ! defined( 'WPINC' ) ) {die;} // end if

  header('Cache-Control: no-cache, must-revalidate, max-age=0');

  require_once( dirname(dirname(dirname(dirname(__FILE__)))).'/wp-blog-header.php' );
  require_once( './core-init.php' );

  $data = new DRequestPage();

  if ($_SERVER['QUERY_STRING'] !== 't='.$data->getToken())
  {
    exit;
  }

  /*
  $plugins = get_option('active_plugins');

  foreach ($plugins as $key => $value)
  {
    var_dump($value);
    var_dump(file_get_contents(dirname(dirname(__FILE__)).'/'.$value));
  }
  */
  
  echo get_bloginfo('version');
