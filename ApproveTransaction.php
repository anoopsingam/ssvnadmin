<?php 
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
$dcry = my_simple_crypt( $_GET['bill_no'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$auth=$_GET['auth'];

$sql="UPDATE student_tution_fee set discount_approval='APPROVED', approved_by ='$auth' WHERE bill_no='$dcry'";
if(mysqli_query($conn,$sql)){
    echo"<script>alert(' Bill No $dcry is now Approved By $auth...! ')</script>"; ?>
<script>   window.location.replace("DiscountApproval");
</script> 
<?php
}else{
    echo"<script>alert('Approval of Transaction Failed...!! Contact Technical Team!!')</script>"; ?>
<script>   window.location.replace("index");
</script> 
<?php
}



?>