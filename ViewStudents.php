<?php include'header.php';?>
<title>Attendance <?php 
$class=$_POST['class'];
$section=$_POST['section'];
 echo " $class '$section' ";?>  | <?php echo $theader?></title>

<div class="container" style="height: 500px;overflow: scroll;">
    
    <form action="ConfirmAttendance" method="post">
        <table id="myTable" class="table table-responsive" border="1px">
        <thead>        <tr>
                <th>Sl.No</th>
                <th>Student Name</th>
                <th>Reg No</th>
    
                <th>Attendance</th>
            </tr>
    
    </thead>
            <?php 

    
    
    $sql="SELECT * from student_enrollment where present_class='$class'AND present_section='$section' ORDER BY student_name ASC";
    $query=mysqli_query($conn,$sql);
    $count="SELECT COUNT(studentid) as count from student_enrollment where present_class='$class'AND present_section='$section' ORDER BY student_name ASC";
    $ask=mysqli_query($conn,$count);
    $r=mysqli_fetch_array($ask);
    
    $i=1;
    
    
    while($info=mysqli_fetch_assoc($query)){
        ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>
                <input type="text" class="form-control" readonly name="name[]" value="<?php echo $info['student_name'];?>" title="<?php echo $info['father_number']?>" >
                </td>
    
                <td>
                    <input type="text" class="form-control" readonly name="reg_no[]" value="<?php echo $info['studentid'];?>">
                </td>
                <input type="text" hidden name="mobile_no[]" value="<?php echo $info['father_number'];?>">
               
                <td>
                    <select required name="attend[]" class="form-control" id="">
                        <option value="P" selected>PRESENT</option>
                        <option value="A">ABSENT</option>
    
                    </select>
    
                </td>
    
            </tr>
            <input type="text" name="date[]" hidden value="<?php echo date("Y-m-d")?>">
            <input type="text" name="loginid[]" hidden value="<?php echo $username?>">
            <?php }
    
    ?>
        </table>
    
        
    
        
    
    
 

    </div>
    <center><strong>Total Strength <?php echo"$class $section ";?>:</strong>
            <input type="text" name="numbers" readonly class="form-control" style="width: min-content;" value="<?php echo $r['count'];?>">
            <br>
            <button type="submit" class="btn btn-info" name="submit">submit</button>
        </center>
        </form>
<?php include'footer.php';?>