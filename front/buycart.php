<?php
// 1) 有帶 id/qt：就把商品數量寫進購物車（更新同 id 也會覆蓋）
if (isset($_GET['id'], $_GET['qt'])) {
    $_SESSION['buycart'][$_GET['id']] = $_GET['qt'];
}

// 2) 沒登入：直接去登入頁
if (!isset($_SESSION['mem'])) {
    to("../index.php?do=login");
    exit;
}

// 3) 取出購物車（沒有就給空陣列）
$cart = $_SESSION['buycart'] ?? [];

// 4) 購物車是空的：顯示訊息並停止
if (empty($cart)) {
    echo "<h2 class='ct'>購物車內沒有商品</h2>";
    exit;
}

// （想除錯再打開）
// dd($cart);
?>

<h2 class="ct"><?= $_SESSION['mem']; ?> 的購物車</h2>

<table class="all ct">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>

    <?php
    $total = 0; // 總計（可要可不要，考試常加分）
    foreach ($cart as $id => $qt):
        $row = $Item->find($id);
        $sub = $row['price'] * $qt;
        $total += $sub;
    ?>
        <tr class="pp">
            <td><?= $row['no']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $row['qt']; ?></td>
            <td><?= $row['price']; ?></td>
            <td><?= $sub; ?></td>
            <td>
                <a href="api/del_cart.php?id=<?= $id; ?>">
                    <img src="./icon/0415.jpg" alt="">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="all tt ct">
    總計: <?= $total; ?>
</div>

<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>