<?php
 include'database.php';
 $output = '';
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
  <div class="table table-responsive" style="background: rgba( 255, 255, 255, 0.05 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 20.0px );
  -webkit-backdrop-filter: blur( 20.0px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );">

   <div class="row" >
    <div class="col-sm col_data" >Student ID : <strong>'.$row['studentid'].' </strong> </div >
    <div class="col-sm col_data" >Student Name : <strong> '.$row['student_name'].'</strong> </div >
    <div class="col-sm col_data" >Admission No : <strong> '.$row['admission_no'].'</strong> </div >
    </div>
    <div class="row" >
    <div class="col-sm col_data" >Class : <strong> '.$row['admissionclass'].'</strong> </div >

    <div class="col-sm col_data" >Gender : <strong> '.$row['gender'].'</strong> </div >
    <div class="col-sm col_data" >Mobile no : <strong><a href="tel:'.$row['father_number'].'"> '.$row['father_number'].' </a></strong> </div >
   
 
   </div >

   <div class="row">
   <div class="col-sm col_data" >Father Name : <strong> '.$row['father_name'].'</strong> </div >
   <div class="col-sm col_data" >Mother Name : <strong> '.$row['mother_name'].'</strong> </div >
   <div class="col-sm col_data" >Address : <strong> '.$row['permanentaddress'].'</strong> </div >
  
   <div class="col-sm col_data" > Mother Tongue : <strong> '.$row['mothertongue'].'</strong> </div >

 </div >
 <div class="row" >
 <div class="col-sm col_data" > Enrollment Time : <strong> '.$row['enroll_time'].'</strong> </div >
 <div class="col-sm col_data" >Status : <strong> '.$row['status'].'</strong> </div >
   <div class="col-sm col_data" >Admission Category : <strong> '.$row['adm_cat'].'</strong> </div >
 <div class="col-sm col_data"   >Admission Approved on : <strong> '.$row['approval_time'].'</strong> </div >

 </div >
 <div class="row">
 
 <div class="col "> Remarks : <strong> '.$row['remarks'].'</strong></div>
 </div>

<br>
 <center> <a href="EditApplication?enr='.$row['studentid'].'"> <button class="badge bg-danger">Edit <strong> '.$row['enrollment'].'</strong></button></a></center>

 
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