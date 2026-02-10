<?php
    include_once "db.php";

    // dd($_SESSION['ans']);
    // $_SESSION['ans']
    if ($_SESSION['ans'] == $_POST['ans']) {
        echo 1;
    }else{
        echo 0;
    }

?>