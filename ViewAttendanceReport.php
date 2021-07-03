<?php include'header.php';?>
<title>
     Absent Students | <?php echo $theader;?></title>

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
                    title: 'Absent Students Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ,4,5,6]
                    },
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETHAN </h2><h5>Absent Report Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ,4,5,6]
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
                    title: 'Absent Students Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ,4,5,6]
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
                        columns: [0, 1, 2, 3 ,4,5,6]
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
<form method='post' action=''>

<center>
    <script type='text/javascript'>
    $(document).ready(function() {
        $('.dateFilter').datepicker({
            dateFormat: "d-m-Y"
        });
    });
    </script>
    <strong>From Date</strong><input type='date' style="width: fit-content;" class='form-control'
        name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>

    <br>

    <strong>To Date</strong> <input type='date' class='form-control' style="width: fit-content;"
        name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
    <br>
    
    <input type='submit' class="btn btn-primary" name='but_search' value='Search'>

</center>
</form>

<?php 


if(isset($_POST['but_search'])){
$fromdate=$_POST['fromDate'];
$enddate=$_POST['endDate'];

$sql="SELECT * from student_attendance where date between '$fromdate' and '$enddate' ";
$ask=mysqli_query($conn,$sql);


if(mysqli_num_rows($ask)>0){
$i=1;
?>
<div class="container" style="height: 650px;overflow: scroll;">

<table id="example" class="table table-responsive-md"  style="width:100%;">
<thead class="thead-dark">
    <tr>
        <th>Sl No</th>
        <th>Name</th>
        <th>Reg No</th>
       <th>Class </th>
        <th>Mobile No</th>
        <th>Absent Date</th>
        <th>Login</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_array($ask)){

                    $reg=$row['reg_no'];
    $sql="SELECT * FROM student_enrollment WHERE studentid='$reg'";
    $var=mysqli_query($conn,$sql);
    $std=mysqli_fetch_assoc($var);
    ?>
<tr>

<td><?php echo $i++;?></td>
<td><?php echo$std['student_name']; ?></td>
<td> <?php echo $row['reg_no'];?> </td>
<td><?php echo$std['present_class'].''.$std['present_section']; ?></td>
<td><?php echo$std['father_number']; ?></td>
<td> <?php echo $row['date'];?> </td>
<td style="display: flex;align-items:center;flex:auto;">
<?php echo $row['loginid'];?>
</td>
<td><a href="DeleteAttendance?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button class="btn btn-danger badge">DELETE</button></a></td>



</tr>



    <?php } }else{ ?>

                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><center>NO DATA FOUND FOR THE SELECTED DATES <strong><?PHP echo"FROM: $fromdate - TO:$enddate";?></strong>	</center></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                </tr>
                    <?php }  }?> </tbody>
</table>
</div>
<?php include'footer.php'; ?>