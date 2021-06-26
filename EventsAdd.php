<?php
$event_name = $_POST['event_name'];
$event_discription = $_POST['event_discription'];
$event_date = $_POST['event_date'];
$even_added_by = $_POST['even_added_by'];
$academic_year = $_POST['academic_year'];
include 'database.php';

//INSERT 

$query = " INSERT INTO events ( event_name, event_discription, event_date, even_added_by, academic_year )  VALUES ( '$event_name', '$event_discription', '$event_date', '$even_added_by', '$academic_year' ) ";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('Event $event_name Addded Successfully to Date $event_date for Academic Year $academic_year')</script>"; ?>
    <script>
        window.location.replace("AddEvents");
    </script>
<?php    } else {

    echo "<script>alert('Query failed ! Contact Technical Team')</script>"; ?>
    <script>
        window.location.replace("index");
    </script>
<?php
}


?>