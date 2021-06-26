<?php //Post Params 
$ubs_class = $_POST['ubs_class'];  
$ubs_fee = $_POST['ubs_fee'];  
$academic_year = $_POST['academic_year'];    
$login = $_POST['login']; 

include'database.php';
$check = "SELECT * FROM ubs_fee WHERE ubs_class = '$ubs_class'  and academic_year = '$academic_year' ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
    $view=mysqli_fetch_assoc($rs);
    $fee_=$view['ubs_fee'];
?>
  <script>
    alert("<?php echo "UBS Fee for $ubs_class of $fee_ is already Added for $academic_year..!!"; ?>")
    window.location.assign("AddUbsFee")
  </script>
  <?php
} else {

 //INSERT 
 $query = " INSERT INTO ubs_fee ( ubs_class, ubs_fee, academic_year, login )  VALUES ( '$ubs_class', '$ubs_fee', '$academic_year', '$login' ) "; 
 $result = mysqli_query($conn,$query); 

 if( $result )
 {
    echo"<script>alert('UBS Fee $ubs_fee has been Added to Class- $ubs_class for $academic_year ')</script>"; ?>
    <script>   window.location.replace("AddUbsFee");
    </script> 
    <?php
 }
 else
 {
    echo"<script>alert('UBS Fee $ubs_fee Failed to Add to $ubs_class for $academic_year...! Contact Technical Team..! ')</script>"; ?>
    <script>   window.location.replace("index");
    </script> 
    <?php
 }
}
?>