<?php
session_start();
class Inaki {
   

    public static function timeAgo($ptime){
  
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }


    }

    





    public static function path() {
        return '/';
    }
   



    public static function render($pathtofile) {
        include_once $pathtofile.'.php' ;

        return FALSE;
    }

    public static function app_name() {
        echo ucwords('Quick Ride');
    }

    

    public static function innakki() {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?'))
            $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return strtolower($uri);
    }

   





    public static function head($title) {
        include_once 'partials/head.php';
    }

    public static function navbar() {
        include_once 'partials/inc.nav.php';
    }

    public static function footer() {
        include_once 'partials/footer.php';
    }

   

    public static function logout() {
        session_destroy();
        header("Location:" . Inaki::path());
    }

    public static function isAuthenticated($anchor) {
        if (empty($_SESSION[$anchor])) {
            self::logout();
        }
    }

  
    public static function alertSuccess($alert) {
        return '<br/><br/><div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
    
        <p align="center">'. $alert .' <br/></p>
      </div>';
        
    }

    public static function alertError($alert) {
        return '<br/><br/><div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <p>'. $alert .'</p>
        <span class="absolute inset-y-0 right-0 flex items-center mr-4">
          <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
        </span>
      </div>';
        ;
    }

    public static function deleteItem($id, $table) {
        global $link;
        $sql = $link->query("delete from {$table} where id = '$id' limit 1");
        if ($sql) {
            echo self::alertSuccess("Delete successful");
        } else {
            self::alertError("Somethin went wrong, please try again");
        }
    }

    
    
 //user's ip address
public static function ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
 
public static function Adam($sessionVariable,$returnTo){
    if(empty($_SESSION[$sessionVariable])){
        header("Location:".Inaki::path().$returnTo);
    }
}


//token genrator
    public static function token($length = 32) {
    // Create random token
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz012345678930';

    $max = strlen($string) - 1;

    $token = '';

    for ($i = 0; $i < $length; $i++) {
        $token .= $string[mt_rand(0, $max)];
    }

    return $token;
}

public static function upload(){
    if(!empty($_FILES['file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['file']['name']);
   
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        $data = [];
        $data['success'] = true;
        $data['message'] = $path;
      return $data;
    } else{
        $data = [];
        $data['error'] = true;
        $data['message'] = "There was an error uploading the file, please try again!";;
      return $data;
       
    }
  }
}



}



// Create a new CSRF token.
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}



define('CSSBASECLASS', 'quick-ride-wpx');