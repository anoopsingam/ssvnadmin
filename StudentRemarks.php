<?php include 'header.php';   if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") {?>
<title>Student Remarks | <?php echo $theader;?></title>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h3 class="display-4 text-center text-muted">STUDENT REMARKS <br>
            <p class="lead text-lg-center text-danger">Search Student </p>
        </h3>

        <form method="post" action="" enctype="multipart/form-data">
            <p class="lead">
                <center>
                    <input  list="eid" name="studentid" placeholder="Student Id/ Enrollment No." autocomplete="off" style="width: min-content;margin-bottom:10px;" id="" class="form-control">
                    <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment  order by studentid asc");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['enrollment']; ?>"> <?php echo $row['student_name']; ?></option>

            <?php
            } ?>
        </datalist> 
                    <button type="submit" name="submit" class="btn btn-outline-danger">Get Info</button>
                </center>
            </p>
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $enrollment = trim($_POST['studentid']);
    if (empty($enrollment)) {
        ?>
        <script>
            alert("Please Input a value to search");
        </script>
        <?php
    } else {
        $sql = "SELECT *FROM student_enrollment where enrollment ='$enrollment' or studentid ='$enrollment'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                                    <form action="UploadRemarks" method="post">
                                    <legend class="legend bg-success  text-white text-center">Student Info</legend>
                                    <div class="row">
                                        <div class="col-sm"> <label for="">Student Name: </label><input readonly type="text" name="student_name" value="<?php echo $row['student_name']; ?>" id="" class="form-control"> </div>
                                        <div class="col-sm"> <label for="">Student ID: </label><input readonly type="text" name="studentid" value="<?php echo $row['studentid']; ?>" id="" class="form-control">  </div>
                                        <div class="col-sm"> <label for="">Class :</label><input readonly type="text" name="class" value="<?php echo $row['present_class']; ?>" id="" class="form-control"></div>
                                    </div>

                                    <div style="padding-top: 15px;margin-top:12px;" class="row">
                                        <div class="col-sm"> <label for="">Admission Class: </label><input type="text" readonly name="admission_class" value="<?php echo $row['admissionclass']; ?>" id="" class="form-control"></div>
                                        <div class="col-sm"> <label for=""> Father Name: </label><input type="text" readonly name="father_name" value="<?php echo $row['father_name']; ?>" id="" class="form-control"></div>
                                        <div class="col-sm"> <label for="">Permanent Address: </label><textarea type="text" readonly name="address"  rows="5 " cols="30" id="" class="form-control" style="height: max-content;"><?php echo $row['permanentaddress']; ?> </textarea> </div>
                                    </div>
                                    
                                    <div style="padding-top: 15px;margin-top:12px;" class="row">
                                    <div class="col-sm"> <label for="">Sister/Brother(1): </label><input type="text" readonly name="" value="<?php echo $row['syb1']; ?>" id="" class="form-control"> </div>
                                    <div class="col-sm"> <label for="">Sister/Brother Relation(1): </label><input type="text" readonly name="" value="<?php echo $row['sybgen1']; ?>" id="" class="form-control"></div>
                                    <div class="col-sm"> <label for="">Sister/Brother Class(1): </label><input type="text" readonly name="" value="<?php echo $row['sybclass1']; ?>" id="" class="form-control"></div>
                                    <div class="col-sm"> <label for="">Sister/Brother Place(1): </label><input type="text" readonly name="" value="<?php echo $row['sybplace1']; ?>" id="" class="form-control"></div>
                                            
                                    </div>
                                    
                                    <div style="padding-top: 15px;margin-top:12px;" class="row">
                                    <div class="col-sm"> <label for="">Sister/Brother(2): </label><input type="text" readonly name="" value="<?php echo $row['syb2']; ?>" id="" class="form-control"> </div>
                                    <div class="col-sm"> <label for="">Sister/Brother Relation(2): </label><input type="text" readonly name="" value="<?php echo $row['sybgen2']; ?>" id="" class="form-control"></div>
                                    <div class="col-sm"> <label for="">Sister/Brother Class(2): </label><input type="text" readonly name="" value="<?php echo $row['sybclass2']; ?>" id="" class="form-control"></div>
                                    <div class="col-sm"> <label for="">Sister/Brother Place(2): </label><input type="text" readonly name="" value="<?php echo $row['sybplace2']; ?>" id="" class="form-control"></div>
                                            
                                    </div>

                                            <div class="row"  style="padding-top: 15px;margin-top:12px;">
                                            <label for="" class="h2">Remarks for Student :</label>
                                                <div class="col"><textarea name="remarks" id="" cols="30" rows="50" style="height: 250px;" class="form-control bg-dark text-white" placeholder="Please Note the Remarks Here"> <?php echo $row['remarks']; ?></textarea></div>
                                            </div>
                                            <center  style="padding-top: 15px;margin-top:12px;"><button type="submit" class="btn btn-warning ">Submit</button></center>
                                    </form>

                    <?php
            }
        } else {
            ?>  <script>
            alert("No data found for Input Enrollment No./Student Id ");
        </script>
<?php
        }
    }
}


?>
<?php } include 'footer.php'; ?>