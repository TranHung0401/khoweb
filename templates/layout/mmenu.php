<div class="logo-menu-res">
    <a href=""><img class="lazy" onerror="this.src='<?=THUMBS?>/270x130x3/assets/images/noimage.png';" src="<?=UPLOAD_PHOTO_L.$logo['photo']?>"/></a>
</div>

<div class="header-middle">
    <a class="header-blog text-decoration-none changecolor" href="gioi-thieu"><?=$gioithieu['name'.$lang]?></a>
    <div class="header-news">
        <strong>Kinh nghiệm hay</strong>
        <ul class="slick-kn">
            <?php foreach($kinhnghiem as $kn) {?>
                <li><a href="<?=$kn['slug'.$lang]?>" class="catchuoi1 changecolor text-decoration-none"><?=$kn['name'.$lang]?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="menu-res">
    <div class="menu-bar-res">
        <a id="hamburger" href="#menu" title="Menu"><span></span></a>
        <div class="search-res">
            <?php /* <p class="icon-search transition"><i class="fa fa-search"></i></p> */ ?>
            <div class="search-grid w-clear">
                <input type="text" name="keyword-res" id="keyword-res" data-placeholder="Bạn cần tìm gì; <?= nhaptukhoatimkiem ?>" placeholder="<?= nhaptukhoatimkiem ?>" onkeypress="doEnter(event,'keyword-res');" />
                <p onclick="onSearch('keyword-res');"><i class="fa fa-search"></i></p>
            </div>
        </div>

        <a class="cart-mobi text-decoration-none " href="gio-hang" title="Giỏ hàng">
            <i class="fas fa-shopping-bag"></i>
            <span class="count-cart"><?=(isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
        </a>
    </div>
    <nav id="menu">
        <ul>
        <li><a class="transition <?php if($com=='') echo 'active'; ?>" href="#" title="Trang chủ"><span>Trang chủ</span></a></li>
        <?php foreach ($splist as $klist => $vlist) {
            $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
            <li>
                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist['slug'.$lang] ?>"><?= $vlist['name' . $lang] ?></a>
                <?php if(!empty($spcat)) {?>
                <ul>
                    <?php foreach($spcat as $vcat) {?>
                        <li><a href="<?=$vcat['slug'.$lang]?>"><?=$vcat['name'.$lang]?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </li>
        <?php } ?>

        <li><a class="transition <?php if($com=='acquy') echo 'active'; ?>" href="acquy" title="Ắc quy"><span>Ắc quy</span></a></li>

        <li><a class="transition <?php if($com=='phu-tung') echo 'active'; ?>" href="phu-tung" title="Phụ tùng"><span>Phụ tùng</span></a></li>

        <li><a class="transition <?php if($com=='kinh-nghiem') echo 'active'; ?>" href="kinh-nghiem" title="Kinh nghiệm hay"><span>Kinh nghiệm hay</span></a></li>
        </ul>
    </nav>
    </div>