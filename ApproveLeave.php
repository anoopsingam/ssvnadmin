<?php include'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (empty($id)) {
        //alert No Key found in java script
        echo "<script>alert('No Leave ID Found & Un-Authorized Access')</script>";
        // redirect to index using java script
        echo "<script>window.location.href='index'</script>";
    }
    $dcry = my_simple_crypt($id, 'd');
    
    //fetch all details from kyt where unique_key =$dcry
    $leave = mysqli_query($conn, "SELECT * FROM leave_application WHERE id='$dcry'");
    //fetch all details from kyt 
    $leave_details = mysqli_fetch_assoc($leave);
}

?>
<title> <?php echo $leave_details['teacher_name']; ?> Leave Application | <?php echo $theader?></title>

<table class="table table-bordered">

<tr>
<td>
<strong>Employee Name:</strong> <?php echo $leave_details['teacher_name']?>
</td>
<td>
<strong>Employee ID:</strong> <?php echo $leave_details['teacher_id']?>
</td>
</tr>
<tr>
<td>
<b>Leave From :</b> <?php echo $leave_details['leave_date']?>
</td>
<td>
<b>Leave End :</b> <?php echo $leave_details['leave_end_date']?>
</td>
</tr>
<tr>
<td colspan="2">
<b>Leave Reason :</b> <i><?php echo $leave_details['leave_reason']?></i>

</td>
</tr>
<tr>
    <td>
   <b> Leave Applied On :</b> <?php echo $leave_details['leave_applied_on']?>

    </td>
    <td>
   <b> Leave Status :</b> <?php echo $leave_details['leave_status']?>

    </td>

</tr>


</table>

<form action="" method="post">
    <center><br><br>
    <input type="text" name="leave_id" value="<?php echo $leave_details['id'];?>" hidden id="">
    <label for="">Login ID</label>
    <input type="text" readonly style="width:min-content" name="login_id" value="<?php echo $username; ?>" class="form-control">
        Status : <select style="width:min-content" name="leave_status" class="form-control" id="">
            <option value="WAITING" class=" badge bg-warning">WAITING</option>
            <option value="APPROVED" class=" badge bg-success">APPROVED</option>
            <option value="REJECTED" class="badge bg-danger">REJECTED</option>
        </select>
        <br>
        <button type="submit" name="btn_upd" class="btn btn-primary">Update</button>
    </center>
</form>
<?php 
            if (isset($_POST['btn_upd'])) {
                $leave_status = $_POST['leave_status'];
                $leave_id = $_POST['leave_id'];
                date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
                   if($leave_status=="APPROVED"){
                    $time= date('d-m-Y h:i:s');
                    $login_id = $_POST['login_id'];

                   }else{
                       $time="##@@!!$$";
                       $login_id = "";

                   }

                if (empty($leave_id)) {
                    ?>
                    
                    <script>
                        Swal.fire(
    'error',
    ' Un-Authorized Access',
    'error'
    )
                        
                    </script>
    <?php
                } else{
                            $leave_update=mysqli_query($conn,"UPDATE leave_application SET leave_status='$leave_status',leave_approved_by='$login_id',leave_approved_on='$time' WHERE id='$leave_id'");
                            if($leave_update){

                                
                                //alert Leave Status Updated Successfully
                                echo "<script>alert('Leave Status Updated Successfully as $leave_status')</script>";
                                //redirect to index using java script
                                echo "<script>window.location.href='LeaveStatus'</script>";
                            }else{
                                //alert Leave Status Not Updated
                                echo "<script>alert('Leave Status Not Updated ! Contact Technical Team')</script>";
                                //redirect to index using java script
                                echo "<script>window.location.href='LeaveStatus'</script>";
                            }

                }
            }
 ?>

<?php include'footer.php';?>