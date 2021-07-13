<?php
include'database.php';

//GET last row  ID FROM kyt puadmin database    
$id_sql = "SELECT * FROM kyt ORDER BY id ASC LIMIT 1";
$id_result = $conn->query($id_sql);
$row = mysqli_fetch_array($id_result);
$n=6;
function getid($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}
$id = "SSSVN".getid($n);
//increment id 



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
$login_id=$_POST['login_id'];
$target=$_POST['target'];
$target_file = 'uploads/'.$id.'.pdf';

// if name , aadhar no, permanent address, email , phone_no,pan_card is empty alert Please Provide sufficient details
if (empty($name) || empty($aadhar_no) || empty($permanent_address) || empty($email) || empty($phone_no) || empty($pan_card)) {
    echo "<script>alert('Please Provide sufficient details')</script>";
    echo "<script>window.location.href='AddEmployee'</script>";


}
else {

//if duplicate entry alert by checking database
$duplicate_sql = "SELECT * FROM kyt WHERE aadhar_no='$aadhar_no'";
$duplicate_result = $conn->query($duplicate_sql);
if ($duplicate_result->num_rows > 0) {
    echo "<script>alert('Duplicate Entry')</script>";
    echo "<script>window.location.href='$target'</script>";

}else{
    $uploadOk = 1;
    if (file_exists($target_file)) {
      echo "<script>alert('Sorry, file already exists.')</script>";
      echo "<script>window.location.href='$target'</script>";

      $uploadOk = 0;
    }
    elseif ($_FILES["documents"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      echo "<script>window.location.href='$target'</script>";

      $uploadOk = 0;
    }
    else if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      echo "<script>window.location.href='$target'</script>";

    
    }

    if ($uploadOk == 1) {
        //insert above data to table kyt
        $sql="INSERT INTO kyt ( id, name, aadhar_no, voter_id, pan_card, ration_card, passport, father_name, mother_name, date_of_birth, date_of_joining, education_qualification, marital_status, name_of_spouse, no_of_kids, gender, phone_no, email, bank_account_no, bank_branch, bank_ifsc, original_certificate, present_address, permanent_address, pf_enrolment_no, esi_enrolment_no, status, link_documents,login_id) VALUES ('$id', '$name', '$aadhar_no', '$voter_id', '$pan_card', '$ration_card', '$passport', '$father_name', '$mother_name', '$date_of_birth', '$date_of_joining', '$education_qualification', '$marital_status', '$name_of_spouse', '$no_of_kids', '$gender','$phone_no','$email','$bank_account_no','$bank_branch','$bank_ifsc','$original_certificate','$present_address', '$permanent_address', '$pf_enrolment_no', '$esi_enrolment_no', 'NOT_APPROVED', '$target_file','$login_id')";
        //execute the query
        $result = mysqli_query($conn, $sql);
        //if the query is executed successfully
        if ($result) {
            //echo "Uploaded Successfully";
            // move the uploaded file to uploads folder
            if (move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file)) {
                  //echo "<script>alert('Uploaded Successfully')</script>";
            echo "<script>alert('$name Details Uploaded Successfully')</script>";
            echo "<script>window.location.href='$target'</script>";

            }else{
                echo "<script>alert('$name Added Succefully But Files Failed to Upload')</script>";
                echo "<script>window.location.href='$target'</script>";
            }

          
        } else {
            //reason for failure
            echo "<script>alert('Adding $name as Failed ')</script>";
            echo "<script>window.location.href='$target'</script>";

    

            //echo mysqli error
            echo mysqli_error($conn)."<pre>".print_r(mysqli_error_list($conn))."</pre>";
        }
    }
}
    }
    




?>