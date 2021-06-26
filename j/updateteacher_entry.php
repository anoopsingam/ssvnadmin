<?php
include "blackbox.php";
$namea = $_GET['namee'];
$name=my_simple_crypt($namea,'d');
echo $name;
$conn = mysqli_connect('localhost', 'root', '', 'sssvn');
$row = mysqli_fetch_assoc(mysqli_query($conn, "select * from kyt where id='$name'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="updateteacher_actual.php" method="post" enctype="multipart/form-data">
            <label for="">Name</label><br><input type="text" class="form-control" name="name" id="" value="<?php echo $row['name'] ?>"> <br>
            <label for="">Gender</label><select name="gender" id="" value="<?php echo $row['gender'] ?>" class="form-control">
                <option value="male">Male</option>
                <option value="Female">Female</option>
            </select> <br>
            <label for="">Date Of Birth</label><input type="text" class="form-control" name="date_of_birth" id="" value="<?php echo $row['date_of_birth'] ?>"> <br>
            <label for="">Phone Number</label><input type="text" class="form-control" name="phone_no" id="" value="<?php echo $row['phone_no'] ?>"> <br>
            <label for="">Email</label><input type="text" class="form-control" name="email" id="" value="<?php echo $row['email'] ?>"> <br>
            <label for="">Date Of Joining</label><input type="text" class="form-control" name="date_of_joining" id="" value="<?php echo $row['date_of_joining'] ?>"> <br>
            <label for="">Education Qualification</label><input type="text" class="form-control" name="education_qualification" id="" value="<?php echo $row['education_qualification'] ?>"> <br>
            <label for="">Father Name</label><input type="text" class="form-control" name="father_name" id="" value="<?php echo $row['father_name'] ?>"> <br>
            <label for="">Mother Name</label><input type="text" class="form-control" name="mother_name" id="" value="<?php echo $row['mother_name'] ?>"> <br>
            <label for="">Marital Status</label><input type="text" class="form-control" name="marital_status" id="" value="<?php echo $row['marital_status'] ?>"> <br>
            <label for="">Name Of Spouse</label><input type="text" class="form-control" name="name_of_spouse" id="" value="<?php echo $row['name_of_spouse'] ?>"> <br>
            <label for="">Number of Kids</label><input type="text" class="form-control" name="no_of_kids" id="" value="<?php echo $row['no_of_kids'] ?>"> <br>
            <label for="">Aadhar number</label><br><input type="text" class="form-control" name="aadhar_no" id="" value="<?php echo $row['aadhar_no'] ?>"> <br>
            <label for="">Voter Number</label><br><input type="text" class="form-control" name="voter_id" id="" value="<?php echo $row['voter_id'] ?>"> <br>
            <label for="">Pan Card</label><input type="text" class="form-control" name="pan_card" id="" value="<?php echo $row['pan_card'] ?>"> <br>
            <label for="">Ration Card</label><input type="text" class="form-control" name="ration_card" id="" value="<?php echo $row['ration_card'] ?>"> <br>
            <label for="">Passport</label><input type="text" class="form-control" name="passport" id="" value="<?php echo $row['passport'] ?>"> <br>
            <label for="">Present Address</label><input type="text" class="form-control" name="present_address" id="" value="<?php echo $row['present_address'] ?>"> <br>
            <label for="">Permanent Address</label><input type="text" class="form-control" name="permanent_address" id="" value="<?php echo $row['permanent_address'] ?>"> <br>
            <label for="">Bank Account Number</label><input type="text" class="form-control" name="bank_account_no" id="" value="<?php echo $row['bank_account_no'] ?>"> <br>
            <label for="">Bank Branch</label><input type="text" class="form-control" name="bank_branch" id="" value="<?php echo $row['bank_branch'] ?>"> <br>
            <label for="">Bank IFSC</label><input type="text" class="form-control" name="bank_ifsc" id="" value="<?php echo $row['bank_ifsc'] ?>"> <br>
            <label for="">Original Certificate</label><input type="text" class="form-control" name="original_certificate" id="" value="<?php echo $row['original_certificate'] ?>"> <br>
            <label for="">PF Enrollment Number</label><input type="text" class="form-control" name="pf_enrolment_no" id="" value="<?php echo $row['pf_enrolment_no'] ?>"> <br>
            <label for="">ESI Enrollment Number</label><input type="text" class="form-control" name="esi_enrolment_no" id="" value="<?php echo $row['esi_enrolment_no'] ?>"> <br>
            <label for="" id="x"><strong> Do you want to Update documents </strong>
            </label> <span id="y"><button class="btn btn-success btn-sm" type="button" id="con1" onclick="validate1()">YES </button>&#160;<button type="button" class="btn btn-warning btn-sm" id="con2" onclick="validate2()">NO</button></span>
            <input type="file" class="form-control  form-control-file" name="documents" id="file" required disabled hidden><input type="text" value="" name="conf" id="conf" readonly hidden> <br><br>
            <input type="text" name="prev_name" id="" value="<?php echo $name; ?>" hidden readonly>
            <script>
                function validate1() {
                    document.getElementById('y').hidden = true;
                    document.getElementById('x').innerText = "Documents";
                    document.getElementById('file').hidden = false;
                    document.getElementById('file').disabled = false;
                    document.getElementById('conf').value = '1';
                }

                function validate2() {
                    document.getElementById('x').hidden = true;
                    document.getElementById('y').hidden = true;
                    document.getElementById('conf').value = '0';
                    document.getElementById('file').required = false;
                }
            </script>

            <button class="btn btn-primary" type="submit" name="submit">Add Teacher</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>

