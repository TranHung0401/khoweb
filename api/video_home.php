<?php
include "config.php";
$id = $_POST['tab'];
$videonb_aj = $cache->get("select name$lang, slugvi, slugen, id, photo,toado_iframe from #_news where type = ?  and id=? and find_in_set('hienthi',status) order by numb,id desc", array('ban-do', $id), 'fetch', 7200);
?>
<?= htmlspecialchars_decode($videonb_aj['toado_iframe']) ?>