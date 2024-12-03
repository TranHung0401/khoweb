<div class="footer">
    <div class="footer-article ">
        <div class="wrap-content d-flex align-items-start justify-content-between">

        	<div class="inbl footer-news">
                <p class="title-footer">Về chúng tôi</p>
                <ul class="footer-ul">
                    <?php foreach ($vechungtoi as $v) { ?>
                        <li>
                            <a href="<?= $v[$sluglang] ?>" title="<?= $v['name'.$lang] ?>" class="text-decoration-none"><?= $v['name'.$lang] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="inbl footer-news">
            	<?php /*
                <div class="info"><img src="assets/images/footer1.png" alt=""><?=$optsetting['address']?></div>
                <div class="info"><img src="assets/images/footer2.png" alt=""><span>Hotline hỗ trợ tư vấn</span><?=$optsetting['hotline']?></div>
                <div class="info"><img src="assets/images/footer3.png" alt=""><span>Email</span><?=$optsetting['email']?></div>

                <div class="clear"></div>
                */ ?>

                <p class="title-footer">Danh mục sản phẩm</p>
                <ul class="footer-ul footer-danhmuc">
                    <?php foreach ($splist as $v) { ?>
                        <li>
                            <a href="<?= $v[$sluglang] ?>" title="<?= $v['name'.$lang] ?>" class="text-decoration-none"><?= $v['name'.$lang] ?></a>
                        </li>
                    <?php } ?>
                </ul>

                

            </div>

            <div class="inbl footer-news">
                <p class="title-footer">Fanpage - facebook</p>
                <?=face_index() ?>

                
            </div>
        </div>

        <div class="wrap-content pb-0 pb-lg-5">
        	<div class="row">
            	<div class="col-12 col-lg-4 mb-4 mb-lg-0">
            		<p class="title-footer">Thông tin</p>
            		<div class="footer-content"><?= htmlspecialchars_decode($footer['content'.$lang])?></div>

                    <div class="box footer-mxh">
                        <?php foreach ($social1 as $v) { ?>
                            <a href="<?=$v['link']?>" title=""><img src="<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="hình"></a>
                        <?php } ?>
                    </div>
            	</div>
            	<div class="col-12 col-lg-4">
            		<p class="title-footer">Nhận bản tin khuyến mãi</p>
            		<form action="" method="post" class="newsletter" accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="" required />
                        <button type="submit" name="guidangky" value="gủi đăng ký">Đăng ký</button>
                    </form>

                    <div class="footerthem mt-3">
                        <div class="wrap-content">
                            <div class="box ">
                                <a href="<?=$bocongthuong['link']?>" class="mb-3 d-block"><img src="<?=UPLOAD_PHOTO_L.$bocongthuong['photo']?>" alt=""></a>
                                <p><?=$bocongthuong['descvi']?></p>
                            </div>
                                
                        </div>
                    </div>
            	</div>

                <div class="col-12 col-lg-4">
                    <div class="bando">
                    <p class="title-footer">Bản đồ</p>
                    <?=$optsetting['coords_iframe']?>
                </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <div class="footer-copyright ">Copyright &copy; 2023 <?= $setting['name'.$lang] ?>. 
            </div>
            <div class="footer-statistic ">
                <span class="luottruycap"><?= dangonline ?>: <?= $online ?></span>
                <span class="luottruycap"><?= homnay ?>: <?= $counter['today'] ?></span>
                <span class="luottruycap"><?= trongthang ?>: <?= $counter['month'] ?></span>
                <span class="luottruycap"><?= tongtruycap ?>: <?= $counter['total'] ?></span>
            </div>
        </div>
    </div>
    <!-- <?= face_index() ?> -->
    <!-- <?= chat_face_index() ?> -->
    </div>
 <?php /*
<a class="cart-fixed text-decoration-none " href="gio-hang" title="Giỏ hàng">
    <i class="fas fa-shopping-bag"></i>
    <span class="count-cart"><?=(isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
</a>

<a class="btn-chiduong btn-frame text-decoration-none" target="_blank" href="<?= $optsetting['direct'] ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/icon-ggmap.png" alt="Chỉ đường"></i>
    </a>
<a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/zl.png" alt="zalo"></i>
    </a>
<a class="btn-phone btn-frame text-decoration-none" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/hl.png" alt="hotline"></i>
    </a>

<div class="toolbar ">
    <ul>
        <li>
            <a id="nhantin" href="sms:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>" title="title">
                <img src="assets/images/icon-t2.png" alt="images"><br>
                <span>SMS</span>
            </a>
        </li>
    
    <li>
        <a id="nhantin" href="<?=$optsetting['direct']?>" title="title">
            <img src="assets/images/icon-marker.png" alt="images"><br>
            <span>Chỉ đường</span>
        </a>
    </li>
    <li>
        <?php $linkchatface = explode('facebook.com/', $optsetting['fanpage']) ?>
        <a id="chatfb" href="https://m.me/<?=$linkchatface[1]?>" title="title">
            <img src="assets/images/icon-t4.png" alt="images"><br>
            <span>Message</span>
        </a>
    </li>
    <li>
        <a id="chatzalo" href="https://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>" title="title">
            <img src="assets/images/icon-t3.png" alt="images"><br>
            <span>Chat zalo</span>
        </a>
    </li>
    <li>
        <a id="goidien" href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>" title="title" class="blink">
            <img src="assets/images/icon-t1.png" alt="images"><br>
            <span>Hotline 1</span>
        </a>
    </li>
    <li>
        <a id="goidien" href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline2']);?>" title="title" class="blink">
            <img src="assets/images/icon-t1.png" alt="images"><br>
            <span>Hotline 2</span>
        </a>
    </li>
    </ul>
</div>

<div id="wpcp-error-message" class="msgmsg-box-wpcp warning-wpcp hideme" data-wpmeteor-mouseover="true" data-wpmeteor-click="true" data-wpmeteor-mouseout="true"><span>Alert: </span>Content is protected !!</div>
*/ ?>
<style>
.phoneleft{
    position: fixed;
    z-index: 999;
    background: #fff;
    bottom: 130px;
    left: 10px;
    border-radius: 29px;
    box-shadow: 1px 0px 4px 3px #ddd;
    padding: 7px 0px;
}

.phoneleft >a {
    display: block;
    margin: 10px 5px;
}

.phoneleft >a img {
    max-width: 35px;
}
</style>
<div class="phoneleft">
    <a href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>" title=""><img src="assets/images/icon-zalo.png" alt="zalo"></a>

    <a href="tel://<?=$optsetting['hotline']?>" target="_blank" title=""><img src="assets/images/icon-call.png"></a>
    <?php 
    $getlinkfanpage = explode('facebook.com/', $optsetting['fanpage']);
     ?>
    <a href="https://m.me/<?=$getlinkfanpage[1]?>" target="_blank" title=""><img src="assets/images/icon-messager.png"></a>
    <a href="<?=$optsetting['direct']?>" target="_blank" title=""><img src="assets/images/icon-chiduong.png"></a>
</div>

