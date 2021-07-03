<?php
 include'database.php';
 $output = '';
 
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
 error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["query"]))

{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $var="APPROVED";
 $status=$var;
 $query = "
  SELECT * FROM student_enrollment WHERE CONCAT(studentid,student_name,father_number) LIKE '%".$search."%'  LIMIT 10";

}
else
{
 $query = "

 ";
}
$result = mysqli_query($conn, $query);
$i=1;
if(mysqli_num_rows($result) > 0)
{
 $output .= '

 ';
 while($row = mysqli_fetch_array($result))
 {

  $img="";
  $output .= '
<center><strong> Result Id --'.$i++.'</strong> &nbsp; DB ID:'.$row['id'].'</center>
  <div class="table table-responsive" style="
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );">

   <div class="row" >
    <div class="col-sm " >Student ID : <strong>'.$row['studentid'].' </strong> </div >
    <div class="col-sm " >Student Name : <strong> '.$row['student_name'].'</strong> </div >
    <div class="col-sm " >Admission No : <strong> '.$row['admission_no'].'</strong> </div >
    </div>
    <div class="row" >
    <div class="col-sm " >Class : <strong> '.$row['present_class'].'</strong> </div >
    <div class="col-sm " >Gender : <strong> '.$row['gender'].'</strong> </div >
    <div class="col-sm " >Mobile no : <strong><a href="tel:'.$row['father_number'].'"> '.$row['father_number'].' </a></strong> </div >
 
   </div >

   <div class="row">
   <div class="col-sm " >Father Name : <strong> '.$row['father_name'].'</strong> </div >
   <div class="col-sm " >Mother Name : <strong> '.$row['mother_name'].'</strong> </div >
   <div class="col-sm " >Address : <strong> '.$row['permanentaddress'].'</strong> </div >
  


 </div >
 <div class="row" >

 <div class="col-sm col_data" >Status : <strong> '.$row['status'].'</strong> </div >
   <div class="col-sm col_data" >Admission Category : <strong> '.$row['adm_cat'].'</strong> </div >


 </div >
 <div class="row">
 
 <div class="col "> Remarks : <strong> '.$row['remarks'].'</strong></div>
 </div>

<br>
 <center> <a href="PrintApp?enr='. my_simple_crypt($row['studentid'], 'e').'" target="_blank"> <button class="">View Student <strong> '.$row['studentid'].'</strong></button></a></center>

 
  </div>


  ';
 }
 echo $output;
}
else
{
 echo '<center>No Input Data..!!</center>';
}

?>