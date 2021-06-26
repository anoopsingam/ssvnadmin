<?php

$conn=mysqli_connect('localhost','root','','sssvn');
$i=mysqli_num_rows(mysqli_query($conn,"select * from kyt"));
$id="stark".($i+1);
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
$target_file = 'uploads/'.$name.'.pdf';
$sql="insert into kyt values('$id','$name', '$aadhar_no', '$voter_id', '$pan_card', '$ration_card', '$passport', '$father_name', '$mother_name', '$date_of_birth', '$date_of_joining', '$education_qualification', '$marital_status', '$name_of_spouse', '$no_of_kids', '$gender', '$phone_no', '$email', '$bank_account_no', '$bank_branch', '$bank_ifsc', '$original_certificate', '$present_address', '$permanent_address', '$pf_enrolment_no', '$esi_enrolment_no','not_admitted' ,'$target_file')";
$uploadOk = 1;
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
else if ($_FILES["documents"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
else if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

}
else {
  if (move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file)) {
    echo "<h1>Hello $name <br> welcome to sssvn family,all you details are saved and file ". htmlspecialchars( basename( $_FILES["documents"]["name"])). " has been uploaded to our database.</h1>";
    mysqli_query($conn,$sql);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}






?>