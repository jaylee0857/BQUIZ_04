<h2 class="ct">會員管理</h2>

<table class="ct all">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">管理</td>

    </tr>
    <?php
        $rows = $Mem->all();
        foreach ($rows  as $row) :
        if ($row['acc'] == 'admin') {
            continue;
        }
    ?>
    <tr>
        <td class="pp"><?=$row['name']?></td>
        <td class="pp"><?=$row['acc']?></td>
        <td class="pp"><?=$row['reg_date']?></td>
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
	$.post("./api/del.php",{id,table:'Mem'},function(){
		location.reload();
	})
}

function edit(id){
    location.href=`?do=edit_mem&id=${id}`
}
</script>