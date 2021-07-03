<?php

    include'database.php';
  
  
        

            $message="ATTENDANCE MARKED";
            $sts="SUCCESS";
    $s = "INSERT INTO `student_attendance`( `reg_no`, `attendance`, `date`, `loginid`,  `message`,`response`) VALUES";
	for($i=0;$i<$_POST['number'];$i++)
	{    
        if($_POST['attend'][$i]=="A"){
         


		 $s .="('".$_POST['reg_no'][$i]."','ABSENT','".$_POST['date'][$i]."','".$_POST['loginid'][$i]."','".$message."','". $sts."'),";
   

       }

    
	}
	$s = rtrim($s,",");
    $insert=mysqli_query($conn,$s);
    if($insert==true){
      
        ?><script>
if (window.confirm("Have you Acknowledged todays Attendance ?")) {
    window.location.replace("AttendanceEntry");
}else{
    window.location.replace("index");
}
</script>";
<?php          }
    else 
    {
       
?>
        <script>alert('Attendance Failed to Mark Please Contact Technical Team !')
        
        window.location.replace("index");
        </script>

  <?php  }
    


?>