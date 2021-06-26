<?php //Post Params 

include'database.php';
$class = $_POST['class'];  
$fee = $_POST['fee'];  
$academic_year = $_POST['academic_year']; 
$login= $_POST['login']; 



$check = "SELECT * FROM tution_fee WHERE class = '$class'  and academic_year = '$academic_year' ";
$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) > 0) {
    $view=mysqli_fetch_assoc($rs);
    $fee_=$view['fee'];
?>
  <script>
    alert("<?php echo "Tution Fee for $class of $fee_ is already Added for $academic_year..!!"; ?>")
    window.location.assign("index")
  </script>
  <?php
} else {
    //INSERT
    $query = " INSERT INTO tution_fee ( class, fee, academic_year, login_id )  VALUES ( '$class', '$fee', '$academic_year','$login') ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo"<script>alert('Tution Fee $fee has been Added to $class for $academic_year ')</script>"; ?>
<script>   window.location.replace("AddTutionFee");
</script> 
<?php
    } else {
        echo"<script>alert('Tution Fee $fee Failed to Add to $class for $academic_year ')</script>"; ?>
<script>   window.location.replace("index");
</script> 
<?php
    }
}
?>