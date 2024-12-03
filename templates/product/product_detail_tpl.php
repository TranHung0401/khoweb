<div class="grid-pro-detail w-clear">
    
    <div class="row">

        <div class="left-pro-detail col-md-6 col-lg-5 mb-4">

            <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= ASSET . WATERMARK ?>/product/540x540x2/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">

                <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x2', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $rowDetail['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>

            </a>

            <?php if ($rowDetailPhoto) {

                if (count($rowDetailPhoto) > 0) { ?>

                    <div class="gallery-thumb-pro">

                        <div class="owl-page owl-carousel owl-theme owl-pro-detail" data-xsm-items="5:10" data-sm-items="5:10" data-md-items="5:10" data-lg-items="5:10" data-xlg-items="5:10" data-nav="1" data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-left' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='15 6 9 12 15 18' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-right' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='9 6 15 12 9 18' /></svg>" data-navcontainer=".control-pro-detail">
                            <div>

                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= ASSET . WATERMARK ?>/product/540x540x2/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">

                                    <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x2', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $rowDetail['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>

                                </a>

                            </div>

                            <?php foreach ($rowDetailPhoto as $v) { ?>

                                <div>

                                    <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= ASSET . WATERMARK ?>/product/540x540x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">

                                        <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x2', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>

                                    </a>

                                </div>

                            <?php } ?>

                        </div>

                        <div class="control-pro-detail control-owl transition"></div>

                    </div>

            <?php }

            } ?>

            <div class="product-video mt-3">
                <?=htmlspecialchars_decode($rowDetail['iframevd' . $lang])?>
            </div>

        </div>

        <div class="right-pro-detail col-md-6 col-lg-7 mb-4">

            <p class="title-pro-detail mb-2"><?= $rowDetail['name' . $lang] ?></p>

            <div class="social-plugin social-plugin-pro-detail w-clear">

                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_telegram"></a>
                    <a class="a2a_button_facebook_messenger"></a>
                    <a class="a2a_button_wechat"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_whatsapp"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->

                <?php

                $params = array();

                $params['oaid'] = $optsetting['oaidzalo'];

                echo $func->markdown('social/share', $params);

                ?>

            </div>

            <ul class="attr-pro-detail">

                <?php if (!empty($rowDetail['code'])) { ?>

                    <li class="w-clear">

                        <label class="attr-label-pro-detail"><?= masp ?>:</label>

                        <div class="attr-content-pro-detail"><?= $rowDetail['code'] ?></div>

                    </li>

                <?php } ?>



                <li class="w-clear">

                    <div class="attr-content-pro-detail">

                        <?php if ($rowDetail['sale_price']) { ?>

                            <span class="price-new-pro-detail"><c>Giá: </c><?=($func->formatMoney($rowDetail['sale_price'])) ? $func->formatMoney($rowDetail['sale_price']) : 'Liên hệ' ?></span>

                            <span class="price-old-pro-detail"><?=($func->formatMoney($rowDetail['regular_price'])) ? $func->formatMoney($rowDetail['regular_price']) : 'Liên hệ' ?></span>

                        <?php } else { ?>

                            <span class="price-new-pro-detail"><?= ($rowDetail['regular_price']) ? $func->formatMoney($rowDetail['regular_price']) : "Liên hệ: " . $optsetting['hotline'] ?></span>

                        <?php } ?>

                    </div>

                </li>

                <li class="w-clear">

                    <label class="attr-label-pro-detail"><?= luotxem ?>:</label>

                    <div class="attr-content-pro-detail"><?= $rowDetail['view'] ?></div>

                </li>

                <?php if($com == 'san-pham' && !empty($rowColor)) {?>
                <li class="w-clear color-block-pro-detail">
                    <label class="attr-label-pro-detail d-block"><?=mausac?>:</label>
                    <div class="attr-content-pro-detail d-block">
                        <?php for($i=0;$i<count($rowColor);$i++) { ?>
                            <?php if($rowColor[$i]['loaihienthi']==1) { ?>
                                <a class="color-pro-detail text-decoration-none" data-idpro="<?=$row_detail['id']?>">
                                    <input style="background-image: url(<?=UPLOAD_COLOR_L.$rowColor[$i]['photo']?>)" type="radio" value="<?=$rowColor[$i]['id']?>" name="color-pro-detail">
                                </a>
                            <?php } else { ?>
                                <a class="color-pro-detail text-decoration-none" data-idpro="<?=$row_detail['id']?>">
                                    <input style="background-color: #<?=$rowColor[$i]['color']?>" type="radio" value="<?=$rowColor[$i]['id']?>" name="color-pro-detail">
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </li>

                <?php } ?>

                <?php if(!empty($rowDetail['desc' . $lang])) {?>
                    <div class="desc-pro-detail">
                        <div class="promotion">
                            <div class="promotion-title">
                                <img src="assets/images/icon-product-promotion.webp" alt="">
                                Khuyến mãi và quà tặng
                            </div>

                            <div class="promotion-inner">
                                <?= (!empty($rowDetail['desc' . $lang])) ? htmlspecialchars_decode($rowDetail['desc' . $lang]) : '' ?>
                            </div>
                        </div>

                        
                        <?php /* (!empty($rowDetail['desc' . $lang])) ? nl2br(htmlspecialchars_decode($rowDetail['desc' . $lang])) : '' */ ?>

                    </div>

                <?php } ?>

                <?php /*

                <li class="w-clear">

                    <div class="deco-camket">

                        <div class="name-camket"><span><?=$camket['name' . $lang]?></span></div>

                        <div class="content-camket"><?= htmlspecialchars_decode($camket['content' . $lang]) ?></div>

                    </div>

                </li>

                */ ?>

                <li class="w-clear">
                    <a class="btn-cart addcart text-decoration-none" data-id="<?=$rowDetail['id']?>" data-action="buynow" href="javascript:void(0)" title="thêm vào giỏ hàng"> Mua ngay</a>
                    <a class="btn-cart addcart text-decoration-none" data-id="<?=$rowDetail['id']?>" data-action="addnow" href="javascript:void(0)" title="thêm vào giỏ hàng"><img src="assets/images/icon-giohang.png" alt=""> Thêm vào giỏ</a>
                    <div class="btn-tuvan mt-1 addcart" data-id="<?=$rowDetail['id']?>" data-action="tuvan">
                        <p>Gọi lại tư vấn</p>
                        <span>Chúng tôi sẽ gọi lại tư vấn miễn phí</span>
                    </div>
                </li>

            </ul>

            <div class="textchitiet"><?=htmlspecialchars_decode($textchitiet['contentvi'])?></div>

        </div>

    </div>



    <div class="tags-pro-detail w-clear">

        <?php if (!empty($rowTags)) {

            foreach ($rowTags as $v) { ?>

                <a class="btn btn-sm btn-danger rounded" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><i class="fas fa-tags"></i><?= $v['name' . $lang] ?></a>

        <?php }

        } ?>

    </div>



    <div class="tabs-pro-detail">
        <div class="row">
            <div class="col-12 col-lg-8">
                <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">

                    <li class="nav-item">

                        <a class="nav-link active" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail" role="tab"><?= thongtinsanpham ?></a>

                    </li>

                    <li class="nav-item" id="thongso-pro-detail-block">

                        <a class="nav-link" id="thongso-pro-detail-tab" data-toggle="tab" href="#thongso-pro-detail" role="tab">Thông số kỹ thuật</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" id="commentfb-pro-detail-tab" data-toggle="tab" href="#commentfb-pro-detail" role="tab"><?= binhluan ?></a>

                    </li>

                </ul>

                <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">

                    <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">

                        <?= htmlspecialchars_decode($rowDetail['content' . $lang]) ?>

                    </div>

                    <div class="tab-pane fade" id="thongso-pro-detail" role="tabpanel">
                        
                        <?= htmlspecialchars_decode($rowDetail['thongtin' . $lang]) ?>
                    </div>

                    <div class="tab-pane fade" id="commentfb-pro-detail" role="tabpanel">

                        <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div>

                    </div>

                    

                </div>
            </div>
            <div class="d-none d-lg-block col-lg-4">
                <div class="box-right">
                    <div class="title-right">Thông số kỹ thuật</div>
                    <div class="box-inner" style="padding: 10px;">
                        <?= htmlspecialchars_decode($rowDetail['thongtin' . $lang]) ?>

                    </div>
                </div>
                <div class="box-right">
                    <div class="title-right">Kinh nghiệm hay</div>
                    <div class="box-inner">
                        <?php foreach($tintuc as $nw) {?>
                            <div class="row box-item">
                                <div class="col-5">
                                    <a href="<?=$nw['slug'.$lang]?>"><img src="<?=THUMBS?>/135x90x1/<?=UPLOAD_NEWS_L.$nw['photo']?>" alt="<?=$nw['name'.$lang]?>"></a>
                                </div>
                                <div class="col-7">
                                    <h3><a href="<?=$nw['slug'.$lang]?>" class="text-decoration-none"><?=$nw['name'.$lang]?></a></h3>
                                    <div class="box-date"><i class="fas fa-calendar-alt"></i><?=date('d/m/Y',$nw['date_created'])?></div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-right">
                    <div class="title-right">So sánh sản phẩm</div>
                    <div class="box-inner">
                        <?php foreach($product as $sp) {?>
                        <div class="row box-item">
                            <div class="col-lg-5">
                                <a href="<?=$sp['slug'.$lang]?>"><img src="<?=UPLOAD_PRODUCT_L.$sp['photo']?>" alt="<?=$sp['name'.$lang]?>"></a>
                            </div>
                            <div class="col-lg-7">
                                <h3><a href="<?=$sp['slug'.$lang]?>"><?=$sp['name'.$lang]?></a></h3>
                                <div class="box-price">
                                    <?php if($sp['sale_price'] > 0) {?>
                                        <div class="price-new-pro-detail"><?=$func->formatMoney($sp['sale_price']) ?></div> <div class="price-old-pro-detail"><?=$func->formatMoney($sp['regular_price']) ?></div>
                                    <?php } ?>
                                </div>
                                <a href="javascript:;" class="sosanh" onclick="sosanhgia(<?=$sp['id']?>);">Xem so sánh chi tiết <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "comment.php"; ?>
</div>



<div class="title-main"><span><?= sanphamcungloai ?></span></div>

<div class="content-main">
    <div class="row productrelate">
        <?php if (!empty($product)) { ?>

            <?php foreach ($product as $k => $v) { ?>
                <div class="col-12 <?php if($type == 'san-pham') echo 'col-lg-4';else echo 'col-lg-3'; ?>  mb-4 product-item">
                    <?php include "templates/layout/product.php"; ?>
                </div>
            <?php } ?>


        <?php } else { ?>

            <div class="col-12">

                <div class="alert alert-warning w-100" role="alert">

                    <strong><?= khongtimthayketqua ?></strong>

                </div>

            </div>

        <?php } ?>
    </div>
</div>

<div class="clear"></div>

<div class="col-12">

    <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>

</div>