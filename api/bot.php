<?php
	include_once "db.php";

    // dd($_POST);
    $Bot->save($_POST);
    to("../back.php?do=bot")
?>