<?php include 'header.php';  if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){ ?>
<title>Verfication || Stark Tech</title>
<style>
    .form-control {
        width: auto;
    }
</style>
<?php $enr = my_simple_crypt($_GET['enr'], 'd');

if (empty($enr)) { ?>
    <script>
        window.location.replace("index");
    </script>
<?php }

?>
<center>
    <form action="" method="post">
        <fieldset>
            <legend>Candidate Enrollment Approval Portal</legend>
            <label for="">
                ENROLLMENT NUMBER:
            </label><input type="text" name="enrollment" value="<?php echo $enr; ?>" readonly style="border:none;background-color:inherit;font-weight:bolder" id="" class="form-control">
            <br>
            <div class="row">

                <div class="col-sm">
                    <label for="">ADMISSION CATEGORY</label>
                    <select name="adm_cat" class="form-control" id="selectBox" onchange="changeFunc();">
                        <option value="RTE">RTE</option>
                        <option value="PAID" selected>PAID</option>
                        <option value="SPONSORED">SPONSORED</option>
                    </select>
                </div>
                <div class="col-sm"> <label for="">
                        Admission Class:
                    </label>
                    <select name="admissionclass" class="form-control" id="">
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
                </div>
                <div class="col-sm"> <label for="">Status :</label>
                    <select name="status" class="form-control" id="">
                    <option value="WAITING" selected >WAITING</option>
                        <option value="APPROVED">APPROVED</option>
                        <option value="REJECTED">REJECTED</option>
                    </select>
                </div>


            </div>
            <div class="row">
                <div class="col-sm">
                    <label for="">Admission No</label>
                    <input type="text" name="admission_no" id="" class="form-control">
                </div>

               
            </div>
            <br>

        </fieldset><br>
        <script type="text/javascript">
            function changeFunc() {
                var selectBox = document.getElementById("selectBox");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if (selectedValue == "SPONSORED") {
                    $('#textboxes').show();
                } else {
                    $('#textboxes').hide();
                }
            }
        </script>
        <fieldset style="display: none" id="textboxes">
            <legend>Sponsorer Details</legend>
            <div class="row">
                <div class="col-sm">
                    <label for="">
                        NAME:
                    </label>
                    <input type="text" name="spons" id="" placeholder="Sponsorer Name" class="form-control">
                </div>

                <div class="col-sm">
                    <label for="">
                        MOBILE NUMBER:
                    </label>
                    <input type="tel" name="spons_number" id="" placeholder="Sponsorer Number" class="form-control">
                </div>
                <div class="col-sm">
                    <label for="">
                        ADDRESS:
                    </label>
                    <textarea name="spons_address" class="form-control" placeholder="Sponsorer Residential Address" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </fieldset><br>
        <button type="submit" name="update" class="btn btn-success btn-lg">VERIFY</button>
    </form>


</center>
<?php
if (isset($_POST['update'])) {

    $query = mysqli_query($conn,"select max(studentid) as str from student_enrollment"); 
    // GET THE LAST ID MAKE SURE IN TABLE YOU 9991
    
    while ($row = mysqli_fetch_array($query)) {
      $lastId =  $row['str'];
    }
    
   

    $sid =++$lastId;
                                                                    $enr = $_POST['enrollment'];
                                                                    $adm_cat = $_POST['adm_cat'];
                                                                    $admissionclass = $_POST['admissionclass'];
                                                                    $status = $_POST['status'];
                                                                    $spons = $_POST['spons'];
                                                                    $spons_number = $_POST['spons_number'];
                                                                    $spons_address = $_POST['spons_address'];
                                                                    $admission_no = $_POST['admission_no'];
                                                                    if ($_POST['status'] == "APPROVED") {
                                                                        $studentid = $sid;
                                                                    } elseif ($_POST['status'] == "REJECTED" || $_POST['status'] == "WAITING") {
                                                                        $studentid = "::NOT ASSIGNED::";
                                                                    }
                                                                    $ap_time = date("Y-m-d h:i:sa");
                                                                    $sql = "UPDATE `student_enrollment` SET `adm_cat`='$adm_cat',`admissionclass`='$admissionclass',`status`='$status',`spons`='$spons',`spons_number`='$spons_number',`spons_address`='$spons_address',`approval_time`='$ap_time',`studentid`='$studentid',`admission_no`='$admission_no',`present_class`='$admissionclass' WHERE enrollment='$enr'";
                                                                    $update = mysqli_query($conn, $sql);
                                                                    if ($update == 1) {
                                                                        echo "<script>alert('$enr has been verified & $status ID-$studentid')</script>"; ?>
        <script>
            window.location.replace("SearchEnrollment");
        </script>
    <?php
                                                                    } elseif ($update == 0) {
                                                                        echo "<script>alert('Sorry an Error occured While Verifying $enr')</script>"; ?>
        <script>
            window.location.replace("index");
        </script>
<?php
                                                                    }
                                                                }
?>

<?php } include 'footer.php'; ?>