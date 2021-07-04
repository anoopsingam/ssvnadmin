<?php include'header.php';?>
<title>Student Reports | <?php echo $theader;?></title>

<form method='post' action='' class="form-inline">
<div class="container">
 <center>
 
 <label for="">
    <strong>Class</strong> 
                    </label>
                    <select name="class" style="width: min-content;" class="form-control" id="">
                    <?php if(isset($_POST['class'])){ ?>
                   <option value='<?php if(isset($_POST['class'])) echo $_POST['class']; ?>' selected><?php if(isset($_POST['class'])) echo $_POST['class']." STD"; ?></option>
                   <?php } else{} ?>
                        <option value="LKG">LKG</option>
                        <option value="UKG">UKG</option>
                        <option value="1">1ST STD</option>
                        <option value="2">2ND STD</option>
                        <option value="3">3RD STD</option>
                        <option value="4">4TH STD</option>
                        <option value="5">5TH STD</option>
                        <option value="6">6TH STD</option>
                        <option value="7">7TH STD</option>
                        <option value="8">8TH STD</option>
                        <option value="9">9TH STD</option>
                        <option value="10">10TH STD</option>
                    </select>
  
 </center>
</div>
<center>
       
   

    <br>


   
    <input type='submit' class="btn btn-primary" name='but_search' value='Search'>

</center>
</form>
<?php 


if (isset($_POST['but_search'])) {
    $class=$_POST['class'];
  
   
    $sql="SELECT * from student_enrollment where  present_class='$class' and status='APPROVED' order by studentid asc";
    $ask=mysqli_query($conn, $sql);


    if (mysqli_num_rows($ask)>0) {
        $i=1;?>
             <div class="container" style="height: 650px;overflow: scroll;">
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
                    title: 'Student Data Report Class:<?php echo"$class "; ?>',
                   
                    key: { // press E for export excel
                        key: 'e',
                        altKey: false
                    }
                },
                {
                    extend: 'print',
                    className: 'badge bg-warning text-dark',
                    title: '<center><h2><img src="img/logo (2).png" height="60px" width="60px">SRI SATHYA SAI VIDYANIKETAN </h2><h5>Student Data Report of Class: <?php echo"$class "; ?></h5><h6>Developed By- Stark Tech Innovative Labs</h6></center>',
                    text: 'Print ',
                    orientation: 'landscape',
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
                    pageSize: 'A3',
                    title: 'Student Data Report Class:<?php echo"$class "; ?>',
                   
                    key: { // press E for export excel
                        key: 'p',
                        altKey: false
                    }
                },
                {
                    extend: 'copy',
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
        $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
        $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
        $('#dtMaterialDesignExample_wrapper .mdb-select').material_select();
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
</script>
             <table id="example" class="table table-responsive-md" style="width:100%;">
<thead class="thead-dark">
    
        <th>Sl No</th>
        <th>Admission No</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Gender</th>
        <th>Class/Section</th>
        <th>Father Name</th>
        <th>Mother Name</th>
        <th>Mobile No</th>
        <th>Address</th>
        <th>Image</th>
       

    
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($ask)){  echo mysqli_error($conn);
     
    ?>
   <tr>
   <td> <?php echo $i++;?> </td>
   <td> <?php echo $row['admission_no']; ?> </td>
   <td> <?php echo $row['student_name'];?> </td>
   <td> <?php echo $row['studentid'];?> </td>
    <td> <?php echo $row['gender'];?> </td>
    <td> <?php echo $row['present_class']."-".$row['present_section'];?> </td>
    <td> <?php echo $row['father_name'];?> </td>
    <td> <?php echo $row['mother_name'];?> </td>
    <td> <?php echo $row['father_number'];?> </td>
    <td> <?php echo $row['permanentaddress'];?> </td>
    
    <td> <img src="https://admissions.sssvnbagepalli.in/student_pics/<?php echo $row['img_url'];?>" alt=""> <small>https://admissions.sssvnbagepalli.in/student_pics/<?php echo $row['img_url'];?></small> </td>
    </tr>



<?php } }else{
echo mysqli_error($conn);
  }
}
  ?>

</tbody>
</table></div>   
<center><?php include'footer.php';?></center>