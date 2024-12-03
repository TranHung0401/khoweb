<section class="whychooseus py-3 py-lg-5">
	<div class="container-fluid">
			<div class="owl-carousel owl-theme owl-page"
			data-xsm-items = "2:5" 
			data-sm-items = "2:5" 
			data-md-items = "2:20" 
			data-lg-items = "4:20" 
			data-xlg-items = "4:5" 
			data-rewind = "1" 
			data-autoplay = "1" 
			data-loop = "0" 
			data-lazyload = "0" 
			data-mousedrag = "0" 
			data-touchdrag = "0" 
			data-smartspeed = "800" 
			data-autoplayspeed = "800" 
			data-autoplaytimeout = "5000" 
			data-dots = "0"
			data-center = "1"
		>
			<?php foreach($visao as $vs) {?>
				<a class="whychooseus-item shadow p-2 mx-2 my-3 m-lg-3" href="<?=$vs['link']?>">
					<img onerror="this.src='<?=THUMBS?>/310x90x1/assets/images/noimage.png';" src="<?=THUMBS?>/310x90x1/<?=UPLOAD_PHOTO_L.$vs['photo']?>" alt="<?=$vs['name'.$lang]?>">
				</a>

			<?php } ?>
		</div>
	</div>
</section>

<section class="productsale  mb-5">
	<a href="<?=$bannerkm['link']?>" class="productsale-banner"><img onerror="this.src='<?=THUMBS?>/1320x90x1/assets/images/noimage.png';" src="<?=THUMBS?>/1320x90x1/<?=UPLOAD_PHOTO_L.$bannerkm['photo']?>" alt="<?=$bannerkm['name'.$lang]?>"></a>
	<div class="container-fluid py-3 py-lg-5">
		<div class="title-main"><span>Top sản phẩm - chào hè giá rẻ</span></div>
		<div class="owl-carousel owl-theme owl-page"
			data-xsm-items = "2:10" 
			data-sm-items = "2:10" 
			data-md-items = "1:20" 
			data-lg-items = "1:20" 
			data-xlg-items = "3:10" 
			data-rewind = "1" 
			data-autoplay = "1" 
			data-loop = "0" 
			data-lazyload = "0" 
			data-mousedrag = "0" 
			data-touchdrag = "0" 
			data-smartspeed = "800" 
			data-autoplayspeed = "800" 
			data-autoplaytimeout = "5000" 
			data-dots = "0"
			data-center = "1"
		>
			<?php foreach($prodsale as $v) {?>
				<?php include "templates/layout/product.php"; ?>

			<?php } ?>
		</div>
	</div>
</section>

<section class="producthot">
	<div class="container-fluid">
		<div class="row producthot-inner">
			<?php 
			$maxload = floor(count($countpro)/6);
			foreach($pronoibat as $v) {?>
				<div class="col-12 col-lg-4 px-2 px-lg-3 product-item">
					<?php include "templates/layout/product.php"; ?>
				</div>

			<?php } ?>
		</div>
		<div class="btn btn-danger btn-xemthem" data-maxload="<?=$maxload?>">Xem thêm</div>

	</div>
</section>

