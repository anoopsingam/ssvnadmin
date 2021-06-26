<?php include 'header.php'; ?>
<title>
    Manage Application | <?php echo $theader;?>
</title>

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
                    title: 'Application Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h5>Application Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5]
                    },
                    key: { // press E for export excel
                        key: 't',
                        altKey: false
                    }
                },
                {
                    extend: 'pdf',
                    className: 'badge bg-danger',
                    text: 'Download PDF',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    title: 'Application Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5]
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
                        columns: [0, 1, 2, 3, 5]
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
        $('#dtMaterialDesignExample_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
        $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
</script>
<center>
    <h1 class="h1  text-muted "> Application Management</h1>
</center>
<div style="overflow: scroll; ">
    <table id="example" class="table table-responsive-md" style="width:100%;">
        <thead>
            <th>Ref No</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Father Number</th>
            <th>Father Email</th>
            <th>Applied On</th>
            <th>Login</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM applications ORDER BY ref_no ASC ";
            $ask = mysqli_query($conn, $sql);
            if (mysqli_num_rows($ask) > 0) {
                while ($row = mysqli_fetch_assoc($ask)) {

                    $encry = my_simple_crypt($row['ref_no'], 'e');
            ?>
                    <tr>
                        <td><?php echo $rfn = $row['ref_no'] ?></td>
                        <td><?php echo $student_name = $row['student_name'] ?></td>
                        <td><?php echo $father_name = $row['father_name'] ?></td>
                        <td><?php echo $row['father_number'] ?></td>
                        <td><?php echo $row['father_email'] ?></td>
                        <td><?php echo $time = $row['applied_on'] ?></td>
                        <td><?php echo $row['login'] ?></td>

                        <td> <?php if ($_SESSION['username'] == "administrator") { ?><a href="DeleteApplication?id=<?php echo my_simple_crypt($row['ref_no'], 'e'); ?>"><button class="btn btn-danger badge">DELETE</button></a><?php } ?>&nbsp;<a target="_blank" href="https://wa.me/91<?php echo $row['father_number'] ?>/?text=<?php echo urlencode("Thank you for applying $father_name, your child *$student_name* successfully registered for Admission on $time with reference  no: $rfn, you can continue the Admission process at the following link: https://admissions.sssvnbagepalli.in/OnlineApplication?ref=$encry.  Regards, Technical Team, Stark Tech Innovative Labs, Bengaluru "); ?>"><button class="btn btn-success badge">WhatsApp</button></a><br><?php if (!empty($row['father_email'])) { ?>
                                    <a href="Mail?mail=<?php echo $row['father_email'] ?>&msg=<?php echo "Thank you for applying $father_name, your child $student_name successfully registered for Admission on $time with reference  no: $rfn, you can continue the Admission process at the following link: https://admissions.sssvnbagepalli.in/OnlineApplication?ref=$encry.  Regards, Technical Team, Stark Tech Innovative Labs, Bengaluru " ?>&mail_type=admission_application"><button class="badge btn btn-warning text-dark">Mail</button></a><?php }  ?>
                        </td>



                    </tr>
            <?php
                }
            } else {
            }

            ?>


        </tbody>

    </table>
</div>


<?php include 'footer.php'; ?>