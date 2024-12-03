<div class="header">
	<div class="header-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8"></div>
				<div class="col-4 header-hotline">Tổng đài hỗ trợ <?=$optsetting['hotline']?></div>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="wrap-content d-flex align-items-center justify-content-between">
			<a class="inbl logo-header" href=""><img onerror="this.src='<?=THUMBS?>/400x50x3/assets/images/noimage.png';" src="<?=THUMBS?>/400x50x3/<?=UPLOAD_PHOTO_L.$logo['photo']?>"/></a>
			<div class="search">
                <input type="text" name="keyword" id="keyword" data-placeholder="Bạn cần tìm gì; <?= nhaptukhoatimkiem ?>" placeholder="<?= nhaptukhoatimkiem ?>" onkeypress="doEnter(event,'keyword');" />
                <p onclick="onSearch('keyword');"><i class="fa fa-search"></i></p>
            </div>

			<a class="header-blog text-decoration-none changecolor" href="gioi-thieu"><?=$gioithieu['name'.$lang]?></a>
			<div class="header-news">
				<strong>Kinh nghiệm hay</strong>
				<ul class="slick-kn">
					<?php foreach($kinhnghiem as $kn) {?>
						<li><a href="<?=$kn['slug'.$lang]?>" class="catchuoi1 changecolor text-decoration-none"><?=$kn['name'.$lang]?></a></li>
					<?php } ?>
				</ul>
			</div>

			<a class="cart-header text-decoration-none " href="gio-hang" title="Giỏ hàng">
			    <i class="fas fa-shopping-bag"></i>
			    <span class="count-cart"><?=(isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
			</a>
			
		</div>
	</div>
</div>