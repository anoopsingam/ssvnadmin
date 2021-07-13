<?php include 'header.php'; ?>
<title>
    Manage Employee | <?php echo $theader;?>
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
                    title: 'Employee Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10]
                    },
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    orientation: 'landscape',
                    pageSize: 'A3',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h5>Employee Data</h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10]
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
                    orientation: 'landscape',
                    pageSize: 'A3',
                    title: 'Employee Data',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10]
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
                        columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10]
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
    <h1 class="h1  text-muted "> Employee Management</h1>
</center>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Button to Open the Modal -->
  <button type="button" class="badge btn-primary text-start m-2" data-toggle="modal" data-target="#myModal">
    Add Employee
  </button>
<br>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form action="UploadEmployeeToDb" method="post" enctype="multipart/form-data">


  <div class="row">
  <div class="col-lg-6">        <label for="">Name</label><br><input type="text" class="form-control"  name="name" id=""> <br>
</div>
  <div class="col-lg-6">        <label for="">Gender</label><select name="gender" id="" class="form-control"><option value="male">Male</option><option value="Female">Female</option></select> <br>
</div>
  </div>

  <div class="row">
  <div class="col-lg-6"><label for="">Date Of Birth</label><input type="date" class="form-control"  name="date_of_birth" id=""> <br></div>
  <div class="col-lg-6"> <label for="">Phone Number</label><input type="text" class="form-control"  name="phone_no" id=""> <br></div>
  </div><div class="row">
  <div class="col-lg-6"><label for="">Email</label><input type="text" class="form-control"  name="email" id=""> <br></div>
  <div class="col-lg-6">
  <label for="">Date Of Joining</label><input type="text" class="form-control"  name="date_of_joining" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Education Qualification</label><input type="text" class="form-control"  name="education_qualification" id=""> <br>

  </div>
  <div class="col-lg-6">
 
  <label for="">Ration Card</label><input type="text" class="form-control"  name="ration_card" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Father Name</label><input type="text" class="form-control"  name="father_name" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Mother Name</label><input type="text" class="form-control"  name="mother_name" id=""> <br>
  
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Marital Status</label><input type="text" class="form-control"  name="marital_status" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Name Of Spouse</label><input type="text" class="form-control"  name="name_of_spouse" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Number of Kids</label><input type="text" class="form-control"  name="no_of_kids" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Aadhar number</label><br><input type="text" class="form-control"  name="aadhar_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Voter Number</label><br><input type="text" class="form-control"  name="voter_id" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Pan Card</label><input type="text" class="form-control"  name="pan_card" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Present Address</label><input type="text" class="form-control"  name="present_address" id=""> <br>

  </div>
  <div class="col-lg-6">
  <label for="">Permanent Address</label><input type="text" class="form-control"  name="permanent_address" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Passport</label><input type="text" class="form-control"  name="passport" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank Account Number</label><input type="text" class="form-control"  name="bank_account_no" id=""> <br>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
  <label for="">Bank Branch</label><input type="text" class="form-control"  name="bank_branch" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Bank IFSC</label><input type="text" class="form-control"  name="bank_ifsc" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">Original Certificate</label><input type="text" class="form-control"  name="original_certificate" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">PF Enrollment Number</label><input type="text" class="form-control"  name="pf_enrolment_no" id=""> <br>
  </div>
  </div><div class="row">
  <div class="col-lg-6">
  <label for="">ESI Enrollment Number</label><input type="text" class="form-control"  name="esi_enrolment_no" id=""> <br>
  </div>
  <div class="col-lg-6">
  <label for="">Documents</label><input type="file" class="form-control  form-control-file"  name="documents" id=""> <br>
  </div>
  </div>
       <input type="text" name="login_id" hidden value="<?php echo $_SESSION['username']?>" readonly id="" class="form-control">
        
<input type="text" name="target" value="ManageEmployee" hidden id="">
<center><button class="btn btn-primary " type="submit">Add Employee</button></center>
    
    </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

<div style="overflow: scroll; ">
    <table id="example" class="table table-responsive-md" style="width:100%;">
        <thead>
            <th>Sl No</th>
            <th>E.ID</th>
            <th> Employee Name</th>
            <th>Father Name</th>
            <th> Aadhar Number</th>
            <th> Email</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Status</th>
            <th>Applied On</th>
            <th>Approved On</th>
            <th>Login</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM kyt ORDER BY unique_key  ASC ";
            $ask = mysqli_query($conn, $sql);
            if (mysqli_num_rows($ask) > 0) {
                $slno=0;
                while ($row = mysqli_fetch_assoc($ask)) {

                    $encry = my_simple_crypt($row['unique_key'], 'e');
            ?>
            <tr>
                <td><?php echo ++$slno;?></td>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td> <a href="#" onclick="window.open('ViewEmployeeDetails?key=<?php  echo my_simple_crypt($row['unique_key'], 'e'); ?>','popup','width=750,height=750'); return false;" title=" Click to View Details of <?php echo $row['name']; ?>" ><?php echo $row['name'];?></a></td>
                <td><?php echo $row['father_name'] ?></td>
                <td><?php echo $row['aadhar_no'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['permanent_address'] ?></td>
                <td><?php echo $row['phone_no'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['upload_time'] ?></td>
                <td><?php echo $row['approved_time'] ?></td>
                 
                <td><?php echo $row['login_id'] ?></td>

                <td> <?php if($username=="administrator"){ ?>  <a href="DeleteEmployee?id=<?php echo my_simple_crypt($row['unique_key'], 'e'); ?>&name=<?php echo $row['name'];?>"><button
                            class="btn btn-danger badge">DELETE</button></a>&nbsp;<?php } ?> <br>
                            <a href="#" onclick="window.open('UpdateEmployeeDetails?key=<?php  echo my_simple_crypt($row['unique_key'], 'e'); ?>','popup','width=750,height=750'); return false;" title=" Click To Edit Details of <?php echo $row['name']; ?>" ><button class="btn btn-warning badge">Update</button></a>
                    
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