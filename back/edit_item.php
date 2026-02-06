<h2 class="ct">編輯商品</h2>
<?php
    $row = $Item->find($_GET['id'])
?>
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
                <input type="text" name="no" value="<?=$row['no']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" value="<?=$row['name']?>">

            </td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price" value="<?=$row['price']?>">

            </td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp">
                <input type="text" name="spec" value="<?=$row['spec']?>">
            </td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp">
                <input type="text" name="qt" value="<?=$row['qt']?>">
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
                <textarea name="intro" id=""><?=$row['intro']?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <!-- 記得帶上ID!!!! -->
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" value="修改">
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