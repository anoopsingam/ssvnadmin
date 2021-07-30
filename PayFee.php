<?php
 $student_name = $_POST['student_name'];
 $student_id = $_POST['student_id'];
 if(empty($student_id)){?>
<script>
alert("<?php echo "Please Provide Student Id to Continue the Transactions !!"; ?>")
window.location.assign("FeePayment")
</script>
 <?php }else{
      $transaction_mode = $_POST['transaction_mode'];
      if(empty($_POST['transaction_id'])){
                  $transaction_id=":: TRANSACTION ID IS NOT PROVIDED ::".uniqid();
      }else{
          $transaction_id=$_POST['transaction_id'];
      }
    if($transaction_mode=="CASH"){
        $transaction_id=uniqid();
    }

      $installment = $_POST['installment'];
 $billing_date = $_POST['billing_date'];
if(empty($_POST['tution_fee'])){
    $tution_fee = 0;
}else{
    $tution_fee = (int)trim($_POST['tution_fee']);
}
if(empty($_POST['paying_fee'])){
    $paying_fee = 0;
}else{
    $paying_fee = (int)trim($_POST['paying_fee']);
}

 $due_date = $_POST['due_date'];
 $login_id = $_POST['login_id'];

 if(empty($_POST['discount'])){
    $discount = 0;
}else{
    $discount = (int)trim($_POST['discount']);
}


 $present_class= $_POST['present_class'];
 $present_section = $_POST['present_section'];
 $academic_year = $_POST['academic_year'];

 if(empty($_POST['balance_amount'])){
    $balance_amount = 0;
}else{
    $balance_amount = (int)trim($_POST['balance_amount']);
}


if(empty($_POST['transport_fee'])){
    $transport_fee = 0;
}else{
    $transport_fee = (int)trim($_POST['transport_fee']);
}
 

if(empty($_POST['transport_fee_paying'])){
    $transport_fee_paying = 0;
}else{
    $transport_fee_paying = (int)trim($_POST['transport_fee_paying']);
}

if(empty($_POST['transport_discount'])){
    $transport_discount = 0;
}else{
    $transport_discount = (int)trim($_POST['transport_discount']);
}
 
if(empty($_POST['transport_fee_balance'])){
    $transport_fee_balance = 0;
}else{
    $transport_fee_balance = (int)trim($_POST['transport_fee_balance']);
}
 
if(empty($_POST['ubs_fee'])){
    $ubs_fee = 0;
}else{
    $ubs_fee = (int)trim($_POST['ubs_fee']);
}

if(empty($_POST['ubs_fee_paying'])){
    $ubs_fee_paying = 0;
}else{
    $ubs_fee_paying = (int)trim($_POST['ubs_fee_paying']);
}

if(empty($_POST['ubs_discount'])){
    $ubs_discount = 0;
}else{
    $ubs_discount = (int)trim($_POST['ubs_discount']);
}

if(empty($_POST['ubs_fee_balance'])){
    $ubs_fee_balance = 0;
}else{
    $ubs_fee_balance = (int)trim($_POST['ubs_fee_balance']);
}


    $past_tution =  (int)trim($_POST['past_tution'])+$paying_fee;



    $past_ubs =  (int)trim($_POST['past_ubs'])+$ubs_fee_paying;



    $past_transport =  (int)trim($_POST['past_transport'])+$transport_fee_paying;


    $tution_dis =  (int)trim($_POST['tution_dis'])+$discount;


    $ubs_dis =  (int)trim($_POST['ubs_dis'])+$ubs_discount;

    $transport_dis =  (int)trim($_POST['transport_dis'])+$transport_discount;
$student_mail=$_POST['student_mail'];

if($balance_amount=="0"){
    $tution="Cleared";
}else{
    $tution="0";

}

if($transport_fee_balance=="0"){
    $transport="Cleared";
}else{
    $transport="0";
}
if($ubs_fee_balance=="0"){
    $ubs="Cleared";
}else{
    $ubs="0";
}
include'database.php';


// START PREFIX
$query = mysqli_query($conn,"SELECT bill_no FROM `student_tution_fee` ORDER BY id DESC LIMIT 1"); 
// GET THE LAST ID MAKE SURE IN TABLE YOU 9991

while ($row = mysqli_fetch_object($query)) {
  $lastId =  $row->bill_no;
}

list($prefix,$Id) = explode('BILL',$lastId );
$Id = ($Id+1);
$bill_no = 'BILL'.$Id;
// END PREFIX
//==================================================


    //INSERT
    if(empty($paying_fee) && empty($transport_fee_paying) && empty($ubs_fee_paying)){
        ?>
        <script>
        alert("<?php echo "$student_name Fee is Completely Cleared!!"; ?>")
        window.location.assign("FeePayment")
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
window.location.assign("FeePayment")
</script>
<?php
        } else {
            if (empty($discount) && empty($transport_discount) && empty($ubs_discount) || $login_id=="principal" || $login_id=="administrator") {
                $discount_approval="APPROVED";
            } else {
                $discount_approval="NO";
            }
            $query = "INSERT INTO `student_tution_fee`( `student_name`, `student_id`, `installment`, `billing_date`, `tution_fee`, `paying_fee`, `balance_amount`, `transport_fee`, `transport_fee_paying`, `transport_fee_balance`,`transport_discount`, `ubs_fee`, `ubs_fee_paying`, `ubs_fee_balance`, `ubs_discount`, `due_date`, `bill_no`, `login_id`, `discount`, `student_class`, `student_section`, `academic_year`, `discount_approval`, `student_mail`,`transaction_mode`,`transaction_id`) 
    VALUE ( '$student_name', '$student_id', '$installment', '$billing_date', '$tution_fee', '$paying_fee', '$balance_amount','$transport_fee','$transport_fee_paying','$transport_fee_balance','$transport_discount', '$ubs_fee', '$ubs_fee_paying', '$ubs_fee_balance', '$ubs_discount', '$due_date', '$bill_no', '$login_id','$discount','$present_class','$present_section','$academic_year','$discount_approval','$student_mail','$transaction_mode','$transaction_id') ";
            $result = mysqli_query($conn, $query);
        }
        if ($result) {
            if ($installment=="INSTALLMENT-1") {
                  $sql="INSERT INTO `balance_fee`( `student_id`, `tution_fee_paid`, `tution_balance_fee`, `tution_fee_discount`, `transport_fee_paid`, `transport_balance`, `transport_fee_discount`, `ubs_fee_paid`, `ubs_balance`, `ubs_fee_discount`, `class`, `sec`, `academic_year`, `updated_date`, `installment`, `tution`, `ubs`, `transport`) VALUES
                                            ('$student_id','$past_tution','$balance_amount','$tution_dis','$past_transport','$transport_fee_balance','$transport_dis','$past_ubs','$ubs_fee_balance','$ubs_dis','$present_class','$present_section','$academic_year','$billing_date','$installment', '$tution', '$ubs', '$transport')";
                if (mysqli_query($conn, $sql)) {
                      $state="New Balance Sheet";
                } else {
                     $state="New Balance Sheet Failed";
                }
            } elseif ($installment!="INSTALLMENT-1") {
                 $sql2="UPDATE `balance_fee` SET `tution_balance_fee`='$balance_amount',`tution_fee_paid`='$past_tution', `tution_fee_discount`='$tution_dis',`transport_fee_paid`='$past_transport',`transport_balance`='$transport_fee_balance',`transport_fee_discount`='$transport_dis',`ubs_fee_paid`='$past_ubs',`ubs_balance`='$ubs_fee_balance',`ubs_fee_discount`='$ubs_dis',`class`='$present_class',`sec`='$present_section',`academic_year`='$academic_year',`updated_date`='$billing_date',`installment`='$installment', `tution`='$tution', `ubs`='$ubs', `transport`='$transport' WHERE student_id='$student_id'";
                if (mysqli_query($conn, $sql2)) {
                     $state="Updated Balance Sheet";
                } else {
                     $state="Failed Balance Sheet".mysqli_error($conn);
                }
            }
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
                } elseif ($action == 'd') {
                    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }
          
                return $output;
            } 
            
            $msg=array($student_name,$student_id,$present_class,$present_section,$bill_no,$billing_date,$paying_fee,$balance_amount,$ubs_fee_paying,$ubs_fee_balance,$transport_fee_paying,$transport_fee_balance,$installment,$due_date,$login_id,$transaction_mode,$transaction_id,$discount,$transport_discount);

            ?>
            
            <script>
                    alert("<?php echo " $student_name has Paid $installment Successfully Bill No: $bill_no. If Discount is Included please wait for Approval..!! $state"; ?>");
                    </script>
            <?php  if($student_mail=="**"){ ?>
                <script>
                                    window.location.assign("<?php echo" PrintTutionBill?billno=".my_simple_crypt($bill_no, 'e')?>");

                </script>

          <?php  }else{
                echo"<center style='padding-top:150px;' ><h3>Mail is being sent to $student_mail please wait ......</h3></center>";
                sleep(2);
                ?>
                
            <script>

                    window.location.assign("Mail?mail=<?php echo"$student_mail"; ?>&mail_type=Payment&mode=fee_bill&<?php echo http_build_query($msg); ?> ");
                
            </script>
        <?php
            } } else {
            echo "cant able to do transaction !!!!".mysqli_error($conn);
        }
    }
 }
?>
