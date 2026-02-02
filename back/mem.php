<h2 class="ct">會員管理</h2>
<table class="all ct">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">管理</td>
    </tr>
    <?php
    $rows = $Mem->all();
    foreach ($rows as $row) :
        if ( $row['acc'] == 'admin') {
            continue;
        }
    ?>
    <tr>
        <td class="pp">
            <?=$row['name']?>
        </td>
        <td class="pp">
            <?=$row['acc']?>
        </td>
        <td class="pp">
            <?=$row['reg_date']?>
        </td>
        <td class="pp">
            <button class="edit-btn" data-id="<?=$row['id']?>">修改</button>
            <button class="del-btn" data-id="<?=$row['id']?>">刪除</button>

        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>

<script>

$(".del-btn").click(function () {
  console.log($(this).data("id"));
  let id = $(this).data("id")
  $.post('./api/del.php',{id, table:'Mem'},function(){
    location.reload()
  })
});

$(".edit-btn").click(function(){
    let id = $(this).data("id")
    location.href=`?do=edit_mem&id=${id}`
})


</script>