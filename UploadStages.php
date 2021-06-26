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

include'database.php';

$check = "SELECT * FROM transport_bus_stages WHERE  bus_no = '$bus_no' or start_point = '$start_point'and end_point = '$end_point' ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
    $view=mysqli_fetch_assoc($rs);
    $stp=$view['start_point'];
    $etp=$view['end_point'];
?>
  <script>
    alert("<?php echo "The Bus $bus_no Already added with Start Point $stp  & End Point $etp !!"; ?>")
    window.location.assign("AddStages")
  </script>
  <?php
} else {
    //INSERT
    $query = " INSERT INTO transport_bus_stages ( bus_no, route_no, stage1, stage1_fare, stage2, stage2_fare, stage3, stage3_fare, stage4, stage4_fare, stage5, stage5_fare, stage6, stage6_fare, stage7, stage7_fare, stage8, stage8_fare, stage9, stage9_fare, stage10, stage10_fare, stage11, stage11_fare, stage12, stage12_fare,start_point,end_point, login_id )  VALUES ( '$bus_no', '$route_no', '$stage1', '$stage1_fare', '$stage2', '$stage2_fare', '$stage3', '$stage3_fare', '$stage4', '$stage4_fare', '$stage5', '$stage5_fare', '$stage6', '$stage6_fare', '$stage7', '$stage7_fare', '$stage8', '$stage8_fare', '$stage9', '$stage9_fare', '$stage10', '$stage10_fare', '$stage11', '$stage11_fare', '$stage12', '$stage12_fare', '$start_point', '$end_point','$login_id' ) ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('$bus_no is Sucessfully Added with Route-$route_no Stages & Fares ')</script>"; ?>
        <script>   window.location.replace("AddStages");
        </script> 
        <?php  
    } else {
        echo"<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
        <script>   window.location.replace("AddStages");
        </script> 
        <?php  
    }
}
?>