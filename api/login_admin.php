<?php
    include_once "db.php";

    $login = $Admin->find($_POST);
    if ($login >0) {
        $_SESSION['admin'] = $_POST['acc'];
        echo 1;
    }else{
        echo 0;
    }

?>