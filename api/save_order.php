<?php
	include_once "db.php";

    $_POST['acc']=$_SESSION['mem'];
    $_POST['cart'] = json_encode($_SESSION['buycart']);
    $_POST['no'] = date("Ymd").rand(100000,999999);

    $Orders->save($_POST);
    unset($_SESSION['buycart']);

?>

<script>
    alert("訂購成功\n感謝您的選購");
    location.href="../index.php";
</script>