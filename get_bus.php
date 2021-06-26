<?php
require_once('database.php');
$str=$_POST['route_id'];
$route_id = mysqli_real_escape_string($conn,$str);
if($route_id!='')
{
$states_result = $conn->query('select * from transport_bus where route_no='.$route_id.'');

while($row = $states_result->fetch_assoc()) {
$options .= "<option value='".$row['reg_no']."' selected >".$row['driver_name']." [".$row['reg_no']."]</option>";
}
echo $options;
}?>