<?php
include "config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$idList = (!empty($_GET['idList'])) ? htmlspecialchars($_GET['idList']) : 0;
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/duan.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$params = array();

/* Math url */

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select name$lang, slugvi, descvi,slugen, id, photo,  type from #_news where type='dich-vu'  and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->get($sqlCache, $params, 'result', 7200);

/* Count all data */
$countItems = count($cache->get($sql, $params, 'result', 7200));
/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if ($countItems) { ?>
    <div class="rowsp news-d">
        <?php foreach ($items as $k => $v) { ?>
            <div class="product paddingsp cut_stringcenter marginbottom_sp push-top-img">
                        <a class="box-product text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                            <div class="pic-product scale-img">
                                <?= $func->getImage(['sizes' => '420x303x1', 'isWatermark' => false, 'prefix' => 'product', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                            </div>
                            <div class="wrap-content-product">
                                <h3 class="custom-product-title-d cut_string1"><?= $v['name' . $lang] ?></h3>
                                <span class="cut_string3 desc-dich-vu"><?= $v['desc' . $lang] ?></span>
                            </div>
                        </a>
                    </div>
        <?php } ?>
    </div>
    <div class="pagination-ajax"><?= $pagingItems ?></div>
<?php } ?>