<?php
    include_once "db.php";

    $login = $Mem->find($_POST);
    if ($login >0) {
        $_SESSION['mem'] = $_POST['acc'];
        echo 1;
    }else{
        echo 0;
    }

?>