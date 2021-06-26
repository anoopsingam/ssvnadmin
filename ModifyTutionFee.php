<?php include "header.php";  if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator"){ ?> 
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
                    title: 'Tution Fee Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4,5]
                    },
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h5>Tution Fee Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    key: { // press E for export excel
                        key: 't',
                        altKey: false
                    }
                },
                {
                    extend: 'pdf',
                    className: 'badge bg-danger text-light',
                    text: 'Download PDF',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    title: 'Tution Fee Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ]
                    },
                    key: { // press E for export excel
                        key: 'p',
                        altKey: false
                    }
                },
                {
                    extend: 'copy',
                    className: 'badge bg-primary',
                    text: 'Copy Result',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ]
                    },
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
        $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
        $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
        $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
</script>
<title>Modify Tution Fee | <?php echo $theader;?></title>
<center>
    <h4 class="text-muted">Tution Fee Data</h4>
</center>
<div style="overflow: scroll;height:auto;width:auto;">

<table id="example" class="table table-responsive-md" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th>Sl No</th>
                <th>Class</th>
                <th>Fee</th>
                <th>Academic Year</th>
                <th>Added On</th>
                <th>Updated On</th>
                <th>Login</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody class="text-capitalized text-center text-body">

            <?php

            $sql = "SELECT * FROM tution_fee order by id asc";
            $ask = mysqli_query($conn, $sql);

            if (mysqli_num_rows($ask) > 0) {
                $sl = 1;
                while ($row = mysqli_fetch_assoc($ask)) {
                    ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['fee']; ?></td>
                        <td><?php echo $row['academic_year']; ?></td>
                        <td><?php echo $row['added_date']; ?></td>
                        <td><?php echo $row['updated_date']; ?></td>
                        <td><?php echo $row['login_id']; ?></td>
                        <td><a href="UpdateTutionFee?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button class="btn btn-warning">UPDATE</button></a>&nbsp;<a href="DeleteTutionFee?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button class="btn btn-danger">DELETE</button></a></td>
                    </tr>
                <?php
                }
            } else { ?> <tr>

                    <td>-</td>
                    <td>-</td>
                    <td>No Data</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>

                </tr><?php } ?>
        </tbody>
    </table>
</div>
<?php } include "footer.php"; ?>