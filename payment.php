<?php //Post Params 
include 'database.php';

$student_name = $_POST['student_name'];
$student_id = $_POST['student_id'];
$installment = $_POST['installment'];
$billing_date = $_POST['billing_date'];
$tution_fee = $_POST['tution_fee'];
$paying_fee = trim($_POST['paying_fee']);
// $get="SELECT MAX(balance_amount) as balance FROM student_tution_fee where student_id='$student_id' ";
// $get_ask=mysqli_query($conn,$get_ask);
// $view=mysqli_fetch_array($get_ask);
$due_date = $_POST['due_date'];
// $bill_no = $_POST['bill_no'];
$login_id = $_POST['login_id'];
$discount = trim($_POST['discount']);
$present_class= $_POST['present_class'];
$present_section = $_POST['present_section'];
$academic_year = $_POST['academic_year'];
$balance_amount = trim($_POST['balance_amount'])-$discount;
$transport_fee=$_POST['transport_fee'];
$transport_fee_paying=trim($_POST['transport_fee_paying']);
$transport_discount=trim($_POST['transport_discount']);
$past_tution_fee=$_POST['past_tution_fee'];
$transport_fee_balance=trim($_POST['transport_fee_balance'])-$transport_discount;
$past_transport_fee=$_POST['past_transport_fee'];

$ubs_fee=$_POST['ubs_fee'];
$ubs_fee_paying=trim($_POST['ubs_fee_paying']);
$ubs_discount=trim($_POST['ubs_discount']);
$past_ubs_fee=$_POST['past_ubs_fee'];
$ubs_fee_balance=trim($_POST['ubs_fee_balance'])-$ubs_discount;
$past_past_fee=$_POST['past_past_fee'];
//============================
// START PREFIX
$query = mysqli_query($conn,"SELECT bill_no FROM `student_tution_fee` ORDER BY id DESC LIMIT 1"); 
// GET THE LAST ID MAKE SURE IN TABLE YOU 9991

while ($row = mysqli_fetch_object($query)) {
  $lastId =  $row->bill_no;
}

list($prefix,$Id) = explode('BILL0',$lastId );
$Id = ($Id+1);
$bill_no = 'BILL0'.$Id;
// END PREFIX
//==================================================
if(empty($paying_fee) && empty($transport_fee_paying) && empty($ubs_fee_paying)){
    ?>
    <script>
    alert("<?php echo "$student_name Fee is Completely Cleared!!"; ?>")
    window.location.assign("TutionFeeBilling")
    </script>
    <?php
}else{
    

//INSERT 
$check = "SELECT * FROM student_tution_fee WHERE student_id = '$student_id'  and  due_date='$due_date'  ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
?>
<script>
alert("<?php echo "$student_name has already Paid $installment Due Date is same $due_date, Please select another Installment & due Date..!!"; ?>")
window.location.assign("TutionFeeBilling")
</script>
<?php
} else {

    if(empty($discount) && empty($transport_discount) && empty($ubs_discount)){
        $discount_approval="APPROVED";
    }else{
        $discount_approval="NO"; 
    }

	 $query = "INSERT INTO `student_tution_fee`( `student_name`, `student_id`, `installment`, `billing_date`, `tution_fee`, `paying_fee`, `balance_amount`, `transport_fee`, `transport_fee_paying`, `transport_fee_balance`,`transport_discount`, `ubs_fee`, `ubs_fee_paying`, `ubs_fee_balance`, `ubs_discount`, `due_date`, `bill_no`, `login_id`, `discount`, `student_class`, `student_section`, `academic_year`, `discount_approval`) 
     VALUE ( '$student_name', '$student_id', '$installment', '$billing_date', '$tution_fee', '$paying_fee', '$balance_amount','$transport_fee','$transport_fee_paying','$transport_fee_balance','$transport_discount', '$ubs_fee', '$ubs_fee_paying', '$ubs_fee_balance', '$ubs_discount', '$due_date', '$bill_no', '$login_id','$discount','$present_class','$present_section','$academic_year','$discount_approval') ";
	$result = mysqli_query($conn, $query);

	if ($result) {
        $fee=($past_tution_fee+$paying_fee);
        $tfee=($past_transport_fee+$transport_fee_paying);
        $ufee=($past_ubs_fee+$ubs_fee_paying);
         if($installment=="INSTALMENT-1"){
            $sql="INSERT INTO `balance_fee`( `student_id`, `tution_fee_paid`, `tution_balance_fee`, `transport_fee_paid`, `transport_balance`, `ubs_fee_paid`, `ubs_balance`, `class`, `sec`, `academic_year`, `updated_date`, `installment`) VALUES
                                          ('$student_id','$fee','$balance_amount','$tfee','$transport_fee_balance','$ufee','$ubs_fee_balance','$present_class','$present_section','$academic_year','$billing_date','$installment')";
               if( mysqli_query($conn,$sql)){
                   $bal="NQ";
               }else{
                   $bal="!NQ";
               }
         }elseif($installment!="INSTALMENT-1"){
             
            $sql2="UPDATE `balance_fee` SET `tution_balance_fee`='$balance_amount',`tution_fee_paid`='$fee', `transport_fee_paid`='$tfee',`transport_balance`='$transport_fee_balance',`ubs_fee_paid`='$ufee',`ubs_balance`='$ubs_fee_balance',`class`='$present_class',`sec`='$present_section',`academic_year`='$academic_year',`updated_date`='$billing_date',`installment`='$installment' WHERE student_id='$student_id'";   
            if( mysqli_query($conn,$sql2)){
                $bal="UPD";
            }else{
                $bal="!UPD";
            } 
        }   
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
	?>
<script>
alert("<?php echo "$student_name has Paid $installment Successfully Bill No: $bill_no. If Discount is Included please wait for Approval..!! $bal"; ?>")
window.location.assign("PrintTutionBill?billno=<?php  echo my_simple_crypt( $bill_no, 'e' );?>")

</script>
<?php echo 'Success';
	} else {
		echo 'Query Failed' . mysqli_error_list($conn);
		
	}
}



}
?>
