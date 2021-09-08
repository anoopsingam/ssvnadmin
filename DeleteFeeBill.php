<?php 
    include'header.php';
?>
<title> Delete Fee Bill | <?php echo $theader; ?></title>

<form action="" method="post">
    <center>
        <h2>Delete Fee Bill</h2>
     
        <input name="bill_no" list="eid" style="width: min-content;" autocomplete="off" class="form-control" id="eids">
        <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_tution_fee where discount_approval='APPROVED' order by created_on desc");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['bill_no']; ?>"> <?php echo $row['bill_no']; ?></option>

            <?php
            } ?>
        </datalist> 
        <br>
        <label class="m-2 p-25">Academic Year: <select name="ay" class="form-control" required style="width: min-content;" id="">

<option value="2021-2022" selected >2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option>  
<option value="2025-2026">2025-2026</option>  
</select></label>
        <br>
        <button name="get_bill" class="btn btn-danger">Get Bill</button>
    </center>
</form>
<?php 
    if(isset($_POST['get_bill']))
    {
        $bill_no = mysqli_real_escape_string($conn, $_POST['bill_no']);
        $ay = mysqli_real_escape_string($conn, $_POST['ay']);
                if(empty($bill_no)){
                    ?>
                    <script>
                        Swal.fire(
                            'Error',
                            '<?php echo $username; ?> Please Provide Bill No to Search',
                            'info'
                            )
                    </script>
            <?php
                }else{
                    //fetch the bill details from student_tution_fee table
                    $sql = "SELECT * FROM student_tution_fee WHERE bill_no='$bill_no' and academic_year='$ay'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)>0) {
                        while ($row=mysqli_fetch_assoc($result)) {
                            $id=$row['student_id'];
                            $sql2 = "SELECT * FROM balance_fee WHERE student_id='$id' and academic_year='$ay'";
                            $result2 = mysqli_query($conn, $sql2);
                                $balance=mysqli_fetch_assoc($result2);

                            ?>
                                    <center>
                                       <div class="header pt-5 bg-light-warning pb-5">
                           
                                       <div class="row ">
                                       <legend class="p-2 m-1 text-danger"> <h3><?php echo $row['bill_no']; ?> Details</h3></legend>

                                           <div class="col-sm">
                                           <h6>Date of Billing : <?php echo $row['created_on']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>Billing Done By {Login ID} : <?php echo $row['login_id']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>Installment : <?php echo $row['installment']?></h6>
                                           </div>
                                           <div class="col-sm">
                                           <h6>Student Name : <?php echo $row['student_name']?></h6>
                                           </div><div class="col-sm">
                                           <h6>Student ID : <?php echo $row['student_id']?></h6>
                                           </div>
                                       </div>

                                       <div class="row">
                                           <legend class="p-2 m-1 text-danger"><h4>Fee Paid Details :</h4></legend>
                                           <div class="col-sm">
                                           <h6>Tution Fee Paid : <?php echo $row['paying_fee']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>Transport Fee Paid : <?php echo $row['transport_fee_paying']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>UBS Fee Paid : <?php echo $row['ubs_fee_paying']?></h6>

                                           </div>
                                          
                                       </div>
                                       <div class="row">
                                       <legend class="p-2 m-1 text-danger"><h4 >Fee Balance Details :</h4></legend>
                                       <div class="col-sm">
                                           <h6>Tution Fee Balance : <?php echo $row['balance_amount']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>Transport Fee Balance : <?php echo $row['transport_fee_balance']?></h6>

                                           </div>
                                           <div class="col-sm">
                                           <h6>UBS Fee Balance : <?php echo $row['ubs_fee_balance']?></h6>

                                           </div>
                                       </div>
                                       <center><a onclick="window.open('PrintTutionBill?billno=<?php  echo my_simple_crypt( $row['bill_no'], 'e' );?>','popup','width=750,height=750');" ><button class="m-4 btn btn-primary">View Bill</button></a>
                                            <br>

                                            <form action="DeleteBill" method="post" onsubmit="return confirm('Are you sure?,You wont be able to revert this');">
                                                <center><legend><h4>Balance Amount :</h4></legend></center>
                                                <div class="bg-light-success p-3">
                                                    <div class="row">
                                                    <center><legend><h5>Tution Fee :</h5></legend></center>

                                                        <div class="col-sm">
                                                            <label for=""><h6>Tution Fee Paid Till Date:</h6> </label>
                                                <input type="text" name="tution_paid" id=""  style="width:min-content;" value="<?php echo $balance['tution_fee_paid'] ?>" class="form-control">
                                                        </div>
                                                        
                                                        <div class="col-sm">
                                                        <label for=""><h6>Tution Fee Balance Till Date:</h6> </label>

                                                    <input type="text" name="tution_balance" id="" value="<?php echo $balance['tution_balance_fee'] ?>" style="width:min-content;" class="form-control">
                                                        </div><div class="col-sm">
                                                        <label for=""><h6>Tution Fee Discount Till Date:</h6> </label>

                                                    <input type="text" name="tution_discount" id="" value="<?php echo $balance['tution_fee_discount'] ?>" style="width:min-content;" class="form-control">
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="row">
                                                      <center><legend><h5>Transport Fee :</h5></legend></center>

                                                        <div class="col-sm">
                                                            <label for=""><h6>Transport Fee Paid Till Date:</h6> </label>
                                                <input type="text" name="transport_paid" id=""  style="width:min-content;" value="<?php echo $balance['transport_fee_paid'] ?>" class="form-control">
                                                        </div>
                                                        
                                                        <div class="col-sm">
                                                        <label for=""><h6>Transport Fee Balance Till Date:</h6> </label>

                                                    <input type="text" name="transport_balance" id="" value="<?php echo $balance['transport_balance'] ?>" style="width:min-content;" class="form-control">
                                                        </div>
                                                        <div class="col-sm">
                                                        <label for=""><h6>Transport Fee Discount Till Date:</h6> </label>

                                                    <input type="text" name="transport_discount" id="" value="<?php echo $balance['transport_fee_discount'] ?>" style="width:min-content;" class="form-control">
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                      <center><legend><h5>UBS Fee :</h5></legend></center>

                                                        <div class="col-sm">
                                                            <label for=""><h6>UBS Fee Paid Till Date:</h6> </label>
                                                <input type="text" name="ubs_paid" id=""  style="width:min-content;" value="<?php echo $balance['ubs_fee_paid'] ?>" class="form-control">
                                                        </div>
                                                        
                                                        <div class="col-sm">
                                                        <label for=""><h6>UBS Fee Balance Till Date:</h6> </label>

                                                    <input type="text" name="ubs_balance" id="" value="<?php echo $balance['ubs_balance'] ?>" style="width:min-content;" class="form-control">
                                                        </div> <div class="col-sm">
                                                        <label for=""><h6>UBS Fee Discount Till Date:</h6> </label>

                                                    <input type="text" name="ubs_discount" id="" value="<?php echo $balance['ubs_fee_discount'] ?>" style="width:min-content;" class="form-control">
                                                        </div>
                                                      </div>
                                                      <label for="">Token ID:</label>
                                                      <input type="text" class="form-control" name="token" readonly value="<?php echo uniqid();?>" style="width:min-content;">
                                                      <label for="">BILL NO:</label>
                                                      <input type="text" class="form-control" name="bill_no" readonly value="<?php echo $bill_no;?>" style="width:min-content;">
                                                      <label for="">ACADEMIC YEAR:</label>
                                                      <input type="text" class="form-control" name="ay" readonly value="<?php echo $ay;?>" style="width:min-content;">
                                                </div>
                                                <button type="submit" class="btn btn-danger m-3" >Delete</button> 

                                            </form>

                                    </center>

                                                    <script>
                                                        function DeleteBill(){
                                                        Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "You won't be able to revert this!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Yes, delete it!'
                                                        }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='DeleteBill?bill_no=<?php echo my_simple_crypt($row['bill_no'],'e')."&token=".uniqid()."&ay=".$ay;?>';
                                                            // Swal.fire(
                                                            //   'Deleted!',
                                                            //   'Your file has been deleted.',
                                                            //   'success'
                                                            // )
                                                        }
                                                        })

                                                                                }
                                                    </script>
                                       </div>
                                    <?php
                        }
                    } else {
                        ?>
                            <script>
                                Swal.fire(
                                    'Error',
                                    'No Bill Found for <?php echo $bill_no; ?>',
                                    'error'
                                    )
                            </script>
                    <?php
                    }
                }    
        
    }

?>

<?php 
include'footer.php';
?>