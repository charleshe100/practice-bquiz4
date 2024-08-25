<?php
$type=$_GET['type']??0 ;
if($type!=0){
    $t=$Type->find($type);
    if($t['big_id']==0){
        $goods=$Goods->all(['big'=>$type,'sh'=>1]);
        $nav=$t['name'];
    }else{
        $goods=$Goods->all(['mid'=>$type,'sh'=>1]);
        $nav=$Type->find($t['big_id'])['name']." > ".$t['name'];
    }
}else{
    $goods=$Goods->all(['sh'=>1]);
    $nav="全部商品";
}
?>
<h2><?=$nav;?></h2>
<?php
foreach($goods as $g){
?>
<div class='allFrontMain'>
    <div class='pp ct'>
        <a href="?do=intro&id=<?=$g['id'];?>">
            <img src="./img/<?=$g['img'];?>" style=" width:150px;height:100px">
        </a>
    </div>
    <div>
        <div class='tt ct'><?=$g['name'];?></div>
        <div class='pp'>
            價錢:<?=$g['price'];?>
            <a href="?do=buycart&id=<?=$g['id'];?>&qt=1" style="float:right">
                <img src="./icon/0402.jpg" alt="">
            </a>
        </div>
        <div class='pp'>規格:<?=$g['spec'];?></div>
        <div class='pp'>簡介:<?=mb_substr($g['intro'],0,20);?>...</div>
    </div>
</div>
<?php
} 
?>