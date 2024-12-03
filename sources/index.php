<?php  
	if(!defined('SOURCES')) die("Error");

    $where = "";
    $where = "type =? and find_in_set('hienthi',status) and find_in_set('noibat',status)";
    $params = array('san-pham');

    $curPage = $getPage;
    $perPage = 8;
    $startpoint = ($curPage * $perPage) - $perPage;
    $limit = " limit " . $startpoint . "," . $perPage;
    $sql = "select photo, name$lang, slugvi,descvi ,slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
    $pronb = $d->rawQuery($sql, $params);
    $sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
    $count = $d->rawQueryOne($sqlNum, $params);
    $total = (!empty($count)) ? $count['num'] : 0;
    $url = $func->getCurrentPageURL();
    $paging = $func->pagination($total, $perPage, $curPage, $url);

    $bannerkm = $cache->get("select photo,link from #_photo where type = ? and act = ? limit 0,1", array('bannerkm','photo_static'), 'fetch', 7200);
    $banner = $cache->get("select photo,link from #_photo where type = ? and act = ? limit 0,1", array('banner','photo_static'), 'fetch', 7200);

    $bannerqc = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('bannerqc'), 'result', 7200);

    $pronoibat = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount, type from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) limit 0,6", array('san-pham'), 'result', 7200);

    $product_buying = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount, type from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) limit 0,6", array('san-pham'), 'result', 7200);

    $prodsale = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount, type from #_product where type = ? and find_in_set('banchay',status) and find_in_set('hienthi',status)", array('san-pham'), 'result', 7200);

    // $visao = $cache->get("select id,photo,name$lang from #_news where type = ? and find_in_set('hienthi',status) limit 0,4", array('vi-sao'), 'result', 7200);

    $visao = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('vi-sao'), 'result', 7200);

    $acquy = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status)", array('acquy'), 'result', 7200);

    $phutung = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status)", array('phu-tung'), 'result', 7200);

    $thongtin = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc ", array('thong-tin'), 'result', 7200);
    
    $thongtinhuuich = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc limit 0,4", array('thong-tin-huu-ich'), 'result', 7200);
    
    $videonb = $cache->get("select link_video, id, name$lang,desc$lang from #_photo where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) limit 0,4", array('video'), 'result', 7200);

    /* SEO */
    $seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array('trang-chu'));
    $seo->set('h1',$titleMain);
    if(!empty($seopage['title'.$seolang])) $seo->set('title',$seopage['title'.$seolang]);
    else $seo->set('title',$titleMain);
    if(!empty($seopage['keywords'.$seolang])) $seo->set('keywords',$seopage['keywords'.$seolang]);
    if(!empty($seopage['description'.$seolang])) $seo->set('description',$seopage['description'.$seolang]);
    $seo->set('url',$func->getPageURL());
    $imgJson = (!empty($seopage['options'])) ? json_decode($seopage['options'],true) : null;
    if(!empty($seopage['photo']))
    {
        if(empty($imgJson) || ($imgJson['p'] != $seopage['photo']))
        {
            $imgJson = $func->getImgSize($seopage['photo'],UPLOAD_SEOPAGE_L.$seopage['photo']);
            $seo->updateSeoDB(json_encode($imgJson),'seopage',$seopage['id']);
        }
        if(!empty($imgJson))
        {
            $seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_SEOPAGE_L.$seopage['photo']);
            $seo->set('photo:width',$imgJson['w']);
            $seo->set('photo:height',$imgJson['h']);
            $seo->set('photo:type',$imgJson['m']);
        }
    }
?>
