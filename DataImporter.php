<?php
$connect = mysqli_connect("localhost", "root", "", "sssvn");
$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("php/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=1; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $student_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $gender = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $dob = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $studentid= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $father_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $father_email= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $father_number = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $mother_name= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $mother_number = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $permanentaddress = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $nationality = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $taluk = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $district = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
    $village = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $medium_c = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
    $datess = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
    $adm_cat = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
    $admission_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
    $present_class = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
    $present_section = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());
    $academic_year = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());

    $query =" INSERT INTO student_enrollment ( student_name, gender, dob, studentid, father_name, fatheremail, father_number, mother_name, mother_number, permanentaddress, nationality,taluk, district, village, medium_c, datess, adm_cat,admission_no, present_class, present_section, academic_year)
                                    VALUES ( '$student_name', '$gender', '$dob','$studentid', '$father_name','$father_email', '$father_number','$mother_name', '$mother_number', '$permanentaddress', '$nationality', '$taluk', '$district', '$village',  '$medium_c', '$datess', '$adm_cat', '$admission_no', '$present_class', '$present_section','$academic_year' ) ";    
    $response=mysqli_query($connect, $query);
    $output .= '<td>'.$studentid.'</td>';
    $output .= '<td>'.$student_name.'</td>';
    $output .= '<td>'.$present_class.'</td>';
    $output .= '<td>'.$admission_no.'</td>';
    $output .= '<td>'.$father_number.'</td>';
    $output .= '<td>'.$response.'</td>';
    $output .= '</tr>';
   }
  } 
  if($response==true){
    echo "<script>alert('DATA INSERTED TO DATABASE SUCCESSFULLY !')</script>";
}elseif($response==false){
    echo"<script>alert('DATA FAILED TO INSERT PLEASE CONTACT TECHNICAL TEAM!')</script>";
    echo mysqli_error($connect);
}
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>SRI SATHYA SAI VIDYANIKETHAN STUDENT DATA IMPORT PORTAL </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="manifest" href="manifest.json">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">SRI SATHYA SAI VIDYANIKETHAN STUDENT DATA IMPORT PORTAL</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>  
  <?php include_once('footer.php');?>

 </body>
</html>