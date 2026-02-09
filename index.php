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
    <script src="./js/js.js"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>

</head>

<body>
    <!-- <iframe name="back" style="display:none;"></iframe> -->
    <div id="main">
        <div id="top">
            <a href="?">
                <img style="width:50%" src="./icon/0416.jpg">
            </a>
            <div style="padding:10px; display:inline">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <a href="?do=login">會員登入</a> |
                <a href="?do=admin">管理登入</a>
            </div>

        </div>
        <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>

        <div id="left" class="ct">
            <div style="min-height:400px;">
                <!-- 分類選單 -->
                 <!-- 左側的選單 雙重迴圈結構 -->
                <a href="?type=0">全部商品(<?=$Item->count(['sh'=>1])?>)</a>
                 <?php
                    $rows = $Type->all(['big_id'=>0]);
                    foreach ($rows as $row) :
                    $num = $Item->count(['sh'=>1,'big'=>$row['id']]);

                 ?>
                 <div class="ww">
                    <a href="?type=<?=$row['id']?>"><?=$row['name']?>(<?=$num?>)</a>
                    <?php
                        $rows = $Type->all(['big_id'=>$row['id']]);
                        foreach ($rows as $row) {
                            $num = $Item->count(['sh'=>1,'mid'=>$row['id']]);
                            echo "<div class='s'>";
                            echo "<a href='?type={$row['id']}'>{$row['name']}($num)</a>";
                            echo "</div>";
                        }
                    ?>
                 </div>
                    
                <?php
                    endforeach
                 ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <!-- 主內容區 -->
                <?php
                    $do = $_GET['do'] ?? 'main';
                    $path = "./front/$do.php";
                    if (file_exists($path)) {
                        include $path;
                    }else {
                        include "./front/main.php";
                    }

                ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : <?=$Bot->find(1)['bot']?></div>
    </div>

</body>

</html>