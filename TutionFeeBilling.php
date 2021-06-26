<?php include 'header.php'; ?>
<title>Tution Billing | Stark Tech</title>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker();
        $("#format").on("change", function() {
            $("#datepicker").datepicker("option", "dateFormat", $(this).val());
        });
    });
</script>
<center>
    <form action="" method="post">
        <label for="">Enrollment No/Student ID</label>
        <input type="text" name="studentid" style="width: min-content;" id="" placeholder="SSSVN2021**" class="form-control">
        <br><br><button type="submit" name="get_info" class="btn btn-danger btn-lg">GET INFO</button>
    </form>

    <?php

    if (isset($_POST['get_info'])) {
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
                    $year = date("Y");
                    $ay = $year . "-" . ($year + 1);
                    if ($row['adm_cat'] == "RTE") {
                        $rti = $row['adm_cat'];
                        $name = $row['student_name'];
            ?>
                        <script>
                            alert("<?php echo "Tution Fee for cant be Billed for $name $rti Candidate..!!"; ?>")
                            window.location.assign("index")
                        </script>
                    <?php

                    } else {
                    ?>
                        <form action="payment" method="post" class="form-group" style="padding-top:60px;">
                            <center>
                                <h6>Academic Year: <input style="background-color: inherit;border:none;" type="text" name="academic_year" readonly value="<?php echo $row['academic_year']; ?>" id=""></h6>
                            </center>
                            <br>
                            <center>
                                <h3 class="text-muted">TUITION FEE</h3>
                            </center>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <label for="student_name">Student Name</label><input readonly class="form-control" type="text" name="student_name" value="<?php echo $row['student_name'] ?>" id="student_name" />

                                </div>

                                <div class="col-sm">
                                    <label for="student_id">Student Id</label><input readonly class="form-control" type="text" name="student_id" value="<?php echo $row['studentid'] ?>" id="student_id" />

                                </div>
                                <div class="col-sm">
                                    <label for="installment">Installment</label>
                                    <input type="text" name="installment" value="<?php $id = $row['studentid'];
                                                                                    $sql = "select max(installment) as str from student_tution_fee where student_id = '$id' ";
                                                                                    $result = mysqli_query($conn, $sql);
                                                                                    $r = mysqli_fetch_array($result);
                                                                                    $str = $r['str'];
                                                                                    if ($str == "") {
                                                                                        echo "INSTALMENT-1";
                                                                                    } else {
                                                                                        echo ++$str;
                                                                                    }

                                                                                    ?>" readonly id="" class="form-control">




                                </div>

                                <div class="row">
                                    <div class="col-sm"> <label for="login_id">Class</label><input readonly class="form-control" type="text" name="present_class" value="<?php echo $row['present_class']; ?>" id="login_id" /></div>
                                    <div class="col-sm"> <label for="login_id">Section </label><input readonly class="form-control" type="text" name="present_section" value="<?php echo $row['present_section']; ?>" id="login_id" /></div>
                                    <div class="col-sm"><label for="billing_date">Billing Date</label><input class="form-control" readonly type="text" value="<?php echo date("d-m-Y"); ?>" name="billing_date" id="billing_date" /></div>



                                </div>
                                <div class="row">

                                    <div class="col-sm">
                                        <label for="paid_amount"> Tuition Fee</label><input value="<?php

                                                                                                    $class = $row['present_class'];

                                                                                                    $sql = "select fee as str from tution_fee where class='$class' and academic_year='$ay' ";
                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                    $rts = mysqli_fetch_array($result);
                                                                                                    $strts = $rts['str'];
                                                                                                    echo $strts; ?>" readonly class="form-control" type="text" name="tution_fee" />

                                    </div>

                                    <div class="col-sm"><label for="">Total Fee Paid</label><input readonly type="text" name="past_tution_fee" class="form-control" value="<?php $fee = "SELECT SUM(paying_fee) as fee from student_tution_fee where student_id='$id'";
                                                                                                                                                            $as = mysqli_query($conn, $fee);
                                                                                                                                                            $rsbal = mysqli_fetch_assoc($as);
                                                                                                                                                            echo $rsbal['fee'];
                                                                                                                                                            ?>" id=""> </div>
                                   <div class="col-sm"><label for="">Total Discounts (Tuition)</label><input readonly type="text" name="" class="form-control" value="<?php $fee = "SELECT SUM(discount) as dis from student_tution_fee where student_id='$id'";
                                                                                                                                                                                                                                                                                    $dis = mysqli_query($conn, $fee);
                                                                                                                                                                                                                                                                                    $rdis = mysqli_fetch_assoc($dis);
                                                                                                                                                                                                                                                                                    echo $rdis['dis'];
                                                                                                                                                                                                                                                                                    ?>" id=""> </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm">

                                        <label for="bill_no">Present Balance Amount :</label><input value="<?php
                                                                                                        $sql = "select balance_amount as bal from student_tution_fee where student_id='$id'order by created_on DESC limit 1 ";
                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                        $rbal = mysqli_fetch_array($result);
                                                                                                        $strbal = $rbal['bal'];
                                                                                                        echo $strbal; ?>" readonly class="form-control" type="text" readonly id="bill_no" />
                                    </div>

                                    <div class="col-sm">
                                        <label for="paid_amount"> Fee to be Paid: </label><input value="<?php

                                                                                                        $id = $row['studentid'];
                                                                                                        $sql = "SELECT balance_amount from student_tution_fee where student_id='$id' order by id desc LIMIT 1 ";
                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                        $r = mysqli_fetch_array($result);
                                                                                                        $str = $r['balance_amount'];
                                                                                                        echo $str; ?>" <?php if ($str == "0") {
                                                                                                                            echo "readonly";
                                                                                                                        } ?> class="form-control" type="text" name="paying_fee" onkeyup="myFunction()" id="paid_amount" />

                                    </div>
                                    <div class="col-sm">
                                        <label for="balance_amount">Balance Amount</label><input class="form-control" readonly type="text" name="balance_amount" id="balance_amount" />


                                    </div>
                                </div>

                                <div class="row">
                                    <script>
                                        function myFunction() {
                                            var x = document.getElementById("paid_amount").value;
                                            document.getElementById("balance_amount").value = (<?php if ($strbal == "") {
                                                                                                    echo  $strts;
                                                                                                } else {
                                                                                                    echo $strbal;
                                                                                                } ?> - x);
                                        }
                                    </script>

                                    <div class="col-sm">
                                        <label for="login_id" hidden>Login Id</label><input hidden readonly class="form-control" type="text" name="login_id" value="<?php echo $_SESSION['username'] ?>" id="login_id" />

                                        <?php
                                        if ($_SESSION['username'] == "administrator" ||$_SESSION['username'] == "principal") { ?>
                                            <label for="">Discount</label>
                                            <input type="text" name="discount" value="0" id="" class="form-control">
                                        <?php }

                                        ?>

                                    </div>
                                    <div class="col-sm">
                                        <label for="due_date">Due Date</label><input class="form-control" dateformat="dd-MMM-yyyy" type="date" name="due_date" required id="due_date" />



                                    </div>
                                   
                                </div>

                            </div>
<!-- -------------------------------------------------------------------------------------------------------------------------------- -->
                                                    <div class="main">
                                                    
                                                    
                                                    <br>
                                                    <br>
                                                    <center>
                                    <h3 class="text-muted">UBS FEE</h3>
                                </center>
                                <br>

                                <div class="row">
                                    <div class="col-sm">
                                        <label for=" "> UBS FEE</label>
                                        <input value="<?php


                                                        $sql4 = "select ubs_fee as ufee from ubs_fee where ubs_class='$class' and academic_year='$ay' ";
                                                        $ubsresult = mysqli_query($conn, $sql4);
                                                        $ubsfee = mysqli_fetch_array($ubsresult);
                                                        $ubs = $ubsfee['ufee'];
                                                        echo $ubs; ?>" readonly class="form-control" type="text" name="ubs_fee" id="" />

                                    </div>
                                    <div class="col-sm"><label for="">Total UBS Fee Paid</label><input readonly type="text" name="past_ubs_fee" class="form-control" value="<?php $ufee = "SELECT SUM(ubs_fee_paying) as ubsfee from student_tution_fee where student_id='$id'";
                                                                                                                                                                        $ubf = mysqli_query($conn, $ufee);
                                                                                                                                                                        $ubbal = mysqli_fetch_assoc($ubf);
                                                                                                                                                                        echo $ubbal['ubsfee'];
                                                                                                                                                                        ?>" id=""> </div>
                                    <div class="col-sm">

                                        <label for="bill_no">Present UBS Balance Amount :</label><input value="<?php
                                                                                                                    $usql = "select ubs_fee_balance as ubal from student_tution_fee where student_id='$id'order by created_on DESC limit 1 ";
                                                                                                                    $uresult = mysqli_query($conn, $usql);
                                                                                                                    $ubal = mysqli_fetch_array($uresult);
                                                                                                                    $ubsbal = $ubal['ubal'];
                                                                                                                    echo $ubsbal; ?>" readonly class="form-control" type="text" readonly id="bill_no" />
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <?php
                                        if ($_SESSION['username'] == "administrator" ||$_SESSION['username'] == "principal") { ?>
                                            <label for="">UBS Discount</label>
                                            <input type="text" name="ubs_discount" value="0" id="" class="form-control">
                                        <?php }

                                        ?>
                                    </div>
                                    <div class="col-sm">
                                        <label for="">UBS Fee Paying</label><input value="<?php  if (empty($ubsbal)) { echo 0; } ?>" onkeyup="UbsBal()" <?php if ($ubsbal == "0") {
                                                                                                                                            echo "readonly";
                                                                                                                                        } ?> class="form-control" type="text" name="ubs_fee_paying" id="ubs_fee_paying" />

                                    </div>
                                    <div class="col-sm">
                                        <label for="">UBS Balance Amount</label><input class="form-control" type="text" name="ubs_fee_balance" readonly id="ubs_fee_balance" />

                                        <script>
                                            function UbsBal() {
                                                var x = document.getElementById("ubs_fee_paying").value;
                                                document.getElementById("ubs_fee_balance").value = (<?php if ($ubsbal == "") {
                                                                                                                echo  $ubs;
                                                                                                            } else {
                                                                                                                echo $ubsbal;
                                                                                                            } ?> - x);
                                            }
                                        </script>
                                    </div>
                                </div>
                                                    </div>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <?php
                            $sql = "SELECT * from student_enrollment where studentid='$id' ";
                            $result = mysqli_query($conn, $sql);
                            $r = mysqli_fetch_array($result);
                            $str = $r['transport_opted'];

                            $route =  $r['transport_route_stage'];

                            $var=explode(",",$route);
                            $route_id=$var['0'];
                            $fare=$var[1];

                            if ($str == "1") { ?>
                                <br>
                                <center>
                                    <h3 class="text-muted">TRANSPORTATION FEE </h3><br><h5>[ <?php echo "Route No :-$route_id :: Stage :- $fare";?>]</h5>
                                </center>
                                <br>

                                <div class="row">
                                    <div class="col-sm">
                                        <label for=" "> TRANSPORT FEE</label>
                                        <input value="<?php


                                                        $sql = "select transport_fee as tfee from student_enrollment where studentid='$id' ";
                                                        $result = mysqli_query($conn, $sql);
                                                        $trsfee = mysqli_fetch_array($result);
                                                        $trs = $trsfee['tfee'];
                                                        echo $trs; ?>" readonly class="form-control" type="text" name="transport_fee" id="" />

                                    </div>
                                    <div class="col-sm"><label for="">Total Transport Fee Paid</label><input readonly type="text" name="past_transport_fee" class="form-control" value="<?php $fee = "SELECT SUM(transport_fee_paying) as fee from student_tution_fee where student_id='$id'";
                                                                                                                                                                        $as = mysqli_query($conn, $fee);
                                                                                                                                                                        $rsbal = mysqli_fetch_assoc($as);
                                                                                                                                                                        echo $rsbal['fee'];
                                                                                                                                                                        ?>" id=""> </div>
                                    <div class="col-sm">

                                        <label for="bill_no">Present Transport Balance Amount :</label><input value="<?php
                                                                                                                    $sql = "select transport_fee_balance as tbal from student_tution_fee where student_id='$id' order by created_on DESC limit 1 ";
                                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                                    $tbal = mysqli_fetch_array($result);
                                                                                                                    $trsbal = $tbal['tbal'];
                                                                                                                    echo $trsbal; ?>" readonly class="form-control" type="text" readonly id="bill_no" />
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <?php
                                        if ($_SESSION['username'] == "administrator" ||$_SESSION['username'] == "principal") { ?>
                                            <label for="">Transport Discount</label>
                                            <input type="text" name="transport_discount" value="0" id="" class="form-control">
                                        <?php }

                                        ?>
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Transport Fee Paying</label><input value="<?php

                                                                                                $id = $row['studentid'];
                                                                                                $sql = "SELECT transport_fee_balance from student_tution_fee where student_id='$id' order by id desc LIMIT 1 ";
                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                $r = mysqli_fetch_array($result);
                                                                                                $str = $r['transport_fee_balance'];
                                                                                                echo $str;
                                                                                                
                                                                                               
                                                                                                
                                                                                                ?>" onkeyup="TransportBal()"  class="form-control" type="text" name="transport_fee_paying" id="transport_fee_paying" />

                                    </div>
                                    <div class="col-sm">
                                        <label for="">Transport Balance Amount</label><input class="form-control" type="text" name="transport_fee_balance" readonly id="transport_fee_balance" />

                                        <script>
                                            function TransportBal() {
                                                var x = document.getElementById("transport_fee_paying").value;
                                                document.getElementById("transport_fee_balance").value = (<?php if ($trsbal == "") {
                                                                                                                echo  $trs;
                                                                                                            } else {
                                                                                                                echo $trsbal;
                                                                                                            } ?> - x);
                                            }
                                        </script>
                                    </div>
                                </div>



                            <?php }


                            ?>

                            <br><br><br>
                            <center> <button type="submit" class="btn btn-success">Submit</button>
                            </center>
                        </form>

                <?php
                    }
                }
            } else {
                ?> <marquee behavior="scroll" direction="left">No Data Found for <?php echo $enrollment; ?></marquee>
    <?php }
        }
    }


    ?>
    <?php include 'footer.php'; ?>
</center>