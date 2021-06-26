<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index");
    exit;
}

// Include config file
$conn=mysqli_connect("localhost", "root", "", "sssvn");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
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
          }$tp=$_POST['password'];
         $password = my_simple_crypt($tp, 'e' );
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                  mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password );
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$hashed_password){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                        
                            // Redirect user to welcome page
                            header("location: index");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    echo $hashed_password."  ".$password;
    // Close connection
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>SSSVN LOGIN</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <style>
        a{
            text-decoration:none;
        }
    </style>
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="#!No_action"><img class="" height="150px" width="150px" src="img/logo (2).png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Sri Sathya Sai <br> Vidyaniketan <br>Bagepalli <br><strong>ERP Login </strong><br><small style="font-size: xx-small;font-weight:bolder;">Powered By Stark Tech Innovative Labs</small></h2>
			        <div class="auth-form-container text-left">
                    <form class="auth-form login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

							 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
  <center>                <label>Username</label>
  </center>
                  <input value="principal" type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                  <span class="help-block"><?php echo $username_err; ?></span>
              </div>
							<div class="password mb-3">
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
  <center>                <label>Password</label>
  </center>
                  <input type="password" name="password" autofocus class="form-control">
                  <span class="help-block"><?php echo $password_err; ?></span>
              </div>
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn btn-primary btn-block theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5"></div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer 	>
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <i class="fas fa-heart" style="color: #FF022B;"></i> by <a class="app-link" href="https://starktechlabs.in" target="_blank">Stark Tech Innovative Labs</a>, Bengaluru.</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Sai Baba </h5>
					    <div><em>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</em></div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

