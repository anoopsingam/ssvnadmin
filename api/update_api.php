<?php

if (isset($_GET['sid'])) {
    include '../database.php';
    header('Content-Type:application/json');

    if(empty($_GET['sid']) || empty($_GET['name'])){
        echo json_encode(['result' => 'NOT UPDATED', 'response' => 'Invalid Api Request','error'=>'Missing Api Parameters', 'status' => 'FAIL']);

    }else{
        $id = $_GET['sid'];
    $name=$_GET['name'];

        $find = "SELECT * FROM student_enrollment where studentid='$id'";
        $check = mysqli_query($conn, $find);

        if (mysqli_num_rows($check)>0) {
            $sql = "UPDATE student_enrollment SET student_name='$name' where studentid='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo json_encode(['result' => 'UPDATED', 'response' => 'The Name for ID '.$id.' Update Successfully','error'=>'NON', 'status' => 'SUCCESS']);
            }
        } else {
            echo json_encode(['result' => 'NOT UPDATED', 'response' => 'Sorry The Data Could Not Be Updated for  Id:-' . $id,'error'=>'Internal Processing Error', 'status' => 'FAIL']);
        }
    }
    
    
}
?>