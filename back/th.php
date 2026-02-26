<!-- typE記得要善用data屬性 -->

<h2 class="ct">商品分類</h2>
<div class="ct">
    <div>
        新增大分類<input type="text" name="" id="big">
        <button onclick="save_type('big')">新增</button>
    </div>
    <div>
        新增中分類
        <select name="" id="bigs">
            <?php
                $rows = $Type->all(['big_id'=>0]);
                foreach ($rows as $row):
            ?>
                <option value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php
                endforeach;
            ?>
        </select>
        <input type="text" name="" id="mid">
        <button onclick="save_type('mid')">新增</button>
    </div>
</div>
<table class="all">
    <?php
        $rows = $Type->all(['big_id'=>0]);
        foreach ($rows as $row):
    ?>
    <tr class="tt">
        <td><?=$row['name']?></td>
        <td>
            <div class="ct">
                <input type="button" value="修改" onclick="edit(<?=$row['id']?>)">
                <input type="button" value="刪除" class="del-btn" data-id="<?=$row['id']?>" data-table="Type">
            </div>
        </td>
    </tr>
    <?php
        $rows = $Type->all(['big_id'=>$row['id']]);
        foreach ($rows as $row):
    ?>
    <tr class="pp ct">
        <td><?=$row['name']?></td>
        <td>
            <div class="ct">
                <input type="button" value="修改" onclick="edit(<?=$row['id']?>)">
                <input type="button" value="刪除" class="del-btn" data-id="<?=$row['id']?>" data-table="Type">
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    ?>


    <?php
        endforeach;
    ?>
</table>

<h3 class="ct">商品管理</h3>
<div class="ct">
    <div>
        <button onclick="location.href='?do=add_item'">新增商品</button>
    </div>
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

    function save_type(type){
        let big_id =0;
        let name = ''
        switch (type) {
            case 'big':
                name = $("#big").val();
                break;
        
            default:
                big_id= $("#bigs").val();
                name = $("#mid").val();
                break;
        }
        $.post("./api/save_type.php",{name,big_id},function(){
            location.reload();
        })
    }
</script>

<script>
$(".on-btn,.off-btn").click(function(){
    let id = $(this).data('id')
    let sh = $(this).data('sh')
    console.log(id, sh);
    $.post("./api/save_sh.php",{id,sh},function(){
		location.reload();
    })
    

        
})

$(".del-btn").click(function () {
  console.log($(this).data("id"));
  let id = $(this).data("id")
  let table = $(this).data("table")
  $.post('./api/del.php',{id, table},function(){
    location.reload()
  })
});

function del(id){
    let table = 
	$.post("./api/del.php",{id,table:table},function(){
		location.reload();
	})
}

function edit(id){
    let name = prompt("請輸入分類")
    if (name) {
        $.post("./api/save_type.php",{name,id},function(){
            location.reload();
        })
    }
}
</script>