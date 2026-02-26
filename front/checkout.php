<h2>填寫資料</h2>
<form action="./api/checkout.php" method="post">
    <table class="all">
        <?php
            $row = $Mem->find(['acc'=>$_SESSION['mem']])
        ?>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp">
                <?=$row['acc']?>
                <input type="hidden" name="acc" value="<?=$row['acc']?>">
            </td>
        </tr>

        <tr>
            <td class="tt">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="" value="<?=$row['name']?>">
            </td>
        </tr>
                <tr>
            <td class="tt">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" id="" value="<?=$row['email']?>">
            </td>
        </tr>
                <tr>
            <td class="tt">地址</td>
            <td class="pp">
                <input type="text" name="addr" id="" value="<?=$row['addr']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp">
                <input type="text" name="tel" id="" value="<?=$row['tel']?>">
            </td>
        </tr>
    </table>
    <table class="all">
    <tr>
        <td class="tt">商品名稱</td>
        <td class="tt">編號</td>
        <td class="tt">數量</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
        <td class="tt">刪除</td>
    </tr>
    <?php
        // dd($_SESSION['cart']);
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qt) :
            $row = $Item->find($id);
            $total+= $row['price']*$qt;
    ?>
    <tr>
        <td class="pp">
            <?=$row['name']?>
        </td>
        <td class="pp">
            <?=$row['no']?>
        </td>
        <td class="pp">
            <?=$qt?>
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
<table class="all ct">
    <tr>
        <td class="tt">總價:<?=$total?></td>
        <input type="hidden" name="sum" value="<?=$total?>">
    </tr>
</table>
<div class="ct">
    <input type="submit" value="確認送出">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">

</div>
</form>