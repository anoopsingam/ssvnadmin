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

<title><?php echo $kyt_details['name']?></title>
        <center><h6>Status :-<?php echo $kyt_details['status']; ?></h6></center>

  <div class="row">
  <div class="col-lg-6">        <label for="">Name</label><br><input readonly value="<?php echo $kyt_details['name']; ?>" type="text" class="form-control"   name="name" id=""> <br>
</div>
  <div class="col-lg-6">        <label for="">Gender</label><input readonly value="<?php echo $kyt_details['gender']; ?>" type="text" class="form-control"   name="name" id=""> <br>
</div>
  </div>

  <div class="row">
  <div class="col-lg-6"><label for="">Date Of Birth</label><input readonly value="<?php echo $kyt_details['date_of_birth']; ?>" type="date" class="form-control"  name="date_of_birth" id=""> <br></div>
  <div class="col-lg-6"> <label for="">Phone Number</label><input readonly value="<?php echo $kyt_details['phone_no']; ?>" type="text" class="form-control"  name="phone_no" id=""> <br></div>
  </div><div class="row">
  <div class="col-lg-6"><label for="">Email</label><input readonly value="<?php echo $kyt_details['email']; ?>" type="text" class="form-control"  name="email" id=""> <br></div>
  <div class="col-lg-6">
  <label for="">Date Of Joining</label><input readonly value="<?php echo $kyt_details['date_of_joining']; ?>" type="text" class="form-control"  name="date_of_joining" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Education Qualification</label><input readonly value="<?php echo $kyt_details['education_qualification']; ?>" type="text" class="form-control"  name="education_qualification" id=""> <br>

  </div>
  <div class="col-lg-6">
 
  <label for="">Ration Card</label><input readonly value="<?php echo $kyt_details['ration_card']; ?>" type="text" class="form-control"  name="ration_card" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Father Name</label><input readonly value="<?php echo $kyt_details['father_name']; ?>" type="text" class="form-control"  name="father_name" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Mother Name</label><input readonly value="<?php echo $kyt_details['mother_name']; ?>" type="text" class="form-control"  name="mother_name" id=""> <br>
  
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Marital Status</label><input readonly value="<?php echo $kyt_details['marital_status']; ?>" type="text" class="form-control"  name="marital_status" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Name Of Spouse</label><input readonly value="<?php echo $kyt_details['name_of_spouse']; ?>" type="text" class="form-control"  name="name_of_spouse" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Number of Kids</label><input readonly value="<?php echo $kyt_details['no_of_kids']; ?>" type="text" class="form-control"  name="no_of_kids" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Aadhar number</label><br><input readonly value="<?php echo $kyt_details['aadhar_no']; ?>" type="text" class="form-control"  name="aadhar_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Voter Number</label><br><input readonly value="<?php echo $kyt_details['voter_id']; ?>" type="text" class="form-control"  name="voter_id" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Pan Card</label><input readonly value="<?php echo $kyt_details['pan_card']; ?>" type="text" class="form-control"  name="pan_card" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Present Address</label><input readonly value="<?php echo $kyt_details['present_address']; ?>" type="text" class="form-control"  name="present_address" id=""> <br>

  </div>
  <div class="col-lg-6">
  <label for="">Permanent Address</label><input readonly value="<?php echo $kyt_details['permanent_address']; ?>" type="text" class="form-control"  name="permanent_address" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Passport</label><input readonly value="<?php echo $kyt_details['passport']; ?>" type="text" class="form-control"  name="passport" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank Account Number</label><input readonly value="<?php echo $kyt_details['bank_account_no']; ?>" type="text" class="form-control"  name="bank_account_no" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Bank Branch</label><input readonly value="<?php echo $kyt_details['bank_branch']; ?>" type="text" class="form-control"  name="bank_branch" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank IFSC</label><input readonly value="<?php echo $kyt_details['bank_ifsc']; ?>" type="text" class="form-control"  name="bank_ifsc" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Original Certificate</label><input readonly value="<?php echo $kyt_details['original_certificate']; ?>" type="text" class="form-control"  name="original_certificate" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">PF Enrollment Number</label><input readonly value="<?php echo $kyt_details['pf_enrolment_no']; ?>" type="text" class="form-control"  name="pf_enrolment_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">ESI Enrollment Number</label><input readonly value="<?php echo $kyt_details['esi_enrolment_no']; ?>" type="text" class="form-control"  name="esi_enrolment_no" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Documents</label> <br> <a href="#" onclick="window.open('<?php  echo $kyt_details['link_documents'];?>','popup','width=750,height=750'); return false;" title=" Click To View Documnets <?php echo $kyt_details['link_documents']; ?>" ><?php echo "Click here to View ".$kyt_details['name']." Uploaded Documents"; ?></a> <br>
  </div>
  </div>

<?php include'footer.php';?>
