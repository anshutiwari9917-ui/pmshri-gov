<?php
$sql = "SELECT filename FROM slider_image";
$result = $conn->query($sql);
?>
<?php
$sql = "SELECT * FROM achievement_db";
$achieve = $conn->query($sql);
?>
<?php
$sql = "SELECT * FROM announcement_db";
$announce = $conn->query($sql);
?>
<?php
$sql = "SELECT * FROM event_db";
$event = $conn->query($sql);
?>
<?php
$sql = "SELECT * FROM fixed_db LIMIT 6";
$fixed = $conn->query($sql);
?>
 <?php
$sql = "SELECT * FROM news_db LIMIT 3";
$news = $conn->query($sql);
?>
<?php
$sql = "SELECT * FROM gallery_db 3,6,8";
$gallery = $conn->query($sql);
?>