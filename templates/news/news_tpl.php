<div class="title-main"><span><?=(!empty($titleCate)) ? $titleCate : @$titleMain?></span></div>
<div class="content-main row">
    <?php if(!empty($news)) { foreach($news as $k => $v) { ?>
    <div class="news col-6 col-md-4 px-2">
        <div class="row">
            <a class="news-image col-12 mb-3" href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>">
                <span class="scale-img">
                    <img src="<?=THUMBS?>/375x250x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['name'.$lang]?>">
                </span>
            </a>
            <div class="news-info col-12">
                <h3 class="news-name">
                    <a class="text-decoration-none text-split transition" href="<?=$v[$sluglang]?>"
                        title="<?=$v['name'.$lang]?>"><?=$v['name'.$lang]?></a>
                </h3>
                <p class="news-time"><?=ngaydang?>: <?=date("d/m/Y h:i A",$v['date_created'])?></p>
                <div class="news-desc text-split"><?=$v['desc'.$lang]?></div>
            </div>
        </div>
    </div>
    <?php } } else { ?>
    <div class="col-12">
        <div class="alert alert-warning w-100" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="col-12">
        <div class="pagination-home w-100"><?=(!empty($paging)) ? $paging : ''?></div>
    </div>
</div>
