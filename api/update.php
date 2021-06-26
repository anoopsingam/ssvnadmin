<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/portal.css">
        <title>Update </title>
    </head>

    <body>
        <center>

            <div class="container">
                <form action="" method="post">
                    <legend>API DATA Update</legend>

                    <div class="row">
                        <div class="col-sm"><input type="text" name="sid" placeholder="Student ID" class="form-control"
                                id=""></div>
                        <div class="col-sm"><input type="text" name="name" class="form-control"
                                placeholder="Student Name (Update)" id=""></div>
                    </div>


                    <br>

                    <button name="get" class="btn btn-danger" type="submit">submit</button>
                </form>
            </div>

        </center>


        <?php
    if (isset($_POST['get'])) {

        $id = $_POST['sid'];
        $name = urlencode($_POST['name']);
        $url = "https://erp.sssvnbagepalli.in/api/update_api?sid=" . $id . "&name=" . $name;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);


        $arr = json_decode($res, true);     


                        
                                        ?>

        <center>
            <div class="container-flud">
                <legend>Response</legend>
                <div class="row alert  bg-warning" style="padding: 25px;margin:50px;">
                    <div class="col">RESULT : <?php echo $arr['result'] ?></div>
                    <div class="col">RESPONSE : <?php echo $arr['response'] ?></div>
                    <div class="col-sm">Error: <?php echo $arr['error']?></div>
                    <div class="col">STATUS : <?php echo $arr['status'] ?></div>
                </div>

            </div>
        </center>

        <?php
                                        header("Refresh:20; url=../api/update");

        // foreach ($results as $data) {
        //     echo $sts = $data["student_name"];
        // }
    }

    ?>
    </body>

</html>