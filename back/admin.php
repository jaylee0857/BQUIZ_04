<div class="ct">
    <input type="button" value="新增管理元" onclick="location.href='?do=add_admin'">
</div>

<table class="ct all">
    <tr>
        <td class="tt">帳號</td>
        <td class="tt">密碼</td>
        <td class="tt">管理</td>
    </tr>
    <tr>
        <td class="pp">admin</td>
        <td class="pp">****</td>
        <td class="pp">此帳號為最高權限</td>
    </tr>
    <?php
        $rows = $Admin->all();
        foreach ($rows  as $row) :
        if ($row['acc'] == 'admin') {
            continue;
        }
    ?>
    <tr>
        <td class="pp"><?=$row['acc']?></td>
        <td class="pp"><?=$row['pw']?></td>
        <td class="pp">
            <div class="ct">
                <input type="button" value="修改" onclick="edit(<?=$row['id']?>)">
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
	$.post("./api/del.php?table=Admin",{id},function(){
		location.reload();
	})
}

function edit(id){
    location.href=`?do=edit_admin&id=${id}`
}
</script>