
<?php

$student_name = $_POST['student_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$studentemail = $_POST['studentemail'];
$studentid = $_POST['studentid'];
$father_name = $_POST['father_name'];
$fatheremail = $_POST['fatheremail'];
$fathereducation = $_POST['fathereducation'];
$total_family = $_POST['total_family'];
$fatheroccupation = $_POST['fatheroccupation'];
$father_number = $_POST['father_number'];
$father_income = $_POST['father_income'];
$mother_name = $_POST['mother_name'];
$mothereducation = $_POST['mothereducation'];
$motheroccupation = $_POST['motheroccupation'];
$mother_income = $_POST['mother_income'];
$mother_number = $_POST['mother_number'];
$motheremail = $_POST['motheremail'];
$guardian_name = $_POST['guardian_name'];
$guardian_mobile = $_POST['guardian_mobile'];
$guardianeducation = $_POST['guardianeducation'];
$guardian_income = $_POST['guardian_income'];
$guardianemail = $_POST['guardianemail'];
$guardian_relation = $_POST['guardian_relation'];
$guardianoccupation = $_POST['guardianoccupation'];
$permanentaddress = $_POST['permanentaddress'];
$temporaryaddress = $_POST['temporaryaddress'];
$guardianaddress = $_POST['guardianaddress'];
$nationality = $_POST['nationality'];
$religion = $_POST['religion'];
$caste = $_POST['caste'];
$subcaste = $_POST['subcaste'];
$birthplace = $_POST['birthplace'];
$taluk = $_POST['taluk'];
$district = $_POST['district'];
$village = $_POST['village'];
$mothertongue = $_POST['mothertongue'];
$previousclass = $_POST['previousclass'];
$previousschool = $_POST['previousschool'];
$previousschool_address = $_POST['previousschool_address'];
$admissionclass = $_POST['admissionclass'];
$medium_c = $_POST['medium_c'];
$Studentbank = $_POST['Studentbank'];
$acc_no = $_POST['acc_no'];
$bankaddress = $_POST['bankaddress'];
$ifsc = $_POST['ifsc'];
$studentaadhar = $_POST['studentaadhar'];
$fatheraadhar = $_POST['fatheraadhar'];
$motheraadhar = $_POST['motheraadhar'];
$studentcastenumber = $_POST['studentcastenumber'];
$studentincomenumber = $_POST['studentincomenumber'];
$rationcard = $_POST['rationcard'];
$fathercastenumber = $_POST['fathercastenumber'];
$Fatherincomenumber = $_POST['Fatherincomenumber'];
$mothercastenumber = $_POST['mothercastenumber'];
$motherincomenumber = $_POST['motherincomenumber'];
$birthcertificate = $_POST['birthcertificate'];
$datess = $_POST['datess'];
$enrollment = $_POST['enrollment'];
$status = $_POST['status'];
$adm_cat = $_POST['adm_cat'];
$spons = $_POST['spons'];
$spons_number = $_POST['spons_number'];
$spons_address = $_POST['spons_address'];
$enroll_time = $_POST['enroll_time'];
$approval_time = $_POST['approval_time'];
$admission_no = $_POST['admission_no'];
$present_class = $_POST['present_class'];
$present_section = $_POST['present_section'];
//UPDATE 
include'database.php';
 $query = " UPDATE student_enrollment SET  student_name = '$student_name',  gender = '$gender',  dob = '$dob',  studentemail = '$studentemail',  studentid = '$studentid',  father_name = '$father_name',  fatheremail = '$fatheremail',  fathereducation = '$fathereducation',  total_family = '$total_family',  fatheroccupation = '$fatheroccupation',  father_number = '$father_number',  father_income = '$father_income',  mother_name = '$mother_name',  mothereducation = '$mothereducation',  motheroccupation = '$motheroccupation',  mother_income = '$mother_income',  mother_number = '$mother_number',  motheremail = '$motheremail',  guardian_name = '$guardian_name',  guardian_mobile = '$guardian_mobile',  guardianeducation = '$guardianeducation',  guardian_income = '$guardian_income',  guardianemail = '$guardianemail',  guardian_relation = '$guardian_relation',  guardianoccupation = '$guardianoccupation',  permanentaddress = '$permanentaddress',  temporaryaddress = '$temporaryaddress',  guardianaddress = '$guardianaddress',  nationality = '$nationality',  religion = '$religion',  caste = '$caste',  subcaste = '$subcaste',  birthplace = '$birthplace',  taluk = '$taluk',  district = '$district',  village = '$village',  mothertongue = '$mothertongue',  previousclass = '$previousclass',  previousschool = '$previousschool',  previousschool_address = '$previousschool_address',  admissionclass = '$admissionclass',  medium_c = '$medium_c',  Studentbank = '$Studentbank',  acc_no = '$acc_no',  bankaddress = '$bankaddress',  ifsc = '$ifsc',  studentaadhar = '$studentaadhar',  fatheraadhar = '$fatheraadhar',  motheraadhar = '$motheraadhar',  studentcastenumber = '$studentcastenumber',  studentincomenumber = '$studentincomenumber',  rationcard = '$rationcard',  fathercastenumber = '$fathercastenumber',  Fatherincomenumber = '$Fatherincomenumber',  mothercastenumber = '$mothercastenumber',  motherincomenumber = '$motherincomenumber',  birthcertificate = '$birthcertificate',  datess = '$datess',  enrollment = '$enrollment',  status = '$status',  adm_cat = '$adm_cat',  spons = '$spons',  spons_number = '$spons_number',  spons_address = '$spons_address',  enroll_time = '$enroll_time',  approval_time = '$approval_time', admission_no = '$admission_no',  present_class = '$present_class',  present_section = '$present_section' WHERE studentid = '$studentid' ";
$result = mysqli_query($conn, $query);

if ($result) {

    //alert a success message and redirect back to the student list
    echo "<script>alert('Record updated successfully of $student_name');</script>";
    sleep(1);
    echo "<script>window.location.href='EditEnrollment';</script>";

} else {

        //alert an error message and redirect back to the student list
        echo "<script>alert('Error updating record, Contact Technical Team !');</script>";
        sleep(1);
        echo "<script>window.location.href='EditEnrollment';</script>";

}

?>