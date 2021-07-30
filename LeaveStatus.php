<?php include'header.php';?>
<title>Leave | <?php echo $theader?></title>

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
                    title: 'Leave Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5]
                    },
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETHAN </h2><h5>Leave Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5]
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
                    pageSize: 'A3',
                    title: 'Leave Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5 ]
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
                        columns: [0, 1, 2, 3,4,5 ]
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
    <h1 class="h1  text-muted "> Employees Leave </h1>
    <br>
    <h6 class="text-muted lead"><span class="text-danger"> Please Note that On Applying for Leave is not Considered as Leave Approved !!!</span></h6>
</center>
<div style="overflow: scroll; ">
<table id="example" class="table table-hover"  >
        <thead>
        
            <th>Employee Name</th>
            <th>E.ID</th>
            <th>Leave period</th>
            <th>Leave Applied On</th>
            <th>Leave Status</th>
            <th>Leave Approved By</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php   
            
                $sql="SELECT * FROM leave_application ORDER BY leave_applied_on ASC ";
                $ask=mysqli_query($conn,$sql);
                if(mysqli_num_rows($ask)>0){
                                while($row=mysqli_fetch_assoc($ask)){
                                            ?>
            <tr>
                <td><?php echo $row['teacher_name']?></td>
                <td><?php echo $row['teacher_id']?></td>
                <td><?php echo $row['leave_date']."   to  ".$row['leave_end_date']?></td>
                <td><?php echo $row['leave_applied_on']?></td>
                <td><?php echo $row['leave_status']?></td>
                <td><?php echo $row['leave_approved_by']?></td>            
                <td>
                <a href="#" onclick="window.open('ViewLeaveApplication?id=<?php  echo my_simple_crypt($row['id'], 'e'); ?>','popup','width=750,height=750'); return false;" title=" Click to View Leave Application of <?php echo $row['teacher_name']; ?>" ><button
                            class="btn btn-warning badge">View</button></a>   
                            <?php if($row['leave_status']=="APPROVED"){?>
                <a href="#" onclick="window.open('LeaveLetterApproved?id=<?php  echo my_simple_crypt($row['id'], 'e'); ?>','popup','width=750,height=750'); return false;" title=" Click to View Approved Leave Application of <?php echo $row['teacher_name']; ?>" ><button
                            class="btn btn-info badge">Print</button></a>  
                            <?php
                                        }?>
                                        <?php if($username=="administrator" || $username=="principal"){
                                            ?>
                                                    
                <a href="ApproveLeave?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button
                            class="btn btn-success badge">Approve</button></a>&nbsp;
                            
                            
                            <a onclick="DeleteConfirm()"><button class="btn btn-danger badge">DELETE</button></a>
                            
<script>
    function DeleteConfirm(){
        if(confirm("Are you sure you want to delete this Application <?php echo $username;?> ?")){
            window.location.href="DeleteLeave?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"
        }else{
            return false;   
                }
    }
</script>
                                            <?php
                                        }?>
                
                        </td>
              


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


<?php include'footer.php';?>