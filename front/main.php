<?php
    if (!isset($_GET['id'])) {
        $title = "全部商品";
        $rows = $Item->all(['sh'=>1]);
    }else{
        if (isset($_GET['mid_name'])) {
            $title = "{$_GET['big_name']} > {$_GET['mid_name']}";
            $rows = $Item->all(['mid'=>$_GET['id']]);
            
        }else{
            $title = "{$_GET['big_name']}";
            $rows = $Item->all(['big'=>$_GET['id']]);

        }
    }

    
?>
<h2><?=$title?></h2>

<?php
    foreach ($rows as $row):
?>
<table>
  <tr>
    <td class="pp">
      <a href="?do=detail&id=<?=$row['id']?>"><img width="100px" height="80px" src="../icon/<?=$row['img']?>" alt=""></a>
    </td>

    <td >
      <table >
        <tr>
          <td class="tt">
            <?=$row['name']?>

          </td>
        </tr>
        <tr>
            <td class="pp">價錢:<?=$row['price']?>
                <a style="float:right" href="?do=buycart&id=<?=$row['id']?>&qt=1">
                    <img src="../icon/0402.jpg" alt="">
                </a>
            </td>
        </tr>
            <tr><td class="pp">規格:<?=$row['spec']?></td></tr>
        <tr><td class="pp">簡介:<?=($row['intro'])?>...</td></tr>
      </table>
    </td>
  </tr>
</table>



<?php
    endforeach;
?>
