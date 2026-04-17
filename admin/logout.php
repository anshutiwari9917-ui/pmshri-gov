<?php
require "conn.php";
$_SESSION = [];
session_unset();
session_destroy();
header("Location:admin.php");
?>