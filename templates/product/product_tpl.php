<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
<div class="content-main">
    <div class="row producthot-inner">
        <?php if (!empty($product)) { ?>
            <?php foreach ($product as $k => $v) { ?>
                <div class="col-12 col-lg-4 product-item">
                    <?php include "templates/layout/product.php"; ?>
                 </div>
            <?php } ?>
        <?php  } else { ?>
            <div class="col-12">
                <div class="alert alert-warning w-100" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                    <?php if($com=='tim-kiem'){ ?>
                    <div class="khongtimthay">
                        <img src="/assets/images/search.gif" alt="không tìm thấy">
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="clear"></div>
    <div class="col-12 ">
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>

</div>
