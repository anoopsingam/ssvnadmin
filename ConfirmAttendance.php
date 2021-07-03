<?php include'header.php';?>
<title>Attendance Confirmation  | <?php echo $theader?></title>
<div class="container" style="height: 300px;overflow: scroll;">
    

    <form action="AttendanceVerified" method="POST">
<center>  <h3>ABSENT STUDENTS ON <STRONG><?php echo $_POST['date'][1];?></STRONG> </h3>

<table class="jumbotron" >
    <tr>
        <th>Reg No</th>
        <th>Name</th>
        <th>Mobile No</th>
        <th>Attendance</th>
        <th>Date</th>
    </tr>

     <?php 
     
     for($i=0;$i<$_POST['numbers'];$i++)
{    ?>    <tr> 
    <td>
            <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  readonly name="reg_no[]" value="<?php echo $_POST['reg_no'][$i];?>" >

<?php } ?>
        </td>
        <td>
            <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  readonly name="name[]" value="<?php echo $_POST['name'][$i];?>" >

            <?php  } ?>
        </td>
        <td>
            <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  readonly name="mobile_no[]" value="<?php echo $_POST['mobile_no'][$i];?>" >

           <?php  } ?>
        </td>
        <td>
            <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  readonly name="attend[]" value="<?php echo $_POST['attend'][$i];?>" >

           <?php  } ?>
        </td>
        <td>
            <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  readonly name="date[]" value="<?php echo $_POST['date'][$i];?>" >

          <?php  } ?>
        </td>
        <?php  if($_POST['attend'][$i]=="A"){?>
                <input type="text" class="form-control"  hidden name="loginid[]" value="<?php echo $_POST['loginid'][$i];?>" >

          <?php  } ?>
        </tr> 
    <?php } ?>
    <td><input type="number" name="number" hidden value="<?php echo $_POST['numbers'];?>" ></td>
   
</table>
</div>
<center><button name="submit" class="btn btn-danger" type="submit">Verified</button>
</center>
</form>
<?php include'footer.php';?>