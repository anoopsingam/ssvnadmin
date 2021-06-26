<?php 

$id=$_POST['studentid'];
$remarks=$_POST['remarks'];

include'database.php';

$sql="UPDATE student_enrollment SET remarks='$remarks' where studentid='$id' ";
$send=mysqli_query($conn,$sql);
if($send){
    echo"<script>alert('$id is Sucessfully Added with Remarks ')</script>"; ?>
    <script>   window.location.replace("StudentRemarks");
    </script> 
    <?php 
}else{
    echo"<script>alert(' Failed to Add Remarks of $id ! Contact Tecnical Team..... !!!')</script>"; ?>
    <script>   window.location.replace("index");
    </script> 
    <?php 
}

?>