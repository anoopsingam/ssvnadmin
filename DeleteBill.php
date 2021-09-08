<?php 
if(empty($_POST['token'])){
    //alert invalid token and Un Authorized Access in java script
    echo"<script>alert('Invalid token and UnAuthorized Access');</script>";
    echo "<script>window.location.href='index';</script>";
    exit;

}else{
        
include'database.php';


$ay=$_POST['ay'];
  $bill_no=$_POST['bill_no'];
  if(empty($bill_no)){
    echo"<script>alert('Invalid Bill No and UnAuthorized Access');</script>";
    echo "<script>window.location.href='index';</script>";
    exit;

  }else{
      //fetch bill_no from database
      $sql="SELECT * FROM student_tution_fee WHERE bill_no='$bill_no' ";
      $result=mysqli_query($conn,$sql);
      $bill=mysqli_fetch_array($result);
      $student_id=$bill['student_id'];
      //fetch bill_no from balance_fee using student_id
      $sql2="SELECT * FROM balance_fee WHERE student_id='$student_id' ";
      //execute query
      $result2=mysqli_query($conn,$sql2);
      $balance=mysqli_fetch_array($result2);
   

   
  $updated_tut_fee=$_POST['tution_paid'];
 $updated_tut_balance=$_POST['tution_balance'];
   $updated_tut_discount=$_POST['tution_discount']; ;
   $updated_ubs_fee=$_POST['ubs_paid'];;
   $updated_ubs_balance=$_POST['ubs_balance'];;
   $updated_ubs_discount=$_POST['ubs_discount'];;
   $updated_trans_fee=$_POST['transport_paid'];
   $updated_trans_balance=$_POST['transport_balance'];;
   $updated_transport_fee_discount=$_POST['transport_discount'];;
   $present_class=$bill['student_class'];
  $present_section=$bill['student_section'];
   //update balance_fee where student id 

$date=date('d-m-Y');
   echo $update_bill_sql=mysqli_query($conn,"UPDATE `student_tution_fee` SET `paying_fee`='CANCELLED',`balance_amount`='CANCELLED',`transport_fee_paying`='CANCELLED',`transport_fee_balance`='CANCELLED',`transport_discount`='CANCELLED',`ubs_fee_paying`='CANCELLED',`ubs_fee_balance`='CANCELLED',`ubs_discount`='CANCELLED',`update_date`='$date',`discount`='CANCELLED',`academic_year`='$ay' WHERE bill_no='$bill_no' and student_id='$student_id' ");
   echo $sql3=mysqli_query($conn,"UPDATE `balance_fee` SET `tution_balance_fee`='$updated_tut_balance',`tution_fee_paid`='$updated_tut_fee', `tution_fee_discount`='$updated_tut_discount',`transport_fee_paid`='$updated_trans_fee',`transport_balance`='$updated_trans_balance',`transport_fee_discount`='$updated_transport_fee_discount',`ubs_fee_paid`='$updated_ubs_fee',`ubs_balance`='$updated_ubs_balance',`ubs_fee_discount`='$updated_ubs_discount',`class`='$present_class',`sec`='$present_section',`academic_year`='$ay' WHERE academic_year='$ay' and student_id='$student_id'");
   
   if($update_bill_sql && $sql3){
      echo "<script>alert('Bill No. $bill_no has been cancelled');</script>";
      echo "<script>window.location.href='DeleteFeeBill';</script>";
   }else{
      echo "<script>alert('Error in Cancelling Bill No. $bill_no , Contact Technical Team !!');</script>";
      echo "<script>window.location.href='index';</script>";
   }
      
     
    

      
      
  }
}


?>