<?php

if (isset($_GET['sid'])) {
    include '../database.php';
    $id = $_GET['sid'];
    header('Content-Type:application/json');
  if(empty($id)){
    echo json_encode(['result' => 'false', 'data' => 'Missing Api Parameter', 'status' => 'error']);

  }else{
    $sql = "SELECT * FROM student_enrollment where studentid='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        echo json_encode(['result' => 'true', 'data' => $arr, 'status' => 'yes']);
    } else {
        echo json_encode(['result' => 'false', 'data' => 'No Data Fount for ' . $id, 'status' => 'No Data']);
    }
  }
}
?>
