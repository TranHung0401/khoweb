<?php
include "config.php";
$id = htmlspecialchars($_GET['id']);
$idcap1 = htmlspecialchars($_GET['idcap1']);
$vitridau = htmlspecialchars($_GET['vitri']);
$table = htmlspecialchars($_GET['table']);
$danhmuc = htmlspecialchars($_GET['danhmuc']);

//dem tong dong 
$sql = "select COUNT(id) as tongdong from " . $table . " where id > 0  and find_in_set('noibat',status) and find_in_set('hienthi',status)";
if (!empty($id) && $id > 0) {
	$sql .= ' and id_cat="' . $id . '"';
}
if (!empty($idcap1) && $idcap1 > 0) {
	//echo 'dđ';
	$sql .= ' and id_list="' . $idcap1 . '"';
}
$row = $d->rawQueryOne($sql);
$tongdong = $row['tongdong'];
//Số dòng hiện
$sodonghien = 8;
$tongsotrang = ceil($tongdong / $sodonghien); //Định số trang

//query
$sql = 'select type, id, name' . $lang . ', slugvi, slugen, desc' . $lang . ', code, view, id_brand, id_list, id_cat, id_item, id_sub, photo, options, discount, sale_price, regular_price from ' . $table . ' where id > 0  and find_in_set("noibat",status) and find_in_set("hienthi",status)';
if (!empty($id) && $id > 0) {
	//echo 'dđ';
	$sql .= ' and id_cat="' . $id . '"';
}
if (!empty($idcap1) && $idcap1 > 0) {
	//echo 'dđ';
	$sql .= ' and id_list="' . $idcap1 . '"';
}
$sql .= ' order by numb asc,id desc';
$sql .= ' limit ' . $vitridau . ',' . $sodonghien . '';
$arr_sql = '';
$product = $d->rawQuery($sql, $arr_sql);
?>
<?php foreach ($product as $k => $v) { ?>
	<div class="product">
        <a class="box text-decoration-none" href="<?=$v[$sluglang] ?>" title="<?= $v['name'.$lang] ?>">
            <div class="hinh">
                <?php if ($v['discount']) { ?>
                    <span class="price-per"><?= '-' . $v['discount'] . '%' ?></span>
                <?php } ?>
                <img src="<?=ASSET.WATERMARK?>/product/276x290x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?= $v['name'.$lang] ?>">
            </div>
            <div class="noidung">
                <h3 class="cut_string1"><?= $v['name'. $lang] ?></h3>
                <p class="gia">
                    <?php if ($v['discount']) { ?>
                        <span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
                        <span class="price-old"><?= $func->formatMoney($v['regular_price']) ?></span>
                    <?php } else { ?>
                        <span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price'])  : "Liên hệ " ?></span>
                    <?php } ?>
                </p>
            </div>
        </a>
        <a class="chatzalo" href="https://zalo.me/<?=$optsetting['hotline']?>" title="chat zalo"><img src="assets/images/zalo-combo.png" alt="">Chat zalo</a>
        <a class="addcart" data-id="<?=$v['id']?>" data-action="addnow" href="javascript:void(0)" title="thêm vào giỏ hàng"><i class="fab fa-opencart"></i> Thêm vào giỏ</a>
    </div>

<?php } ?>

<?php
$data = '';
$data .= '<div class="phantrangthach' . $id . ' chinhphantrangth" >';
if ($tongsotrang > 1) {
	$tranghientai = ($vitridau / $sodonghien) + 1;
	$vitritam = $vitridau - $sodonghien;
	if ($tranghientai > 1) {
		$data .= '<a vitri="0">&laquo;</a>';
		$data .= '<a vitri="' . $vitritam . '" id=' . $id . ' idcap1=' . $_GET['idcap1'] . '>&lsaquo;</a>';
	}
	$begin = $tranghientai - 2;
	$end = $tranghientai + 2;
	if ($begin < 1) {
		$begin = 1;
	}
	if ($end > $tongsotrang) {
		$end = $tongsotrang;
	}
	//echo $end;

	for ($i = $begin; $i <= $end; $i++) {
		$vitritam = ($i - 1) * $sodonghien;
		if ($tranghientai == $i) {
			$data .= '<a vitri="noactive" class="act">' . $i . '</a>';
		} else {
			$data .= '<a vitri="' . $vitritam . '" id=' . $id . ' idcap1=' . $_GET['idcap1'] . '>' . $i . '</a>';
		}
	}
	if ($tranghientai < $tongsotrang) {
		$vitritam = $vitridau + $sodonghien;
		$vitricuoi = ($tongsotrang - 1) * $sodonghien;
		$data .= '<a vitri="' . $vitritam . '" id=' . $id . ' idcap1=' . $_GET['idcap1'] . '>&rsaquo;</a>';
		$data .= '<a vitri="' . $vitricuoi . '">&raquo;</a>';
	}
}
$data .= '</div>';
echo $data; ?>