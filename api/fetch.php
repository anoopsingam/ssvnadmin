<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/portal.css">

    <title>Fetch </title>
</head>

<body>
    <div class="container-fluid">

        <center>

            <form action="" method="post">
                <legend>Fetch Data Through Api</legend>
                <br><br>
                <input type="text" class="form-control" placeholder="Student ID" style="width:min-content;margin:50px;" name="sid" id="sid">
                <button name="get" class="btn btn-warning" type="submit">submit</button>
            </form>

        </center>
    </div>
    <?php
    if (isset($_POST['get'])) {
        $id = $_POST['sid'];
        $url = "https://erp.sssvnbagepalli.in/api/get_api?sid=$id";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);



        $arr = json_decode($res, true);
        if ($arr['status'] == "error") { ?>
            <div class="row   bg-danger " style="padding: 25px;margin:50px;">
                <div class="col-sm "style="color:white;">Result : <?php echo $arr['result'] ?></div>
                <div class="col-sm "style="color:white;"> Data : <?php echo $arr['data'] ?></div>
                <div class="col-sm "style="color:white;">Status : <?php echo $arr['status'] ?></div>

            </div>

            <?php } elseif($arr['status']=="yes") {
            $results = $arr['data'];
            foreach ($results as $data) {
            ?>

                <center>
                    <div class="row alert  bg-warning" style="padding: 25px;margin:50px;">
                        <div class="col-sm">Name : <?php echo $data['student_name'] ?></div>
                        <div class="col-sm"> Father Name : <?php echo $data['father_name'] ?></div>
                        <div class="col-sm">Student ID : <?php echo $data['studentid'] ?></div>
                        <div class="col-sm">Remarks : <?php echo $data['remarks'] ?></div>
                        <div class="col-sm">Status : <?php echo $data['status'] ?></div>
                    </div>

                </center>

    <?php
                header("Refresh:20; url=../api/fetch");
            }
        }elseif($arr['status']=="No Data"){
            ?>
            <div class="row bg-primary " style="padding: 25px;margin:50px;">
                <div class="col-sm "style="color:white;">Result : <?php echo $arr['result'] ?></div>
                <div class="col-sm "style="color:white;"> Data : <?php echo $arr['data'] ?></div>
                <div class="col-sm "style="color:white;">Status : <?php echo $arr['status'] ?></div>

            </div>

            <?php 
        }

        
    }
    ?>


</body>

</html>