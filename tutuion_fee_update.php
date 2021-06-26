<?php //Post Params 

include'database.php';
$id = $_POST['id'];  
$class = $_POST['class'];  
$fee = $_POST['fee'];  
$academic_year = $_POST['academic_year']; 
date_default_timezone_set("ASIA/KOLKATA");
$update_time=date("Y-m-d h:i:sa");



    //INSERT
    $query = " UPDATE tution_fee SET  class = '$class',  fee = '$fee',  academic_year = '$academic_year',  updated_date = '$update_time' WHERE id ='$id' "; 
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('Tution Fee $fee has been Updated to $class for AY- $academic_year ')</script>"; ?>
<script>   window.location.replace("ModifyTutionFee");
</script> 
<?php
    } else {
        echo"<script>alert('Query Failed !! Contact Technical Team')</script>"; ?>
<script>   window.location.replace("ModifyTutionFee");
</script> 
<?php
    }

?>