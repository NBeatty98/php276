<?php
session_start();
/* DELETE THE SESSION VALUES*/
session_unset();
header('location:index.php?page=login');
?>