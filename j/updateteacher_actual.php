<?php

$conn = mysqli_connect('localhost', 'root', '', 'sssvn');
if (isset($_POST['submit'])) {
    $name=$_POST['prev_name'];
    $input = $_POST['name'];
    $aadhar_no = $_POST['aadhar_no'];
    $voter_id = $_POST['voter_id'];
    $pan_card = $_POST['pan_card'];
    $ration_card = $_POST['ration_card'];
    $passport = $_POST['passport'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $date_of_joining = $_POST['date_of_joining'];
    $education_qualification = $_POST['education_qualification'];
    $marital_status = $_POST['marital_status'];
    $name_of_spouse = $_POST['name_of_spouse'];
    $no_of_kids = $_POST['no_of_kids'];
    $gender = $_POST['gender'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $bank_account_no = $_POST['bank_account_no'];
    $bank_branch = $_POST['bank_branch'];
    $bank_ifsc = $_POST['bank_ifsc'];
    $original_certificate = $_POST['original_certificate'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $pf_enrolment_no = $_POST['pf_enrolment_no'];
    $esi_enrolment_no = $_POST['esi_enrolment_no'];
    $conf = $_POST['conf'];
    if ($conf == '1') {
        $target_file = 'uploads/' . $input . '.pdf';
        $uploadOk = 1;
        if (file_exists($target_file)) {
            unlink($target_file);
            echo "previous documents removed";
        }

        if ($_FILES["documents"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        } else if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["documents"]["tmp_name"], 'uploads/' . $input . '.pdf')) {
                $sql_upd = "update kyt set name='$input', aadhar_no='$aadhar_no', voter_id='$voter_id', pan_card='$pan_card', ration_card='$ration_card', passport='$passport', father_name='$father_name', mother_name='$mother_name', date_of_birth='$date_of_birth', date_of_joining='$date_of_joining', education_qualification='$education_qualification', marital_status='$marital_status', name_of_spouse= '$name_of_spouse', no_of_kids='$no_of_kids', gender='$gender', phone_no='$phone_no', email='$email', bank_account_no='$bank_account_no', bank_branch='$bank_branch', bank_ifsc='$bank_ifsc', original_certificate='$original_certificate', present_address='$present_address', permanent_address='$permanent_address', pf_enrolment_no='$pf_enrolment_no', esi_enrolment_no='$esi_enrolment_no', link_documents='$target_file' where id='$name' ";
                echo "<h1>Hello $input <br> all your details are modified and file " . htmlspecialchars(basename($_FILES["documents"]["name"])) . " has been updated to our database.</h1>".mysqli_errno($conn);
                mysqli_query($conn,$sql_upd);
                
                
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            
        }
    }
    else if($conf=='0')
    {
        $sql_upda = "update kyt set name='$input', aadhar_no='$aadhar_no', voter_id='$voter_id', pan_card='$pan_card', ration_card='$ration_card', passport='$passport', father_name='$father_name', mother_name='$mother_name', date_of_birth='$date_of_birth', date_of_joining='$date_of_joining', education_qualification='$education_qualification', marital_status='$marital_status', name_of_spouse= '$name_of_spouse', no_of_kids='$no_of_kids', gender='$gender', phone_no='$phone_no', email='$email', bank_account_no='$bank_account_no', bank_branch='$bank_branch', bank_ifsc='$bank_ifsc', original_certificate='$original_certificate', present_address='$present_address', permanent_address='$permanent_address', pf_enrolment_no='$pf_enrolment_no', esi_enrolment_no='$esi_enrolment_no' where id='$name' ";
        echo "<h1>Hello $input <br> all your details are modified and has been updated to our database.</h1>";
        mysqli_query($conn,$sql_upda);
        
    }
   
}


?>