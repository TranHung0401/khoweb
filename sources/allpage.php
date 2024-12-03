<?php

    if(!defined('SOURCES')) die("Error");

    /* Query allpage */

    $favicon = $cache->get("select photo from #_photo where type = ? and act = ? and find_in_set('hienthi',status) limit 0,1", array('favicon','photo_static'), 'fetch', 7200);

    $logo = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo','photo_static'), 'fetch', 7200);

    $social = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('social'), 'result', 7200);

    $social1 = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('social1'), 'result', 7200);

    $slider = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide'), 'result', 7200);

    $slidermobi = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide-mobi'), 'result', 7200);

    // index ======================================
    $probanchay = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount from #_product where type = ? and find_in_set('banchay',status) and find_in_set('hienthi',status) limit 0,8", array('san-pham'), 'result', 7200);
    
    $countpro = $cache->get("select id,photo,name$lang, desc$lang,slugvi, slugen,sale_price,regular_price,discount from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) ", array('san-pham'), 'result', 7200);
    $sliderbanner = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide-banner'), 'result', 7200);
    $gocamthuc = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc", array('goc-am-thuc'), 'result', 7200);
    $bgnhanbaogia = $cache->get("select photo,link from #_photo where type = ? and act = ? limit 0,1", array('bg-dknt','photo_static'), 'fetch', 7200);
    
    $splist = $cache->get("select name$lang,desc$lang, slugvi,photo ,slugen, id from #_product_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $splistnb = $cache->get("select name$lang,desc$lang, slugvi,photo ,slugen, id from #_product_list where type = ? and find_in_set('noibat',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $bocongthuong = $cache->get("select photo,link,descvi from #_photo where type = ? and act = ? limit 0,1", array('bocongthuong','photo_static'), 'fetch', 7200);
    $footer = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('footer'), 'fetch', 7200);

    $gioithieu = $cache->get("select name$lang, content$lang,slug$lang from #_static where type = ? limit 0,1", array('gioi-thieu'), 'fetch', 7200);

    $kinhnghiem = $cache->get("select name$lang, slugvi, slugen from #_news_list where type = ? and find_in_set('hienthi',status) order by numb,id desc ", array('kinh-nghiem'), 'result', 7200);

    $textchitiet = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('text-chitiet'), 'fetch', 7200);

    $chinhsach = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc ", array('chinh-sach'), 'result', 7200);

    $vechungtoi = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc ", array('ve-chung-toi'), 'result', 7200);

    $payments_info = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc ", array('httt'), 'result', 7200);
    

    /* Get statistic */
        $counter = $statistic->getCounter();
        $online = $statistic->getOnline();
        /* Newsletter */
        if(!empty($_POST['guidangky']))
        {
            /* Valid data */
            // if(empty($dataNewsletter['email']))
            // {
            //     $flash->set('error', 'Email không được trống');
            // }
            // if(!empty($dataNewsletter['email']) && !$func->isEmail($dataNewsletter['email']))
            // {
            //     $flash->set('error', 'Email không hợp lệ');
            // }
            
            $data = array();
            $data['fullname'] = htmlspecialchars($_POST['hoten']);
            $data['email'] = htmlspecialchars($_POST['email']);
            $data['phone'] = htmlspecialchars($_POST['sodt']);
            $data['content'] = htmlspecialchars($_POST['noidung']);
            $data['date_created'] = time();
            $data['type'] = 'dangkynhantin';
            if($d->insert('newsletter',$data))
            {
                $func->transfer("Đăng ký nhận tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.", $configBase);
            }
            else
            {
                $func->transfer("Đăng ký nhận tin thất bại. Vui lòng thử lại sau.", $configBase, false);
            }
           
        }
    // Fanpage
        function face_index()
    {
    	global $optsetting;
    	$mag = '';
    	$mag .= '<div class="facebookforterin">
                    <div class="fb-page" 
                    data-href="' . $optsetting['fanpage'] . '" 
                    data-tabs="timeline" 
                    data-width="500" 
                    data-height="230" 
                    data-small-header="true" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="' . $optsetting['fanpage'] . '">
                            <a href="' . $optsetting['fanpage'] . '">Facebook</a>
                        </blockquote>
                    </div>
                </div>
            </div>';
    	return $mag;
    }
    // Chat Fanpage
    function chat_face_index()
    {
    	global $optsetting, $setting, $lang;
    	$mag = '';
    	$mag .= ' 
    	<div class="js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated" data-anim="rubberBand">
                <svg id="fb-msng-icon" data-name="messenger icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 30.47 30.66"><path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path></svg>
                <svg id="close-icon" data-name="close icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 39.98 39.99"><path d="M48.88,11.14a3.87,3.87,0,0,0-5.44,0L30,24.58,16.58,11.14a3.84,3.84,0,1,0-5.44,5.44L24.58,30,11.14,43.45a3.87,3.87,0,0,0,0,5.44,3.84,3.84,0,0,0,5.44,0L30,35.45,43.45,48.88a3.84,3.84,0,0,0,5.44,0,3.87,3.87,0,0,0,0-5.44L35.45,30,48.88,16.58A3.87,3.87,0,0,0,48.88,11.14Z" transform="translate(-10.02 -10.02)" style="fill:#fff"></path></svg>
        </div>
        <div class="js-facebook-messenger-container">
            <div class="js-facebook-messenger-top-header">
                <span>' . $setting['name'.$lang] . '</span>
            </div>
            <div class="fb-page" data-href="' . $optsetting['fanpage'] . '" data-tabs="messages" data-small-header="true" data-height="300" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="' . $optsetting['fanpage'] . '" class="fb-xfbml-parse-ignore"><a href="' . $optsetting['fanpage'] . '">Facebook</a></blockquote></div>
        </div>';
    	return $mag;
    }
    ?>