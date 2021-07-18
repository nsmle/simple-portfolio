<?php



function uriSegment($segment = 0) 
{
  if ( isset($_GET['url']) ) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    return $url[$segment];
  }
}


function logs($log_msg)
{
    date_default_timezone_set("Asia/Jakarta");
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