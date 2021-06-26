<?php include'header.php';?>
<title>Add Tution Fee | <?php echo $theader;?></title>
<form id="form1" name="form1" method="post" action="tutuion_fee_upload">
<div class="row">
<div class="col-sm"><label for="class">Class</label>
<select name="class" id="" class="form-control">
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

<div class="col-sm"><label for="fee">Fee</label><input type="number" name="fee" id="fee" class="form-control" /></div>
<div class="col-sm"><label for="academic_year">Academic Year</label>


<select name="academic_year" id="academic_year" class="form-control">

<option value="2021-2022">2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option>  
 <option value="2025-2026">2025-2026</option>      
</select>
</div>
<div class="col-sm">
<label for="login">Login</label><input type="text" class="form-control" style="width: min-content;" value="<?php echo $_SESSION['username']?>" readonly name="login" id="login" />
</div>
</div><br><br>
<center><button type="submit" class="btn btn-danger">SUBMIT</button></center>
</form>
<?php include'footer.php';?>