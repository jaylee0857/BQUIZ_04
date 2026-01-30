<?php
	include_once "db.php";

    if ($_SESSION['ans'] == $_POST['ans']) {
        echo "1";
    }else{
        echo "0";
    }
    // to("../back.php?do=bot")
?>