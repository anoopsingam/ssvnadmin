<?php include'header.php';?>
<title>Update Notice | <?php echo $theader;?></title>
<?php $dcry = my_simple_crypt( $_GET['id'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM notice WHERE id='$dcry'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>

<form action="UploadUpdateNotice" method="post">
                      <div class="form-group">
                      <div class="row">
                          <div class="col-sm">
                              <label for="title">Title :</label>
                              <input type="text" name="notice_header" id="notice_header" value="<?php echo $row['notice_header']?>" class="form-control">
                          </div>
                            <div class="col-sm">
                            <label for="notice_data">Notice Details :</label>
                                    <textarea name="notice_data"  class="form-control" id="notice_data" style="height: fit-content;width:100%;" maxlength="250"><?php echo $row['notice_data']?></textarea>



                            </div>
                            <div class="col-sm">
                            <label for="notice_date">Notice Date</label><input class="form-control" type="date" value="<?php echo $row['notice_date']?>" name="notice_date" id="notice_date" />

                            </div>
                            <div class="col-sm">
                            <label for="notice_end_date">Notice End Date</label><input class="form-control" type="date" value="<?php echo $row['notice_end_date']?>" name="notice_end_date" id="notice_end_date" />

                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row custom-control custom-checkbox">
                            <div class="col-sm">

                                        <div class="row pt-3">
                                            <div class="col-sm">
                                            <label for="notice_gen">Notice Gen</label> : <input class="custom-control-input" type="checkbox" name="notice_gen" id="notice_gen" <?php if($row['notice_gen']=="true"){ echo "checked"; } ?> />
                                            </div>
                                            <div class="col-sm">
                                            <label for="notice_emp">Notice Emp</label> : <input class="custom-control-input" type="checkbox" name="notice_emp" id="notice_emp" <?php if($row['notice_emp']=="true"){ echo "checked"; }?> />

                                            </div>
                                            <div class="col-sm">
                                            <label for="notice_std">Notice Std</label> : <input class="custom-control-input" type="checkbox" name="notice_std" id="notice_std" <?php if($row['notice_std']=="true"){ echo "checked"; } ?> />

                                                        </div>
                                        </div>


                         

                            </div>
                            <div class="col-sm">
                            <label for="notice_type">Notice Type</label>
                                            <select  class="form-control" required name="notice_type" id="notice_type">
                                            <option value="<?php echo $row['notice_type']?>" class="bg-warning text-dark" selected><?php echo $row['notice_type']?></option>

                                                <option value="">Select Notice type</option>
                                                <option value="ACADEMICS">ACADEMICS</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="FEE">FEE</option>
                                                <option value="EXAM">EXAM</option>
                                                <option value="OTHER">OTHER</option>
                                            </select>
                            
                            </div>
                        </div>
                      </div>
                      <input type="text" name="id" value="<?php echo $row['id']?>" hidden>
                      <center>
                      <button type="submit" class="btn btn-warning text-dark" >Update Notice</button> </center>
                </form>
    
    <?php
    }
}else{
    echo"error in processing".mysqli_errno($conn);
}
?>
<?php include'footer.php';?>