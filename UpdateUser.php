<?php include'header.php';?>
<title>Update User | Stark Tech</title>
<?php $dcry = my_simple_crypt( $_GET['id'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM users WHERE id='$dcry'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>
                    <form action="UserUpdate" method="post" class="form-group">
                            
                            <center>
                                <legend>
                                    <h3 class="h3  badge bg-primary "> Update User Portal</h3>
                                    <br><div class="text-warning bg-dark w-50 m-md-3" style="border-radius: 10px;"> <small  ><strong>Note !</strong> Before Updating the Details Please Create a New Password </small></div>
                                </legend>
                            </center>

                                    <div class="row">
                                        <div class="col-sm"><label for="">Username :</label> <input type="text" autocomplete="false" value="<?php echo $row['username']?>" name="username" id="" class="form-control"></div>
                                        <div class="col-sm"><label for="">Password/Mobile No : </label> <input type="text" autocomplete="false" placeholder="Please Create New Password" name="password" id="" class="form-control bg-light text-dark" required></div>
                                        <div class="col-sm"> <label for="">Email ID :</label><input type="text" autocomplete="false" value="<?php echo $row['emailid']?>" name="emailid" id="" class="form-control"></div>
                                    </div>
                                    <div class="row pt-3">
                                    <div class="col">
                                    <label for="" class="">Token ID No:</label>
                                    <input type="text" name="id" value="<?php echo $_GET['id']?>" readonly id="" class="form-control readonly "></div>
                                        <div class="col-sm align-content-center">
                                        
                                        <label for="" class="">User Type :</label>
                                        <select autocomplete="false" name="user_type" id="" class="form-control">
                                        <option class="bg-warning" value="<?php echo $row['user_type']?>" selected> <?php echo $row['user_type']?></option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="STAFF">STAFF</option>
                                        <option value="TEACHER">TEACHER</option>
                                        </select>
                                        
                                        </div>
                                     <div class="col"></div>
                                       
                                    </div><br><br>
                                    <center>
                                                <button class="btn btn-warning" type="submit" name="add_user">Update User</button>
                                    
                                    </center>
                    
                    </form>

                    <?php
    }
}else{
    echo"error in processing".mysqli_errno($conn);
}
?>
<?php include'footer.php';?>