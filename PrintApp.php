<?php
include 'database.php';
function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'mwa_encyption';
    $secret_iv = '9886162566';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
$dcry = my_simple_crypt($_GET['enr'], 'd');

$sql = "SELECT * FROM student_enrollment WHERE enrollment='$dcry'";
$ask = mysqli_query($conn, $sql);
if (mysqli_num_rows($ask) > 0) {
    while ($row = mysqli_fetch_assoc($ask)) { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
            <title>SSSVN ADMISSION | STARK TECH </title>
            <link rel="stylesheet" href="side.css">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <style>
                .example-print {
                    display: none;
                }

                @media print {
                    .example-screen {
                        display: none;
                    }

                    .example-print {
                        display: block;
                    }
                }

                td {
                    text-align: center;
                }

                .header {
                    align-items: center;

                    width: 100%;
                    justify-content: center;
                    flex: auto;

                    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                    backdrop-filter: blur(8.0px);
                    -webkit-backdrop-filter: blur(8.0px);
                    border-radius: 10px;
                    border: 1px solid rgba(255, 255, 255, 0.18);
                }

                .logo {
                    border: solid black 3px;
                }

                .table-bordered {
                    border-width: 2px;
                    border-color: black;
                }
                table{
                    overflow: scroll;
                }

                td {
                    border-width: 10px;
                }

                .declaration {
                    border-color: 5px black;

                }

                @media print {
                    footer {
                        page-break-after: always;
                    }
                }

                body {
                    font-family: 'Ubuntu', sans-serif;


                }
            </style>
        </head>
        <!-- onload="window.print()" -->

        <body class="text-capitalize">

        <div class="container">
                <div class="header">
                    <center>
                        <small>A UNIT OF SRI SARVA DHARAMA SAMANVAYA TRUST (R)</small>
                        <h3><img src="img/logo (2).png" class="" height="130px" width="130px" alt=""> <br> SRI SATHYA SAI VIDYANIKETAN <br>
                        <small>Sri Sathya Sai Nagar, Bagepalli, Chikkaballapura Dist,  KARNATAKA-561207</small><br><h5>PH.NO: 7022537447, 9966930530, 8494961431<h5>
                            <br><h4>  APPLICATION FOR ADMISSION</h4></h3>

                    </center>
                </div><br>


                <h4 style="float: center ;">STUDENT DETAILS</h4>
                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td class="text-danger">APPLICATION NO. : <br><strong><?php echo $row['app_no'] ?></strong> </td>

                        <td>STUDENT NAME : <br><strong><?php echo $row['student_name'] ?></strong></td>
                        <td> <img class="logo" src="https://admissions.sssvnbagepalli.in/student_pics/<?php echo $row['img_url'] ?>" width="130px" height="130px" alt="<?php echo $row['student_name'] ?>" srcset="">
                        </td>
                        <td><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php $date = date('d-m-Y');
                                                                                                echo "Studentid=" . $row['studentid'] . ' Enrollment No=' . $row['enrollment'] . ' Admission Date=' . $row['enroll_time'] . ' Date of Printing=' . $date ?>" alt="<?php echo $row['student_name'] ?>" srcset=""></td>

                    </tr>
                    <tr>
                        <td>STUDENT ID : <br><strong><?php echo $row['studentid'] ?></strong> </td>

                        <td>
                            <label>GENDER : </label>

                            <br><strong><?php echo $row['gender'] ?></strong>
                        </td>

                        <td>MAIL ID : <br><strong><?php echo $row['studentemail'] ?></strong> </td>
                        <td>DATE OF BIRTH: <br><strong><?php echo $row['dob'] ?></strong></td>
                    </tr>
                </table>

                <br>


                <h4 style="float: center ;">FATHER'S DETAILS</h4>

                <table class="table table-bordered  " style="width: 100%; height: 100%;">
                    <tr>
                        <td>FATHER'S NAME : <br><strong><?php echo $row['father_name'] ?></strong> </td>
                        <td>PHONE NO. (WHATSAPP <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>): <br><strong><?php echo $row['father_number'] ?></strong> </td>
                        <td>FATHER'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['fathereducation'] ?></strong> </td>
                    </tr>
                    <tr>
                        <td> OCCUPATION : <br><strong><?php echo $row['fatheroccupation'] ?></strong> </td>
                        <td>ANNUAL INCOME : <br><strong><?php echo $row['father_income'] ?></strong> </td>
                        <td>FATHER'S EMAIL ID : <br><strong><?php echo $row['fatheremail'] ?></strong></td>
                    </tr>
                </table>


                <br>


                <h4 style="float: center ;">MOTHER'S DETAILS</h4>

                <table class="table   table-bordered" style="width: 100%; height: 100%;">
                    <tr>
                        <td>MOTHER'S NAME : <br><strong><?php echo $row['mother_name'] ?></strong> </td>
                        <td>PHONE NO. : <br><strong><?php echo $row['mother_number'] ?></strong> </td>
                        <td>MOTHER'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['mothereducation'] ?></strong> </td>
                    </tr>
                    <tr>
                        <td> OCCUPATION : <br><strong><?php echo $row['motheroccupation'] ?></strong> </td>
                        <td>ANNUAL INCOME : <br><strong><?php echo $row['mother_income'] ?></strong> </td>
                        <td>MOTHER'S EMAIL ID : <br><strong><?php echo $row['motheremail'] ?></strong></td>
                    </tr>
                </table>


                <br>


                <h4 style="float: center ;">GUARDIAN'S DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td>GUARDIAN'S NAME : <br><strong><?php echo $row['guardian_name'] ?></strong> </td>
                        <td>PHONE NO. : <br><strong><?php echo $row['guardian_mobile'] ?></strong> </td>
                        <td>GUARDIAN'S EDUCATION QUALIFICATION : <br><strong><?php echo $row['guardianeducation'] ?></strong> </td>
                    </tr>
                    <tr>
                        <td>ANNUAL INCOME : <br><strong><?php echo $row['guardian_income'] ?></strong></td>
                        <td>GUARDIAN'S EMAIL ID : <br><strong><?php echo $row['guardianemail'] ?></strong></td>
                        <td>GUARDIAN'S RELATIONSHIP WITH STUDENT : <br><strong><?php echo $row['guardian_relation'] ?></strong></td>
                    </tr>
                    <tr>
                        <td></td>

                        <td> OCCUPATION : <br><strong><?php echo $row['guardianoccupation'] ?></strong> </td>
                        <td></td>

                    </tr>
                </table>


                <br>

                <footer></footer>


                <h4 style="float: center ;">ADDRESS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">

                    <tr>
                        <td> TEMPORARY ADDRESS : <br><strong><?php echo $row['temporaryaddress'] ?></strong> </td>
                        <td> PERMANENT ADDRESS : <br><strong><?php echo $row['permanentaddress'] ?></strong> </td>
                        <td> LOCAL GUARDIAN ADDRESS :<br><strong><?php echo $row['guardianaddress'] ?></strong> </td>
                    </tr>


                </table>


                <h4 style="float: center ;">FAMILY DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td> NO. OF FAMILY MEMBERS : <br><strong><?php echo $row['total_family'] ?></strong>
                        </td>
                        <td>NATIONALITY : <br><strong><?php echo $row['nationality'] ?></strong> </td>
                        <td>RELIGION : <br><strong><?php echo $row['religion'] ?></strong> </td>

                    </tr>
                    <tr>
                        <td>CASTE CODE : <br><strong><?php echo $row['subcaste'] ?></strong> </td>

                        <td>MOTHER TONGUE : <br><strong><?php echo $row['mothertongue'] ?></strong> </td>

                        <td>PLACE OF BIRTH : <br><strong><?php echo $row['birthplace'] ?></strong></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td> CASTE : <br><strong><?php echo $row['caste'] ?></strong> </td>
                        <td></td>

                    </tr>
                </table>


                <br>



                <h4 style="float: center ;">ACADEMIC DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">


                    <tr>
                        <td> NAME OF THE PREVIOUS SCHOOL STUDENT STUDIED :<br><strong><?php echo $row['previousschool'] ?></strong> </td>
                        <td> PLACE WHERE PREVIOUS SCHOOL IS LOCATED :<br><strong><?php echo $row['previousschool_address'] ?></strong> </td>

                        <td> PREVIOUS ATTENDED CLASS : <br><strong><?php echo $row['previousclass'] ?></strong>
                        </td>

                    </tr>


                    <tr>

                        <td> ADMISSION SOUGHT FOR : <br><strong><?php echo $row['admissionclass'] ?></strong>
                        </td>

                        <td> MEDIUM : <br><strong><?php echo $row['medium_c'] ?></strong>
                        </td>
                        <td></td>

                    </tr>
                </table>


                <br>


                <h4 style="float: center ;">STUDENT BANK DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td>BANK NAME: <br><strong><?php echo $row['Studentbank'] ?></strong> </td>
                        <td>ACCOUNT NO. : <br><strong><?php echo $row['acc_no'] ?></strong> </td>

                    </tr>
                    <tr>

                        <td> IFSC CODE : <br><strong><?php echo $row['ifsc'] ?></strong> </td>
                        <td> ADDRESS : <br><strong><?php echo $row['bankaddress'] ?></strong></td>
                    </tr>
                </table>


                <br>



                <h4 style="float: center ;">DOCUMENTATION DETAILS</h4>

                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td>STUDENT’S AADHAR NO.: <br><strong><?php echo $row['studentaadhar'] ?></strong> </td>
                        <td>FATHER'S AADHAR NO. : <br><strong><?php echo $row['fatheraadhar'] ?></strong> </td>
                        <td>MOTHER'S AADHAR NO. : <br><strong><?php echo $row['motheraadhar'] ?></strong> </td>
                    </tr>
                    <tr>
                        <td> STUDENT'S CASTE CERTIFICATE NUMBER : <br><strong><?php echo $row['studentcastenumber'] ?></strong> </td>
                        <td> FATHER'S CASTE CERTIFICATE NUMBER : <br><strong><?php echo $row['fathercastenumber'] ?></strong></td>
                        <td> MOTHER'S CASTE CERTIFICATE NUMBER: <br><strong><?php echo $row['mothercastenumber'] ?></strong></td>
                    </tr>
                    <tr>

                        <td>STUDENT'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['studentincomenumber'] ?></strong></td>
                        <td>FATHER'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['Fatherincomenumber'] ?></strong></td>
                        <td>MOTHER'S INCOME CERTIFICATE NO. : <br><strong><?php echo $row['motherincomenumber'] ?></strong></td>
                    </tr>
                    <tr>
                    <td>BIRTH CERTIFICATE NO. : <br><strong><?php echo $row['birthcertificate'] ?></strong></td>

                        <td>RATION CARD NO. : <br><strong><?php echo $row['rationcard'] ?></strong></td>
                        <td></td>
                    </tr>

                </table>


                <br>

                <footer></footer>

                <h4 style="float: center ;">SIBLING'S DETAILS</h4>


                <strong>
                    <h6>DOES THE APPLICANT HAVE ANY BROTHER(S) OR SISTER(S) STUDYING/STUDIED IN THE INSTITUTION?</h6>
                    <p class="text-danger">[IF YES PLEASE GIVE BELOW DETAILS OF APPLICANT’S SIBLINGS]</p>
                </strong>



                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Class</th>
                        <th>Place</th>
                    </tr>

                    <tr>
                        <td>1.</td>
                        <td> <br><strong><?php echo $row['syb1'] ?></strong> </td>
                        <td> <br><strong><?php echo $row['sybgen1'] ?></strong>

                        <td> <br><strong><?php echo $row['sybclass1'] ?></strong>
                        </td>

                        <td>
                            <br><strong><?php echo $row['sybplace1'] ?></strong>
                        </td>

                    </tr>


                    <tr>
                        <td>2.</td>
                        <td><br><strong><?php echo $row['syb2'] ?></strong> </td>
                        <td> <br><strong><?php echo $row['sybgen2'] ?></strong> </td>


                        <td> <br><strong><?php echo $row['sybclass2'] ?></strong>
                        </td>

                        <td> <br><strong><?php echo $row['sybplace2'] ?></strong>

                    </tr>
                </table>




                <h4 style="float: center ;">AFFILITION WITH SRI SATYA SAI ORGANISATIONS</h4>


                <table class="table table-bordered " style="width: 100%; height: 100%;">
                    <tr>
                        <td>
                            <h6> HAS / HAVE THE PARENT/ PARENTS / GUARDIAN BEEN A MEMBER OF SRI SATHYA SEVA
                                ORGANIZATION ?
                            </h6>
                            <p class="text-danger">[IF YES PLEASE GIVE BELOW DETAILS ] : </p>
                            <br><strong><?php echo $row['sevaname'] ?></strong>
                        </td>
                        <td style="padding-left: 30px;"> IS THE APPLICANT A BAL VIKAS STUDENT? : <br><strong><?php echo $row['balvikas'] ?></strong> </td>

                    </tr>

                </table>
                <center><span class="text-danger text-uppercase text-break">
                <h5 style="color: red;"><strong>NOTE :</strong> ORIGINAL BIRTH CERTIFICATE MUST BE SUBMITTED AT THE TIME OF ADMISSION (APPLICABLE ONLY FOR 1ST STANDARD STUDENTS) </h5>

                    </span></center>






                <div class="declaration">
                    <hr style="height :  2px;background-color :  black">
                    <center>
                        <h4>DECLARATION</h4>
                        <ul>
                            <li style=" list-style-position: outside;">
                                I DO HEREBY DECLARE THAT THE ABOVE INFORMATION IS CORRECT TO THE BEST OF MY KNOWLEDGE AND BELIEF & I SHALL ABIDE BY THE RULES AND REGULATIONS OF THE INSTITUTION.
                            </li>
                            <li style=" list-style-position: outside;">
                                I UNDERTAKE TO ABIDE BY THE RULES AND REGULATIONS OF THE SCHOOL IN ACADEMICS, SPORTS, CODE OF CONDUCT, DISCIPLINE, EDUCATION IN HUMAN VALUES, EXTRA-CURRICULAR AND OTHER ACTIVITIES AS GIVEN IN THE PROSPECTUS.
                            </li>
                            <li style=" list-style-position: outside;">
                                IN THE EVENT OF ANY ACT OF INDISCIPLINE ON MY PART, THE DECISION OF THE PRINCIPAL/MANAGEMENT SHALL BE FINAL AND BINDING ON ME.
                            </li>
                        </ul>
                    </center>
                    
                    
                    <h4 style="padding-top: 30px;text-align:center;">I ENDORSE THE ABOVE STATEMENTS</h4>
                    <p class="text-left"> ADMISSION NO.: <strong><?php echo $row['admission_no'] ?></strong></p>
                    <p class="text-left"> ACADEMIC YEAR: <strong><?php echo $row['academic_year'] ?></strong></p>
                    <p class="text-left">ENROLLMENT DATE : <strong><?php echo $row['datess'] ?></strong></p>
                    <p class="text-left">ENROLLMENT NO.: <strong><?php

                                                                    $text = $row['enrollment'];
                                                                    echo "<img alt='BARCODE' src='barcode?codetype=Code39&size=25&text=" . $text . "&print=true'/>";

                                                                    ?></strong></p>
                    <div class="sign main" style="padding-top: 60px; padding-right: 60px; float: right;">
                        <h6> ____________________</h6>

                        <h6>APPLICANT’S SIGNATURE</h6>
                    </div>





                    <div class="sign main" style="padding-top: 60px; ">
                        <h6> ___________________</h6>

                        <h6>PARENTS'S SIGN</h6>
                        Application Printed on: <?php echo date('d-m-Y') ?>
                    </div><br><br><br>
                    <h5 class="text-right">SIGN OF THE HEAD OF
                        INSTITUTION WITH SEAL</h5>
                    <hr style="height :  2px;background-color :  black">
                </div>


            </div>

            <h6>


                <?php include 'footer.php' ?>

            </h6>

            <script src="https :  //code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https :  //cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        </body>

        </html>
        <center class="example-screen"><button class="btn btn-warning" onclick="window.print();">PRINT APPLICATION</button></center>

<?php
    }
} else {
    echo "error in processing" . mysqli_errno($link);
}
?>