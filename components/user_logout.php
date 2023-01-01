<?php

   include 'connect.php';
   session_start();

   setcookie('user_id', '', time() - 1, '/');

   header('location:../home.php');

?>