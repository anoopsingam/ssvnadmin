<?php include 'header.php'; ?>
<title>Generate Receipt | Stark Tech</title>
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
                "pageLength": 50,
                dom: 'Bfrtip',
				buttons: [
           
            {
               extend: 'excel',
                    className: 'badge bg-success',
                    text: 'Download Excel',
                title:'Fee Data',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7]
                },
                key: { // press E for export excel
                    key: 'e',
                    altKey: false
                }
            },
            {
                extend: 'print',
                    className: 'badge bg-warning text-dark',
				title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h4> Fee Data</h4><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                text: 'Print ',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11 ]
                },
                key: { // press p for print
                    key: 'p',
                    altKey: false
                }
            },
            {
                extend: 'pdf',
                    className: 'badge bg-danger text-light',
                text: 'Download PDF',
                orientation: 'portrait',
                pageSize: 'A4',
				title:'SRI SATHYA SAI VIDYANIKETAN Fee Data',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10,11]
                },
                key: { // press p for pdf
                    key: 'q',
                    altKey: false
                }
            },
            {
                extend: 'copy',
                    className: 'badge bg-primary',
                text: 'Copy Result',
                footer: true,
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6,7,8,9,10 ,11]
                },
            }
            
        ]
       
				
            });
            
            
			$('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        $('input').attr("placeholder", "Search");
        $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
        });
        $( table.table().footer() ).addClass( 'highlight' );
        </script>

<?php

        $sql = "SELECT * from student_tution_fee order by created_on desc ";
        $ask = mysqli_query($conn, $sql);


        if (mysqli_num_rows($ask) > 0) {
            $i=1;
            ?><div style="width: 100%;overflow:scroll;">
                
                <table id="example" class="table table-responsive" style="width: 100%;" >
                <thead class="thead-dark">
                    <tr class="table-dark text-light">
                        <th>Sl No.</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class </th>
                        <th>Receipt No</th>
                        <th>Paid Amount</th>
                        <th>Balance</th>
                        <th>UBS</th>
                        <th>UBS Balance</th>
                        <th>Installment</th>
                        <th>Date of Payment</th>
                        <th>Login</th>
                        <th>Print</th>

                    </tr>
                    </thead>
<?php
            while ($row = mysqli_fetch_assoc($ask)) {
        ?>
              <tr> <td><?php echo $i++;?></td>
              <td><?php echo $row['student_id']?></td>
               <td><?php echo $row['student_name']?></td>
               <td><?php echo $row['student_class']?></td>
               <td><?php echo $row['bill_no']?></td>
               <td><?php if(is_numeric($row['transport_fee_paying'])){ $trbal=$row['transport_fee_paying']; }else{
                   $trbal=0;
               } echo $row['paying_fee']+$trbal;?></td>
               <td><?php echo $row['balance_amount']+$row['transport_fee_balance']?></td>
               <td><?php echo $row['ubs_fee_paying']?></td>
               <td><?php echo $row['ubs_fee_balance']?></td>
               <td><?php echo $row['installment']?></td>
               <td><?php echo $row['created_on']?></td>
               <td><?php echo $row['login_id']?></td>
               <td><a onclick="window.open('PrintTutionBill?billno=<?php  echo my_simple_crypt( $row['bill_no'], 'e' );?>','popup','width=750,height=750');" ><button class="btn btn-success">Print</button></a></td>
               </tr>
               
            <?php
            }
        } else {
            ?>
            <script>
                alert("<?php echo "No data found for the student ID=$student_id in Database"; ?>");
            </script>
<?php
        }
    


?>

</table>
            </div>
<?php include 'footer.php'; ?>