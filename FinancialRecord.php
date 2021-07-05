<?php include'header.php';?>
<title>Finacial Record Management | <?php echo $theader;?></title>
<center>
<form action="" method="post">
        <legend>Transaction </legend>
        <label for="">Student ID : </label>
        <input name="eid" list="eid" style="width: min-content;" autocomplete="off" class="form-control" id="eids">
        <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment where status='APPROVED' order by studentid asc");

            while ($fetch = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $fetch['studentid']; ?>"> <?php echo $fetch['student_name']; ?></option>

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
</center>

<?php  
        
    if (isset($_POST['get_id'])) {
        $ay = $_POST['ay'];
        $id = $_POST['eid'];
        $previous_transactions = mysqli_query($conn, "SELECT * FROM student_tution_fee where student_id='$id' and academic_year='$ay' order by created_on desc"); ?>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable({

            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'excel',
                    className: 'badge bg-success',
                    text: 'Download Excel',
                    title: 'Transaction Report of <?php echo "$id $ay";?>',
                    footer: true,
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h5>Transaction Report of <?php echo "$id $ay";?></h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    orientation: 'landscape',
                    footer: true,
                    key: { // press E for export excel
                        key: 't',
                        altKey: false
                    }
                },
                {
                    extend: 'pdf',
                    className: 'badge bg-danger text-light',
                    text: 'Download PDF',
                    orientation: 'landscape',
                    footer: true,
                    pageSize: 'A4',
                    title: 'Transaction Report of <?php echo "$id $ay";?>',
                   
                    key: { // press E for export excel
                        key: 'p',
                        altKey: false
                    }
                },
                {
                    extend: 'copy',
                    footer: true,
                    className: 'badge bg-primary',
                    text: 'Copy Result',
                  
                }

            ]


        });


        $('#dtMaterialDesignExample_wrapper').find('label').each(function() {
            $(this).parent().append($(this).children());
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function() {
            $('input').attr("placeholder", "Search");
            $('input').removeClass('form-control-sm');
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-ft$fetch');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
        $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
        $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
</script>
<div class="fluid-container" id="transactions">
        <center><h4><?php $disc_data = mysqli_query($conn, "SELECT * FROM student_enrollment where studentid='$id'"); $disc_fetch = mysqli_fetch_array($disc_data); echo $disc_fetch['student_name']." ".$disc_fetch['present_class']." ".$disc_fetch['present_section']."[$id]";?> Transaction Details <?php echo $ay?></h4></center>
        <div style="overflow: scroll;width:100%" >
        <table id="example" class="table table-bordered" style="width:100%;">
            <thead class="bg-primary text-light">
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
                        <td><a href="#" onclick="window.open('PrintTutionBill?billno=<?php  echo my_simple_crypt($transact['bill_no'], 'e'); ?>','popup','width=750,height=750'); return false;" title=" Click To View Bill <?php echo $transact['bill_no']; ?>" ><?php echo $transact['bill_no']; ?></a></td>
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

                <?php } ?>
                <?php
                  $sql = "SELECT * FROM balance_fee WHERE student_id='$id' and academic_year='$ay'";
                 $result=mysqli_query($conn, $sql);
                 $fetch=mysqli_fetch_assoc($result);
                    echo mysqli_error($conn);
                 ?>
                <tfoot>
                <tr style="font-size: small;font-weight:500;">
                <td>ID: <?php echo $disc_fetch['student_name']." ".$disc_fetch['present_class']." ".$disc_fetch['present_section']."<br>[$id]";?></td>
                <td>Academic Year: <?php echo $ay;?></td>
                <td>Tuition Fee Paid :<?php echo '₹' . number_format($fetch['tution_fee_paid']); ?></td>
                <td>Tuition Fee Balance :<?php echo '₹' . number_format($fetch['tution_balance_fee']); ?></td>
                <td>Tuition Fee Discount :<?php echo '₹' . number_format($fetch['tution_fee_discount']); ?></td>
                <td>Tuition Fee Status:<?php if($fetch['tution']=="0"){ echo "Not Cleared";}else{echo $fetch['tution'];} ?></td>
                <td>Transport Fee Paid :<?php echo '₹' . number_format($fetch['transport_fee_paid']); ?></td>
                <td>Transport Fee Balance :<?php echo '₹' . number_format($fetch['transport_balance']); ?></td>
                <td>Transport Fee Discount :<?php echo '₹' . number_format($fetch['transport_fee_discount']); ?></td>
                <td>Transport Fee Status:<?php if($fetch['transport']=="0"){ echo "Not Cleared";}else{echo $fetch['transport'];} ?></td>
                <td>UBS Fee Paid :<?php echo '₹' . number_format($fetch['ubs_fee_paid']); ?></td>
                <td>UBS Fee Balance :<?php echo '₹' . number_format($fetch['ubs_balance']); ?></td>
                <td>UBS Fee Discount :<?php echo '₹' . number_format($fetch['ubs_fee_discount']); ?></td>
                <td>UBS Fee Status:<?php if($fetch['ubs']=="0"){ echo "Not Cleared";}else{echo $fetch['ubs'];} ?></td>

                </tr>
                </tfoot>
            </tbody>
            
            
            
         <?php   } else { ?>
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
                    </tbody>
               <?php } ?>
           
        </table>
             </div>
                       </div>
                       <?php
    } include'footer.php';
                       
                       
                       ?>