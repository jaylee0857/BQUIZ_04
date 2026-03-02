<?php
    $row = $Orders->find($_GET['id']);
?>
<h2 class="ct">訂單編號的 <span style="color:red;"><?=$row['no']?></span> 詳細資料</h2>
<!-- 用兩張表來製作比較快 -->
 <!-- 第一個表 直接從edit_mem複製 -->
 <!-- 第二個表 直接從buycart複製 -->

 <form action="./api/save_order.php" method="post">
    <?php
        $user = $Mem->find(['acc'=>$_SESSION['mem']]);

    ?>
     <table class="all ct">
         <tr>
             <td class="tt">登入帳號</td>
             <td class="pp">
                <?=$_SESSION['mem']?>
             </td>
         </tr>
         <tr>
             <td class="tt">姓名</td>
             <td class="pp">
                <?=$row['name']?>
             </td>
         </tr>
         <tr>
             <td class="tt">電子信箱</td>
             <td class="pp">
                <?=$row['email']?>
             </td>
         </tr>
         <tr>
             <td class="tt">聯絡地址</td>
             <td class="pp">
                <?=$row['addr']?>
             </td>
         </tr>
         <tr>
             <td class="tt">連絡電話</td>
             <td class="pp">
                <?=$row['tel']?>
             </td>
         </tr>
     </table>
     
     <table class="all ct">
         <tr class="tt">
             <td>商品名稱</td>
             <td>編號</td>
             <td>數量</td>
             <td>單價</td>
             <td>小記</td>
         </tr>
     <?php
         $sum =0;
         $cart = json_decode($row['cart'],true);
         foreach ($cart  as $id => $qt) :
             $row = $Item->find($id);
     ?>
         <tr class="pp">
             <td><?=$row['name']?></td>
             <td><?=$row['no']?></td>
             <td><?=$qt?></td>
             <td><?=$row['qt']?></td>
             <td><?=$row['price']?></td>
         </tr>
     
     
     <?php
         $sum += $row['price']*$qt;
         endforeach;
     ?>
     </table>
     
     <div class="tt all ct">
         總價:<?=$sum?>
         <input type="hidden" name="sum" value="<?=$sum?>">
     </div>
     <div class="ct">
         <input type="button" value="返回" onclick="location.href='?do=order'">
     </div>
 </form>