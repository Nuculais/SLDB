<?php 
session_start();
session_destroy();
header("Location:Search.php");
?>