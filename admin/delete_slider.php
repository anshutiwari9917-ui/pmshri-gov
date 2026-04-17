
<?php
include 'conn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
        $query = "DELETE from slider_image where id = '$id'";
        $result = mysqli_query($conn,$query);
        header('Location: table.php');
    
    }
?>

