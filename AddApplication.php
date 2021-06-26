
<?php include 'header.php'; ?>
<title>Add Application | <?php echo $theader;?></title>
<form id="form1" name="form1" method="post" class="form-group m-3" action="UploadApplication">

    <div class="row">
        <div class="col-sm"><label for="student_name">Student Name :</label><input autocomplete="off" autocapitalize="true" required class="form-control" type="text" name="student_name" id="student_name" /></div>
        <div class="col-sm"><label for="father_name">Father Name :</label><input autocomplete="off" autocapitalize="true" required class="form-control" type="text" name="father_name" id="father_name" /></div>
        <div class="col-sm"><label for="father_number">Father/Mother No. (WhatsApp) :</label><input autocomplete="off"  class="form-control" type="tel" required name="father_number" id="father_number" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="father_email">Father/Mother Email :</label><input autocomplete="off"  class="form-control" type="email" name="father_email" id="father_email" /></div>
        <div class="col-sm"><label for="ref_no">Ref No.:</label><input class="form-control" type="text" value="<?php
                                                                                        $sql = "select max(ref_no) as str from applications ";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $r = mysqli_fetch_array($result);
                                                                                        $str = $r['str'];
                                                                                        echo ++$str; ?>" readonly name="ref_no" id="ref_no" /></div>
        <div class="col-sm"><label for="login">Login</label><input class="form-control" readonly value="<?php echo $_SESSION['username']; ?>" type="text" name="login" id="login" /></div>
    </div>
    <center><button type="submit" class="btn btn-danger m-5">Add Applicant</button></center>
</form>

<?php include 'footer.php' ?>