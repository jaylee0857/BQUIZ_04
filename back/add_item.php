<h2 class="ct">新增商品</h2>
<form action="./api/save_item.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp">
            <select name="big" id="bigs">
                <?php
                    $rows = $Type->all(['big_id'=>0]);
                    foreach ($rows as $row):
                ?>
                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                <?php
                    endforeach;
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp">
            <select name="mid" id="mids">
                    
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp">
                    完成分類後自動分配
            </td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price">
            </td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp">
                <input type="text" name="spec">
            </td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp">
                <input type="text" name="qt">
            </td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id=""></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="確認">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="location.href='?do=th'">

    </div>
</form>


<script>

    function get_mid(){
        let big_id = $("#bigs").val();
        $.post("./api/get_mid.php",{big_id},function(res){
            $("#mids").html(res);
        })
    }
    get_mid();
    
    $("#bigs").change(function(){
        get_mid();
    })

</script>