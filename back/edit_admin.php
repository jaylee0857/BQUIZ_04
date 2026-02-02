<?php
    $row = $Admin->find($_GET['id']);
    $row_pr = json_decode($row['pr'] ,true);
?>
<h2 class="ct">修改管理員權限</h2>

<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="ct tt">帳號</td>
            <td class="pp">
                <input type="text" name="acc" value="<?=$row['acc']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">密碼</td>
            <td class="pp">
                <input type="password" name="pw" value="<?=$row['pw']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$row_pr)?"checked": '')?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$row_pr)?"checked": '')?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3" <?=(in_array(3,$row_pr)?"checked": '')?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4" <?=(in_array(4,$row_pr)?"checked": '')?>>頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" value="5" <?=(in_array(5,$row_pr)?"checked": '')?>>最新消息管理</div>
                <div><input type="hidden" name="id" value="<?=$row['id']?>"></div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重製">
    </div>
</form>