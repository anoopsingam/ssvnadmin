<?php 
            $date=date("Y-m-d");
            //fetch notice from database
            include'database.php';
            $query = "SELECT * FROM notice WHERE notice_date='$date' and notice_gen='true'";
           
            $result = mysqli_query($conn, $query);
            
           
            //fetch row in json response
        
if (mysqli_num_rows($result)>0) {
    ?>
    <div class="alert alert-success text-center">New Notice for <?php echo $date?>.</div>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
            
        <div class="col-lg-4"><h5 id="notice_title"><?php  echo $row['notice_header']; ?></h5></div>
        <div class="col-lg-2"><h5 id="notice_type"><?php echo $row['notice_type']; ?></h5></div>
        <div class="col-lg-4"><h5 id="notice_data"><?php echo $row['notice_data']; ?></h5></div>
        <div class="col-lg-2"><h5 id="notice_date"><?php echo $row['notice_date']; ?></h5></div>
        <div class="row bg-light">
      .
    </div>
        
<?php
        //echo json_encode(["notice_title"=>"".$row['notice_header'],"notice_date"=>"".$row['notice_data'],"notice_date"=>"".$row['notice_date'],"notice_type"=>"".$row['notice_type'],"notice_gen"=>"".$row['notice_gen']]);
    }
}
else{
//     echo json_encode(["notice_title"=>"No notice found","notice_date"=>"No notice found","notice_type"=>"No notice found","notice_gen"=>"No notice found"]);
echo "<div class='alert alert-danger text-center' role='alert'><b>No Notice Found for $date</b></div>";

}


?>