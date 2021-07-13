<?php include'header.php';  if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){?>
<title>Add Users | <?php echo $theader;?></title>

                    <form action="UserUpload" method="post" class="form-group">
                            
                            <center>
                                <legend>
                                    <h3 class="h3 text-muted"> ADD USERS </h3>
                                </legend>
                            </center>
                            <?php
    $route_result = $conn->query('select * from kyt where status="ACTIVE"');
    ?>
                                    <div class="row">
                                        <div class="col-sm"><label for="">Username :</label>  <select name="username" class="form-control" id="user-list">
                <option value="">Select Employee</option>
                <?php
                if ($route_result->num_rows > 0) {
                    // output data of each row
                    while ($row = $route_result->fetch_assoc()) {
                ?>
                        <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                <?php
                    }
                }
                ?>
            </select></div>
                                        <div class="col-sm"><label for="">Password/Mobile No : </label> <input type="text" autocomplete="false" name="password" id="" class="form-control" ></div>
                                        <div class="col-sm"> <label for="">Email ID :</label>
                                                    <select name="emailid" class="form-control" id="emailid"></select>
                                       </div>
                                    </div>
                                    <div class="row pt-3">
                                    \
                                        <div class="col-sm >
                                        
                                        <label for="" class="">User Type :</label>
                                        <select autocomplete="false" required name="user_type" id="" class="form-control">
                                        <?php  if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                        <option value="ADMIN">ADMIN</option>
                                        <?php }?>
                                        <option value="STAFF">STAFF</option>
                                        <option value="TEACHER">TEACHER</option>
                                        </select>
                                        
                                        </div>

                                    <br>
                                    <center>
                                                <button class="btn btn-danger" type="submit" name="add_user">Add User</button>
                                    
                                    </center>
                                    

    <script>
        $('#user-list').on('change', function() {
            var user_id = this.value;
            console.log(user_id);
            $.ajax({
                type: "POST",
                url: "getmail",
                data: 'user_id=' + user_id,
                success: function(result) {
                    document.getElementById("emailid").innerHTML = result;
                    console.log(result);
                }
            });
        });
    </script>
                    
                    </form>
                                                
<?php } include'footer.php'; ?>