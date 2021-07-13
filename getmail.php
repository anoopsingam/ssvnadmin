<?php
require_once('database.php');
$str=$_POST['user_id'];

if($str!='')
{
$states_result = $conn->query("select * from kyt where name='$str'");

while($row = $states_result->fetch_assoc()) {
$options = "<option value='".$row['email']."' selected >".$row['email']."</option>";
}
echo $options;
}?>