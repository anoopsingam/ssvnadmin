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
<style>

th{
    font-size: small;
}
</style>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable({

            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'excel',
                    className: 'btn btn-success ',
                    text: 'Download Excel',
                    title: 'Bus Stages Data',
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
                    className: 'btn btn-success btn-sm',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETHAN </h2><h5>Bus Stages Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6]
                    },
                    key: { // press E for export excel
                        key: 't',
                        altKey: false
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-danger btn-md',
                    text: 'Download PDF',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    title: 'Bus Stages Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    key: { // press E for export excel
                        key: 'p',
                        altKey: false
                    }
                },
                {
                    extend: 'copy',
                    className: 'btn btn-success btn-sm',
                    text: 'Copy Result',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
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
<title>Modify Stages | <?php echo $theader;?></title>
  



<div style="overflow: scroll;height:auto;width:auto;">

    <table id="example" class="table table-responsive" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th>Sl No</th>
                <th>Route No</th>
                <th>Bus No</th>
                <th> Start Point</th>
                <th>End Point</th>
                <th>Added On</th>
                <th>Login</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody class="text-capitalized text-center text-body">
        <?php

$sql = "SELECT * FROM transport_bus_stages";
$ask = mysqli_query($conn, $sql);

if (mysqli_num_rows($ask) > 0) {
    $sl = 1;
    while ($row = mysqli_fetch_assoc($ask)) {
?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $row['route_no']; ?></td>
            <td><?php echo $row['bus_no']; ?></td>
            <td><?php echo $row['start_point']; ?></td>
            <td><?php echo $row['end_point']; ?></td>
            <td><?php echo $row['stage_added_date']; ?></td>
            <td><?php echo $row['login_id']; ?></td>
            <td><a href="UpdateStages?id=<?php echo my_simple_crypt($row['route_no'], 'e'); ?>"><button class="btn btn-warning">UPDATE</button></a>&nbsp;<a href="DeleteStage?id=<?php echo my_simple_crypt($row['route_no'], 'e'); ?>"><button class="btn btn-danger">DELETE</button></a></td>
        </tr>
    <?php }
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
<?php } include'footer.php';?>