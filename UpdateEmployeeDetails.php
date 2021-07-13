<?php include'header.php';

//decrypt the key from url
$key = $_GET["key"];

//check key is empty or not 
if (empty($key)) {
    //alert No Key found in java script
    echo "<script>alert('No Key Found & Un-Authorized Access')</script>";
    // redirect to index using java script
    echo "<script>window.location.href='index'</script>";
}
$dcry = my_simple_crypt($key, 'd');

//fetch all details from kyt where unique_key =$dcry
$kyt = mysqli_query($conn, "SELECT * FROM kyt WHERE unique_key='$dcry'");
//fetch all details from kyt 
$kyt_details = mysqli_fetch_assoc($kyt);



?>

<title>Update <?php echo $kyt_details['name']?> Details</title>
<form action="" method="post">

  <div class="row">
  <div class="col-lg-6">        <label for="">Name</label><br><input  value="<?php echo $kyt_details['name']; ?>" type="text" class="form-control"   name="name" id=""> <br>
</div>
  <div class="col-lg-6">        <label for="">Gender</label><select name="gender" id="" class="form-control">
      
  <option value="<?php echo $kyt_details['gender'];?>" selected class="bg-primary text-white"><?php echo $kyt_details['gender'];?></option>
  <option value="male">Male</option><option value="Female">Female</option></select> <br>
</div>
  </div>

  <div class="row">
  <div class="col-lg-6"><label for="">Date Of Birth</label><input  value="<?php echo $kyt_details['date_of_birth']; ?>" type="date" class="form-control"  name="date_of_birth" id=""> <br></div>
  <div class="col-lg-6"> <label for="">Phone Number</label><input  value="<?php echo $kyt_details['phone_no']; ?>" type="text" class="form-control"  name="phone_no" id=""> <br></div>
  </div><div class="row">
  <div class="col-lg-6"><label for="">Email</label><input  value="<?php echo $kyt_details['email']; ?>" type="text" class="form-control"  name="email" id=""> <br></div>
  <div class="col-lg-6">
  <label for="">Date Of Joining</label><input  value="<?php echo $kyt_details['date_of_joining']; ?>" type="text" class="form-control"  name="date_of_joining" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Education Qualification</label><input  value="<?php echo $kyt_details['education_qualification']; ?>" type="text" class="form-control"  name="education_qualification" id=""> <br>

  </div>
  <div class="col-lg-6">
 
  <label for="">Ration Card</label><input  value="<?php echo $kyt_details['ration_card']; ?>" type="text" class="form-control"  name="ration_card" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Father Name</label><input  value="<?php echo $kyt_details['father_name']; ?>" type="text" class="form-control"  name="father_name" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Mother Name</label><input  value="<?php echo $kyt_details['mother_name']; ?>" type="text" class="form-control"  name="mother_name" id=""> <br>
  
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Marital Status</label><input  value="<?php echo $kyt_details['marital_status']; ?>" type="text" class="form-control"  name="marital_status" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Name Of Spouse</label><input  value="<?php echo $kyt_details['name_of_spouse']; ?>" type="text" class="form-control"  name="name_of_spouse" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Number of Kids</label><input  value="<?php echo $kyt_details['no_of_kids']; ?>" type="text" class="form-control"  name="no_of_kids" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Aadhar number</label><br><input  value="<?php echo $kyt_details['aadhar_no']; ?>" type="text" class="form-control"  name="aadhar_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Voter Number</label><br><input  value="<?php echo $kyt_details['voter_id']; ?>" type="text" class="form-control"  name="voter_id" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Pan Card</label><input  value="<?php echo $kyt_details['pan_card']; ?>" type="text" class="form-control"  name="pan_card" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Present Address</label><input  value="<?php echo $kyt_details['present_address']; ?>" type="text" class="form-control"  name="present_address" id=""> <br>

  </div>
  <div class="col-lg-6">
  <label for="">Permanent Address</label><input  value="<?php echo $kyt_details['permanent_address']; ?>" type="text" class="form-control"  name="permanent_address" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Passport</label><input  value="<?php echo $kyt_details['passport']; ?>" type="text" class="form-control"  name="passport" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank Account Number</label><input  value="<?php echo $kyt_details['bank_account_no']; ?>" type="text" class="form-control"  name="bank_account_no" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Bank Branch</label><input  value="<?php echo $kyt_details['bank_branch']; ?>" type="text" class="form-control"  name="bank_branch" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank IFSC</label><input  value="<?php echo $kyt_details['bank_ifsc']; ?>" type="text" class="form-control"  name="bank_ifsc" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Original Certificate</label><input  value="<?php echo $kyt_details['original_certificate']; ?>" type="text" class="form-control"  name="original_certificate" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">PF Enrollment Number</label><input  value="<?php echo $kyt_details['pf_enrolment_no']; ?>" type="text" class="form-control"  name="pf_enrolment_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">ESI Enrollment Number</label><input  value="<?php echo $kyt_details['esi_enrolment_no']; ?>" type="text" class="form-control"  name="esi_enrolment_no" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Documents</label> <br> <a href="#" onclick="window.open('<?php  echo $kyt_details['link_documents'];?>','popup','width=750,height=750'); return false;" title=" Click To View Documnets <?php echo $kyt_details['link_documents']; ?>" ><?php echo "Click here to View ".$kyt_details['name']." Uploaded Documents"; ?></a>
  <input type="text" name="unique_key" hidden value="<?php echo $kyt_details['unique_key']; ?>">
  <strong class="text-danger"><br>Please Note: Once Documents Uploaded cant be Edited </strong>
  <br>
  </div>    
  </div>
  <?php if($username =="administrator"){ ?>
  <div class="row">
      <div class="col-lg-6">

      <label for="">Status :</label> <select class="form-control" name="status" id="">
      <option value="<?php echo $kyt_details['status'];?>" selected class="bg-primary text-white"><?php echo $kyt_details['status'];?></option>

          <option value="ACTIVE">ACTIVE</option>
          <option value="INACTIVE">INACTIVE</option>
          <option value="REMOVED">REMOVED</option>
      </select>
      </div>
  </div>
  <?php }?>
  <br><br>
  <center><button class="btn btn-danger" name="update_key">Update Details</button></center>
  </form>
