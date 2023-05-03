<?php
session_start();
session_destroy();
header("Location: \langgamtrading\index.php"); 
exit();
?>