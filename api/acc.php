<?php
	include_once "db.php";

    // dd($_POST);
    $ch = $Mem->count(['acc'=>$_POST['acc']]);

    if ($ch>0) {
        echo "1";
    }else{
        echo "0";
    }
    // to("../back.php?do=bot")
?>