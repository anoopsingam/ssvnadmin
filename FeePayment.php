
<?php include 'header.php'; ?>
<title>Fee Payment | <?php echo $theader;?></title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/kt-2.6.2/datatables.min.css"/>
 
<style>
    a{
        text-decoration: none;
    }
      #blink {
        font-size: 15px;
        font-weight: bold;
        
        color: #dc3545;
        transition: 1s;
      }
</style>
<center>

    <form action="" method="post">
        <legend>Fee Payment</legend>
        <label for="">Enrollment No/ Student ID : </label>
        <input name="eid" list="eid" style="width: min-content;" autocomplete="off" class="form-control" id="eids">
        <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment where status='APPROVED' order by studentid asc");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['studentid']; ?>"> <?php echo $row['student_name']; ?></option>

            <?php
            } ?>
        </datalist> 
        
        <label class="m-2 p-25">Academic Year: <select name="ay" class="form-control" required style="width: min-content;" id="">

        <option value="2021-2022" selected >2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option>  
 <option value="2025-2026">2025-2026</option>  
        </select></label>
        
         <br> <button type="submit" class="btn btn-outline-primary" name="get_id">Get Data</button><br><br>
    </form>
    <?php
    if (isset($_POST['get_id'])) {

        $year = date("Y");
        $ay = $_POST['ay'];
        $id = $_POST['eid'];
        $fetch = mysqli_query($conn, "SELECT * FROM student_enrollment where status='APPROVED' and studentid='$id' or enrollment='$id'" );
        $data = mysqli_fetch_array($fetch);

        $class = $data['present_class'];


        $tuition_fee = mysqli_query($conn, "SELECT * FROM tution_fee where class='$class' and academic_year='$ay'");
        $tutitionfee = mysqli_fetch_array($tuition_fee);


        $ubs_fee = mysqli_query($conn, "SELECT * FROM ubs_fee where ubs_class='$class' and academic_year='$ay'");
        $ubsfee = mysqli_fetch_array($ubs_fee);


        $previous_transactions = mysqli_query($conn, "SELECT * FROM student_tution_fee where student_id='$id' and academic_year='$ay' order by created_on desc");
        
        $balancefetch = mysqli_query($conn, "SELECT * FROM balance_fee where student_id='$id' and academic_year='$ay' ");
                          $balance=mysqli_fetch_array($balancefetch);
       


            
    ?>

   <form action="PayFee" method="post">
   
   <div class="row">
                    <br>
                    <p id="blink"><strong>Please Note:</strong> <em>If Transport facility is Opted By <?php echo $data['student_name'] ?> Please make sure to enroll <?php echo $data['student_name'] ?> First to Transport Stage before Paying his/her Fee. <br> <span class="text-primary">Once the Fee Paid for Instalment, In Between <?php echo $data['student_name'] ?>'s Enrolment for Transport is not Validated</span> </em></p>
                    <br>
            <h4>STUDENT DETAILS</h4>
            <div class="col-sm">
                <label for="student_name">Student Name</label><input readonly class="form-control" type="text" name="student_name" value="<?php echo $data['student_name'] ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  ID">Student ID</label><input readonly class="form-control" type="text" name="student_id" value="<?php echo $data['studentid'] ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  Class">Present Class</label><input readonly class="form-control" type="text" name="present_class" value="<?php echo $class ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  Section">Present Section</label><input readonly class="form-control" type="text" name="present_section" value="<?php echo $data['present_section'] ?>" id="" />
            </div>
             <div class="col-sm">
                <label for="Admission Type">Admission Type:</label><input readonly class="form-control" type="text" name="#" value="<?php echo $data['adm_cat'] ?>" id="" />
            </div>
        </div> <br>
        <div class="row">
            <h4>FEE DETAILS</h4>
            <div class="col-sm">
                <label for="student_name">TUITION FEE</label><input readonly class="form-control" type="text" name="tution_fee" value="<?php echo $tutitionfee['fee'] ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  ID">UBS FEE</label><input readonly class="form-control" type="text" name="ubs_fee" value="<?php echo $ubsfee['ubs_fee'] ?>" id="" />
            </div>
            <?php if ($data['transport_opted'] == "1") { ?>

                <div class="col-sm">
                    <label for="Student  Class">TRANSPORT FEE </label><input readonly class="form-control" type="text" name="transport_fee" value="<?php echo $data['transport_fee'] ?>" id="" />
                </div>
                <div class="col-sm">
                    ROUTE NO & STAGE :- <br>
                    <h4><?php echo $data['transport_route_stage'] ?></h4>
                </div>
            <?php } ?>
        </div>
        <br>
        <div class="row">
            <h4> TOTAL FEE PAID TILL DATE</h4>
            <div class="col-sm">
                <label for="student_name">TUITION FEE</label><input readonly class="form-control" type="text" name="past_tution"  value="<?php echo $balance['tution_fee_paid']; ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  ID">UBS FEE</label><input readonly class="form-control" type="text" name="past_ubs"  value="<?php echo $balance['ubs_fee_paid']; ?>" id="" />
            </div>
            <?php if ($data['transport_opted'] == "1") { ?>

                <div class="col-sm">
                    <label for="Student  Class">TRANSPORT FEE </label><input readonly class="form-control" type="text" name="past_transport" value="<?php echo  $balance['transport_fee_paid']; ?>" id="" />
                </div>
            <?php } ?>
            <div class="col-sm">
                                    <label for="installment">INSTALMENT</label>
                                    <input type="text" name="installment" value="<?php 
                                                                                    $sql = "select max(installment) as str from student_tution_fee where student_id = '$id' and academic_year='$ay' ";
                                                                                    $result = mysqli_query($conn, $sql);
                                                                                    $r = mysqli_fetch_array($result);
                                                                                    $str = $r['str'];
                                                                                    if ($str == "") {
                                                                                        echo "INSTALLMENT-1";
                                                                                    } else {
                                                                                        echo ++$str;
                                                                                    }

                                                                                    ?>" readonly id="" class="form-control">




                                </div>
        </div> <br>
        <div class="row">
            <h4> BALANCE FEE DETAILS</h4>
            <div class="col-sm">
                <label for="student_name">TUITION FEE</label><input readonly class="form-control" type="text"  value="<?php if(empty($balance['tution_balance_fee'])){echo 0;}else{ echo $balance['tution_balance_fee'];} ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  ID">UBS FEE</label><input readonly class="form-control" type="text"  value="<?php if(empty($balance['ubs_balance'])){echo 0;}else{echo $balance['ubs_balance'];} ?>" id="" />
            </div>
            <?php if ($data['transport_opted'] == "1") { ?>

                <div class="col-sm">
                    <label for="Student  Class">TRANSPORT FEE </label><input readonly class="form-control" type="text"  value="<?php if(empty($balance['transport_balance'])){echo 0;}else{echo  $balance['transport_balance'];} ?>" id="" />
                </div>
            <?php } ?>
        </div> <br>
        <div class="row">
            <h4> DISCOUNT FEE DETAILS</h4>
            <div class="col-sm">
                <label for="student_name">TUITION FEE</label><input readonly class="form-control" type="text" name="tution_dis" value="<?php if(empty($balance['tution_fee_discount'])){echo 0;}else{ echo $balance['tution_fee_discount'];} ?>" id="" />
            </div>
            <div class="col-sm">
                <label for="Student  ID">UBS FEE</label><input readonly class="form-control" type="text" name="ubs_dis"  value="<?php if(empty($balance['ubs_fee_discount'])){echo 0;}else{echo $balance['ubs_fee_discount'];} ?>" id="" />
            </div>
            <?php if ($data['transport_opted'] == "1") { ?>

                <div class="col-sm">
                    <label for="Student  Class">TRANSPORT FEE </label><input readonly class="form-control" type="text" name="transport_dis"  value="<?php if(empty($balance['transport_fee_discount'])){echo 0;}else{echo  $balance['transport_fee_discount'];} ?>" id="" />
                </div>
            <?php } ?>
        </div> <br>
        <label class="badge bg-dark text-light">
                <input type="checkbox"  class="form-check-glow form-check-input form-check-success" 
                    id="showtransactions"> Show Transactions</label>

                       <div class="fluid-container" id="transactions">
        <h4>Previous Transaction Details</h4>
        <div style="overflow: scroll;width:100%" >
        <table id="example" class="display" style="width:100%">
            <thead class="bg-warning text-dark">
                <th>Sl No</th>
                <th>Bill No</th>
                <th> Date of Payment</th>
                <th>Instalment</th>
                <th>Tuition Fee Paid</th>
                <th>Tuition Fee Balance</th>
                <th>Tuition Fee Discount</th>
                <th>UBS Fee Paid</th>
                <th>UBS Fee Balance</th>
                <th>UBS Fee Discount</th>
                <th>Transport Fee Paid</th>
                <th>Transport Fee Balance</th>
                <th>Transport Fee Discount</th>
                <th>Login</th>

            </thead>
            <tbody>
                <?php $i = 1;
                if (mysqli_num_rows($previous_transactions)>0) {
                    while ($transact = mysqli_fetch_array($previous_transactions)) {
                        ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><a href="#" onclick="window.open('PrintTutionBill?billno=<?php  echo my_simple_crypt( $transact['bill_no'], 'e' );?>','popup','width=750,height=750'); return false;" title=" Click To View Bill <?php echo $transact['bill_no']; ?>" ><?php echo $transact['bill_no']; ?></a></td>

                        <td><?php echo $transact['billing_date']; ?></td>
                        <td><?php echo $transact['installment']; ?></td>
                        <td><?php echo $transact['paying_fee']; ?></td>
                        <td><?php echo $transact['balance_amount']; ?></td>
                        <td><?php echo $transact['discount']; ?></td>
                        <td><?php echo $transact['ubs_fee_paying']; ?></td>
                        <td><?php echo $transact['ubs_fee_balance']; ?></td>
                        <td><?php echo $transact['ubs_discount']; ?></td>
                        <td><?php echo $transact['transport_fee_paying']; ?></td>
                        <td><?php echo $transact['transport_fee_balance']; ?></td>
                        <td><?php echo $transact['transport_discount']; ?></td>
                        <td><?php echo $transact['login_id']; ?></td>


                    </tr>

                <?php
                    }
                }else{ ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>NO PREVIOUS TRANSACTIONS FOUND</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td></tr>
               <?php }

                ?>
            </tbody>
        </table>
             </div>
                       </div>

                                <br>
                                <h4>Payments</h4>
                        <div class="row">
                            <div class="col-sm">
                            <legend>Tuition Fee</legend>
                            <?php if ($data['adm_cat'] != "RTE") { ?>
                                    <label for="">Fee Paying Now:</label>
                                    <?php if($balance['tution']=="Cleared"){?>
                                 <input type="number" name="paying_fee" class="form-control" autocomplete="off" value="0" onkeyup="myFunction()" id="paid_amount">

                                        
                                  <?php  }elseif($balance['tution']!="Cleared"){?>
<input type="number" name="paying_fee" class="form-control" autocomplete="off" value="<?php if(empty($balance['tution_balance_fee'])){echo $tutitionfee['fee'];}else{ echo $balance['tution_balance_fee'];} ?>" onkeyup="myFunction()" id="paid_amount">
                                <?php  }?>
                                        <label for="">Discount</label>
                                        <input type="number" class="form-control" autocomplete="off" name="discount" onkeyup="myFunction()"  id="discount">

                                    <label for="">Updated Tuition Fee Balance:</label>
                                    <input type="number" name="balance_amount" class="form-control" readonly id="balance_amount">
                            <?php } ?>
                            </div>
                            <div class="col-sm">
                            <legend>UBS Fee</legend>
                          
                                    <label for="">Fee Paying Now:</label>
                                    <?php if($balance['ubs']=="Cleared"){?>
                                        <input type="number" name="ubs_fee_paying" class="form-control" autocomplete="off" value="0"  onkeyup="ubsFunction()" id="ubs_fee_paying">
                                        <?php  }elseif($balance['ubs']!="Cleared"){?>
                                    <input type="number" name="ubs_fee_paying" class="form-control" autocomplete="off" value="<?php if(empty($balance['ubs_balance'])){echo $ubsfee['ubs_fee'];}else{ echo $balance['ubs_balance'];} ?>" onkeyup="ubsFunction()" id="ubs_fee_paying">
                                    <?php  }?>

                                        <label for="">Discount</label>
                                        <input type="number" class="form-control" autocomplete="off" name="ubs_discount" onkeyup="ubsFunction()"  id="ubs_discount">

                                    <label for="">Updated UBS Fee Balance:</label>
                                    <input type="number" name="ubs_fee_balance" class="form-control" readonly id="ubs_fee_balance">
                           

                            </div>
                             <?php if ($data['transport_opted'] == "1") { ?>
                            <div class="col-sm">
                            <legend>Transport Fee</legend>
                          
                                    <label for="">Fee Paying Now:</label>

                                    <?php if($balance['transport']=="Cleared"){?>
                                        <input type="number" name="transport_fee_paying" class="form-control" autocomplete="off" value="0" onkeyup="transFunction()" id="transport_fee_paying">
                                        <?php  }elseif($balance['transport']!="Cleared"){?>

                                    <input type="number" name="transport_fee_paying" class="form-control" autocomplete="off" value="<?php if(empty($balance['transport_balance'])){ echo $data['transport_fee'];}else{ echo $balance['transport_balance'];} ?>" onkeyup="transFunction()" id="transport_fee_paying">
                                    <?php  }?>

                                        <label for="">Discount</label>
                                        <input type="number" class="form-control" autocomplete="off" name="transport_discount" onkeyup="transFunction()"  id="transport_discount">

                                    <label for="">Updated UBS Fee Balance:</label>
                                    <input type="number" name="transport_fee_balance" class="form-control" readonly id="transport_fee_balance">
                           
                            </div>
                            <?php }?>
                        </div> 

                                                <div class="row">
                                                    <div class="col-sm"> <label for="login_id"  >Login Id</label><input  style="width: min-content;" readonly class="m-2 form-control" type="text" name="login_id" value="<?php echo $_SESSION['username'] ?>" id="login_id" /></div>
                                                    <div class="col-sm"><label for="" >Academic Year</label><input style="width: min-content;" readonly class="m-2 form-control" type="text" name="academic_year" value="<?php echo $ay;?>" /></div>
                                                    <div class="col-sm"><label for="billing_date">Billing Date</label><input style="width: min-content;" class="form-control" readonly type="text" value="<?php echo date("d-m-Y"); ?>" name="billing_date" id="billing_date" /></div>
                                                </div>

                        <input type="text" name="student_mail" hidden value="<?php echo $data['fatheremail']?>"  id="">
                       
                        <div class="row">
                            <div class="col-sm"><label for="due_date">Due Date</label><input style="width: min-content;" class="m-3 form-control" dateformat="dd-MMM-yyyy" type="date" name="due_date" required id="due_date" /></div>
                            <div class="col-sm"><label for="">Transaction Mode: </label> <select name="transaction_mode" class=" m-3 form-control" style="width: min-content;" id="selectBox" onchange="changeFunc();">
                       <option value="CASH" selected>CASH</option>
                       <option value="ONLINE">ONLINE</option>
                       <option value="DD[BANK]">DD[BANK]</option>
                       </select></div>
                            <div class="col-sm" > <label for="" id="textboxes">Transaction Id: <input type="text" name="transaction_id" style="width:min-content" autocomplete="off" placeholder="Transaction Id " id="" class="form-control"></label> </div>
                        </div>
                        
                        
                       
                       <?php if($data['fatheremail']=="**"){

                        echo"<center class='text-danger'>Please Update Email of ".$data['student_name']." Then after the Payment Button Will be Enabled</center>";
                        }else{
                           ?>
                        <button type="submit" class="m-5 btn btn-outline-danger">Pay Fee</button>
                        <?php
                       } ?>

   </form>
     

    <?php  }



    ?>


