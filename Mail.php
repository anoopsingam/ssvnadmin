<?php


include 'smtp/PHPMailerAutoload.php';
$mailid = $_GET['mail'];

$header = '<!doctype html>
                            <html>
                            <head>
                              <meta name="viewport" content="width=device-width" />
                              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                              <style>
                                body {
                                 background-color: #f6f6f6;
                                 font-family: sans-serif;
                                 -webkit-font-smoothing: antialiased;
                                 font-size: 14px;
                                 line-height: 1.4;
                                 margin: 0;
                                 padding: 0;
                                 -ms-text-size-adjust: 100%;
                                 -webkit-text-size-adjust: 100%;
                               }
                               a{
                                text-decoration: none;
                                color: red;
                                font-weight: 500;
                                font-size: medium;
                               }
                               table {
                                 border-collapse: separate;
                                 mso-table-lspace: 0pt;
                                 mso-table-rspace: 0pt;
                                 width: 100%;
                               }
                               table td {
                                 font-family: sans-serif;
                                 font-size: 14px;
                                 vertical-align: top;
                               }
                                   /* -------------------------------------
                                     BODY & CONTAINER
                                     ------------------------------------- */
                                     .body {
                                       background-color: #f6f6f6;
                                       width: 100%;
                                     }
                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

                                     .container {
                                       display: block;
                                       margin: 0 auto !important;
                                       /* makes it centered */
                                       max-width: 680px;
                                       padding: 10px;
                                       width: 680px;
                                       border:5px solid #808B96;

                                     }
                                     /* This should also be a block element, so that it will fill 100% of the .container */

                                     .content {
                                       box-sizing: border-box;
                                       display: block;
                                       margin: 0 auto;
                                       max-width: 680px;
                                       padding: 10px;

                                     }
                                   /* -------------------------------------
                                     HEADER, FOOTER, MAIN
                                     ------------------------------------- */

                                     .main {
                                       background: #fff;
                                       border-radius: 3px;
                                       width: 100%;
                                     }
                                     .wrapper {
                                       box-sizing: border-box;
                                       padding: 20px;
                                     }
                                     .footer {
                                       clear: both;
                                       padding-top: 10px;
                                       text-align: center;
                                       width: 100%;
                                     }
                                     .footer td,
                                     .footer p,
                                     .footer span,
                                     .footer a {
                                       color: #999999;
                                       font-size: 12px;
                                       text-align: center;
                                     }
                                     hr {
                                       border: 0;
                                       border-bottom: 1px solid #f6f6f6;
                                       margin: 20px 0;
                                     }
                                   /* -------------------------------------
                                     RESPONSIVE AND MOBILE FRIENDLY STYLES
                                     ------------------------------------- */

                                     @media only screen and (max-width: 620px) {
                                       table[class=body] .content {
                                         padding: 0 !important;
                                       }
                                       table[class=body] .container {
                                         padding: 0 !important;
                                         width: 100% !important;
                                       }
                                       table[class=body] .main {
                                         border-left-width: 0 !important;
                                         border-radius: 0 !important;
                                         border-right-width: 0 !important;
                                       }
                                     }
                                     .img_header{
                                      height:85px;
                                      width:100%;
                                      background:url("https://erp.sssvnbagepalli.in/img/logo-3.png");
                                      background-repeat:no-repeat;
                                      background-position: center;
                                      filter: alpha(opacity=30);
                                     }
                                   </style>
                                 </head>
                                 <body class="">
                                  <table border="0" cellpadding="0" cellspacing="0" class="body">
                                    <tr>
                                     <td>&nbsp;</td>
                                     <td class="container">
                                      <div class="content">
                                        <!-- START CENTERED WHITE CONTAINER -->
                                        <table class="main">
                                          <!-- START MAIN CONTENT AREA -->
                                          <tr>
                                           <td class="wrapper">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                               <td><strong><h4>
                                               <center><div class="img_header"></div></center>
                                               ';

