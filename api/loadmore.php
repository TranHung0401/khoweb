<?php

include "config.php";

$times = $_POST['times'];

$start = $times*6;

$pronoibat = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) limit $start,6", array('san-pham'), 'result', 7200);
?>

<?php foreach($pronoibat as $v) {?>
    <div class="col-sm-4">
        <?php include "../templates/layout/product.php"; ?>
    </div>
<?php } ?>