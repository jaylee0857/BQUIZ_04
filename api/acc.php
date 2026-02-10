<?php
    include_once "db.php";

    $acc = $Mem->find(['acc'=>$_POST['acc']]);

    if ($acc > 0) {
        echo 1;
    }else{
        echo 0;

    }

?>