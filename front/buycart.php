<?php
    if (!isset($_SESSION['mem'])) {
        to("../index.php?do=login");
    }
    
?>