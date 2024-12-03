<div class="title-main"><span><?=$rowDetail['name'.$lang]?></span></div>
<div class="time-main"><i class="fas fa-calendar-week"></i><span><?=ngaydang?>: <?=date("d/m/Y h:i A",$rowDetail['date_created'])?></span></div>
<div class="row">
    <div class="col-12 col-lg-9">
        <?php if(!empty($rowDetail['content'.$lang])) { ?>
            <div class="content-main w-clear" style="font-size: 18px;"><?=htmlspecialchars_decode($rowDetail['content'.$lang])?></div>
            <div class="share">
                <b><?=chiase?>:</b>
                
                <div class="social-plugin w-clear">
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_telegram"></a>
                        <a class="a2a_button_facebook_messenger"></a>
                        <a class="a2a_button_wechat"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_whatsapp"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                    <?php
                        $params = array();
                        $params['oaid'] = $optsetting['oaidzalo'];
                        echo $func->markdown('social/share', $params);
                    ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning w-100" role="alert">
                <strong><?=noidungdangcapnhat?></strong>
            </div>
        <?php } ?>
    </div>
    <div class="col-12 col-lg-3 d-none d-lg-block">
        <?php include "templates/layout/left.php"; ?>
    </div>
</div>

<?php if(!empty($news)) { ?>
    <div class="share othernews mb-3">
        <b><?=baivietkhac?>:</b>
        <ul class="list-news-other">
            <?php foreach($news as $k => $v) { ?>
                <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>"><?=$v['name'.$lang]?> - <?=date("d/m/Y",$v['date_created'])?></a></li>
            <?php } ?>
        </ul>
        <div class="pagination-home w-100"><?=(!empty($paging)) ? $paging : ''?></div>
    </div>
<?php } ?>