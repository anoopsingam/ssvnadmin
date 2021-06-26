<?php //Post Params 

include'database.php';
$id = $_POST['id'];  
$ubs_class = $_POST['ubs_class'];  
$ubs_fee = $_POST['ubs_fee'];  
$academic_year = $_POST['academic_year']; 
date_default_timezone_set("ASIA/KOLKATA");
$update_time=date("Y-m-d h:i:sa");



    //INSERT
    $query = " UPDATE ubs_fee SET  ubs_class = '$ubs_class',  ubs_fee = '$ubs_fee',  academic_year = '$academic_year',  updated_on = '$update_time' WHERE id ='$id' "; 
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('UBS Fee $ubs_fee has been Updated to $ubs_class for AY- $academic_year ')</script>"; ?>
<script>   window.location.replace("ModifyUbsFee");
</script> 
<?php
    } else {
        echo"<script>alert('Query Failed !! Contact Technical Team')</script>"; ?>
<script>   window.location.replace("ModifyUbsFee");
</script> 
<?php
    }

?>