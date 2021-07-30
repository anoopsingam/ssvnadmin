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

<tr>
<td>
<b>Leave Approved By :</b> <?php echo $leave_details['leave_approved_by']?>
</td>
<td>
<b>Leave Approved on :</b> <?php echo $leave_details['leave_approved_on']?>

</td>
</tr>

</table>



<?php include'footer.php';?>