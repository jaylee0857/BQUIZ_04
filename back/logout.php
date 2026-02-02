<?php
	include_once "db.php";

    unset($_SESSION['admin']);
    unset($_SESSION['mem']);

    to("../index.php")
?>