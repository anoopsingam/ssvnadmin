<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index");
    exit;
}

// Include config file
include'database.php';
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
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
        $tp = $_POST['password'];
        $password = my_simple_crypt($tp, 'e');
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password == $hashed_password) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    echo $hashed_password . "  " . $password;
    // Close connection
    mysqli_close($conn);
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Sri Sathya Sai Vidanikethan ERP Login | Stark Tech Innovative Labs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<meta name="title" content="Sri Sathya Sai Vidanikethan ERP Login | Stark Tech Innovative Labs">
<meta name="description" content="Sri Sathya Sai Vidyaniketan Bagepalli School Management Software Login Portal Designed and Developed By Stark Tech Innovative Labs Bengaluru ">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://metatags.io/">
<meta property="og:title" content="Sri Sathya Sai Vidanikethan ERP Login | Stark Tech Innovative Labs">
<meta property="og:description" content="Sri Sathya Sai Vidyaniketan Bagepalli School Management Software Login Portal Designed and Developed By Stark Tech Innovative Labs Bengaluru ">
<meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
<meta name="keywords" content="SSSVN bagepalli, sri sathya sai vidyanikethan bagepalli, baba school bagepalli, thimakalapalli school, highway school, sai baba school bagepalli">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="1 days">
<meta name="author" content="Stark Tech Innovative Labs LLP, Bengaluru">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://metatags.io/">
<meta property="twitter:title" content="Sri Sathya Sai Vidanikethan ERP Login | Stark Tech Innovative Labs">
<meta property="twitter:description" content="Sri Sathya Sai Vidyaniketan Bagepalli School Management Software Login Portal Designed and Developed By Stark Tech Innovative Labs Bengaluru ">
<meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="manifest" href="manifest.json">
	<script src="sw.js"></script>
	
    <link rel="stylesheet" href="log_/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-1">
                    <img src="assets/images/logo/logo.png" class="img-fluid" alt="Logo" srcset="">
                    <h2 class="heading-section"><strong>ERP Login </strong><br><small style="font-size: xx-small;font-weight:bolder;">Powered By Stark Tech Innovative Labs</small></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url('img/his-life-banner1.jpg');">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="signin-form" method="POST">
                                <div class="form-group mb-3" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                                    <label class="label" for="name">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo $username; ?>">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>
                                <div class="form-group mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                                <!-- <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div> -->
                            </form>
                            <p class="text-center"><small class="copyright">Designed with <i class="bi bi-heart-fill" style="color: #FF022B;"></i> by <a class="app-link" href="https://starktechlabs.in" target="_blank">Stark Tech Innovative Labs</a>, Bengaluru.</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="log_/js/jquery.min.js"></script>
    <script src="log_/js/popper.js"></script>
    <script src="log_/js/bootstrap.min.js"></script>
    <script src="log_/js/main.js"></script>

</body>

</html>