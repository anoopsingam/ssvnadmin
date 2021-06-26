<?php
include "blackbox.php";
$name = $_GET['namee'];
$name=my_simple_crypt($name,'d');
$conn = mysqli_connect('localhost', 'root', '', 'sssvn');
$sql="delete from kyt where id='$name' ";
if(file_exists(mysqli_fetch_assoc(mysqli_query($conn,"select link_documents from kyt where id='$name'"))['link_documents'])){
    unlink(mysqli_fetch_assoc(mysqli_query($conn,"select link_documents from kyt where id='$name'"))['link_documents']);}
$x=mysqli_query($conn,$sql);
echo mysqli_fetch_assoc(mysqli_query($conn,"select link_documents from kyt where id='$name'"))['link_documents'];

if($x)
{
    echo "<h1>id $name is removed from database</h1>";
    
}
?>