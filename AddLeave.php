<?php include'header.php';?>
<title>Add Leave | <?php echo $theader?></title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<center>
    <h1 class="text-muted lead"><span class="text-danger"> Please Note that On Applying for Leave is not Considered as Leave Approved !!!</span></h1></center>
<form action="" method="post">
    
<?php
    $route_result = $conn->query('select * from kyt where status="ACTIVE"');
    ?>
                                    <div class="row">
                                        <div class="col-sm"><label for="">Employee Name :</label>  <select name="teacher_name" class="form-control" id="user-list">
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
            <div class="col-sm"> <label for="">Employee ID :</label>
                                                    <select name="teacher_id" class="form-control" id="empid"></select>
                                       </div>
    <div class="col-sm"><label for="leave_date">Leave Date</label><input class="form-control"type="date" name="leave_date" id="leave_date" /></div>
</div>




<div class="row">
    <div class="col-sm"><label for="leave_end_date">Leave End Date</label><input class="form-control"type="date" name="leave_end_date" id="leave_end_date" /></div>
    <div class="col-sm"><label for="leave_reason">Leave Reason</label>
    <textarea name="leave_reason" id=""  class="form-control"></textarea>
    </div>
    <div class="col-sm" hidden><label for="leave_reason">Login</label><input class="form-control"type="text" name="login"  />
</div>
</div>
<script>
        $('#user-list').on('change', function() {
            var user_id = this.value;
            console.log(user_id);
            $.ajax({
                type: "POST",
                url: "getid",
                data: 'user_id=' + user_id,
                success: function(result) {
                    document.getElementById("empid").innerHTML = result;
                    console.log(result);
                }
            });
        });
    </script>
    <br><br>

    <center><button type="submit" name="adl" class="btn btn-danger">submit</button></center>
</form>

<?php 
        if (isset($_POST['adl'])) {
            ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
            $teacher_name = $_POST['teacher_name'];
            $teacher_id = $_POST['teacher_id'];
            $leave_date = $_POST['leave_date'];
            $leave_end_date = $_POST['leave_end_date'];
            $leave_reason = $_POST['leave_reason'];
            $login = $_POST['login'];
            //validate

            
            if (empty($teacher_name) || empty($teacher_id) || empty($leave_date) || empty($leave_end_date) || empty($leave_reason)) {
                ?>
               
                <script>
                    Swal.fire(
'Error',
'Please Fill All the Fields',
'error'
)


                </script>
                
<?php
            }else{
                //INSERT
                $query = " INSERT INTO leave_application ( teacher_name, teacher_id, leave_date, leave_end_date, leave_reason )  VALUES ( '$teacher_name', '$teacher_id', '$leave_date', '$leave_end_date', '$leave_reason') ";
                $result = mysqli_query($conn,$query);

                if ($result) {
                    ?>
                    
                    <script>
                        Swal.fire(
    'success',
    '<?php echo $teacher_name." Leave Application Submitted Successfully"?>',
    'success'
    )
                    </script>
    <?php
                } else {
                    ?>
                 
                    <script>
                        Swal.fire(
    'Error',
    '<?php echo $teacher_name." Leave Application Failed to Submit! Contact Technical Team"?>',
    'error'
    )
                    </script>
    <?php
                }
            }
        }


?>


<?php include'footer.php';?>
