<?php 

include_once "./api/db.php";
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>

</head>
<body>
    <div id="main">
        <div id="top">
            <a href="?">
                <img width="50%"; src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;display:inline">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <a href="?do=login">會員登入</a> |
                <a href="?do=admin">管理登入</a>
            </div>
            <marquee behavior="" direction="">情人節特惠活動 &nbsp; 年終特賣會開跑了</marquee>
            
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="?">全部商品(<?=$Item->count(['sh'=>1])?>)</a>
                <?php
                    $bigs = $Type->all(['big_id'=>0]);
                    foreach ($bigs as $big ):
                ?>
                    <div class="ww">
                        <a href="?id=<?=$big['id']?>&big_name=<?=$big['name']?>"><?=$big['name']?>(<?=$Item->count(['sh'=>1,'big'=>$big['id']])?>)</a>
                        <div class="s">
                            <?php
                                $mids = $Type->all(['big_id'=>$big['id']]);
                                foreach ($mids as $mid ):
                            ?>
                            <a href="?id=<?=$mid['id']?>&big_name=<?=$big['name']?>&mid_name=<?=$mid['name']?>"><?=$mid['name']?>(<?=$Item->count(['sh'=>1,'big'=>$big['id']])?>)</a>
                        <?php
                            endforeach;
                        ?>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
                $do = $_GET['do'] ?? "main.php";
                $path = "./front/$do.php";
                if (file_exists($path)) {
                    include_once $path;
                }else{
                    include_once "./front/main.php";
                }

            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : </div>
    </div>

</body>

</html>