<?php
if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['mem'])){
  header("location:?do=login");
  exit;
}

if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>空的購物車</h2>";
    exit;
}


echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>"

?>
<!-- 此畫面由於資料都還在SESSION, 當中轉戰即可 -->
<table class="all">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">數量</td>
        <td class="tt">庫存</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
        <td class="tt">刪除</td>
    </tr>
    <?php
        // dd($_SESSION['cart']);
        foreach ($_SESSION['cart'] as $id => $qt) :
            $row = $Item->find($id);
    ?>
    <tr>
        <td class="pp">
            <?=$row['no']?>
        </td>
        <td class="pp">
            <?=$row['name']?>

        </td>
        <td class="pp">
            <?=$qt?>
        </td>
        <td class="pp">
            <?=$row['qt']?>
        </td>
        <td class="pp">
            <?=$row['price']?>
        </td>
        <td class="pp">
            <?=$row['price']*$qt?>
        </td>
        <td class="pp">
            <a href="api/del_cart.php?id=<?=$id?>">
                <img src="../icon/0415.jpg" alt="">
            </a>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<div class="ct">
    <a href="?"><img src="../icon/0411.jpg" alt=""> </a>
    <a href="?do=checkout"><img src="../icon/0412.jpg" alt=""></a>
</div>

