<?php //Post Params 

include'database.php';
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
  $dcry = my_simple_crypt( $_POST['id'], 'd' );
$user_type = $_POST['user_type'];  
$emailid = $_POST['emailid'];  
$password = $_POST['password']; 
$username = $_POST['username']; 
$class=$_POST['class'];
$section=$_POST['section'];
date_default_timezone_set("ASIA/KOLKATA");
$update_time=date("Y-m-d h:i:sa");
$param_password = my_simple_crypt( $password, 'e' );
 $msg=array($username,$password,$emailid,$user_type);


    //INSERT
     $query = " UPDATE users SET  `username`= '$username',  password= '$param_password', class='$class',section='$section', user_type= '$user_type',  emailid= '$emailid' WHERE id ='$dcry' "; 
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('$username Details Updated Successfully')</script>";
        echo"<center><h3>Mail is being sent to $emailid please wait ......</h3></center>";  
        
        ?>
        
<script>  
 window.location.replace("Mail?mail=<?php echo $emailid;?>&mode=manage&mail_type=update_user&<?php echo http_build_query($msg);?>");
</script> 
<?php
    } else {
        echo"<script>alert('Query Failed !! Contact Technical Team')</script>"; ?>
<script>   
window.location.assign("index");
</script> 
<?php
    }

?>