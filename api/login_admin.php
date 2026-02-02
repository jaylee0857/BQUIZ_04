<?php
	include_once "db.php";

    $ch = $Admin->count($_POST);

    if ($ch>0) {
        echo "1";
        $_SESSION['admin']=$_POST['acc'];
    }else{
        echo "0";
    }
    // to("../back.php?do=bot")
?>