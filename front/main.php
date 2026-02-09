<?php
    if (!isset($_GET['type_id'])) {
        $rows = $Item->all(['sh'=>1]);
        // dd($rows);
    }else{

        if (isset($_GET['mid_name'])) {
            $rows = $Item->all(['sh'=>1,'mid'=>$_GET['type_id']]);
        }else{
            $rows = $Item->all(['sh'=>1,'big'=>$_GET['type_id']]);

        }
    }

?>

<h2><?=$_GET['big_name'] ?? "全部商品"?><?=isset($_GET['mid_name'])?" > ":""?><?=$_GET['mid_name']?? ""?></h2>


    <?php
        foreach ($rows as $row):
    ?>
        <div style="display:flex">
            <div class="pp">
                <a href="?do=detail&id=<?=$row['id']?>">
                    <img width="100px" height="100px" src="./upload/<?=$row['img']?>" alt="">
                </a>
            </div>
            <div style="flex:1">
                <div class="ct tt"><?=$row['name']?></div>
                <div class="pp">
                    價錢:<?=$row['price']?>
                    <a href="?do=buycart&id=<?=$row['id'];?>&qt=1">
                        <img src="./icon/0402.jpg" alt="">
                    </a>
                </div>
                <div class="pp">規格:<?=$row['spec']?></div>
                <div class="pp">簡介:<?=mb_substr($row['intro'],0,20)?></div>
            </div>
        </div>
    <?php
    endforeach;
    ?>

