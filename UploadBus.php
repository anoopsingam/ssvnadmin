<?php
include 'database.php';
$bus_no = $_POST['bus_no'];
$reg_no = $_POST['reg_no'];
$driver_name = $_POST['driver_name'];
$driver_number = $_POST['driver_number'];
$driver_address = $_POST['driver_address'];
$route_no = $_POST['route_no'];
$login_id = $_POST['login_id'];

$check = "SELECT * FROM transport_bus WHERE route_no = '$route_no' or reg_no = '$reg_no' ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
  $view = mysqli_fetch_assoc($rs);
  $reg = $view['reg_no'];
?>
  <script>
    alert("<?php echo "Route No is Already added to Bus no $reg..!!"; ?>")
    window.location.assign("AddBus")
  </script>
  <?php
} else {
  //INSERT
  $query = " INSERT INTO transport_bus ( bus_no, reg_no, driver_name, driver_number, driver_address, route_no ,login_id )  VALUES ( '$bus_no', '$reg_no', '$driver_name', '$driver_number', '$driver_address', '$route_no', '$login_id' ) ";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>alert('Bus No:$reg_no Sucessfully Added to Route No: $route_no Driver: $driver_name')</script>"; ?>
    <script>
      window.location.replace("AddBus");
    </script>
  <?php    } else {

    echo "<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
    <script>
      window.location.replace("AddBus");
    </script>
<?php
  }
}
?>