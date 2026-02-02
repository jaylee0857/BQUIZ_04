<h2 class="ct">編輯會員資料</h2>

<form action="./api/edit_mem.php" method="post">

<?php
    $row = $Mem->find($_GET['id']);
?>
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp">

                <?=$row['acc']?>
            </td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp">
                <?=$row['pw']?>
            </td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp">
                <input type="text" id="acc" name="name" value="<?=$row['name']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp">
                <input type="text" id="acc" name="email" value="<?=$row['email']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">地址</td>
            <td class="pp">
                <input type="text" id="acc" name="addr" value="<?=$row['addr']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp">
                <input type="text" id="acc" name="tel" value="<?=$row['tel']?>">
            </td>
        </tr>

    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重製">
        <button onclick="location.href='?do=mem'">取消</button>
    </div>

</form>