<?php
include 'database.php';
$notice_header = $_POST['notice_header'];
$sixdigit = 6;
function getName($sixdigit)
{
    $total_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $sixdigit; $i++) {
        $index = rand(0, strlen($total_characters) - 1);
        $randomString .= $total_characters[$index];
    }
    return $randomString;
}

$notice_id =  getName($sixdigit);
$notice_data = $_POST['notice_data'];
$notice_date = $_POST['notice_date'];
$notice_end_date = $_POST['notice_end_date'];
$notice_type = $_POST['notice_type'];
$notice_gen = $_POST['notice_gen'];
$notice_emp = $_POST['notice_emp'];
$notice_std = $_POST['notice_std'];
$login_id = $_POST['login_id'];

//prepare a insert query statement
$query = " INSERT INTO notice ( notice_id,notice_header, notice_data, notice_date, notice_end_date, notice_type, notice_gen, notice_emp, notice_std,login_id )  VALUES ( '$notice_id','$notice_header', '$notice_data', '$notice_date', '$notice_end_date', '$notice_type', '$notice_gen', '$notice_emp', '$notice_std','$login_id' ) ";

//execute the statement
$result = $conn->query($query);
if ($result) {
    echo json_encode(["status" => "success", "message" => "Notice Added Successfully","Noticeid"=>"".$notice_id,"NoticeHeader"=>"".$notice_header, "error" => "0"]);
} else {
    echo json_encode(["status" => "error", "message" => "Notice Not Added " . mysqli_errno($conn), "error" => "102"]);
}
