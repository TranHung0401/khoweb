<div class="product">
    <a class="box text-decoration-none" href="<?=$v[$sluglang] ?>" title="<?= $v['name'.$lang] ?>">
        <div class="hinh scale-img">
            <?php if ($v['discount']) { ?>
                <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
            <?php } ?>
            <?php if($v['sale_price'] > 0) {?>
                <div class="product-sale">- <?=ceil(100-$v['sale_price']/$v['regular_price']*100) ?>%</div>
            <?php } ?>
            <?php if($v['type'] == 'san-pham') {?><div class="product-installment">Trả góp 0%</div> <?php } ?>
            <img src="<?=THUMBS?>/420x270x2/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?= $v['name'.$lang] ?>">
        </div>
        <div class="noidung">
            <h3 class="cut_string1 changecolor catchuoi2"><?= $v['name'. $lang] ?></h3>
            <div class="gia">
                <?php if($v['sale_price']>0) {?>
                    <div class="price-old"><?=($func->formatMoney($v['regular_price']))?></div>
                    <div class="price-new"><?=($func->formatMoney($v['sale_price']))?></div>
                <?php }else {?>
                    <div class="price-regular"><?=($func->formatMoney($v['regular_price'])) ? $func->formatMoney($v['regular_price']) : "Liên hệ" ;?></div>

                <?php } ?>
                
            </div>
            <div class="prod-mota">
                <?= htmlspecialchars_decode($v['desc'. $lang]) ?>
            </div>
        </div>
    </a>
    <?php /* <a class="chatzalo" href="https://zalo.me/<?=$optsetting['hotline']?>" title="chat zalo"><img src="assets/images/zalo-combo.png" alt="">Chat zalo</a>
    <a class="addcart" data-id="<?=$v['id']?>" data-action="addnow" href="javascript:void(0)" title="thêm vào giỏ hàng"><img src="assets/images/icon-giohang.png" alt=""> Thêm vào giỏ</a>*/ ?>
</div>