<?php include "header.php";  if( $_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator"){ ?> 
<title>
    Manage Users | <?php echo $theader;?></title>

<center>
    <h1 class="h1  text-muted  "> User Management Portal</h1>
</center>
<div style="overflow: scroll; ">
    <table class="table table-bordered">
        <thead>
            <th>E.ID</th>
            <th>User Name</th>
            <th>User Category</th>
            <th>Email Id</th>
            <th>Class</th>
            <th>Section</th>
            <th>User Added On</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php
            
                $sql="SELECT * FROM users ORDER BY username ASC ";
                $ask=mysqli_query($conn, $sql);
                if (mysqli_num_rows($ask)>0) {
                    while ($row=mysqli_fetch_assoc($ask)) {
                        ?>
            <tr>
            <td><?php echo $row['emp_id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['user_type']?></td>
                <td><?php echo $row['emailid']?></td>
                <td><?php echo $row['class']?></td>
                <td><?php echo $row['section']?></td>
                <td><?php echo $row['created_at']?></td>
                <?php
                                                                    if ($row['username']!="administrator") {
                                                                        ?>
                <td><a href="UpdateUser?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button
                            class="btn btn-warning">UPDATE</button></a>&nbsp;
                             <?php
                                                                    if ($row['username']!="principal") {
                                                                        ?> 
                            <a
                        href="DeleteUser?id=<?php echo my_simple_crypt($row['id'], 'e'); ?>"><button
                            class="btn btn-danger">DELETE</button></a></td>
                <?php
                                                                    }else{
                                                                        echo "<small>This Login Can't be Deleted</small>";

                                                                    }
                                                                    } else {
                                                                        echo "<td>This Login Can't be Deleted</td>";
                                                                    } ?>


            </tr>
            <?php
                    }
                } else {
                }
            
            ?>


        </tbody>

    </table>
</div>


<?php } include 'footer.php'; ?>