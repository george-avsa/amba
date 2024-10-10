<?php
require_once 'db/db.php';

if (isset($_SESSION['logged_user'])) echo "<script>window.location.replace('http://ambassa.ru/pages/tasks_page.php')</script>";
else echo "<script>window.location.replace('http://ambassa.ru/pages/login.php')</script>";

?>
