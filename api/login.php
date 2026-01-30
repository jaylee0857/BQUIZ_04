<?php
	include_once "db.php";

    $ch = $Mem->count($_POST);

    if ($ch>0) {
        echo "1";
    }else{
        echo "0";
    }
    // to("../back.php?do=bot")
?>