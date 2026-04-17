
<?php
include 'conn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
        $query = "DELETE from news_db where id = '$id'";
        $result = mysqli_query($conn,$query);
        header('Location: news_table.php');
    
    }
?>

