

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico"> 
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <title>SSSVN Tution Fee Receipt | Stark Tech</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            height: fit-content;
            background-color:white;
        }

        .main {
            width: 700px;
            margin: 10px auto;
            padding: 10px 0px;
            color: rgb(26, 26, 26);
        }

        /* #logo {
            max-height: 60px;
            min-height: 50px;
            padding: 0em 3em;
        } */

        .info-1,
        .info-2 {
            padding: 0px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .info {
            height: 20px;
        }

        .col {
            font-size: large;
            margin-top: 0px;
        }

        .col label {
            font-weight: 500;
        }

        .info,
        .footer {
            width: 95%;
            height: min-content;
            margin: 0px auto;
            padding: 5px;
        }

        table {
            width: 100%;
            padding: 0px 10px;
        }

        th,
        td {
            padding-left: 10px;
        }

        .fee-content {
            width: 90%;
            height: 3.5cm;
            padding: 0%;
            margin: 10px auto;
        }

        .fee-content .row,
        .fee-content .row .col-7 {
            line-height: 0;
            border-left: 3px solid #000;
        }

        .row h4 {
            border: 3px solid gray;
        }

        span {
            font-size: small;
        }

        label {
            font-size: medium;
        }
        

        .footer {
            padding: 0%;
            height: auto;
            padding-bottom: 0%;
        }
        </style>
</head>
<body>
<?php 
session_start();
include'database.php';
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
  }$dcry = my_simple_crypt( $_GET['billno'], 'd' );
