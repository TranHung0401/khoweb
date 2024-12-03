<?php
include "config.php";

$tab = $_POST['tab'];


$pronb_l = $cache->get("select id,photo,name$lang,slugvi,regular_price, sale_price, discount,code  from #_product where type = ? and id_cat=? and find_in_set('noibat',status) and find_in_set('hienthi',status)", array('san-pham', $tab), 'result', 7200);


?>

<div class="slider-nav ">
  <?php foreach ($pronb_l as $key => $v) {   ?>
    <div class="product product-slide-d bao-prodeal bao-probanchay">
      <a class="" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
        <div class="pic-product scale-img">
          <?= $func->getImage(['class' => 'w-100', 'sizes' => '220x240x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
        </div>
        <?= $func->sale($v['regular_price'], $v['sale_price']) ?>

        <h3 class="name-product cut_string1"><?= $v['name' . $lang] ?></h3>
        <p class="price-product">
          <?php if ($v['discount']) { ?>
            <span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
            <span class="price-old"><?= $func->formatMoney($v['regular_price']) ?></span>
            <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
          <?php } else { ?>
            <span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price'])  : "Liên hệ: " . $optsetting['hotline'] ?></span>
          <?php } ?>
        </p>
      </a>
    </div>
  <?php } ?>

</div>