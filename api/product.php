<?php
include "config.php";
/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eshow']);
$id_list = (!empty($_GET['id_list'])) ? htmlspecialchars($_GET['id_list']) : 0;
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$params = array();
/* Math url */
if ($id_list) {
    $tempLink .= "&id_list=" . $id_list;
    $where .= " and id_list = ?";
    array_push($params, $id_list);
}
$tempLink .= "&p=";
$pageLink .= $tempLink;
/* Get data */
$sql = "select name$lang, slugvi,descvi ,slugen, id, photo, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('hienthi',status) order by numb,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->get($sqlCache, $params, 'result', 7200);
$splist_s = $cache->get("select name$lang,desc$lang, slugvi,photo ,slugen, id from #_product_list where type = ? and id = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham', $id_list), 'fetch', 7200);
/* Count all data */
$countItems = count($cache->get($sql, $params, 'result', 7200));
/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php foreach ($items as $k => $v) { ?>
    <div class="product">
        <a class="box text-decoration-none" href="<?=$v[$sluglang] ?>" title="<?= $v['name'.$lang] ?>">
            <div class="hinh">
                <?php if ($v['discount']) { ?>
                    <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
                <?php } ?>
                <img src="<?=ASSET.WATERMARK?>/product/270x270x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?= $v['name'.$lang] ?>">
            </div>
            <div class="noidung">
                <h3 class="cut_string1"><?= $v['name'. $lang] ?></h3>
                <div class="gia">
                    <div class="price-old"><span>Giá sỉ: </span><?=($func->formatMoney($v['regular_price'])) ? $func->formatMoney($v['regular_price']):'Liên hệ' ?></div>
                    <div class="price-new"><span>Giá lẻ: </span><?=($func->formatMoney($v['sale_price'])) ? $func->formatMoney($v['sale_price']):'Liên hệ' ?></div>
                </div>
            </div>
        </a>
        <a class="chatzalo" href="https://zalo.me/<?=$optsetting['hotline']?>" title="chat zalo"><img src="assets/images/zalo-combo.png" alt="">Chat zalo</a>
        <a class="addcart" data-id="<?=$v['id']?>" data-action="addnow" href="javascript:void(0)" title="thêm vào giỏ hàng"><img src="assets/images/icon-giohang.png" alt=""> Thêm vào giỏ</a>
    </div>
    <?php } ?>
<div class="clear"></div>
<div class="pagination-ajax"><?= $pagingItems ?></div> 
