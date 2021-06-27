<?php include 'header.php'; ?>
<title>Transport Fee Enrollment | <?php echo $theader;?></title>

<center>
    <form action="" method="post">
        <label for="">Enrollment No </label>
        <input  list="eid" name="studentid" style="width: min-content;" id="" autocomplete="off" placeholder="STARK2021**" class="form-control">
        <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment where status='APPROVED'");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['studentid']; ?>"> <?php echo $row['student_name']; ?></option>

            <?php
            } ?>
        </datalist>
        <br><br><button type="submit" name="get_info" class="btn btn-danger btn-lg">GET INFO</button>
    </form>

    <?php

    if (isset($_POST['get_info'])) {
        $id = $_POST['studentid'];
        if (empty($id)) {
            echo "<script>alert('Please Provide an Valid Input')</script>";
        } else {

            $sql = "SELECT *FROM student_enrollment where status='APPROVED' and enrollment ='$id' or studentid ='$id'";
            $ask = mysqli_query($conn, $sql);
            if (mysqli_num_rows($ask) > 0) {
                while ($row = mysqli_fetch_assoc($ask)) { ?>
                    <br><br>
                    <form action="UpdateTransportEnrollment" method="post">

                        <div class="row">
                            <div class="col-sm">
                            <label for="">Student Name: </label>
                                <input type="text" readonly name="student_name" value="<?php echo $row['student_name']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-sm">
                            <label for="">Class:</label>
                                <input type="text" readonly name="class" value="<?php echo $row['present_class']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-sm">
                            <label for="">Student ID:</label>
                                <input type="text" readonly name="student_id" value="<?php echo $row['studentid']; ?>" id="" class="form-control">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <?php
                                // Include the database config file 


                                // Fetch all the country data 
                                $query = "SELECT * FROM transport_bus ";
                                $result = $conn->query($query);
                                ?>
                                <label for="">Route No:</label>
                              <select id="country" name="route_no" class="form-control">
                                    <option value="">Select Route</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['route_no'] . '">' . $row['route_no'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Route not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm">
                            <label for="">Stages :</label>
                                <select id="state" name="stage" class="form-control">
                                    <option value="">Select Route first</option>
                                </select>

                            </div>
                            <div class="col-sm">
                            <label for="">Stage Fare:</label>
                                <select id="city" name="stage_fare" class="form-control">
                                    <option value="">Select Stage  first</option>
                                </select>
                            </div>
                        </div>

                        <br><br>
                        <center><button type="submit" class="btn btn-warning">Enroll</button></center>

                        <script>
                            $(document).ready(function() {
                                $('#country').on('change', function() {
                                    var countryID = $(this).val();
                                    if (countryID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'ajaxData.php',
                                            data: 'country_id=' + countryID,
                                            success: function(html) {
                                                $('#state').html(html);
                                                $('#city').html('<option value="">Select Stage first</option>');
                                            }
                                        });
                                    } else {
                                        $('#state').html('<option value="">Select Route No. first</option>');
                                        $('#city').html('<option value="">Select Stage first</option>');
                                    }
                                });

                                $('#state').on('change', function() {
                                    var stateID = $(this).val();
                                    if (stateID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'ajaxData.php',
                                            data: 'state_id=' + stateID,
                                            success: function(html) {
                                                $('#city').html(html);
                                            }
                                        });
                                    } else {
                                        $('#city').html('<option value="">Select Stage first</option>');
                                    }
                                });
                            });
                        </script>
                    </form>

        <?php }
            } else {
                echo "<script>alert('No student Found for $id ')</script>";
            }
        }
    }


        ?>


</center>


<?php include 'footer.php'; ?>