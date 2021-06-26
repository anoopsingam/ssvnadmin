<?php
$event_name = $_POST['event_name'];
$event_discription = $_POST['event_discription'];
$event_date = $_POST['event_date'];
$even_added_by = $_POST['even_added_by'];
$academic_year = $_POST['academic_year'];
include 'database.php';
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
//INSERT 

$query = " UPDATE events SET  event_name = '$event_name',  event_discription = '$event_discription',  event_date = '$event_date',  even_added_by = '$even_added_by',  academic_year = '$academic_year' WHERE id='$dcry' "; 
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('Event $event_name Updated Successfully to Date $event_date for Academic Year $academic_year')</script>"; ?>
    <script>
        window.location.replace("ManageEvents");
    </script>
<?php    } else {

    echo "<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
    <script>
        window.location.replace("index");
    </script>
<?php
}


?>