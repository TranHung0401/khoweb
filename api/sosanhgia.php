<?php
    include "config.php";
    $idsp = (!empty($_POST['idsp'])) ? htmlspecialchars($_POST['idsp']) : '';

    if(!isset($_SESSION['sosanh'])){
        $_SESSION['sosanh'] = array();
        $_SESSION['sosanh'][] = $idsp;
    }else {
        if(!in_array($idsp,$_SESSION['sosanh'])){
            if(count($_SESSION['sosanh']) == 4){
                array_shift($_SESSION['sosanh']);
            }
            $_SESSION['sosanh'][] = $idsp;
        }
        
    }

    // unset($_SESSION['sosanh']);
    // var_dump($_SESSION['sosanh']);

    
?>

<div class="block-sosanh">
    <div class="block-sosanh-inner">
        <?php foreach($_SESSION['sosanh'] as $k => $value) {
            $pross = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount,thongtinss$lang from #_product where type = ? and find_in_set('hienthi',status) and id = ".$value." ", array('san-pham'), 'fetch', 7200);
            
        ?>
            <div class="block-sosanh-item">
                <div class="block-sosanh-image"><img src="<?=UPLOAD_PRODUCT_L.$pross['photo']?>" alt="<?=$pross['name'.$lang]?>"></div>
                <h3 class="block-sosanh-title"><?=$pross['name'.$lang]?></h3>
                <div class="block-sosanh-price">
                    <?php if($pross['sale_price'] > 0) {?>
                        <div class="price-new-pro-detail"><?=$func->formatMoney($pross['sale_price']) ?></div> <div class="price-old-pro-detail"><?=$func->formatMoney($pross['regular_price']) ?></div>
                    <?php } ?>
                </div>
                <div class="block-sosanh-info"><?=htmlspecialchars_decode($pross['thongtinss'.$lang])?></div>
            </div>
        <?php } ?>
    </div>
</div>