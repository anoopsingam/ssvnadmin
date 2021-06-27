<?php include 'header.php'; ?>
<title>
    Manage Events | <?php echo $theader;?></title>

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
                    title: 'Events Data',
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
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETHAN </h2><h5>Events Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
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
                    className: 'badge bg-danger',
                    text: 'Download PDF',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    title: 'Events Data',
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
<center>
    <h1 class="h1  text-muted "> Event Management</h1>
</center>
<div style="overflow: scroll; ">
<table id="example" class="table table-hover"  >
        <thead>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Event Date</th>
            <th>Event Added On</th>
            <th>Event Added By</th>
            <th>Academic Year</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php   
            
                $sql="SELECT * FROM events ORDER BY event_date ASC ";
                $ask=mysqli_query($conn,$sql);
                if(mysqli_num_rows($ask)>0){
                                while($row=mysqli_fetch_assoc($ask)){
                                            ?>
            <tr>
                <td><?php echo $row['event_name']?></td>
                <td><?php echo $row['event_discription']?></td>
                <td><?php echo $row['event_date']?></td>
                <td><?php echo $row['event_added_on']?></td>
                <td><?php echo $row['even_added_by']?></td>
                <td><?php echo $row['academic_year']?></td>
            
                <td><a href="UpdateEvent?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button
                            class="btn btn-warning badge">UPDATE</button></a>&nbsp;<a
                        href="DeleteEvent?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button
                            class="btn btn-danger badge">DELETE</button></a></td>
              


            </tr>
            <?php
                                }
                }
                else
                {
                    
                }
            
            ?>


        </tbody>

    </table>
</div>


<?php include 'footer.php'; ?>  