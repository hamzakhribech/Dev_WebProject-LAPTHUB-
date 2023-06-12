<?php
session_start();
$id = 0;
$_SESSION['id'] = 0;
$_SESSION['img'] = 0;
session_destroy();
echo '<script>window.history.go(-1);</script>';
?>