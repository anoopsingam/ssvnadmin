<?php //Post Params 
$student_name = $_POST['student_name'];
$father_name = $_POST['father_name'];
$father_number = trim($_POST['father_number']);
$father_email = trim($_POST['father_email']);
$ref_no = $_POST['ref_no'];
$login = $_POST['login'];


include 'database.php';
$query = mysqli_query($conn,"SELECT ref_no FROM `applications` ORDER BY id DESC LIMIT 1");
// GET THE LAST ID MAKE SURE IN TABLE YOU 9991

while ($row = mysqli_fetch_object($query)) {
  $lastId =  $row->ref_no;
}

list($prefix, $Id) = explode('STARKAPP00', $lastId);
$Id = ($Id + 1);
$new_id = 'STARKAPP00' . $Id;
// END PREFIX
//INSERT
$query = " INSERT INTO applications ( student_name, father_name, father_number, father_email, ref_no, login )  VALUES ( '$student_name', '$father_name', '$father_number', '$father_email', '$new_id', '$login' ) ";
$result = mysqli_query($conn, $query);



if ($result) {
  if (empty($father_email)) { ?>
    <script>
      alert("<?php echo "$student_name Registered Successfully for Admission with Ref No: $new_id "; ?>")
     window.location.assign("AddApplication")
    </script>

  <?php }
  if (!empty($father_email)) {

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
      } else if ($action == 'd') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
      }

      return $output;
    }
    $encry = my_simple_crypt($new_id, 'e');
    echo "<script>alert('$student_name Registered Successfully for Admission with Ref No: $new_id ')</script>";
  ?>
    <script>
     window.location.replace("Mail?mail=<?php echo $father_email; ?>&msg=<?php echo "Thank you for applying $father_name, your child $student_name successfully registered for Admission with reference no: $new_id, you can continue the Admission process at the following link: https://admissions.sssvnbagepalli.in/OnlineApplication?ref=$encry.  Regards, Technical Team, Stark Tech Innovative Labs, Bengaluru" ?>&mail_type=admission_application");
    </script>
<?php

  } else {
    echo 'Query Failed';
  }
}
?>