<?php include'header.php';  if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){
    $year = date("Y");
	$ay = $year . "-" . ($year + 1);
            $sql="SELECT * FROM student_tution_fee WHERE discount_approval='NO' and academic_year='$ay'";
            $get=mysqli_query($conn,$sql);
           
    
    ?>                             <title>Discount Approval | <?php echo $theader;?></title>
    <center> <center><legend>Discount Approval</legend></center>
     <div style="overflow: scroll;width:100%;">
                        <table class="table  table-hover" >
                                <thead class="bg-dark text-light">
                                    <th>Sl No</th>
                                    <th>Student Name</th>
                                    <th>Bill No</th>
                                    <th>Tuition Discount</th>
                                    <th>Transport Discount</th>
                                    <th>UBS Discount</th>
                                    <th>Action</th>
                                </thead>
                               
                                <tbody>
                                <?php   $a=0;
                                             if(mysqli_num_rows($get)>0){
                                                 while($row=mysqli_fetch_assoc($get)){?>
                                                              
                                                                <tr>
                                                                    <td><?php echo ++$a;?></td>
                                                                    <td><?php echo $row['student_name']?></td>
                                                                    <td><?php echo $row['bill_no']?></td>
                                                                    <td><?php echo $row['discount']?></td>
                                                                    <td><?php echo $row['transport_discount']?></td>
                                                                    <td><?php echo $row['ubs_discount']?></td>
                                                                    <td><a href="ApproveTransaction?bill_no=<?php echo  my_simple_crypt( $row['bill_no'], 'e' );?>&auth=<?php echo $_SESSION['username'];?>"><button class="btn btn-danger">Approve</button></a></td>
                                                                </tr>
                                                                
                                               <?php  }
                                             }else{?>
                                                                            <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>No Pending Discount Approvals</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>


                                                                            </tr>
                                           <?php  }
                                ?>

                                </tbody>
                               

                        </table>
                        </div>
                                                



<?php }include'footer.php';?>