<?php



function uriSegment($segment) 
{
  if ( isset($_GET['url']) ) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    if ( isset($segment) ) {
      $url = $url[$segment];
    }
    return $url;
  }
}


function logs($log_msg)
{
    if ( DB_ERROR_LOG == true ) {
      $log_foldername = "log";
      if (!file_exists($log_foldername)) 
      {
          // create directory/folder uploads.
          mkdir($log_foldername, 0777, true);
      }
      $log_file_data = $log_foldername.'/log_' . date('d-M-Y') . '.log';
      
      if ( is_array($log_msg) ) {
        $log_msg = json_encode($log_msg);
      }
      // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
      file_put_contents($log_file_data, date('[l ,d-F-y H:i:s]') . ' ' . $log_msg . "\n", FILE_APPEND);
    }
} 