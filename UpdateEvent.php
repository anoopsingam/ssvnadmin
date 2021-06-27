<?php include'header.php';?>
<title>Update User | <?php echo $theader;?></title>
<?php $dcry = my_simple_crypt( $_GET['id'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM events WHERE id='$dcry'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>
                    <form action="ChangeEvent" method="post" class="form-group">
                            
                            <center>
                                <legend>
                                    <h3 class="h3  badge bg-warning text-dark "> Events Updating Portal</h3>
                                </legend>
                            </center>

                            <div class="row">
                <div class="col-sm"><label for="event_name">Event Name :  </label><input type="text" value="<?php echo $row['event_name']?>" class="form-control" name="event_name" id="event_name" /></div>
                <div class="col-sm"><label for="event_discription">Event Discription :  </label><textarea type="text" class="form-control" name="event_discription" rows="15" cols="45"  maxlength="150" style="height: 100px;" id="event_discription" /><?php echo $row['event_discription']?></textarea></div>
                <div class="col-sm"><label for="event_date">Event Date :  </label><input type="date" class="form-control" value="<?php echo $row['event_date']?>" name="event_date" id="event_date" /></div>
            </div>
                    
                <div class="row">
                    <div class="col-sm"><label for="even_added_by">Even Added By :  </label><input type="text" class="form-control" name="even_added_by" value="<?php echo $row['even_added_by']?>" id="even_added_by" /></div>
                    <div class="col-sm"><label for="academic_year">Academic Year :  </label><select name="academic_year" id="academic_year" class="form-control">
            <option value="<?php echo $row['academic_year']?>" class="bg-warning" selected><?php echo $row['academic_year']?></option>
<option value="2021-2022">2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option> 
<option value="2025-2026">2025-2026</option>          
</select></div>
                <div class="col-sm">
                <label for="" class="">Token ID No:</label>
                                    <input type="text" name="id" value="<?php echo $_GET['id']?>" readonly id="" class="form-control ">
                </div>
                </div>
                        <div class="text-center pt-2">
                                    <button class="btn btn-danger" type="submit">Update Event</button>
                        </div>
                    
                    </form>

                    <?php
    }
}else{
    echo"error in processing".mysqli_errno($conn);
}
?>
<?php include'footer.php';?>