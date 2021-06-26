<?php include'header.php';?>
<title>Add Bus | Stark Tech</title>


<form id="form1" name="form1" method="post" action="UploadBus">
<center><legend class="text-muted">Add Bus</legend>
</center>
<div class="row">
<div class="col-sm">
<label for="bus_no">Bus No : </label><input class="form-control" value="<?php
                                                                                        $sql = "select max(bus_no) as str from transport_bus ";
                                                                                        $result = mysqli_query($conn, $sql);
                                                                                        $r = mysqli_fetch_array($result);
                                                                                        $str = $r['str'];
                                                                                        echo ++$str; ?>" readonly  class="" type="text" name="bus_no" id="bus_no" />
</div>
<div class="col-sm">
<label for="reg_no">Bus Reg No : </label><input class="form-control" type="text" name="reg_no" id="reg_no" />

</div>
<div class="col-sm">
<label for="driver_name">Driver Name : </label><input class="form-control" type="text" name="driver_name" id="driver_name" />
</div>
</div>
<div class="row">
<div class="col-sm"><label for="driver_number">Driver Number : </label><input class="form-control" type="text" name="driver_number" id="driver_number" />
</div>
<div class="col-sm"><label for="driver_address">Driver Address : </label><input class="form-control" type="text" name="driver_address" id="driver_address" />
</div>
<div class="col-sm"><label for="route_no">Route No : </label> <select name="route_no" class="form-control" id="">
                      
                        <option value="1">1 </option>
                        <option value="2">2 </option>
                        <option value="3">3 </option>
                        <option value="4">4 </option>
                        <option value="5">5 </option>
                        <option value="6">6 </option>
                        <option value="7">7 </option>
                        <option value="8">8 </option>
                        <option value="9">9 </option>
                        <option value="10">10 </option>
                    </select>
</div>
</div><br>
<label for="">Login ID:</label>
            <input type="text" name="login_id" readonly class="form-control" style="width: min-content;border:none;" value="<?php echo $_SESSION['username'];?>" id="">
          <br>

<center><button type="submit" class="btn btn-danger">Submit</button></center>

</form>

<?php include'footer.php';?>