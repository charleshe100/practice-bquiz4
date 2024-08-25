<?php include_once "./api/db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">    
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                if(isset($_SESSION['mem'])){
                    echo "<a href='./api/logout.php?do=mem'>會員登出</a> |";
                }else{
                    echo "<a href='?do=login'>會員登入</a> |";
                }

                if(isset($_SESSION['admin'])){
                    echo "<a href='back.php'>返回管理</a> |";
                }else{
                    echo "<a href='?do=admin'>管理員登入</a>";
                }
                ?>
            </div>
            <marquee>
                情人節特惠活動 &nbsp;&nbsp; 年終特賣會開跑了
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <div style="min-height:400px;">
                    <div class="ww">
                        <a href='?type=0'>全部商品(<?=$Goods->count(['sh'=>1]);?>)</a>
                    </div>
                    <?php
                    $bigs=$Type->all(['big_id'=>0]);
                    foreach($bigs as $big){
                        echo "<div class='ww'>";
                        //建立大分類的超連結
                        echo "<a href='?type={$big['id']}'>";
                        //顯示大分類的名稱
                        echo $big['name'];
                        //計算該大分類下的所有商品數量
                        echo "({$Goods->count(['big'=>$big['id'],'sh'=>1])})";
                        echo "</a>";
                    
                        //判斷此一大分類下是否有中分類
                        if($Type->count(['big_id'=>$big['id']])>0){
                            //取得所有中分類
                            $mids=$Type->all(['big_id'=>$big['id']]);
                            //使用迴圈列出所有中分類
                            foreach($mids as $mid){
                                //將分類包在class='s'的div中
                                echo "<div class='s'>";
                                //建立中分類的超連結
                                echo "<a href='?type={$mid['id']}'>";
                                //顯示中分類的名稱
                                echo $mid['name'];
                                //計算該中分類下的所有商品數量
                                echo "({$Goods->count(['mid'=>$mid['id'],'sh'=>1])})";
                                echo "</a>";
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">                
                </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do=$_GET['do']??'main';
            $file="./front/{$do}.php";
            if(file_exists($file)){
                include $file;
            }else{
                include "./front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : <?=$Bottom->find(1)['bottom'];?>
        </div>
    </div>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>