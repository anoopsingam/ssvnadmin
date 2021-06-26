

<?php include "header.php";  if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator"){ ?> 
<title>Update Stages | Stark Tech</title>
<?php $dcry = my_simple_crypt($_GET['id'], 'd');
?> <?php if (empty($dcry)) {?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM transport_bus_stages WHERE route_no='$dcry'";
$ask=mysqli_query($conn, $sql);
if (mysqli_num_rows($ask)>0) {
    while ($row=mysqli_fetch_assoc($ask)) {?>
   
    <div style="overflow:scroll;  overflow-y: hidden;
  overflow-x: hidden;">
<form id="form1" name="form1" method="post" action="UploadUpdatedStage">

   
    <center>
        <h4 class="text-muted">Update Start & End Point for Route No <?php echo $row['route_no']." ".$row['bus_no']?></h4>
    </center>
    <div class="row">
        <div class="col-sm"><label for="">Start Point: </label> <input type="text" value="<?php echo $row['start_point']?>" class="form-control" name="start_point" id="" /></div>
        <div class="col-sm"><label for="stage1_fare">End Point : </label> <input type="text" class="form-control" name="end_point"  value="<?php echo $row['end_point']?>" id="" /></div>
    </div>
    <br>
    <center> 
        <h4 class="text-muted">Update the Stages with Fares</h4>
    </center><br>
    <div class="row">
        <div class="col-sm"><label for="stage1">Stage 1 Name: </label> <input type="text" class="form-control" name="stage1"  value="<?php echo $row['stage1']?>" id="stage1" /></div>
        <div class="col-sm"><label for="stage1_fare">Stage 1 Fare : </label> <input type="text" class="form-control"  value="<?php echo $row['stage1_fare']?>" name="stage1_fare"   id="stage1_fare" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage2">Stage 2 Name : </label> <input type="text" name="stage2" id="stage2" class="form-control"  value="<?php echo $row['stage2']?>" /></div>
        <div class="col-sm"><label for="stage2_fare">Stage 2 Fare : </label> <input type="text" name="stage2_fare" id="stage2_fare" class="form-control"  value="<?php echo $row['stage2_fare']?>" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage3">Stage 3 Name : </label> <input type="text" name="stage3" id="stage3" class="form-control"  value="<?php echo $row['stage3']?>" /></div>
        <div class="col-sm"><label for="stage3_fare">Stage 3 Fare : </label> <input type="text" name="stage3_fare" id="stage3_fare" class="form-control"  value="<?php echo $row['stage3_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage4">Stage 4 Name : </label> <input type="text" name="stage4" id="stage4" class="form-control"  value="<?php echo $row['stage4']?>" /></div>
        <div class="col-sm"><label for="stage4_fare">Stage 4 Fare : </label> <input type="text" name="stage4_fare" id="stage4_fare" class="form-control"  value="<?php echo $row['stage4_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage5">Stage 5 Name : </label> <input type="text" name="stage5" id="stage5" class="form-control"  value="<?php echo $row['stage5']?>" /></div>
        <div class="col-sm"><label for="stage5_fare">Stage 5 Fare : </label> <input type="text" name="stage5_fare" id="stage5_fare" class="form-control"  value="<?php echo $row['stage5_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage6">Stage 6 Name : </label> <input type="text" name="stage6" id="stage6" class="form-control"  value="<?php echo $row['stage6']?>" /></div>
        <div class="col-sm"><label for="stage6_fare">Stage 6 Fare : </label> <input type="text" name="stage6_fare" id="stage6_fare" class="form-control"  value="<?php echo $row['stage6_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage7">Stage 7 Name : </label> <input type="text" name="stage7" id="stage7" class="form-control"  value="<?php echo $row['stage7']?>" /></div>
        <div class="col-sm"><label for="stage7_fare">Stage 7 Fare : </label> <input type="text" name="stage7_fare" id="stage7_fare" class="form-control"  value="<?php echo $row['stage7_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage8">Stage 8 Name : </label> <input type="text" name="stage8" id="stage8" class="form-control"  value="<?php echo $row['stage8']?>" /></div>
        <div class="col-sm"><label for="stage8_fare">Stage 8 Fare : </label> <input type="text" name="stage8_fare" id="stage8_fare" class="form-control"  value="<?php echo $row['stage8_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage9">Stage 9 Name : </label> <input type="text" name="stage9" id="stage9" class="form-control"  value="<?php echo $row['stage9']?>" /></div>
        <div class="col-sm"><label for="stage9_fare">Stage 9 Fare : </label> <input type="text" name="stage9_fare" id="stage9_fare" class="form-control"  value="<?php echo $row['stage9_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage10">Stage 10 Name : </label> <input type="text" name="stage10" id="stage10" class="form-control"  value="<?php echo $row['stage10']?>" /></div>
        <div class="col-sm"><label for="stage10_fare">Stage 10 Fare : </label> <input type="text" name="stage10_fare" id="stage10_fare" class="form-control"  value="<?php echo $row['stage10_fare']?>" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage11">Stage 11 Name : </label> <input type="text" name="stage11" id="stage11" class="form-control"  value="<?php echo $row['stage11']?>" /></div>
        <div class="col-sm"><label for="stage11_fare">Stage 11 Fare : </label> <input type="text" name="stage11_fare" id="stage11_fare" class="form-control"  value="<?php echo $row['stage11_fare']?>" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage12">Stage 12 Name : </label> <input type="text" name="stage12" id="stage12" class="form-control"  value="<?php echo $row['stage12']?>" /></div>
        <div class="col-sm"><label for="stage12_fare">Stage 12 Fare : </label> <input type="text" name="stage12_fare" id="stage12_fare" class="form-control"  value="<?php echo $row['stage12_fare']?>" /></div>
    </div>
            <br><br>
            <label for="">Login ID:</label>
            <input type="text" name="route_no" hidden value="<?php echo $row['route_no']?>" id="">
            <input type="text" name="bus_no" hidden value="<?php echo $row['bus_no']?>" id="">
            <input type="text" name="login_id" readonly class="form-control" style="width: min-content;border:none;" value="<?php echo $_SESSION['username'];?>" id="">
            <center><button type="submit" class="btn btn-danger">Submit</button></center>
    
</form> 


    <?php
    }
} else {
    echo"error in processing".mysqli_errno($conn);
}
?>
    </div>
<center>
<?php } include'footer.php';?>

</center>   