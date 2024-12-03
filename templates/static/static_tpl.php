<?php if(!empty($static)) { ?>
    <div class="title-main"><span><?=$static['name'.$lang]?></span></div>
    <div class="content-main w-clear"><?=(!empty($static['content'.$lang])) ? htmlspecialchars_decode($static['content'.$lang]) : ''?></div>
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
        <strong><?=dangcapnhatdulieu?></strong>
    </div>
<?php } ?>