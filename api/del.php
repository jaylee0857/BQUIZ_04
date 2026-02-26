<?php
    include_once "db.php";

    $db = ${$_POST['table']};
    $db->del($_POST['id']);

?>