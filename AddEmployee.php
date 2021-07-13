
<?php
//open php tag and include header.php file
require('header.php');
?>
<title>Add Employee |<?php echo $theader?> </title>
<form action="UploadEmployeeToDb" method="post" enctype="multipart/form-data">


  <div class="row">
  <div class="col-lg-6">        <label for="">Name</label><br><input type="text" class="form-control"  name="name" id=""> <br>
</div>
  <div class="col-lg-6">        <label for="">Gender</label><select name="gender" id="" class="form-control"><option value="male">Male</option><option value="Female">Female</option></select> <br>
</div>
  </div>

  <div class="row">
  <div class="col-lg-6"><label for="">Date Of Birth</label><input type="date" class="form-control"  name="date_of_birth" id=""> <br></div>
  <div class="col-lg-6"> <label for="">Phone Number</label><input type="text" class="form-control"  name="phone_no" id=""> <br></div>
  </div><div class="row">
  <div class="col-lg-6"><label for="">Email</label><input type="text" class="form-control"  name="email" id=""> <br></div>
  <div class="col-lg-6">
  <label for="">Date Of Joining</label><input type="text" class="form-control"  name="date_of_joining" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Education Qualification</label><input type="text" class="form-control"  name="education_qualification" id=""> <br>

  </div>
  <div class="col-lg-6">
 
  <label for="">Ration Card</label><input type="text" class="form-control"  name="ration_card" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Father Name</label><input type="text" class="form-control"  name="father_name" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Mother Name</label><input type="text" class="form-control"  name="mother_name" id=""> <br>
  
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Marital Status</label><input type="text" class="form-control"  name="marital_status" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Name Of Spouse</label><input type="text" class="form-control"  name="name_of_spouse" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Number of Kids</label><input type="text" class="form-control"  name="no_of_kids" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Aadhar number</label><br><input type="text" class="form-control"  name="aadhar_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Voter Number</label><br><input type="text" class="form-control"  name="voter_id" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Pan Card</label><input type="text" class="form-control"  name="pan_card" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Present Address</label><input type="text" class="form-control"  name="present_address" id=""> <br>

  </div>
  <div class="col-lg-6">
  <label for="">Permanent Address</label><input type="text" class="form-control"  name="permanent_address" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Passport</label><input type="text" class="form-control"  name="passport" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank Account Number</label><input type="text" class="form-control"  name="bank_account_no" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Bank Branch</label><input type="text" class="form-control"  name="bank_branch" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank IFSC</label><input type="text" class="form-control"  name="bank_ifsc" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Original Certificate</label><input type="text" class="form-control"  name="original_certificate" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">PF Enrollment Number</label><input type="text" class="form-control"  name="pf_enrolment_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">ESI Enrollment Number</label><input type="text" class="form-control"  name="esi_enrolment_no" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Documents</label><input type="file" class="form-control  form-control-file"  name="documents" id=""> <br>
  </div>
  </div>
       <input type="text" name="login_id" hidden value="<?php echo $_SESSION['username']?>" readonly id="" class="form-control">
       <input type="text" name="target" value="ManageEmployee" hidden id="">


        <center><button class="btn btn-primary " type="submit">Add Employee</button></center>
    
    </form>

<?php 
//include footer.php file

//Bootstrap class to make things get center aligned

require('footer.php');

?>