<?php 
//if updatekey button is clicked
if (isset($_POST['update_key'])) {
    //check if unique_key is empty
    if (empty($_POST['unique_key'])) {
        echo "NO Unique Key Found";
    } else {
        //update details
        
$name=$_POST['name'];
$aadhar_no=$_POST['aadhar_no'];
$voter_id=$_POST['voter_id'];
$pan_card=$_POST['pan_card'];
$ration_card=$_POST['ration_card'];
$passport=$_POST['passport'];
$father_name=$_POST['father_name'];
$mother_name=$_POST['mother_name'];
$date_of_birth=$_POST['date_of_birth'];
$date_of_joining=$_POST['date_of_joining'];
$education_qualification=$_POST['education_qualification'];
$marital_status=$_POST['marital_status'];
$name_of_spouse=$_POST['name_of_spouse'];
$no_of_kids=$_POST['no_of_kids'];
$gender=$_POST['gender'];
$phone_no=$_POST['phone_no'];
$email=$_POST['email'];
$bank_account_no=$_POST['bank_account_no'];
$bank_branch=$_POST['bank_branch'];
$bank_ifsc=$_POST['bank_ifsc'];
$original_certificate=$_POST['original_certificate'];
$present_address=$_POST['present_address'];
$permanent_address=$_POST['permanent_address'];
$pf_enrolment_no=$_POST['pf_enrolment_no'];
$esi_enrolment_no=$_POST['esi_enrolment_no'];
$unique_key=$_POST['unique_key'];
$status=$_POST['status'];
// present time of asia/kolkata     
$time_zone = date_default_timezone_get("Asia/Kolkata");
$time = date('Y-m-d H:i:s');
            /* UPDATE `kyt` SET `unique_key`=[value-1],`id`=[value-2],`name`=[value-3],`aadhar_no`=[value-4],`voter_id`=[value-5],`pan_card`=[value-6],`ration_card`=[value-7],`passport`=[value-8],`father_name`=[value-9],`mother_name`=[value-10],`date_of_birth`=[value-11],`date_of_joining`=[value-12],`education_qualification`=[value-13],`marital_status`=[value-14],`name_of_spouse`=[value-15],`no_of_kids`=[value-16],`gender`=[value-17],`phone_no`=[value-18],`email`=[value-19],`bank_account_no`=[value-20],`bank_branch`=[value-21],`bank_ifsc`=[value-22],`original_certificate`=[value-23],`present_address`=[value-24],`permanent_address`=[value-25],`pf_enrolment_no`=[value-26],`esi_enrolment_no`=[value-27],`status`=[value-28],`link_documents`=[value-29],`upload_time`=[value-30],`login_id`=[value-31],`approved_time`=[value-32],`approved_by`=[value-33] WHERE 
            */
// if status == active update the approved_time 
if ($status=="ACTIVE") {
    $query = "UPDATE `kyt` SET `name`='$name',`aadhar_no`='$aadhar_no',`voter_id`='$voter_id',`pan_card`='$pan_card',`ration_card`='$ration_card',`passport`='$passport',`father_name`='$father_name',`mother_name`='$mother_name',`date_of_birth`='$date_of_birth',`date_of_joining`='$date_of_joining',`education_qualification`='$education_qualification',`marital_status`='$marital_status',`name_of_spouse`='$name_of_spouse',`no_of_kids`='$no_of_kids',`gender`='$gender',`phone_no`='$phone_no',`email`='$email',`bank_account_no`='$bank_account_no',`bank_branch`='$bank_branch',`bank_ifsc`='$bank_ifsc',`original_certificate`='$original_certificate',`present_address`='$present_address',`permanent_address`='$permanent_address',`pf_enrolment_no`='$pf_enrolment_no',`esi_enrolment_no`='$esi_enrolment_no', status='$status', approved_time='$time' WHERE unique_key='$unique_key'";
}else{


            //update query
    $query = "UPDATE `kyt` SET `name`='$name',`aadhar_no`='$aadhar_no',`voter_id`='$voter_id',`pan_card`='$pan_card',`ration_card`='$ration_card',`passport`='$passport',`father_name`='$father_name',`mother_name`='$mother_name',`date_of_birth`='$date_of_birth',`date_of_joining`='$date_of_joining',`education_qualification`='$education_qualification',`marital_status`='$marital_status',`name_of_spouse`='$name_of_spouse',`no_of_kids`='$no_of_kids',`gender`='$gender',`phone_no`='$phone_no',`email`='$email',`bank_account_no`='$bank_account_no',`bank_branch`='$bank_branch',`bank_ifsc`='$bank_ifsc',`original_certificate`='$original_certificate',`present_address`='$present_address',`permanent_address`='$permanent_address',`pf_enrolment_no`='$pf_enrolment_no',`esi_enrolment_no`='$esi_enrolment_no', status='$status' WHERE unique_key='$unique_key'";
}
            //execute query
            $result = mysqli_query($conn, $query);
            //check if query executed properly
            if ($result) {
                // alert $name Details updated succesfully in java script 
                echo "<script>alert('$name Details Updated Successfully');</script>";
                //redirect to kyt list page                 
                }else{
                    // alert $name Details failed to update in java script
                    echo "<script>alert('$name Details Failed to Update');</script>";
                }
                }
}

?>


<?php include'footer.php';?>