$footer = '</h4></strong></td>
									</tr>
								  </table>
								</td>
							  </tr>
							  <!-- END MAIN CONTENT AREA -->
							</table>
							<!-- START FOOTER -->
							<div class="footer">
							 <table border="0" cellpadding="0" cellspacing="0">
							   <tr>
								 <td class="content-block">
								   <span><small>Copyrights @ 2021</small> Stark Tech Innovative Labs LLP, Bengaluru <br> Mail us @ <a href="mailto:support@starktechlabs.in">support@starktechlabs.in</a> <br> Call us @ <a href="tel:+91-9886162566">+91-9886162566</a> </span>
								 </td>
							   </tr>
							 </table>
						   </div>
						   <!-- END FOOTER -->
						   <!-- END CENTERED WHITE CONTAINER -->
						 </div>
					   </td>
					   <td>&nbsp;</td>
					 </tr>
				   </table>
				   </body>
				   </html>';
$mail_type = $_GET['mail_type'];
function my_simple_crypt($string, $action = 'e')
{
  // you may change these values to your own
  $secret_key = 'mwa_encyption';
  $secret_iv = '9886162566';

  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if ($action == 'e') {
    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
  } elseif ($action == 'd') {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }

  return $output;
}
if ($mail_type == "admission_application") {
  $mailtitle = "Student Application Registration | Sri Sathya Sai Vidyaniketan, Bagepalli -561207";
  $sendername = "Admissions | SSSVN | Stark Tech";
  $header_name = "<center><h1>ADMISSIONS</h1></center>";
  $redirection_path = "ManageApplication";
  $msg = $_GET['msg'];
} elseif ($mail_type == "Payment") {
  $mailtitle = "School Fee Payment | Sri Sathya Sai Vidyaniketan, Bagepalli -561207";
  $sendername = "Fee Management | SSSVN | Stark Tech";
  $header_name = "<center><h1>FEE PAYMENT</h1></center>";

  list($student_name , $student_id , $present_class , $present_section , $bill_no , $billing_date , $paying_fee , $balance_amount , $ubs_fee_paying , $ubs_fee_balance , $transport_fee_paying , $transport_fee_balance , $instalment , $due_date , $login_id, $transaction_mode,$transaction_id,$discount,$transport_discount)=$_GET;
  $msg = "<p>Dear Parent, <br> Thank your for Paying School Fee of $student_name [$student_id] Class:- $present_class  '$present_section' SEC</p>
    <table cellspacing='20' cellpadding='5'  style='width: 100%;height:100%;'>
      <caption>
    <h3>  Bill No :- $bill_no<br>                                
    Date of Payment :- $billing_date <br>
    Mode of Transaction :- $transaction_mode <br>
    Transaction ID:- $transaction_id<br>
    <h2>$instalment</h2>
   </h3>
      </caption>
        <tr>
        <td> <strong>Tuition Fee Paid </strong>= ₹". number_format($paying_fee)."</td>
        <td> <strong>Tuition Fee Balance</strong> =  ₹". number_format($balance_amount)."</td>
        <td> <strong>Transport Fee Paid</strong> = ₹". number_format($transport_fee_paying)."</td>
        <td> <strong>Transport Fee Balance</strong> = ₹". number_format($transport_fee_balance)."</td>
        </tr>
        <tr>
        <td></td>
        <td> <strong>Tuition Fee Discount </strong>= ₹". number_format($discount)."</td>
        <td> <strong>Transport Fee Discount </strong>= ₹". number_format($transport_discount)."</td>
        <td></td>
        </tr>
    </table>
    <br>
    <p> The Due Date for Next Fee Instalment is $due_date</p>
    <br>
    <p>Payment Recived By $login_id</p>
    <br>
    <p>Regards,<br>Administrative Staff,<br> SSSVN,BAGEPALLI-561207</p>
    
    ";
  if ($_GET['mode'] == "fee_bill") {
    $redirection_path = "PrintTutionBill?billno=".my_simple_crypt($bill_no, 'e');
  }elseif($_GET['mode']=="manage"){
    $redirection_path="GenerateTutionFeeReceipt";
  }
}elseif($mail_type=="user"){
  $mailtitle = "User Management | Sri Sathya Sai Vidyaniketan, Bagepalli -561207";
  $sendername = "Admin | SSSVN | Stark Tech";
  $header_name = "<center><h1>USER MANAGEMENT</h1></center>";
  list($username,$password,$email,$user_type)=$_GET;
  $msg="
            <center><h2>New User Login </h2></center>
            <br><br>
            <table cellspacing='20' cellpadding='5'  style='width: 100%;height:100%;'>
            <caption>Your Login is Created Successfully, Congratulations...!! </caption>
            <tr>
            <td>Username:</td>
            <td>$username</td>
            </tr>
            <tr>
            <td>Password :</td>
            <td>$password</td>
            </tr>
            <tr>
            <td>Login Type :</td>
            <td>$user_type</td>
            </tr>
            <tr>
            <td>Email ID :</td>
            <td>$email</td>
            </tr>
            
            </table>
            <br>
            <center><a href='https://erp.sssvnbagepalli.in' target='_blank'>Click Here to Login !</a>
            <br><br>
            <a href='https://erp.sssvnbagepalli.in/ResetPassword?old=$password&token=".uniqid()."' target='_blank'>Click Here to Reset Password !</a>
            
            </center>
            <br>
            <p>
            Regard,<br>
            Admin,<br>
            SSSVN Bagepalli-561207.
            </p>
  
  ";

  if ($_GET['mode'] == "new_user") {
    $redirection_path = "AddUser";
  }elseif($_GET['mode']=="manage"){
    $redirection_path="ManageUser";
  }
}elseif($mail_type=="update_user"){
  $mailtitle = "User Management | Sri Sathya Sai Vidyaniketan, Bagepalli -561207";
  $sendername = "Admin | SSSVN | Stark Tech";
  $header_name = "<center><h1>USER MANAGEMENT</h1></center>";
  list($username,$password,$email,$user_type)=$_GET;
  $msg="
            <center><h2>Updated User Login </h2></center>
            <br><br>
            <table cellspacing='20' cellpadding='5'  style='width: 100%;height:100%;'>
            <caption>Your Login is Updated Successfully ...!! <br>
            Updated Login Details
            </caption>
            <tr>
            <td>Username:</td>
            <td>$username</td>
            </tr>
            <tr>
            <td>Password :</td>
            <td>$password</td>
            </tr>
            <tr>
            <td>Login Type :</td>
            <td>$user_type</td>
            </tr>
            <tr>
            <td>Email ID :</td>
            <td>$email</td>
            </tr>
            
            </table>
            <br>
            <center><a href='https://erp.sssvnbagepalli.in' target='_blank'>Click Here to Login !</a>
            <br><br>
            
            </center>
            <br>
            <p>
            Regard,<br>
            Admin,<br>
            SSSVN Bagepalli-561207.
            </p>
  
  ";

  if ($_GET['mode'] == "new_user") {
    $redirection_path = "AddUser";
  }elseif($_GET['mode']=="manage"){
    $redirection_path="ManageUser";
  }
}
$html = $header . $header_name . $msg . $footer;

echo smtp_mailer($mailid, $mailtitle, $html, $sendername, $redirection_path);
function smtp_mailer($to, $subject, $msg, $sendername, $redirection_path)
{
  $mail = new PHPMailer();
  $mail->SMTPDebug  = 0;
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = "mail.sssvnbagepalli.in";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Username = "admissions@sssvnbagepalli.in";
  $mail->Password = "admissions@sssvn2021";
  $mail->SetFrom('admissions@sssvnbagepalli.in', $sendername);
  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if (!$mail->Send()) {
    echo $mail->ErrorInfo;
  } else {
    $mailid = $_GET['mail'];
    echo "<script>alert('Mail Sent Successfully to $mailid !!')</script>"; 
    echo $msg;
    sleep(6);
    ?>
    <script>
       window.location.replace("<?php echo $redirection_path; ?>");
    </script>
<?php
  } 
}

?>