<?php include'header.php';  if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){?>
<title>Add Users | Stark Tech</title>

                    <form action="UserUpload" method="post" class="form-group">
                            
                            <center>
                                <legend>
                                    <h3 class="h3 text-muted"> ADD USERS </h3>
                                </legend>
                            </center>

                                    <div class="row">
                                        <div class="col-sm"><label for="">Username :</label> <input type="text" autocomplete="false" name="username" id="" class="form-control"></div>
                                        <div class="col-sm"><label for="">Password/Mobile No : </label> <input type="text" autocomplete="false" name="password" id="" class="form-control"></div>
                                        <div class="col-sm"> <label for="">Email ID :</label><input type="text" autocomplete="false" name="emailid" id="" class="form-control"></div>
                                    </div>
                                    <div class="row pt-3">
                                    <div class="col"></div>
                                        <div class="col-sm align-content-center">
                                        
                                        <label for="" class="">User Type :</label>
                                        <select autocomplete="false" name="user_type" id="" class="form-control">
                                        <?php  if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                        <option value="ADMIN">ADMIN</option>
                                        <?php }?>
                                        <option value="STAFF">STAFF</option>
                                        <option value="TEACHER">TEACHER</option>
                                        </select>
                                        
                                        </div>
                                     <div class="col"></div>
                                       
                                    </div><br><br>
                                    <center>
                                                <button class="btn btn-danger" type="submit" name="add_user">Add User</button>
                                    
                                    </center>
                    
                    </form>

<?php } include'footer.php'; ?>