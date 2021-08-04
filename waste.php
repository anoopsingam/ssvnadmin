<?php 
	$md5 = strtoupper(md5("1" . "ANOOP" . "ANOOPRATHOD7@GMAIL.COM" . "9886162566"));
	
	$code[] = substr ($md5, 0, 5);
	$code[] = substr ($md5, 5, 5);
	$code[] = substr ($md5, 10, 5);
	$code[] = substr ($md5, 15, 5);

	$membcode = implode ("-", $code);
	if (strlen($membcode) == "23") { echo $membcode; } else {
        return (false);
    }



    echo"<br>";
    $digits = 3;


echo rand(pow(10, $digits-1), pow(10, $digits)-1);
$randomid = mt_rand(100000,999999); 
echo"<br>";

echo $randomid;
echo $num_str = sprintf("%06d", mt_rand(1, 999999));

echo"<br>";


$sixdigit=6; 
function getName($sixdigit) { 
$total_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$randomString = ''; 
for ($i = 0; $i < $sixdigit; $i++) { 
$index = rand(0, strlen($total_characters) - 1); 
$randomString .= $total_characters[$index]; 
} 
return $randomString; 
} 
echo getName($sixdigit);
        ?>
		<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">

  <title>Notice Board</title>
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
  </style>
</head>
<body>
  
<main class="container">
  <div class=" p-3 my-3 text-white bg-purple rounded shadow-sm">
 <center>
 <img class="me-3 text-center" src="assets/images/logo/logo.png" alt="" >
    <div class="lh-1">
      <h1 class="">Digital Notice Board</h1>
      <h6 class="border-bottom pb-2 mb-0 text-center">Recent Notice / Announcements <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
</svg></h6>
    </div>  
 </center>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
   
    <div class="row bg-warning text-dark text-capitalize">
      <div class="col-lg-4"><b><h3>Notice Title</h3></b></div>
      <div class="col-lg-2"><b><h3>Notice Type</h3></b></div>
      <div class="col-lg-4"><b><h3>Notice Details</h3></b></div>
      <div class="col-lg-2"><b><h3>Notice Date</h3></b></div>
    </div>
    <div class="row bg-light">
      .
    </div>
                    <div class="row" id="NullNotice">
      <div class="col-lg-4"><h5 id="notice_title"></h5></div>
      <div class="col-lg-2"><h5 id="notice_type"></h5></div>
      <div class="col-lg-4"><h5 id="notice_data"></h5></div>
      <div class="col-lg-2"><h5 id="notice_date"></h5></div>
    </div>
    <div class="row bg-light">
      .
    </div>

   
    
  </div>
<!-- 
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div> -->
</main>
  
<footer style="padding-top: 20px;">
    <div class="footer clearfix mb-0 text-muted">
    <small class="text-dark">
    <center>
    <i class="fa fa-copyright" aria-hidden="true"></i> Copyrights <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date("Y");?> Designed & Developed by <a target="_blank" style="text-decoration: none;" href="https://starktechlabs.in"><strong>Stark Tech Innovative Labs</strong></a> With <span class="text-danger"><i class="bi bi-heart-fill"></i></span> <br>
        Device Info :[<span id="info"></span> <?php echo "Protocol :-".$_SERVER['SERVER_PROTOCOL']?>]
    

    </center>
</small>
<script>
document.getElementById("info").innerHTML = navigator.appVersion;
</script>
</footer>

                <script>
                                //set time out for a ajax request for a php file

                                setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "GetNotice", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            //parse json
            console.log(data);
            let json = JSON.parse(data);
            console.log(json);
            if(json.notice_gen=="true"){
              //write html
              document.getElementById("notice_title").innerHTML = json.notice_title;
              document.getElementById("notice_type").innerHTML = json.notice_type;
              document.getElementById("notice_data").innerHTML = json.notice_data;
              document.getElementById("notice_date").innerHTML = json.notice_date;
            }else{
              //get date 
              let date = new Date();
              document.getElementById("NullNotice").innerHTML = '<div class="alert alert-danger text-center"> No Notice or Annaouncements for '+date+'</div>';
              

            }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("date=<?php echo date("Y-m-d")?>");
}, 1000);
                </script>


</body>
</html> -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <title>Notice Board</title>
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
  </style>
</head>
<body>
  
<main class="container">
  <div class=" p-3 my-3 text-white bg-purple rounded shadow-sm">
 <center>
 <img class="me-3 text-center" src="assets/images/logo/logo.png" alt="" >
    <div class="lh-1">
      <h1 class="">Digital Notice Board</h1>
      <small>Since 2011</small>
    </div>  
 </center>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0 text-center">Recent Notice / Announcements <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
</svg></h6>
    <div class="row bg-warning text-dark text-capitalize">
      <div class="col-lg-1"><h3>Sl No</h3></div>
      <div class="col-lg-3"><b><h3>Notice Title</h3></b></div>
      <div class="col-lg-2"><b><h3>Notice Type</h3></b></div>
      <div class="col-lg-4"><b><h3>Notice Details</h3></b></div>
      <div class="col-lg-2"><b><h3>Notice Date</h3></b></div>
    </div>
    <div class="row bg-light">
      .
    </div>
    <div class="row">
    <?php 
              //fetch notice from database
              include 'database.php';
              $date=date("Y-m-d");
              $query = "SELECT * FROM notice where notice_gen='true' and  notice_date='$date'";
              $result = mysqli_query($conn, $query);
              $count = mysqli_num_rows($result);
              if ($count>0) {
                $i=1;
                  while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="row">
                    <div class="col-lg-1"><h4><?php echo $i++;?></h4></div>
      <div class="col-lg-3"><h4><?php echo $row['notice_header']?></h4></div>
      <div class="col-lg-2"><h4><?php echo $row['notice_type']?></h4></div>
      <div class="col-lg-4"><h4><?php echo $row['notice_data']?></h4></div>
      <div class="col-lg-2"><h4><?php echo $row['notice_date']?></h4></div>
    </div>
    <div class="row bg-light">
      .
    </div>

    <?php
                  }
              }else{
                  echo "<div class='alert alert-danger' role='alert'><b>No Notice Found</b></div>";
              }
    
    ?>
    </div>
  </div>
<!-- 
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div> -->
</main>


<script>
  //refresh the page every 500ms
  setInterval(function(){
    window.location.reload();
  },500);
</script>
  
</body>
</html>