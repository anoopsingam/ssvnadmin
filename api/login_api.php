<?php

if (isset($_GET['username']) && isset($_GET['password'])) {
    include '../database.php';
    $username=$_GET['username'];
    $pass=$_GET['password'];
    header('Content-Type:application/json');
  if(empty($username)||empty($pass)){
    echo json_encode(['result' => 'false', 'data' => 'Missing Api Parameter', 'status' => 'error']);

  }else{
      
function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'mwa_encyption';
    $secret_iv = '9886162566';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
            $password=my_simple_crypt( $pass, 'e' );
    $sql = "SELECT * FROM users where username='$username' and password='$password' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        echo json_encode(['result' => 'true', 'data' => $arr, 'status' => 'yes']);
    } else {
        echo json_encode(['result' => 'false', 'data' => 'No Data Found for ' . $username, 'status' => 'No Data']);
    }
  }
}
?>
