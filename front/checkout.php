<h2 class="ct">填寫資料</h2>
<!-- 用兩張表來製作比較快 -->
 <!-- 第一章標示資料 -->
 <!-- 第二章直接從buycart複製 -->

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
                <input type="text" name="name" value="<?=$user['name']?>">
             </td>
         </tr>
         <tr>
             <td class="tt">電子信箱</td>
             <td class="pp">
                <input type="text" name="email" value="<?=$user['email']?>">
             </td>
         </tr>
         <tr>
             <td class="tt">聯絡地址</td>
             <td class="pp">
                <input type="text" name="addr" value="<?=$user['addr']?>">
             </td>
         </tr>
         <tr>
             <td class="tt">連絡電話</td>
             <td class="pp">
                <input type="text" name="tel" value="<?=$user['tel']?>">
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
         foreach ($_SESSION['buycart'] as $id => $qt) :
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
        <input type="submit" value="確定送出">
         <input type="button" value="返回">
     </div>
 </form>