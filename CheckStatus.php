<?php include'header.php';?>
<title>Check Status | <?php echo $theader;?></title>
<form action="" method="post" >
                    <center>
                        <div >
                           <strong>ENROLLMENT NO:</strong>
                            <input list="eid" name="enrollment_no" autocomplete="off" class="form-control" style="width: min-content;" placeholder="STARK2021**">
                            <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment  order by studentid asc");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['enrollment']; ?>"> <?php echo $row['enrollment']; ?></option>

            <?php
            } ?>
        </datalist> 
                        </div>
                        <br>
                        <div class="form-floating">
                            <button type="submit" class="btn btn-danger" name="get">GET STATUS</button>
                        </div>
                        <br>
                    </center>
                </form><?php 
      if(isset($_POST['get'])){
         
          $enr=trim($_POST['enrollment_no']);
         
          if(!empty($enr)){

            include'database.php';
            $sql="SELECT status from student_enrollment where enrollment='$enr'";
              $ask=mysqli_query($conn,$sql);
              $fetch=mysqli_fetch_array($ask); 
              
              if(mysqli_num_rows($ask)>0){
              ?>
            <center><hr class="my-2">
                        <?php 
                                                if($fetch['status']==":: STATUS NOT UPDATED::") { 
                                                    ?>
                                                    <div role="alert" class="alert alert-primary text-dark"><?php echo "Your Application <strong>$enr</strong> is Still Under Review";?></div>
                                                <?php
                                                }elseif($fetch['status']=="APPROVED")  {
                                                    ?>
                                                    <div role="alert" class="alert alert-success"><?php echo "Congratulations Your Enrollment Application <strong>$enr</strong> is Approved !!";?></div>
                                                <?php
                                                } elseif($fetch['status']=="WAITING")  {
                                                    ?>
                                                    <div role="alert" class="alert alert-info"><?php  echo "Please Be Paitent Your Application <strong>$enr</strong> is in Waiting List !!"; ?></div>
                                                <?php
                                                   
                                                }  elseif($fetch['status']=="REJECTED")  {
                                                    ?>
                                                    <div role="alert" class="alert alert-danger"><?php echo "Sorry to say your Application <strong>$enr</strong> is Rejected Contact Admin Office  !!"; ?></div>
                                                <?php
                                                   
                                                }                                 
                        
                        
                        ?><hr class="my-1"><br>
            </center>

                <?php }else{?>
                 <div role="alert" class="alert alert-info"> <center><h6>No Data Found for <strong><?php echo $enr; ?></strong></h6> </center> </div><br> 

                 <?php 
                } } elseif(empty($enr)){ ?>
               <div class="alert alert-danger" role="alert">
 <center> <strong> Oh no !!</strong> Please Provide Input and try submitting again.</center>
</div>

               
                <?php }
      }

      ?><?php include'footer.php';?>
            </div> 
