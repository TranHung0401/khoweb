<div class="left-block">
	<div class="left-title ">Tin liên quan</div>
	<div class="left-inner pt-3">
		<?php foreach($tinlienquan as $tinlq) {?>
            <div class="left-news">
                <div class="row">
            		<a class="news-image col-12 mb-3" href="<?=$tinlq[$sluglang]?>" title="<?=$tinlq['name'.$lang]?>">
		                <span class="scale-img">
		                    <img src="<?=THUMBS?>/375x250x1/<?=UPLOAD_NEWS_L.$tinlq['photo']?>" alt="<?=$tinlq['name'.$lang]?>">
		                </span>
            		</a>
		            <div class="news-info col-12">
		                <h3 class="news-name">
		                    <a class="text-decoration-none text-split transition changecolor" href="<?=$tinlq[$sluglang]?>"
		                        title="<?=$tinlq['name'.$lang]?>"><?=$tinlq['name'.$lang]?></a>
		                </h3>
		                <p class="news-time"><?=ngaydang?>: <?=date("d/m/Y h:i A",$tinlq['date_created'])?></p>
		                <div class="news-desc text-split"><?=$tinlq['desc'.$lang]?></div>
		            </div>
        		</div>
    		</div>
		<?php } ?>
	</div>
</div>