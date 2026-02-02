<?php
	include_once "db.php";

    
    $_POST['pr'] = json_encode($_POST['pr']);
    dd($_POST);
    $Admin->save($_POST);
    to("../back.php?do=admin")
?>