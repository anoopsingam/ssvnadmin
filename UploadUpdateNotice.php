<pre>
<?php


$notice_header = $_POST['notice_header'];
$notice_data = $_POST['notice_data'];
$notice_date = $_POST['notice_date'];
$notice_end_date = $_POST['notice_end_date'];
$notice_type = $_POST['notice_type'];
$notice_gen = $_POST['notice_gen'];
$notice_emp = $_POST['notice_emp'];
$notice_std = $_POST['notice_std'];

// if empty notice_gen,notice_emp,notice_std, then set to false else true
if (empty($notice_gen)) {
    $notice_gen = "false";
}else {
    $notice_gen = "true";
}
if (empty($notice_emp)) {
    $notice_emp = "false";
}else{
    $notice_emp = "true";
}
if (empty($notice_std)) {
    $notice_std = "false";
}else{
    $notice_std = "true";
}

include 'database.php';
// function my_simple_crypt($string, $action = 'e')
// {
//     // you may change these values to your own
//     $secret_key = 'mwa_encyption';
//     $secret_iv = '9886162566';
  
//     $output = false;
//     $encrypt_method = "AES-256-CBC";
//     $key = hash('sha256', $secret_key);
//     $iv = substr(hash('sha256', $secret_iv), 0, 16);
  
//     if ($action == 'e') {
//         $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
//     } elseif ($action == 'd') {
//         $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
//     }
  
//     return $output;
// }
  $id =$_POST['id'];
//update sql query for varibles
 $sql = "UPDATE `notice` SET `notice_header` = '$notice_header', `notice_data` = '$notice_data', `notice_date` = '$notice_date', `notice_end_date` = '$notice_end_date', `notice_type` = '$notice_type', `notice_gen` = '$notice_gen', `notice_emp` = '$notice_emp', `notice_std` = '$notice_std' WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Notice $notice_header Updated Successfully to Date $notice_date ')</script>"; 

    ?>
    <script>
        window.location.replace("ManageNotices");
    </script>
<?php    } else {

    echo "<script>alert('Query failed ! Contact Technical Team')</script>";
?>
    
    <script>
       window.location.replace("index");
    </script>
<?php
}


?>