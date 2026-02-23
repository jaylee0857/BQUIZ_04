<?php
	include_once "db.php";

    unset($_SESSION['buycart'][$_GET['id']]);

    to("../index.php?do=buycart");
?>