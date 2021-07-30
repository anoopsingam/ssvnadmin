<?php 
include'header.php';
$id=$_GET["enr"];
$query="select * from student_enrollment where studentid='$id'";
//execute query
$result=mysqli_query($conn,$query);
//check if any rows are returned
if (mysqli_num_rows($result)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
?>
<title><?php echo $row['studentid']; ?> | Edit | <?php echo $theader;?> </title>
<form id="form1" name="form1" method="post" action="UploadEditApplication">
<div class="row">
                <div class="col-sm"><label for="student_name">Student Name</label><input class="form-control" value="<?php echo $row['student_name']; ?>" type="text" name="student_name" id="student_name" /></div>
                <div class="col-sm"><label for="gender">Gender</label>
                <select name="gender" id="" class="form-control">
                <option value="<?php echo $row['gender']?>" selected><?php echo $row['gender']?></option>

                <option value="BOY">BOY</option>
                <option value="GIRL">GIRL</option>
                </select>
                
            </div>
                <div class="col-sm"><label for="dob">Dob</label><input class="form-control" value="<?php echo $row['dob']; ?>" type="date" name="dob" id="dob" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="studentemail">Studentemail</label><input class="form-control" value="<?php echo $row['studentemail']; ?>" type="text" name="studentemail" id="studentemail" /></div>
                <div class="col-sm"><label for="studentid">Studentid</label><input class="form-control" readonly value="<?php echo $row['studentid']; ?>" type="text" name="studentid" id="studentid" /></div>
                <div class="col-sm"><label for="father_name">Father Name</label><input class="form-control" value="<?php echo $row['father_name']; ?>" type="text" name="father_name" id="father_name" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="fatheremail">Fatheremail</label><input class="form-control" value="<?php echo $row['fatheremail']; ?>" type="text" name="fatheremail" id="fatheremail" /></div>
                <div class="col-sm"><label for="fathereducation">Fathereducation</label><input class="form-control" value="<?php echo $row['fathereducation']; ?>" type="text" name="fathereducation" id="fathereducation" /></div>
                <div class="col-sm"><label for="total_family">Total Family</label><input class="form-control" value="<?php echo $row['total_family']; ?>" type="text" name="total_family" id="total_family" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="fatheroccupation">Fatheroccupation</label><input class="form-control" value="<?php echo $row['fatheroccupation']; ?>" type="text" name="fatheroccupation" id="fatheroccupation" /></div>
                <div class="col-sm"><label for="father_number">Father Mobile  Number</label><input class="form-control" value="<?php echo $row['father_number']; ?>" type="text" name="father_number" id="father_number" />
<br class="clear" /> </div>
                <div class="col-sm"><label for="father_income">Father Income</label><input class="form-control" value="<?php echo $row['father_income']; ?>" type="text" name="father_income" id="father_income" /></div>
            </div>
              <div class="row">
                <div class="col-sm"><label for="mother_name">Mother Name</label><input class="form-control" value="<?php echo $row['mother_name']; ?>" type="text" name="mother_name" id="mother_name" /></div>
                <div class="col-sm"><label for="mothereducation">Mothereducation</label><input class="form-control" value="<?php echo $row['mothereducation']; ?>" type="text" name="mothereducation" id="mothereducation" /></div>
                <div class="col-sm"><label for="motheroccupation">Motheroccupation</label><input class="form-control" value="<?php echo $row['motheroccupation']; ?>" type="text" name="motheroccupation" id="motheroccupation" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="mother_income">Mother Income</label><input class="form-control" value="<?php echo $row['mother_income']; ?>" type="text" name="mother_income" id="mother_income" />
<br class="clear" /> </div>
                <div class="col-sm">
<label for="mother_number">Mother Number</label><input class="form-control" value="<?php echo $row['mother_number']; ?>" type="text" name="mother_number" id="mother_number" /></div>
                <div class="col-sm"><label for="motheremail">Motheremail</label><input class="form-control" value="<?php echo $row['mother_number']; ?>" type="text" name="motheremail" id="motheremail" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="guardian_name">Guardian Name</label><input class="form-control" value="<?php echo $row['guardian_name']; ?>" type="text" name="guardian_name" id="guardian_name" /></div>
                <div class="col-sm"><label for="guardian_mobile">Guardian Mobile</label><input class="form-control" value="<?php echo $row['guardian_mobile']; ?>" type="text" name="guardian_mobile" id="guardian_mobile" /></div>
                <div class="col-sm"><label for="guardianeducation">Guardianeducation</label><input class="form-control" value="<?php echo $row['guardianeducation']; ?>" type="text" name="guardianeducation" id="guardianeducation" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="guardian_income">Guardian Income</label><input class="form-control" value="<?php echo $row['guardian_income']; ?>" type="text" name="guardian_income" id="guardian_income" /></div>
                <div class="col-sm"><label for="guardianemail">Guardianemail</label><input class="form-control" value="<?php echo $row['guardianemail']; ?>" type="text" name="guardianemail" id="guardianemail" /></div>
                <div class="col-sm"><label for="guardian_relation">Guardian Relation</label><input class="form-control" value="<?php echo $row['guardian_relation']; ?>" type="text" name="guardian_relation" id="guardian_relation" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="guardianoccupation">Guardianoccupation</label><input class="form-control" value="<?php echo $row['guardianoccupation']; ?>" type="text" name="guardianoccupation" id="guardianoccupation" /></div>
                <div class="col-sm"><label for="permanentaddress">Permanentaddress</label><textarea class="form-control"  type="text" name="permanentaddress" id="permanentaddress" /><?php echo $row['permanentaddress']; ?> </textarea></div>
                <div class="col-sm"><label for="temporaryaddress">Temporaryaddress</label><textarea class="form-control" value="" type="text" name="temporaryaddress" id="temporaryaddress" /><?php echo $row['temporaryaddress']; ?></textarea></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="guardianaddress">Guardianaddress</label><textarea class="form-control" value="<?php echo $row['']; ?>" type="text" name="guardianaddress" id="guardianaddress" /><?php echo $row['guardianaddress']; ?> </textarea></div>
                <div class="col-sm"><label for="nationality">Nationality</label><input class="form-control" value="<?php echo $row['nationality']; ?>" type="text" name="nationality" id="nationality" /></div>
                <div class="col-sm"><label for="religion">Religion</label><input class="form-control" value="<?php echo $row['religion']; ?>" type="text" name="religion" id="religion" /></div>
            </div>  <div class="row">
                <div class="col-sm"><label for="caste">Caste</label><input class="form-control" value="<?php echo $row['caste']; ?>" type="text" name="caste" id="caste" /></div>
                <div class="col-sm"><label for="subcaste">Subcaste</label><input class="form-control" value="<?php echo $row['subcaste']; ?>" type="text" name="subcaste" id="subcaste" /></div>
                <div class="col-sm"><label for="birthplace">Birthplace</label><input class="form-control" value="<?php echo $row['birthplace']; ?>" type="text" name="birthplace" id="birthplace" /></div>
            </div>  <div class="row">
                <div class="col-sm"><label for="taluk">Taluk</label><input class="form-control" value="<?php echo $row['taluk']; ?>" type="text" name="taluk" id="taluk" /></div>
                <div class="col-sm"><label for="district">District</label><input class="form-control" value="<?php echo $row['district']; ?>" type="text" name="district" id="district" /></div>
                <div class="col-sm"><label for="village">Village</label><input class="form-control" value="<?php echo $row['village']; ?>" type="text" name="village" id="village" /></div>
            </div>  <div class="row">
                <div class="col-sm"><label for="mothertongue">Mothertongue</label><input class="form-control" value="<?php echo $row['mothertongue']; ?>" type="text" name="mothertongue" id="mothertongue" /></div>
                <div class="col-sm"><label for="previousclass">Previousclass</label><input class="form-control" value="<?php echo $row['previousclass']; ?>" type="text" name="previousclass" id="previousclass" /></div>
                <div class="col-sm"><label for="previousschool">Previousschool</label><input class="form-control" value="<?php echo $row['previousschool']; ?>" type="text" name="previousschool" id="previousschool" />
<br class="clear" /> </div>
            </div>  
            <div class="row">
                <div class="col-sm"><label for="previousschool_address">Previousschool Address</label><input class="form-control" value="<?php echo $row['previousschool_address']; ?>" type="text" name="previousschool_address" id="previousschool_address" /></div>
                <div class="col-sm"><label for="admissionclass">Admissionclass</label><input class="form-control" value="<?php echo $row['admissionclass']; ?>" type="text" name="admissionclass" id="admissionclass" /></div>
                <div class="col-sm"><label for="medium_c">Medium C</label><input class="form-control" value="<?php echo $row['medium_c']; ?>" type="text" name="medium_c" id="medium_c" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="Studentbank">Studentbank</label><input class="form-control" value="<?php echo $row['Studentbank']; ?>" type="text" name="Studentbank" id="Studentbank" />
                <br class="clear" /> 
<label for="bankaddress">Bankaddress</label><input type="text" class="form-control" value="<?php echo $row['bankaddress']?>" name="bankaddress" id="bankaddress" />
            </div>
                <div class="col-sm"><label for="acc_no">Acc No</label><input class="form-control" value="<?php echo $row['acc_no']; ?>" type="text" name="acc_no" id="acc_no" /></div>
                <div class="col-sm"><label for="ifsc">Ifsc</label><input class="form-control" value="<?php echo $row['ifsc']; ?>" type="text" name="ifsc" id="ifsc" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="studentaadhar">Studentaadhar</label><input class="form-control" value="<?php echo $row['studentaadhar']; ?>" type="text" name="studentaadhar" id="studentaadhar" /></div>
                <div class="col-sm"><label for="fatheraadhar">Fatheraadhar</label><input class="form-control" value="<?php echo $row['fatheraadhar']; ?>" type="text" name="fatheraadhar" id="fatheraadhar" /></div>
                <div class="col-sm"><label for="motheraadhar">Motheraadhar</label><input class="form-control" value="<?php echo $row['motheraadhar']; ?>" type="text" name="motheraadhar" id="motheraadhar" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="studentcastenumber">Studentcastenumber</label><input class="form-control" value="<?php echo $row['studentcastenumber']; ?>" type="text" name="studentcastenumber" id="studentcastenumber" /></div>
                <div class="col-sm"><label for="studentincomenumber">Studentincomenumber</label><input class="form-control" value="<?php echo $row['studentincomenumber']; ?>" type="text" name="studentincomenumber" id="studentincomenumber" /></div>
                <div class="col-sm"><label for="rationcard">Rationcard</label><input class="form-control" value="<?php echo $row['rationcard']; ?>" type="text" name="rationcard" id="rationcard" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="fathercastenumber">Fathercastenumber</label><input class="form-control" value="<?php echo $row['fathercastenumber']; ?>" type="text" name="fathercastenumber" id="fathercastenumber" /></div>
                <div class="col-sm"><label for="Fatherincomenumber">Fatherincomenumber</label><input class="form-control" value="<?php echo $row['Fatherincomenumber']; ?>" type="text" name="Fatherincomenumber" id="Fatherincomenumber" /></div>
                <div class="col-sm"><label for="mothercastenumber">Mothercastenumber</label><input class="form-control" value="<?php echo $row['mothercastenumber']; ?>" type="text" name="mothercastenumber" id="mothercastenumber" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="motherincomenumber">Motherincomenumber</label><input class="form-control" value="<?php echo $row['motherincomenumber']; ?>" type="text" name="motherincomenumber" id="motherincomenumber" /></div>
                <div class="col-sm"><label for="birthcertificate">Birthcertificate</label><input class="form-control" value="<?php echo $row['birthcertificate']; ?>" type="text" name="birthcertificate" id="birthcertificate" /></div>
                <div class="col-sm"><label for="datess">Admission Date</label><input class="form-control" value="<?php echo $row['datess']; ?>" type="text" name="datess" id="datess" /></div>
            </div>
         
      
     
            <div class="row">
        
                <div class="col-sm"><label for="enrollment">Enrollment</label><input readonly class="form-control" value="<?php echo $row['enrollment']; ?>" type="text" name="enrollment" id="enrollment" /></div>
                <div class="col-sm"><label for="status">Status</label>       <select name="status" class="form-control" id="">
                    <option value="<?php echo $row['status']?>" selected><?php echo $row['status']?></option>
                    <option value="WAITING"  >WAITING</option>
                        <option value="APPROVED">APPROVED</option>
                        <option value="REJECTED">REJECTED</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="adm_cat">Admission Category </label>  <select name="adm_cat" class="form-control" >
                <option value="<?php echo $row['adm_cat']?>" selected><?php echo $row['adm_cat']?></option>

                        <option value="RTE">RTE</option>
                        <option value="PAID" selected>PAID</option>
                        <option value="SPONSORED">SPONSORED</option>
                    </select></div>
                <div class="col-sm"><label for="spons">Sponsorer Name</label><input class="form-control" value="<?php echo $row['spons']; ?>" type="text" name="spons" id="spons" /></div>
                <div class="col-sm"><label for="spons_number">Sponsorer Number</label><input class="form-control" value="<?php echo $row['spons_number']; ?>" type="text" name="spons_number" id="spons_number" /></div>
            </div>
            <div class="row">
                <div class="col-sm"><label for="spons_address">Sponsorer Address</label><input class="form-control" value="<?php echo $row['spons_address']; ?>" type="text" name="spons_address" id="spons_address" /></div>
                <div class="col-sm"><label for="enroll_time">Enroll Time</label><input readonly class="form-control" value="<?php echo $row['enroll_time']; ?>" type="text" name="enroll_time" id="enroll_time" /></div>
                <div class="col-sm"><label for="approval_time">Approval Time</label><input readonly class="form-control" value="<?php echo $row['approval_time']; ?>" type="text" name="approval_time" id="approval_time" /></div>
            </div>
            <div class="row">
            <div class="col-sm"><label for="admission_no">Admission No</label><input class="form-control" value="<?php echo $row['admission_no']; ?>" type="text" name="admission_no" id="admission_no" /></div>
                <div class="col-sm">
                <label for="present_section">Present Section</label><input class="form-control" value="<?php echo $row['present_section']; ?>" type="text" name="present_section" id="present_section" />
                </div>
               
            
                <div class="col-sm"><label for="present_class">Present Class</label><input class="form-control" value="<?php echo $row['present_class']; ?>" type="text" name="present_class" id="present_class" />
            
                

            
            </div>
            </div> 
            <br><br>
          <center><button type="submit" class="btn btn-warning">Update</button></center>

</form>
           


<?php
    }
}else{
    echo"<script>alert('No record found for $id');</script>";
}
include'footer.php';
?>