<script type="text/javascript">
            function changeFunc() {
                var selectBox = document.getElementById("selectBox");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if (selectedValue == "ONLINE" || selectedValue == "DD[BANK]") {
                    $('#textboxes').show();
                } else {
                    $('#textboxes').hide();
                }
            }

            $(document).ready( function(){
                $('#textboxes').hide();
            })
        </script>


    <script>
    var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 500);

        $(document).ready(function() {
            $('#example')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
        });
        $(document).ready(function() {
   $('#transactions').hide();
});
        $(function () {
        $("#showtransactions").click(function () {
            if ($(this).is(":checked")) {
                $("#transactions").show();
               
            } else {
                $("#transactions").hide();
             
            }
        });
    });
        
    </script>
     <script>
                                        function myFunction() {
                                            var x = document.getElementById("paid_amount").value;
                                            var dis = document.getElementById("discount").value;
                                            document.getElementById("balance_amount").value = (<?php 
                                            
                                                    if($balance['tution']=="Cleared"){
                                                        echo 0;
                                                    }else{ if(empty($balance['tution_balance_fee'])) {
                                                                                                    echo  $tutitionfee['fee'];
                                                                                                } else {
                                                                                                    echo $balance['tution_balance_fee'];
                                                                                                } ?> - x <?php }?>)-dis;
                                        }
                                        function ubsFunction() {
                                            var ubspaying = document.getElementById("ubs_fee_paying").value;
                                            var ubsdis = document.getElementById("ubs_discount").value;
                                            document.getElementById("ubs_fee_balance").value = (<?php
                                            
                                                        if($balance['ubs']=="Cleared"){
                                                            echo 0;
                                                        }else{  if(empty($balance['ubs_balance'])) {
                                                                                                    echo   $ubsfee['ubs_fee'];
                                                                                                } else {
                                                                                                    echo $balance['ubs_balance'];
                                                                                                } 
                                                                                             } ?> - ubspaying)-ubsdis;
                                        } 
                                        function transFunction() {
                                            var transpaying = document.getElementById("transport_fee_paying").value;
                                            var transdis = document.getElementById("transport_discount").value;
                                            document.getElementById("transport_fee_balance").value = (<?php 

                                                    if($balance['transport']=="Cleared"){
                                                        echo 0;
                                                    }else{
                                                        if (empty($balance['transport_balance'])) {
                                                            echo   $data['transport_fee'];
                                                        } else {
                                                            echo $balance['transport_balance'];
                                                        }
                                                    } ?> - transpaying)-transdis;
                                        }
                                    </script>
                                    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/kt-2.6.2/datatables.min.js"></script>
            <?php  include'footer.php';?>
</center>