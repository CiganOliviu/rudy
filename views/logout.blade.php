<?php

namespace login;

session_start();

$_SESSION = array();

session_destroy();

header("location: login.blade.php");
exit;
?>
