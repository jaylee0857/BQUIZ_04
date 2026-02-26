<h2 class="ct">會員管理</h2>

<table class="ct all">
    <tr>
        <td class="tt">訂單編號</td>
        <td class="tt">金額</td>
        <td class="tt">會員帳號</td>
        <td class="tt">姓名</td>
        <td class="tt">下單日期</td>
        <td class="tt">操作</td>

    </tr>
    <?php
        $rows = $Orders->all();
        foreach ($rows  as $row) :
        if ($row['acc'] == 'admin') {
            continue;
        }
    ?>
    <tr>
        <td class="pp"><a href="?do=checkout&id=<?=$row['id']?>"><?=$row['no']?></a></td>
        <td class="pp"><?=$row['sum']?></td>
        <td class="pp"><?=$row['acc']?></td>
        <td class="pp"><?=$row['name']?></td>
        <td class="pp"><?=$row['order_date']?></td>
        <td class="pp">
            <div class="ct">
                <input type="button" value="刪除" onclick="del(<?=$row['id']?>)">
            </div>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<script>


function del(id){
	$.post("./api/del.php",{id,table:'Orders'},function(){
		location.reload();
	})
}

</script>