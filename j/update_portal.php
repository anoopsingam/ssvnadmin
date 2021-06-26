<?php 
$conn=mysqli_connect('localhost','root','','sssvn');
$sql="select * from kyt";
$x=mysqli_query($conn,$sql);
include "blackbox.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_assoc($x)) {?>
  <tr>
      <th scope="row"><?php echo $row['name'];?></th>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['phone_no'];?></td>
      <td><a href="updateteacher_entry.php?&namee=<?php echo my_simple_crypt($row['id'],'e'); ?>"><button class="btn btn-primary btn-sm" >update</button></a><a href="deleteteacher.php?&namee=<?php echo my_simple_crypt($row['id'],'e');?>"><button class="btn btn-danger btn-sm">delete</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>   


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>

