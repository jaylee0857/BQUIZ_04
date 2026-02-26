<?php
    $row = $Item->find($_GET['id']);
?>
<table>
  <tr>
    <td class="pp">
      <a href="?do=detail&id=<?=$row['id']?>"><img width="100px" height="80px" src="../icon/<?=$row['img']?>" alt=""></a>
    </td>

    <td >
      <table >
        <tr>
          <td class="pp">
            分類:<?=$Type->find($row['big'])['name']?>><?=$Type->find($row['mid'])['name']?>
          </td>
        </tr>
        <tr><td class="pp">編號:<?=$row['no']?></td></tr>
        <tr>
            <td class="pp">價錢:<?=$row['price']?>
            </td>
        </tr>
        <tr><td class="pp">詳細說明:<?=($row['intro'])?></td></tr>
        <tr><td class="pp">庫存量:<?=($row['qt'])?></td></tr>

      </table>
    </td>
  </tr>
</table>
<div class="tt ct">
    購買數量: <input type="number" name="" id="qt" value="1"> <img src="../icon/0402.jpg" alt="" onclick="buy()">
</div>

<script>

    function buy(){
        let qt = $('#qt').val();
        location.href = `?do=buycart&id=<?=$_GET['id']?>&qt=${qt}`;
    }
</script>
