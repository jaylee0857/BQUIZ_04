<?php

if (isset($_GET['id'])) {
    $_SESSION['buycart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("../index.php?do=login");
}

if (empty($_SESSION['buycart'])) {
    echo "<h2 class='ct'>購物車內沒有商品</h2>";
}else{
    echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";
    dd($_SESSION['buycart']);
?>
<table class="all ct">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小記</td>
        <td>刪除</td>
    </tr>
<?php
    foreach ($_SESSION['buycart'] as $id => $qt) :
        $row = $Item->find($id);
?>
    <tr class="pp">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td><?=$qt?></td>
        <td><?=$row['qt']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['price']*$qt?></td>
        <td>
            <a href="api/del_cart.php?id=<?=$id?>">
                <img src="./icon/0415.jpg" alt="">
            </a>
        </td>
    </tr>


<?php
    endforeach;
}
?>
</table>

<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>

<script>

</script>