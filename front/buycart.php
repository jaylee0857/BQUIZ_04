<?php
    if (!isset($_SESSION['mem'])) {
        to("?do=login");
    }
?>