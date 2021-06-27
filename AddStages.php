<?php include 'header.php'; ?>
<title>Add Stages | <?php echo $theader;?></title>
<form id="form1" name="form1" method="post" action="UploadStages">
<legend>  <center>
        <h4 class="text-muted">Please Route For Stages</h4>
    </center></legend>
    <?php
    $route_result = $conn->query('select * from transport_bus');
    ?>
    <div class="row">
        <div class="col-sm">
            <label for="">Route No:</label>
            <select name="route_no" class="form-control" id="route-list">
                <option value="">Select Route</option>
                <?php
                if ($route_result->num_rows > 0) {
                    // output data of each row
                    while ($row = $route_result->fetch_assoc()) {
                ?>
                        <option value="<?php echo $row["route_no"]; ?>"><?php echo $row["route_no"]; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-sm">
            <label for="">Bus Reg No:</label>

            <select name="bus_no" class="form-control" aria-readonly="true" id="bus-list">
                <option value=''>-</option>
            </select>
        </div>






    </div>





    <script>
        $('#route-list').on('change', function() {
            var route_id = this.value;
            $.ajax({
                type: "POST",
                url: "get_bus.php",
                data: 'route_id=' + route_id,
                success: function(result) {
                    $("#bus-list").html(result);
                }
            });
        });
    </script><br>
    <center>
        <h4 class="text-muted">Please Specify Start & End Point</h4>
    </center>
    <div class="row">
        <div class="col-sm"><label for="">Start Point: </label> <input type="text" class="form-control" name="start_point" id="" /></div>
        <div class="col-sm"><label for="stage1_fare">End Point : </label> <input type="text" class="form-control" name="end_point" id="" /></div>
    </div>
    <br>
    <center>
        <h4 class="text-muted">Please Specify the Stages with Fares</h4>
    </center><br>
    <div class="row">
        <div class="col-sm"><label for="stage1">Stage 1 Name: </label> <input type="text" class="form-control" name="stage1" id="stage1" /></div>
        <div class="col-sm"><label for="stage1_fare">Stage 1 Fare : </label> <input type="text" class="form-control" name="stage1_fare" id="stage1_fare" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage2">Stage 2 Name : </label> <input type="text" name="stage2" id="stage2" class="form-control" /></div>
        <div class="col-sm"><label for="stage2_fare">Stage 2 Fare : </label> <input type="text" name="stage2_fare" id="stage2_fare" class="form-control" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage3">Stage 3 Name : </label> <input type="text" name="stage3" id="stage3" class="form-control" /></div>
        <div class="col-sm"><label for="stage3_fare">Stage 3 Fare : </label> <input type="text" name="stage3_fare" id="stage3_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage4">Stage 4 Name : </label> <input type="text" name="stage4" id="stage4" class="form-control" /></div>
        <div class="col-sm"><label for="stage4_fare">Stage 4 Fare : </label> <input type="text" name="stage4_fare" id="stage4_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage5">Stage 5 Name : </label> <input type="text" name="stage5" id="stage5" class="form-control" /></div>
        <div class="col-sm"><label for="stage5_fare">Stage 5 Fare : </label> <input type="text" name="stage5_fare" id="stage5_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage6">Stage 6 Name : </label> <input type="text" name="stage6" id="stage6" class="form-control" /></div>
        <div class="col-sm"><label for="stage6_fare">Stage 6 Fare : </label> <input type="text" name="stage6_fare" id="stage6_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage7">Stage 7 Name : </label> <input type="text" name="stage7" id="stage7" class="form-control" /></div>
        <div class="col-sm"><label for="stage7_fare">Stage 7 Fare : </label> <input type="text" name="stage7_fare" id="stage7_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage8">Stage 8 Name : </label> <input type="text" name="stage8" id="stage8" class="form-control" /></div>
        <div class="col-sm"><label for="stage8_fare">Stage 8 Fare : </label> <input type="text" name="stage8_fare" id="stage8_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage9">Stage 9 Name : </label> <input type="text" name="stage9" id="stage9" class="form-control" /></div>
        <div class="col-sm"><label for="stage9_fare">Stage 9 Fare : </label> <input type="text" name="stage9_fare" id="stage9_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage10">Stage 10 Name : </label> <input type="text" name="stage10" id="stage10" class="form-control" /></div>
        <div class="col-sm"><label for="stage10_fare">Stage 10 Fare : </label> <input type="text" name="stage10_fare" id="stage10_fare" class="form-control" /></div>
    </div>   <div class="row">
        <div class="col-sm"><label for="stage11">Stage 11 Name : </label> <input type="text" name="stage11" id="stage11" class="form-control" /></div>
        <div class="col-sm"><label for="stage11_fare">Stage 11 Fare : </label> <input type="text" name="stage11_fare" id="stage11_fare" class="form-control" /></div>
    </div>
    <div class="row">
        <div class="col-sm"><label for="stage12">Stage 12 Name : </label> <input type="text" name="stage12" id="stage12" class="form-control" /></div>
        <div class="col-sm"><label for="stage12_fare">Stage 12 Fare : </label> <input type="text" name="stage12_fare" id="stage12_fare" class="form-control" /></div>
    </div>
            <br><br>
            <label for="">Login ID:</label>
            <input type="text" name="login_id" readonly class="form-control" style="width: min-content;border:none;" value="<?php echo $_SESSION['username'];?>" id="">
            <center><button type="submit" class="btn btn-danger">Submit</button></center>
    
</form>

<?php include 'footer.php'; ?>