

<?php include'header.php';?>
<title>Add Tution Fee | Stark Tech</title>
<?php $dcry = my_simple_crypt( $_GET['id'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM tution_fee WHERE id='$dcry'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>
   
    <div style="overflow:scroll;  overflow-y: hidden;
  overflow-x: hidden;">

<form id="form1" name="form1" method="post" action="tutuion_fee_update">
<div class="row">
<div class="col-sm"><label for="class">Class</label>
<select name="class" id="" class="form-control">
<option value="<?php echo $row['class']?>" class="bg-warning text-dark" selected ><?php echo $row['class']?></option>
<option value="LKG">LKG</option>
                            <option value="UKG">UKG</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>   
</select>
</div>

<div class="col-sm"><label for="fee">Fee</label><input type="number" name="fee" id="fee" value="<?php echo $row['fee']?>" class="form-control" /></div>
<div class="col-sm"><label for="academic_year">Academic Year</label>


<select name="academic_year" id="academic_year" class="form-control">
<option value="<?php echo $row['academic_year']?>" class="bg-warning text-dark" selected ><?php echo $row['academic_year']?></option>

<option value="2020-2021">2020-2021</option>
<option value="2021-2022">2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option>      
</select>
</div>
</div><br><br>
<input type="text" name="id" hidden value="<?php echo $row['id'];?>" id="">
<center><button type="submit" class="btn btn-warning">UPDATE</button></center>
</form>


    <?php
    }
}else{
    echo"error in processing".mysqli_errno($conn);
}
?>
    </div>
<center>
<?php include'footer.php';?>

</center>