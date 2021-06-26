<?php //Post Params 
$bus_no = $_POST['bus_no'];  
$route_no = $_POST['route_no'];  
$stage1 = $_POST['stage1'];  
$stage1_fare = $_POST['stage1_fare'];  
$stage2 = $_POST['stage2'];  
$stage2_fare = $_POST['stage2_fare'];  
$stage3 = $_POST['stage3'];  
$stage3_fare = $_POST['stage3_fare'];  
$stage4 = $_POST['stage4'];  
$stage4_fare = $_POST['stage4_fare'];  
$stage5 = $_POST['stage5'];  
$stage5_fare = $_POST['stage5_fare'];  
$stage6 = $_POST['stage6'];  
$stage6_fare = $_POST['stage6_fare'];  
$stage7 = $_POST['stage7'];  
$stage7_fare = $_POST['stage7_fare'];  
$stage8 = $_POST['stage8'];  
$stage8_fare = $_POST['stage8_fare'];  
$stage9 = $_POST['stage9'];  
$stage9_fare = $_POST['stage9_fare'];  
$stage10 = $_POST['stage10'];  
$stage10_fare = $_POST['stage10_fare'];  
$stage11 = $_POST['stage11'];  
$stage11_fare = $_POST['stage11_fare'];  
$stage12 = $_POST['stage12'];  
$stage12_fare = $_POST['stage12_fare'];  
$start_point = $_POST['start_point'];  
$end_point = $_POST['end_point'];  
$login_id = $_POST['login_id'];  
$date=date('d-m-Y');
include'database.php';

    //INSERT       
    $query =   " UPDATE `transport_bus_stages` SET `bus_no`='$bus_no',`route_no`='$route_no',`stage1`='$stage1',`stage1_fare`='$stage1_fare',`stage2`='$stage2',`stage2_fare`='$stage2_fare',`stage3`='$stage3',`stage3_fare`='$stage3_fare',`stage4`='$stage4',`stage4_fare`='$stage4_fare',`stage5`='$stage5',`stage5_fare`='$stage5_fare',`stage6`='$stage6',`stage6_fare`='$stage6_fare',`stage7`='$stage7',`stage7_fare`='$stage7_fare',`stage8`='$stage8',`stage8_fare`='$stage8_fare',`stage9`='$stage9',`stage9_fare`='$stage9_fare',`stage10`='$stage10',`stage10_fare`='$stage10_fare',`stage11`='$stage11',`stage11_fare`='$stage11_fare',`stage12`='$stage12',`stage12_fare`='$stage12_fare',`start_point`='$start_point',`end_point`='$end_point',`stage_updated_date`='$date',`login_id`='$login_id' WHERE route_no='$route_no'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('$bus_no is Sucessfully updated with Route-$route_no Stages & Fares ')</script>"; ?>
        <script>   window.location.replace("ModifyStages");
        </script> 
        <?php  
    } else {
        echo"<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
        <script>   window.location.replace("ModifyStages");
        </script> 
        <?php  
    }

?>