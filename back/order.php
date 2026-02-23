<!-- 這頁面最後做 從 mem 先全部複製 -->
<h2 class="ct">會員管理</h2>
<table class="all ct">
    <tr>
        <td class="tt">訂單編號</td>
        <td class="tt">金額</td>
        <td class="tt">會員帳號</td>
        <td class="tt">姓名</td>
        <td class="tt">下單時間</td>
        <td class="tt">操作</td>

    </tr>
    <?php
    $rows = $Orders->all();
    foreach ($rows as $row) :
        if ( $row['acc'] == 'admin') {
            continue;
        }
    ?>
    <tr>
        <td class="pp">
            <span class="edit-btn" data-id="<?=$row['id']?>"><?=$row['no']?></span>
        </td>
        <td class="pp">
            <?=$row['sum']?>
        </td>
        <td class="pp">
            <?=$row['acc']?>
        </td>
        <td class="pp">
            <?=$row['name']?>
        </td>
        <td class="pp">
            <?=$row['order_date']?>
        </td>
        <td class="pp">
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
  $.post('./api/del.php',{id, table:'Orders'},function(){
    location.reload()
  })
});

$(".edit-btn").click(function(){
    let id = $(this).data("id")
    location.href=`?do=edit_order&id=${id}`
})


</script>