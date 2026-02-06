<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="saveType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="bigs" id="bigs">
        <?php
            $bigs=$Type->all(['big_id'=>0]);
            foreach ($bigs as $big) {
                echo "<option value='{$big['id']}'>{$big['name']}</option>";
            }
        ?>
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="saveType('mid')">新增</button>
</div>

<table class="all">
    <?php
        $bigs = $Type->all(['big_id'=>0]);
        foreach ($bigs as $big) :
    ?>
    <tr class="tt">
        <td><?=$big['name']?></td>
        <td class="ct">
            <button class="edit-btn" data-id="<?=$big['id']?>">修改</button>
            <button class="del-btn" data-table="Type" data-id="<?=$big['id']?>">刪除</button>
        </td>
    </tr>
    <?php
        $mids = $Type->all(['big_id'=>$big['id']]);
        foreach ($mids as $mid) :
    ?>
        <tr class="pp">
            <td><?=$mid['name']?></td>
            <td class="ct">
                <button class="edit-btn" data-id="<?=$mid['id']?>">修改</button>
                <button class="del-btn" data-table="Type" data-id="<?=$mid['id']?>">刪除</button>
            </td>
        </tr>

    <?php
        endforeach
    ?>

    <?php
        endforeach
    ?>
</table>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_item'">新增商品</button>
</div>

<table class="all ct">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">庫存量</td>
        <td class="tt">狀態</td>
        <td class="tt">操作</td>
    </tr>
    <?php
        $rows = $Item->all();
        foreach ($rows as $row) :
    ?>
    <tr>
        <td class="pp"><?=$row['no']?></td>
        <td class="pp"><?=$row['name']?></td>
        <td class="pp"><?=$row['qt']?></td>
        <td class="pp"><?=($row['sh'] ==1)?"販售中":"已下架"?></td>
        <td class="pp">
            <input class="" onclick="location.href='?do=edit_item&id=<?=$row['id']?>'" type="button" value="修改" data-id="<?=$row['id']?>">
            <input class="del-btn" type="button" value="刪除" data-table="Item" data-id="<?=$row['id']?>">
            <br>
            <input class="on-btn" type="button" value="上架" data-id="<?=$row['id']?>" data-sh='1'>
            <input class="off-btn" type="button" value="下架" data-id="<?=$row['id']?>" data-sh='0'>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<script>
// getBigs();

function saveType(type){
    //沒ID是新增
    let name='';
    let big_id=0;
    switch(type){
        case 'big':
            name=$("#big").val();
        break;
        case 'mid':
            name=$("#mid").val();
            big_id=$("#bigs").val();

        break;
    }

    $.post("api/save_type.php",{name,big_id},()=>{
        location.reload();
    })
}


// function getBigs(){
//     $.get('api/get_bigs.php',(bigs)=>{
//             $("#bigs").html(bigs);
//     })
// }

$(".del-btn").click(function () {
  console.log($(this).data("id"));
  let id = $(this).data("id")
  let table = $(this).data("table")
  $.post('./api/del.php',{id, table},function(){
    location.reload()
  })
});


$(".edit-btn").click(function(){
    // 有id 是更新
    let id = $(this).data("id");
    let text = $(this).parent().parent().find("td:first").text();
    let name = prompt("請輸入分類名稱", text);
    $.post("api/save_type.php",{name,id},()=>{
        location.reload();
    })
    
})

$(".on-btn,.off-btn").click(function(){
    let id = $(this).data("id");
    let sh = $(this).data("sh");
    $.post("./api/save_sh.php",{id,sh},function(){
            location.reload();
    })
})


</script>