?> 
<?php
$sql="SELECT * FROM student_tution_fee WHERE bill_no='$dcry' and discount_approval='approved'";
$ask=mysqli_query($conn,$sql);
if(mysqli_num_rows($ask)>0){
    while($row=mysqli_fetch_assoc($ask)){?>

<div class="main border border-5">
            <!-- HEADER PART -->
            <div class="container" style="border-bottom: 1px solid black; padding-bottom: 5px;">
                <div class="row">
                    <div class="col-3" style="text-align: start; ">
                        <a href="index"><img src="img/logo (2).png" id="logo" height="100px" width="100px" style="margin-left: 30px;" alt="logo"></a>
                    </div>
                    <div class="col-6" style="text-align: center; line-height: 1.2;">
                        <span style="font-weight:900; color: black; padding: 0px 50px; font-size: 16px;"> FEE
                            RECEIPT </span>
                            <span style="font-weight: 900; display: block; font-size: 15px;">SRI SATHYA SAI VIDYANIKETAN </span>
                        <span style="font-size: 8px;font-weight:bold;">Sri Sathya Sai Nagar,Bagepalli,Chikkaballapura Dist, KARNATAKA-561207<br>PH.NO: 7022537447, 9966930530, 8494961431</span>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
            <center> <span><strong><?php echo $row['installment'];?> DETAILS</strong></span><span style="float: right;font-size:10px;"><strong>REMITTER COPY</strong> </span></center>
            <!-- INFOMATION PART -->
            <div class="info">
                <div class="info-1">
                    <div class="col">
                        <label> Receipt No:</label>
                        <span><strong><?php echo $row['bill_no'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;">
                        <label>Date:</label>
                        <span><strong><?php echo $row['billing_date'];?></strong></span>
                    </div>
                </div>
                <div class="info-1">
                    <div class="col">
                        <label style="font-size: smaller;"> STUDENT ID:</label>
                        <span><strong> <img height="45px" width="100%" alt='<?php echo $row['student_name'];?>' src='barcode.php?codetype=Code39&size=30&text=<?php echo $row['student_id'];?>&print=true'/></strong></span>
                    </div>
                    <div class="col" style="text-align: center;">
                        <label>Class:</label>
                        <span><strong><?php echo $row['student_class'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;">
                        <label>Academic year:</label>
                        <span><strong><?php echo $row['academic_year'];?></strong></span>
                    </div>
                </div>
                <div class="info-2">
                    <div class="col">
                        <label>Student Name:</label>
                        <span><strong><?php echo $row['student_name'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;font-size:xx-small;">
                        <label>Fee Collected By [ID]:</label>
                        <span><strong><?php echo $row['login_id'];?></strong></span>
                    </div>

                </div>
                <div class="info-2">
                    <div class="col">
                        <label>TUTION FEE :</label>
                        <span><strong><?php echo $tut=$row['tution_fee'];?></strong></span>
                       
                    </div>
                    <?php if(!empty($row['transport_fee'])){
                         ?>
                    <div class="col">
                     
                    <label class="text-nowrap">TRANSPORT FEE :</label>
                        <span><strong><?php echo $tat=$row['transport_fee'];?></strong></span>
                    </div>
                    <?php
                            }?>
                    <div class="col" style="text-align: right;font-size:xx-small;">
                        <label>TOTAL FEE:</label>
                        <span><strong><?php  if(empty($tat)){ $tat=0; } echo $tut+$tat;  ?></strong></span>
                    </div>

                </div>  
            </div>

            <!-- FEE STRUCTURE -->
            <div class="fee-content">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">SL No.</th>
                            <th scope="col">Particulars</th>
                            <th scope="col"> Paid Amount (RS)</th>
                            <th scope="col"> Balance Amount (RS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tution Fee</td>
                            <td><strong><?php echo $row['paying_fee'];?></strong></td>
                            <td><strong><?php echo $row['balance_amount'];?></strong></td>
                        </tr>
                        <?php if(!empty($row['transport_fee'])){
                         ?>
                        <tr>
                            <th scope="row">2</th>
                            <td>Transport Fee</td>
                            <td><strong><?php echo $row['transport_fee_paying'];?></strong></td>
                            <td><strong><?php echo $row['transport_fee_balance'];?></strong></td>
                        </tr>
                        <?php
                            }?>
                                    <tr>
                                    <td style="font-weight: 700;font-size:small;border:none"> Total Amount Paid :</td>
                                    <td style="font-weight: 700;border:none"> <strong><input type="text" id="number"
                                        style="height: 20px;border:transparent;font-weight:bold;" size="10" name="totalamount" readonly
                                        onmousemove="update();"
                                        onkeydown="return (event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40)|| (event.keyCode==46) )"
                                        value="<?php $bal=$row['transport_fee_paying']; if(!is_numeric($bal)){ $bal=0; } echo $row['paying_fee']+$bal;?>"></strong></td>
                                        <td style="font-weight: 700;font-size:small;border:none">Balance Amount :</td>
                                        <td style="font-weight: 700;border:none"><strong><?php $balance=$row['transport_fee_balance']; if(!is_numeric($balance)){ $balance=0; } echo $row['balance_amount']+$balance;?></strong></td>
                                    </tr>

                       
                       <tr style="border: none;">
                       <?php if(!empty($row['discount'])){
                         ?>
                            <td style="font-weight: 700;font-size:small;border:none">Discount Amount :</td>
                            <td style="font-weight: 700;border:none"><strong><?php echo $row['discount'];?></strong></td> <?php
                         }?>
                            <td style="font-weight: 700;font-size:small;border:none">Due Date :</td>
                            <td style="font-weight: 700;border:none"><strong><?php echo $row['due_date'];?></strong></td>

                       </tr>
                        
                      
                         
                            



                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
            function update() {
                var bigNumArry = new Array('', ' Thousand', ' Million', ' Billion', ' trillion', ' quadrillion',
                    ' quintillion');

                var output = '';
                var numString = document.getElementById('number').value;
                var finlOutPut = new Array();

                if (numString == '0') {
                    document.getElementById('container').innerHTML = 'Zero';
                    return;
                }

                if (numString == 0) {
                    document.getElementById('container').innerHTML = ' ';
                    return;
                }

                var i = numString.length;
                i = i - 1;

                //cut the number to grups of three digits and add them to the Arry
                while (numString.length > 3) {
                    var triDig = new Array(3);
                    triDig[2] = numString.charAt(numString.length - 1);
                    triDig[1] = numString.charAt(numString.length - 2);
                    triDig[0] = numString.charAt(numString.length - 3);

                    var varToAdd = triDig[0] + triDig[1] + triDig[2];
                    finlOutPut.push(varToAdd);
                    i--;
                    numString = numString.substring(0, numString.length - 3);
                }
                finlOutPut.push(numString);
                finlOutPut.reverse();

                //conver each grup of three digits to english word
                //if all digits are zero the triConvert
                //function return the string "dontAddBigSufix"
                for (j = 0; j < finlOutPut.length; j++) {
                    finlOutPut[j] = triConvert(parseInt(finlOutPut[j]));
                }

                var bigScalCntr = 0; //this int mark the million billion trillion... Arry

                for (b = finlOutPut.length - 1; b >= 0; b--) {
                    if (finlOutPut[b] != "dontAddBigSufix") {
                        finlOutPut[b] = finlOutPut[b] + bigNumArry[bigScalCntr] + '  ';
                        bigScalCntr++;
                    } else {
                        //replace the string at finlOP[b] from "dontAddBigSufix" to empty String.
                        finlOutPut[b] = ' ';
                        bigScalCntr++; //advance the counter  
                    }
                }

                //convert The output Arry to , more printable string 
                for (n = 0; n < finlOutPut.length; n++) {
                    output += finlOutPut[n];
                }

                document.getElementById('container').innerHTML = output; //print the output
            }

            //simple function to convert from numbers to words from 1 to 999
            function triConvert(num) {
                var ones = new Array('', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight',
                    ' Nine', ' Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen',
                    ' Seventeen', ' Eighteen', ' Nineteen');
                var tens = new Array('', '', ' Twenty', ' Thirty', ' Fourty', ' Fifty', ' Sixty', ' Seventy', ' Eighty',
                    ' Ninety');
                var hundred = ' Hundred';
                var output = '';
                var numString = num.toString();

                if (num == 0) {
                    return 'dontAddBigSufix';
                }
                //the case of 10, 11, 12 ,13, .... 19 
                if (num < 20) {
                    output = ones[num];
                    return output;
                }

                //100 and more
                if (numString.length == 3) {
                    output = ones[parseInt(numString.charAt(0))] + hundred;
                    output += tens[parseInt(numString.charAt(1))];
                    output += ones[parseInt(numString.charAt(2))];
                    return output;
                }

                output += tens[parseInt(numString.charAt(0))];
                output += ones[parseInt(numString.charAt(1))];

                return output;
            }
            </script>
            <hr>
            <!-- FOOTER PART -->
            <div class="footer">
                <div class="">
                    <div style="margin-left: 0%;">
                        <label for="ksk"> In words:- </label> <strong><label for="sss" id="container"
                                style="font-family:'Courier New', Courier, monospace;"> </label><label
                                style="font-family:'Courier New', Courier, monospace;"> &nbsp; Rupees only
                                <i>/-</i></label></strong>
                    </div>                            <span style="float: right;padding-top:10px;marign-right:0%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cashier Sign (<?php print$_SESSION['username']; ?>) /- </span>

                    <div class="row mt-1" style="text-align: center;">
                        <span style="color: #212529ce; font-size: xx-small;">
                         <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date("Y");?> Designed & Developed by <a target="_blank" style="text-decoration: none;" href="https://starktechlabs.in"><strong>Stark Tech Innovative Labs</strong></a> <br>

                        </span>

                    </div>
                </div>
            </div>
        </div><br>
        <center>---------------------------------------------cut here<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
  <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
</svg>---------------------------------------------------</center>

<div class="main border border-5">
            <!-- HEADER PART -->
            <div class="container" style="border-bottom: 1px solid black; padding-bottom: 5px;">
                <div class="row">
                    <div class="col-3" style="text-align: start; ">
                    <img src="img/logo (2).png" id="logo" height="100px" width="100px" style="margin-left: 30px;" alt="logo">
                    </div>
                    <div class="col-6" style="text-align: center; line-height: 1.2;">
                    <span style="font-weight:900; color: black; padding: 0px 50px; font-size: 16px;"> FEE
                            RECEIPT </span>
                            <span style="font-weight: 900; display: block; font-size: 15px;">SRI SATHYA SAI VIDYANIKETAN </span>
                        <span style="font-size: 8px;font-weight:bold;">Sri Sathya Sai Nagar,Bagepalli,Chikkaballapura Dist, KARNATAKA-561207<br>PH.NO: 7022537447, 9966930530, 8494961431</span>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
            <center> <span><strong><?php echo $row['installment'];?> DETAILS</strong></span><span style="float: right;font-size:10px;"><strong>SCHOOL COPY</strong> </span></center>
            <!-- INFOMATION PART -->
            <div class="info">
                <div class="info-1">
                    <div class="col">
                        <label> Receipt No:</label>
                        <span><strong><?php echo $row['bill_no'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;">
                        <label>Date:</label>
                        <span><strong><?php echo $row['billing_date'];?></strong></span>
                    </div>
                </div>
                <div class="info-1">
                    <div class="col">
                        <label style="font-size: smaller;"> STUDENT ID:</label>
                        <span><strong> <img alt='<?php echo $row['student_name'];?>' src='barcode.php?codetype=Code39&size=20&text=<?php echo $row['student_id'];?>&print=true'/></strong></span>
                    </div>
                    <div class="col" style="text-align: center;">
                        <label>Class:</label>
                        <span><strong><?php echo $row['student_class'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;">
                        <label>Academic year:</label>
                        <span><strong><?php echo $row['academic_year'];?></strong></span>
                    </div>
                </div>
                <div class="info-2">
                    <div class="col">
                        <label>Student Name:</label>
                        <span><strong><?php echo $row['student_name'];?></strong></span>
                    </div>
                    <div class="col" style="text-align: right;font-size:xx-small;">
                        <label>Fee Collected By [ID]:</label>
                        <span><strong><?php echo $row['login_id'];?></strong></span>
                    </div>

                </div>
                <div class="info-2">
                    <div class="col">
                        <label>TUTION FEE :</label>
                        <span><strong><?php echo $tut=$row['tution_fee'];?></strong></span>
                       
                    </div>
                    <?php if(!empty($row['transport_fee'])){
                         ?>
                    <div class="col">
                     
                    <label class="text-nowrap">TRANSPORT FEE :</label>
                        <span><strong><?php echo $tat=$row['transport_fee'];?></strong></span>
                    </div>
                    <?php
                            }?>
                    <div class="col" style="text-align: right;font-size:xx-small;">
                        <label>TOTAL FEE:</label>
                        <span><strong><?php  if(empty($tat)){ $tat=0; } echo $tut+$tat;  ?></strong></span>
                    </div>

                </div> 
            </div>

            <!-- FEE STRUCTURE -->
            <div class="fee-content">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">SL No.</th>
                            <th scope="col">Particulars</th>
                            <th scope="col"> Paid Amount (RS)</th>
                            <th scope="col"> Balance Amount (RS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tution Fee</td>
                            <td><strong><?php echo $row['paying_fee'];?></strong></td>
                            <td><strong><?php echo $row['balance_amount'];?></strong></td>
                        </tr>
                        <?php if(!empty($row['transport_fee'])){
                         ?>
                        <tr>
                            <th scope="row">2</th>
                            <td>Transport Fee</td>
                            <td><strong><?php echo $row['transport_fee_paying'];?></strong></td>
                            <td><strong><?php echo $row['transport_fee_balance'];?></strong></td>
                        </tr>
                        <?php
                            }?>
                                    <tr>
                                    <td style="font-weight: 700;font-size:small;border:none"> Total Amount Paid :</td>
                                    <td style="font-weight: 700;border:none"> <strong><input type="text" id="number"
                                        style="height: 20px;border:transparent;font-weight:bold;" size="10" name="totalamount" readonly
                                        onclick="update();"
                                        onkeydown="return (event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40)|| (event.keyCode==46) )"
                                        value="<?php $bal=$row['transport_fee_paying']; if(!is_numeric($bal)){ $bal=0; } echo $row['paying_fee']+$bal;?>"></strong></td>
                                        <td style="font-weight: 700;font-size:small;border:none">Balance Amount :</td>
                                        <td style="font-weight: 700;border:none"><strong><?php $balance=$row['transport_fee_balance']; if(!is_numeric($balance)){ $balance=0; } echo $row['balance_amount']+$balance;?></strong></td>
                                    </tr>

                        <tr style="border: none;">
                            <th scope="row" style="border: none;" ></th>
                           
                           
                        </tr>
                       <tr style="border: none;">
                       <?php if(!empty($row['discount'])){
                         ?>
                            <td style="font-weight: 700;font-size:small;border:none">Discount Amount :</td>
                            <td style="font-weight: 700;border:none"><strong><?php echo $row['discount'];?></strong></td> <?php
                         }?>
                            <td style="font-weight: 700;font-size:small;border:none">Due Date :</td>
                            <td style="font-weight: 700;border:none"><strong><?php echo $row['due_date'];?></strong></td>
                            
                       </tr>
                        
                      
                        <tr style="border: none;">
                            <th scope="row" style="border: none;"></th>
                            
                        </tr>
                            



                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
            function update() {
                var bigNumArry = new Array('', ' Thousand', ' Million', ' Billion', ' trillion', ' quadrillion',
                    ' quintillion');

                var output = '';
                var numString = document.getElementById('number').value;
                var finlOutPut = new Array();

                if (numString == '0') {
                    document.getElementById('container').innerHTML = 'Zero';
                    return;
                }

                if (numString == 0) {
                    document.getElementById('container').innerHTML = ' ';
                    return;
                }

                var i = numString.length;
                i = i - 1;

                //cut the number to grups of three digits and add them to the Arry
                while (numString.length > 3) {
                    var triDig = new Array(3);
                    triDig[2] = numString.charAt(numString.length - 1);
                    triDig[1] = numString.charAt(numString.length - 2);
                    triDig[0] = numString.charAt(numString.length - 3);

                    var varToAdd = triDig[0] + triDig[1] + triDig[2];
                    finlOutPut.push(varToAdd);
                    i--;
                    numString = numString.substring(0, numString.length - 3);
                }
                finlOutPut.push(numString);
                finlOutPut.reverse();

                //conver each grup of three digits to english word
                //if all digits are zero the triConvert
                //function return the string "dontAddBigSufix"
                for (j = 0; j < finlOutPut.length; j++) {
                    finlOutPut[j] = triConvert(parseInt(finlOutPut[j]));
                }

                var bigScalCntr = 0; //this int mark the million billion trillion... Arry

                for (b = finlOutPut.length - 1; b >= 0; b--) {
                    if (finlOutPut[b] != "dontAddBigSufix") {
                        finlOutPut[b] = finlOutPut[b] + bigNumArry[bigScalCntr] + '  ';
                        bigScalCntr++;
                    } else {
                        //replace the string at finlOP[b] from "dontAddBigSufix" to empty String.
                        finlOutPut[b] = ' ';
                        bigScalCntr++; //advance the counter  
                    }
                }

                //convert The output Arry to , more printable string 
                for (n = 0; n < finlOutPut.length; n++) {
                    output += finlOutPut[n];
                }

                document.getElementById('container').innerHTML = output; //print the output
            }

            //simple function to convert from numbers to words from 1 to 999
            function triConvert(num) {
                var ones = new Array('', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight',
                    ' Nine', ' Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen',
                    ' Seventeen', ' Eighteen', ' Nineteen');
                var tens = new Array('', '', ' Twenty', ' Thirty', ' Fourty', ' Fifty', ' Sixty', ' Seventy', ' Eighty',
                    ' Ninety');
                var hundred = ' Hundred';
                var output = '';
                var numString = num.toString();

                if (num == 0) {
                    return 'dontAddBigSufix';
                }
                //the case of 10, 11, 12 ,13, .... 19 
                if (num < 20) {
                    output = ones[num];
                    return output;
                }

                //100 and more
                if (numString.length == 3) {
                    output = ones[parseInt(numString.charAt(0))] + hundred;
                    output += tens[parseInt(numString.charAt(1))];
                    output += ones[parseInt(numString.charAt(2))];
                    return output;
                }

                output += tens[parseInt(numString.charAt(0))];
                output += ones[parseInt(numString.charAt(1))];

                return output;
            }
            </script>
            <hr>
            <!-- FOOTER PART -->
            <div class="footer">
                <div class="container">
                    <div>
                        <!-- <label for="ksk"> In words:- </label> <strong><label for="sss" id="container"
                                style="font-family:'Courier New', Courier, monospace;"> </label><label
                                style="font-family:'Courier New', Courier, monospace;"> &nbsp; Rupees only
                                <i>/-</i></label></strong> -->
                    </div>                            <span style="float: right; padding-top:15px;">&nbsp;&nbsp;&nbsp;Cashier Sign (<?php print$_SESSION['username']; ?>) /- </span>

                    <span class="text-muted" style="opacity: 0.4;">
<?php print $row['created_on']; ?>

</span>
                    <div class="row mt-1" style="text-align: center;">

                        <span style="color: #212529ce; font-size: xx-small;">
                        <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date("Y");?> Designed & Developed by <a target="_blank" style="text-decoration: none;" href="https://starktechlabs.in"><strong>Stark Tech Innovative Labs</strong></a> <br>

                        </span>
                    
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
            <center>
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="mt-5 text-danger display-3">Printing of Bill is on Hold</h1>
                                    <p class="lead text-dark ">If Discounts are Applied Please wait for Approval (or) Bill No Not Found</p>
                                    <hr class="my-2">
                                    <p>If Error Reason :-<?php echo mysqli_errno($conn); ?> </p>
                                    <p class="lead">
                                        <a class="btn btn-info btn-lg" onclick="window.location.reload();" role="button">Click here to Refresh</a>
                                    </p>
                                </div>
                            </div>
            
            </center>
    
<?php }
?>
    </div>

    
</body>
</html>