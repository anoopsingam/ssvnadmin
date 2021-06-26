<?php
// Include the database config file 
include_once 'database.php';

if (!empty($_POST["country_id"])) {
    // Fetch state data based on the specific country 
    $query = "select * from transport_bus_stages where route_no = " . $_POST['country_id'] . " ";
    $result = $conn->query($query);

    // Generate HTML of state options list 
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $options .= "<option>Select Stage of Route- " . $_POST['country_id'] . " </option>
            <option value='" . $row['stage1'] . ",stage1_fare'  >" . $row['stage1'] . "</option>
            <option value='" . $row['stage2'] . ",stage2_fare'  >" . $row['stage2'] . "</option>
            <option value='" . $row['stage3'] . ",stage3_fare'  >" . $row['stage3'] . "</option>
            <option value='" . $row['stage4'] . ",stage4_fare'  >" . $row['stage4'] . "</option>
            <option value='" . $row['stage5'] . ",stage5_fare'  >" . $row['stage5'] . "</option>
            <option value='" . $row['stage6'] . ",stage6_fare'  >" . $row['stage6'] . "</option>
            <option value='" . $row['stage7'] . ",stage7_fare'  >" . $row['stage7'] . "</option>
            <option value='" . $row['stage8'] . ",stage8_fare'  >" . $row['stage8'] . "</option>
            <option value='" . $row['stage9'] . ",stage9_fare'  >" . $row['stage9'] . "</option>
            <option value='" . $row['stage10'] . ",stage10_fare'  >" . $row['stage10'] . "</option>
            <option value='" . $row['stage11'] . ",stage11_fare'  >" . $row['stage11'] . "</option>
            <option value='" . $row['stage12'] . ",stage12_fare'  >" . $row['stage12'] . "</option>";
            echo $options;
        }
    } else {
        echo '<option value="">Stages not available </option>';
    }
} elseif (!empty($_POST["state_id"])) {
    // Fetch city data based on the specific state 
    $route = $_POST['state_id'];

    $var=explode(",",$route);
    $route_id=$var['0'];
    $fare=$var[1];

    $query = "SELECT $fare FROM transport_bus_stages WHERE stage1= '$route_id' or stage2= '$route_id' or stage3= '$route_id' or stage4= '$route_id' or stage5= '$route_id' or stage6= '$route_id' or stage7= '$route_id' or stage8= '$route_id' or stage9= '$route_id' or stage10= '$route_id'or stage11= '$route_id' or stage12= '$route_id' ";
    $result = $conn->query($query);

    // Generate HTML of city options list 
    if ($result->num_rows > 0) {
      
        while ($row = $result->fetch_assoc()) {
            $fares .= "
            <option value='" . $row[$fare] . "'  selected >" . $row[$fare] . "</option>";
            echo $fares;
        }
    } else {
        echo '<option value="">Fares not available</option>';
    }
}
