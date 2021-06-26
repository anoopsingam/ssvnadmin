

<?php include'header.php';?>
<title>View Application | <?php echo $theader;?></title>
<?php $dcry = my_simple_crypt( $_GET['enr'], 'd' );
?> <?php if(empty($dcry)){?>
    <script>   window.location.replace("index");
   </script> 
   <?php
}?>
<?php
$sql="SELECT * FROM student_enrollment WHERE enrollment='$dcry'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>
   
    <div style="overflow:scroll;  overflow-y: hidden;
  overflow-x: hidden;">

<h4 style="float: center ;">STUDENT DETAILS</h4>
                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm text-danger">APPLICATION NO. : <br><strong><?php echo $row['app_no'] ?></strong> </div>

                        <div class="col-sm">STUDENT NAME : <br><strong><?php echo $row['student_name'] ?></strong></div>
                        <div class="col-sm"> <img class="logo" src="https://admissions.sssvnbagepalli.in/student_pics/<?php echo $row['img_url'] ?>" width="130px" height="130px" alt="<?php echo $row['student_name'] ?>" srcset="">
                        </div>
                        <div class="col-sm"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php $date = date('d-m-Y');
                                                                                                echo "Studentid=" . $row['studentid'] . ' Enrollment No=' . $row['enrollment'] . ' Admission Date=' . $row['enroll_time'] . ' Date of Printing=' . $date ?>" alt="<?php echo $row['student_name'] ?>" srcset=""></div>

                    </div>
                    <div class="row">
                        <div class="col-sm">STUDENT ID : <br><strong><?php echo $row['studentid'] ?></strong> </div>

                        <div class="col-sm">
                            <label>GENDER : </label>

                            <br><strong><?php echo $row['gender'] ?></strong>
                        </div>

                        <div class="col-sm">MAIL ID : <br><strong><?php echo $row['studentemail'] ?></strong> </div>
                        <div class="col-sm">DATE OF BIRTH: <br><strong><?php echo $row['dob'] ?></strong></div>
                    </div>
                </table>

                <br>


                <h4 style="float: center ;">FATHER'S DETAILS</h4>

                <table class="table table-bordered  " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">FATHER'S NAME : <br><strong><?php echo $row['father_name'] ?></strong> </div>
                        <div class="col-sm">PHONE NO. : <br><strong><?php echo $row['father_number'] ?></strong> </div>
                        <div class="col-sm">FATHER'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['fathereducation'] ?></strong> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm"> OCCUPATION : <br><strong><?php echo $row['fatheroccupation'] ?></strong> </div>
                        <div class="col-sm">ANNUAL INCOME : <br><strong><?php echo $row['father_income'] ?></strong> </div>
                        <div class="col-sm">FATHER'S EMAIL ID : <br><strong><?php echo $row['fatheremail'] ?></strong></div>
                    </div>
                </table>


                <br>


                <h4 style="float: center ;">MOTHER'S DETAILS</h4>

                <table class="table   table-bordered" style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">MOTHER'S NAME : <br><strong><?php echo $row['mother_name'] ?></strong> </div>
                        <div class="col-sm">PHONE NO. : <br><strong><?php echo $row['mother_number'] ?></strong> </div>
                        <div class="col-sm">MOTHER'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['mothereducation'] ?></strong> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm"> OCCUPATION : <br><strong><?php echo $row['motheroccupation'] ?></strong> </div>
                        <div class="col-sm">ANNUAL INCOME : <br><strong><?php echo $row['mother_income'] ?></strong> </div>
                        <div class="col-sm">MOTHER'S EMAIL ID : <br><strong><?php echo $row['motheremail'] ?></strong></div>
                    </div>
                </table>


                <br>


                <h4 style="float: center ;">GUARDIAN'S DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">GUARDIAN'S NAME : <br><strong><?php echo $row['guardian_name'] ?></strong> </div>
                        <div class="col-sm">PHONE NO. : <br><strong><?php echo $row['guardian_mobile'] ?></strong> </div>
                        <div class="col-sm">GUARDIAN'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['guardianeducation'] ?></strong> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">ANNUAL INCOME : <br><strong><?php echo $row['guardian_income'] ?></strong></div>
                        <div class="col-sm">GUARDIAN'S EMAIL ID : <br><strong><?php echo $row['guardianemail'] ?></strong></div>
                        <div class="col-sm">GUARDIAN'S RELATIONSHIP WITH STUDENT : <br><strong><?php echo $row['guardian_relation'] ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm"></div>

                        <div class="col-sm"> OCCUPATION : <br><strong><?php echo $row['guardianoccupation'] ?></strong> </div>
                        <div class="col-sm"></div>

                    </div>
                </table>


                <br>



                <h4 style="float: center ;">ADDRESS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">

                    <div class="row">
                        <div class="col-sm"> TEMPORARY ADDRESS : <br><strong><?php echo $row['temporaryaddress'] ?></strong> </div>
                        <div class="col-sm"> PERMANENT ADDRESS : <br><strong><?php echo $row['permanentaddress'] ?></strong> </div>
                        <div class="col-sm"> LOCAL GUARDIAN ADDRESS :<br><strong><?php echo $row['guardianaddress'] ?></strong> </div>
                    </div>


                </table>


               <footer></footer>
                <h4 style="float: center ;">FAMILY DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm"> NO. OF FAMILY MEMBERS : <br><strong><?php echo $row['total_family'] ?></strong>
                        </div>
                        <div class="col-sm">NATIONALITY : <br><strong><?php echo $row['nationality'] ?></strong> </div>
                        <div class="col-sm">RELIGION : <br><strong><?php echo $row['religion'] ?></strong> </div>

                    </div>
                    <div class="row">
                        <div class="col-sm">CASTE CODE : <br><strong><?php echo $row['subcaste'] ?></strong> </div>

                        <div class="col-sm">MOTHER TONGUE : <br><strong><?php echo $row['mothertongue'] ?></strong> </div>

                        <div class="col-sm">PLACE OF BIRTH : <br><strong><?php echo $row['birthplace'] ?></strong></div>

                    </div>
                    <div class="row">
                        <div class="col-sm"></div>
                        <div class="col-sm"> CASTE : <br><strong><?php echo $row['caste'] ?></strong> </div>
                        <div class="col-sm"></div>

                    </div>
                </table>


                <br>



                <h4 style="float: center ;">ACADEMIC DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">


                    <div class="row">
                        <div class="col-sm"> NAME OF THE PREVIOUS SCHOOL STUDENT STUDIED :<br><strong><?php echo $row['previousschool'] ?></strong> </div>
                        <div class="col-sm"> PLACE WHERE PREVIOUS SCHOOL IS LOCATED :<br><strong><?php echo $row['previousschool_address'] ?></strong> </div>

                        <div class="col-sm"> PREVIOUS ATTENDED CLASS : <br><strong><?php echo $row['previousclass'] ?></strong>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm"> ADMISSION SOUGHT FOR : <br><strong><?php echo $row['admissionclass'] ?></strong>
                        </div>

                        <div class="col-sm"> MEDIUM : <br><strong><?php echo $row['medium_c'] ?></strong>
                        </div>
                        <div class="col-sm"></div>

                    </div>
                </table>


                <br>


                <h4 style="float: center ;">STUDENT BANK DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">BANK NAME: <br><strong><?php echo $row['Studentbank'] ?></strong> </div>
                        <div class="col-sm">ACCOUNT NO. : <br><strong><?php echo $row['acc_no'] ?></strong> </div>

                    </div>
                    <div class="row">

                        <div class="col-sm"> IFSC CODE : <br><strong><?php echo $row['ifsc'] ?></strong> </div>
                        <div class="col-sm"> ADDRESS : <br><strong><?php echo $row['bankaddress'] ?></strong></div>
                    </div>
                </table>


                <br>



                <h4 style="float: center ;">DOCUMENTATION DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">STUDENT’S AADHAR NO.: <br><strong><?php echo $row['studentaadhar'] ?></strong> </div>
                        <div class="col-sm">FATHER'S AADHAR NO. : <br><strong><?php echo $row['fatheraadhar'] ?></strong> </div>
                        <div class="col-sm">MOTHER'S AADHAR NO. : <br><strong><?php echo $row['motheraadhar'] ?></strong> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm"> STUDENT'S CASTE CERTIFICATE NUMBER : <br><strong><?php echo $row['studentcastenumber'] ?></strong> </div>
                        <div class="col-sm"> FATHER'S CASTE CERTIFICATE NUMBER : <br><strong><?php echo $row['fathercastenumber'] ?></strong></div>
                        <div class="col-sm"> MOTHER'S CASTE CERTIFICATE NUMBER: <br><strong><?php echo $row['mothercastenumber'] ?></strong></div>
                    </div>
                    <div class="row">

                        <div class="col-sm">STUDENT'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['studentincomenumber'] ?></strong></div>
                        <div class="col-sm">FATHER'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['Fatherincomenumber'] ?></strong></div>
                        <div class="col-sm">MOTHER'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['motherincomenumber'] ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm"></div>

                        <div class="col-sm">RATION CARD NO. : <br><strong><?php echo $row['rationcard'] ?></strong></div>
                        <div class="col-sm"></div>
                    </div>

                </table>


                <br>


                <h4 style="float: center ;">SIBLING'S DETAILS</h4>


                <strong>
                    <h6>DOES THE APPLICANT HAVE ANY BROTHER(S) OR SISTER(S) STUDYING/STUDIED IN THE INSTITUTION?</h6>
                    <p class="text-danger">[IF YES PLEASE GIVE BELOW DETAILS OF APPLICANT’S SIBLINGS]</p>
                </strong>



                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">Sl No.</div>
                        <div class="col-sm">Name</div>
                        <div class="col-sm">Relationship</div>
                        <div class="col-sm">Class</div>
                        <div class="col-sm">Place</div>
                    </div>

                    <div class="row">
                        <div class="col-sm">1.</div>
                        <div class="col-sm"> <br><strong><?php echo $row['syb1'] ?></strong> </div>
                        <div class="col-sm"> <br><strong><?php echo $row['sybgen1'] ?></strong></div>

                        <div class="col-sm"> <br><strong><?php echo $row['sybclass1'] ?></strong></div>

                        <div class="col-sm">
                            <br><strong><?php echo $row['sybplace1'] ?></strong>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm">2.</div>
                        <div class="col-sm"><br><strong><?php echo $row['syb2'] ?></strong> </div>
                        <div class="col-sm"> <br><strong><?php echo $row['sybgen2'] ?></strong> </div>


                        <div class="col-sm"> <br><strong><?php echo $row['sybclass2'] ?></strong>
                        </div>

                        <div class="col-sm"> <br><strong><?php echo $row['sybplace2'] ?></strong>

                    </div>
                </table>




                <h4 style="float: center ;">AFFILITION WITH SRI SATYA SAI ORGANISATIONS</h4>


                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <div class="row">
                        <div class="col-sm">
                            <h6> HAS / HAVE THE PARENT/ PARENTS / GUARDIAN BEEN A MEMBER OF SRI SATHYA SEVA
                                ORGANIZATION ?
                            </h6>
                            <p class="text-danger">[IF YES PLEASE GIVE BELOW DETAILS ] : </p>
                            <br><strong><?php echo $row['sevaname'] ?></strong>
                        </div>
                        <div class="col-sm" style="padding-left: 30px;"> IS THE APPLICANT A BAL VIKAS STUDENT? : <br><strong><?php echo $row['balvikas'] ?></strong> </div>

                    </div>

                </table>
                <p class="text-left"> ADMISSION NO: <strong><?php echo $row['admission_no'] ?></strong></p>

<p class="text-left">ENROLLMENT DATE : <strong><?php echo $row['datess'] ?></strong></p>
<p class="text-left">ENROLLMENT NO : <strong><?php

                                                $text = $row['enrollment'];
                                                echo "<img alt='BARCODE' src='barcode?codetype=Code39&size=25&text=" . $text . "&print=true'/>";

                                                ?></strong></p> <br>
                                                <center class="example-screen"><?php if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){ ?><a href="Verification?enr=<?php  echo my_simple_crypt($row['enrollment'], 'e');?>"><button class="btn btn-danger" >Verification</button></a></center>
  <?php } ?>
    </div>
    <center><br>
<?php include'footer.php';?>

</center>
 <br>

    <?php
    }
}else{
    echo"error in processing".mysqli_errno($conn);
}
?>
    </div>