<section class="advertisement">
	<div class="container-fluid">
		<div class="row adver-inner">
			<div class="col-sm-8 mb-3 mb-lg-0 adver-left">
				<a href="<?=$banner['link']?>"><img src="<?=UPLOAD_PHOTO_L.$banner['photo']?>" alt="<?=$banner['ten']?>"></a>
			</div>
			<div class="col-sm-4 adver-right">
				<?php foreach($bannerqc as $bnqc) {?>
					<a href="<?=$bnqc['link']?>"><img src="<?=UPLOAD_PHOTO_L.$bnqc['photo']?>" alt="<?=$bnqc['ten']?>"></a>

				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="thongtin">
	<div class="container-fluid">
		<div class="owl-page owl-carousel owl-theme" 
			data-xsm-items = "1:10" 
			data-sm-items = "1:10" 
			data-md-items = "1:20" 
			data-lg-items = "1:20" 
			data-xlg-items = "5:0" 
			data-rewind = "1" 
			data-autoplay = "1" 
			data-loop = "0" 
			data-lazyload = "0" 
			data-mousedrag = "0" 
			data-touchdrag = "0" 
			data-smartspeed = "800" 
			data-autoplayspeed = "800" 
			data-autoplaytimeout = "5000" 
			data-dots = "0" >
				<?php foreach($thongtin as $ttin) {?>
					<a class="thongtin-item text-decoration-none" href="<?=$ttin['slug'.$lang]?>"><?=$ttin['name'.$lang]?></a>

				<?php } ?>
		</div>
	</div>
</section>

<section class="content2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="title-main"><span>Thông tin hữu ích</span></div>
				
				<a class="article-item d-block" href="<?=$thongtinhuuich[0]['slug'.$lang]?>">
					<div class="article-img"><img src="<?=THUMBS."/645x330x1/".UPLOAD_NEWS_L.$thongtinhuuich[0]['photo']?>" alt="<?=$thongtinhuuich[0]['name'.$lang]?>"></div>
					<h3 class="article-title changecolor"><?=$thongtinhuuich[0]['name'.$lang]?></h3>
				</a>
				<div class="content2">
					<?php foreach($thongtinhuuich as $k => $tthi) {
						if($k == 0) continue;
					?>
						<div class="content2-item">
							<a href="<?=$tthi['slug'.$lang]?>" class="content2-img d-block"><img src="<?=THUMBS."/130x80x1/".UPLOAD_NEWS_L.$tthi['photo']?>" alt="<?=$tthi['name'.$lang]?>"></a>
							<h3 class="content2-title"><a href="<?=$tthi['slug'.$lang]?>" class="changecolor d-block text-decoration-none"><?=$tthi['name'.$lang]?></a></h3>
							<div class="content2-date"><?=$content2['date_creaded']?></div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="title-main"><span>Video clips</span></div>

				<a class="videotc d-block" data-fancybox="video" href="<?=$videonb[0]['link_video']?>">
					<div class="videotc-image scale-img">
						<img src="https://img.youtube.com/vi/<?=$func->getYoutube($videonb[0]['link_video'])?>/0.jpg" alt="<?=$videonb[0]['name'.$lang]?>">
					</div>
					<h3 class="videotc-name text-split changecolor"><?=$videonb[0]['name'.$lang]?></h3>
				</a>

				<div class="content3">
					<?php foreach($videonb as $k2 => $vdnb) {
						if($k2 == 0) continue;
					?>
						<a class="content3-item text-decoration-none" data-fancybox="video" href="<?=$vdnb['link_video']?>">
							<div class="content3-img d-block"><img  src="https://img.youtube.com/vi/<?=$func->getYoutube($vdnb['link_video'])?>/0.jpg" alt="<?=$vdnb['name'.$lang]?>"></div>
							<h3 class="content3-title changecolor"><?=$vdnb['name'.$lang]?></h3>
							<div class="content3-date"><?=$content3['date_creaded']?></div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="acquy">
	<div class="container-fluid">
		<div class="title-main2"><span>Ắc quy chính hãng</span></div>

		<div class="owl-page owl-carousel owl-theme" 
		data-xsm-items = "2:10" 
		data-sm-items = "2:10" 
		data-md-items = "1:20" 
		data-lg-items = "1:20" 
		data-xlg-items = "6:8" 
		data-rewind = "1" 
		data-autoplay = "1" 
		data-loop = "0" 
		data-lazyload = "0" 
		data-mousedrag = "0" 
		data-touchdrag = "0" 
		data-smartspeed = "800" 
		data-autoplayspeed = "800" 
		data-autoplaytimeout = "5000" 
		data-dots = "0" >
			<?php foreach($acquy as $v) {?>
				<?php include "templates/layout/product.php"; ?>

			<?php } ?>
		</div>
	</div>
</section>

<section class="phutung">
	<div class="container-fluid">
		<div class="title-main2"><span>Phụ tùng chính hãng</span></div>

		<div class="owl-page owl-carousel owl-theme" 
		data-xsm-items = "2:10" 
		data-sm-items = "2:10" 
		data-md-items = "1:20" 
		data-lg-items = "1:20" 
		data-xlg-items = "6:8" 
		data-rewind = "1" 
		data-autoplay = "1" 
		data-loop = "0" 
		data-lazyload = "0" 
		data-mousedrag = "0" 
		data-touchdrag = "0" 
		data-smartspeed = "800" 
		data-autoplayspeed = "800" 
		data-autoplaytimeout = "5000" 
		data-dots = "0" >
			<?php foreach($phutung as $v) {?>
				<?php include "templates/layout/product.php"; ?>

			<?php } ?>
		</div>
	</div>
</section>


<section class="product-buying ">
	<?php foreach($product_buying as $k => $v) {?>
         <div class="product-buying-item shadow ">
			<div class="row">
				<div class="col-4">
					<img src="<?=THUMBS?>/150x150x2/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?= $v['name'.$lang] ?>">
				</div>
				<div class="col-8">
					<h3 class="product-buying-title changecolor catchuoi2"><?= $v['name'. $lang] ?></h3>
					<i>Đã được mua cách đây <span></span></i>
				</div>
			</div>         	

         </div>
	<?php } ?>
</section>

