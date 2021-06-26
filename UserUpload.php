<?php


include 'database.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['emailid'];
$user_type = $_POST['user_type'];

function my_simple_crypt($string, $action = 'e')
{
  // you may change these values to your own
  $secret_key = 'mwa_encyption';
  $secret_iv = '9886162566';

  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if ($action == 'e') {
    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
  } else if ($action == 'd') {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }

  return $output;
}

if(empty($password)){
  $password= uniqid();
}


$param_password = my_simple_crypt( $password, 'e' );


$check = "SELECT * FROM users WHERE username = '$username' and emailid = '$email' and user_type = '$user_type' ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
  $view = mysqli_fetch_assoc($rs);
  $reg = $view['user_type'];
  echo mysqli_errno($conn);
?>
  <script>
    alert("<?php echo "User Already added with User Type $reg..!!"; ?>")
    window.location.assign("AddUser")
  </script>
  <?php
} else {
  $sql = " INSERT INTO users ( username , password , user_type , emailid ) VALUES ('$username','$param_password','$user_type','$email') ";
  $send = mysqli_query($conn, $sql);

  if ($send) {
    echo "<script>alert('User $username Added Successfully to $user_type ')</script>";
    
    $msg=array($username,$password,$email,$user_type);
     echo"<center><h3>Mail is being sent to $email please wait ......</h3></center>"; 

    ?>
    <script>
      window.location.replace("Mail?mail=<?php echo $email;?>&mode=new_user&mail_type=user&<?php echo http_build_query($msg);?> ");
    </script>
  <?php    } else {

    echo "<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
    <script>
      window.location.replace("AddUser");
    </script>
<?php
  }
}

?>