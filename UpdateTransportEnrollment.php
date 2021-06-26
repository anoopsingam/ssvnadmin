<?php
print_r($_POST);
include 'database.php';
$id = $_POST['student_id'];
$class = $_POST['class'];
$route = $_POST['route_no'];
$stg = $_POST['stage'];
$var = explode(",", $stg);
$stage = $var[0];
$stage_fare = $_POST['stage_fare'];
$date=date('d-m-Y');

$upd_query2 = "UPDATE student_enrollment SET transport_opted='1', transport_route_stage='$route,$stage', transport_fee='$stage_fare',transport_opted_on='$date' WHERE studentid='$id' ";
$send2 = mysqli_query($conn, $upd_query2);
if ($send2) {
    print "<script>alert('$id sucessfully Enrolled for Transport')</script>";
?>
    <script>
        window.location.replace("TutionFeeBilling");
    </script>
<?php
} else {
    print "<script>alert('$id Failed Enrolled for Transport !! Contact Technical Support ')</script>";
    ?>
        <script>
            window.location.replace("index");
        </script>
    <?php
}


?>