<?php
    include_once "db.php";

    $db = ${$_GET['table']};
    $db->del($_POST['id']);

?>