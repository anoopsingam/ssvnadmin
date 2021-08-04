<?php 
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
include'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (empty($id)) {
        //alert No Key found in java script
        echo "<script>alert('No Leave ID Found & Un-Authorized Access')</script>";
        // redirect to index using java script
        echo "<script>window.location.href='index'</script>";
    }
    $dcry = my_simple_crypt($id, 'd');
    
    //fetch all details from kyt where unique_key =$dcry
    $leave = mysqli_query($conn, "SELECT * FROM leave_application WHERE id='$dcry'");
    //fetch all details from kyt 
    $leave_details = mysqli_fetch_assoc($leave);

    $teacher_id = $leave_details['teacher_id'];
    $sql=mysqli_query($conn,"SELECT * FROM kyt WHERE id='$teacher_id'");
    $kyt_details=mysqli_fetch_assoc($sql);
}

?>
<title> <?php echo $leave_details['teacher_name']; ?> Approved Leave Application-<?php echo"ID-".$leave_details['id'];?> </title>
<html>
    
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <style>
      body{
        margin:25px;
        padding:15px;
      }
      @media print {
               .noprint {
                  visibility: hidden;
               }
            }
    </style>
</head>
<body>
   <form class="form" style="max-width: none; width: 1005px;">
   <div  style="font-size: larger;" id="invoice">
                  <center>
                    <img src="img/logo (2).png" height="150px" width="150px" alt="">
                    <h3>SRI SATHYA SAI VIDYANIKETAN,BAGEPALLI</h3>
                    <br>
                    <h6>Leave Application Sanction Letter</h6>
                  </center>
<p><b>To,<br /></b>
<?php echo $leave_details['teacher_name']?>,<br />
<b><?php echo "Employee ID: ".$leave_details['teacher_id']?></b>,<br />
<?php echo $kyt_details['permanent_address']?></p>.
<b><p>Date: <?php $var=explode(" ",$leave_details['leave_approved_on']);
echo $var[0];
?></p></b>
<center><b><p>Subject: Leave Application Approval.</p></b></center>
<p>With reference to your application number <?php echo $leave_details['id']; ?>, I/we recieved on <?php echo $leave_details['leave_applied_on']?> seeking permission for a leave from <?php echo $leave_details['leave_date']?> to <?php echo $leave_details['leave_end_date'];?> with the reason <i><?php echo $leave_details['leave_reason']?></i>.</p> <br>
<b><p>We would like to inform you that your leave request has been approved from <?php echo $leave_details['leave_date']?> to <?php echo $lend=$leave_details['leave_end_date']?> and as per Institution norms, you are supposed to join on <?php echo ++$lend;?> .</p></b>
<p>Regards,<br />
<b><?php echo $leave_details['leave_approved_by']?></b>,<br />
<b><?php echo "Approved On: ".$leave_details['leave_approved_on']?></b>,<br />
Sri Sathya Sai Vidya Niketan, Bagepalli-561207</p>

   

</strong>
    </div>
     <footer>
         <center><br><br><br><p>EMP SRC CODE:</p>
         <?php 
$md5 = strtoupper(md5($kyt_details['id']. $kyt_details['name'] . $kyt_details['email'] . $kyt_details['phone_no']));
	
	$code[] = substr ($md5, 0, 5);
	$code[] = substr ($md5, 5, 5);
	$code[] = substr ($md5, 10, 5);
	$code[] = substr ($md5, 15, 5);

	$membcode = implode ("-", $code);
	if (strlen($membcode) == "23") { 
       echo $text = $membcode;
// echo "<img alt='BARCODE' src='barcode?codetype=Code39&size=35&text=" . $text . "&print=true'/>";
    
    } else {
        return (false);
    }

?>
        <small> <?php include'footer.php';?></small>
         </center>
     </footer>
   </form>
   
   <center>
   
   <input type="button" id="create_pdf" class="btn btn-danger noprint" value="Download PDF">

   </center>
</body>
</html>

<script>
    (function () {
        var
         form = $('.form'),
         cache_width = form.width(),
         a4 = [595.28, 841.89]; // for a4 size paper width and height

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });
        //create pdf
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                 img = canvas.toDataURL("image/png"),
                 doc = new jsPDF({
                     unit: 'px',
                     format: 'a4'
                 });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save(document.title+'.pdf');
                form.width(cache_width);
            });
        }

        // create canvas object
        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }

    }());
</script>
<script>
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                
                    position: "fixed",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);
</script>