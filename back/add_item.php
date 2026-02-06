<h2 class="ct">新增商品</h2>

<form action="./api/save_item.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big">

                </select>
            </td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid">

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
        <input type="submit" value="新增">
        <input type="reset" value="重製">
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>

<script>
getTypes('big')
function getTypes(type){

    switch (type) {
        case "big":
            $.post("./api/get_bigs.php",(res)=>{
                $("#big").html(res)
                getTypes('mid');
            })
            break;
        default:
            let big_id = $("#big").val();
            $.post("./api/get_mid.php",{big_id},(res)=>{
                $("#mid").html(res)
            })
            break;
    }

}

$('#big').change(function(){
    getTypes()    
})

</script>