<?php include_once "db.php";

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/{$_FILES['img']['name']}");
    $_POST['img']=$_FILES['img']['name'];
}
// dd($_POST);

// 商品編號保證唯一性 , 記得在edit_item.php 補上欄位
if (!isset($_POST['no'])) {
    $_POST['no']=rand(100000,999999);
}

$Item->save($_POST);

to("../back.php?do=th")

?>