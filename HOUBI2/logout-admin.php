<?php
session_start();
session_destroy();
header('location: /HOUBI2/admin/login.php');
exit;
?>