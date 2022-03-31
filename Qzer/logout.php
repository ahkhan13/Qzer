<?php
include 'config.php';
session_start();
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/quiz/index.php");

?>