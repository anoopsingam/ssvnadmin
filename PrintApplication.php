
<?php include'header.php';?>
<title>Print Application | <?php echo $theader;?></title>
<center>
<div class="card" >


   <form action="" method="post">
    <label for=""><strong>ENROLLMENT NO:</strong></label>
    <input list="eid" name="enrno" placeholder="STARK2021***" autocomplete="off" style="width: min-content;" id="" class="form-control">
    <datalist id="eid">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student_enrollment  order by studentid asc");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['enrollment']; ?>"> <?php echo $row['enrollment']; ?></option>

            <?php
            } ?>
        </datalist> 
    <br>
    <button name="get" class="btn btn-success"> PRINT APPLICATION</button>  
    </form> 
 
<?php 
if(isset($_POST['get'])){ sleep(1);
                    $enr=$_POST['enrno'];
                    ?><hr class="my-3">  <div class="" style="border-radius: 30px;
                    background: #fafafa;
                    box-shadow:  5px 5px 10px #dcdcdc,
                                 -5px -5px 10px #ffffff;"> 
                    <?php
                    if(!empty($enr)){
                        
               include'database.php';
               $sql="SELECT status from student_enrollment where enrollment='$enr'";
                 $ask=mysqli_query($conn,$sql);
                 $fetch=mysqli_fetch_array($ask); 
                 
                 if(mysqli_num_rows($ask)>0){
                    $encry = my_simple_crypt( $enr, 'e' );
                    ?>
                   

                    Your Application no. <strong class="text-uppercase"><?php echo $enr;?></strong> is Ready to Print. <br> 
                    <a  href="PrintApp?enr=<?php echo $encry;?>" target="_blank"><button style="border-radius:0.1cm;" class="btn btn-warning">PRINT </button></a>
                                    <?php


                }else{
                            echo "no res for $enr";
                }


            }else{
                    echo "Null Input";
            } 
            ?>
            </div><hr class="my-3">
        <?php
        }
?> <br>

<?php include'footer.php'?>
  </div>
</div></center>