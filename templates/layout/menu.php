<div class="menu">
    <div class="contain_trong">
        <div class="menu_left">
            <div class="menu_top">
                <ul>
                    <?php foreach ($splist as $klist => $vlist) {
                        $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                        <li>
                            <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                            <?php if(!empty($spcat)) {?>
                            <ul>
                                <?php foreach($spcat as $vcat) {?>
                                    <li><a href="<?= $vcat[$sluglang] ?>"><?=$vcat['name'.$lang]?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <li class="line"></li>
                    <?php } ?>

                    <li><a class="transition <?php if($com=='acquy') echo 'active'; ?>" href="acquy" title="Ắc quy"><span>Ắc quy</span></a></li>
                    <li class="line"></li>

                    <li><a class="transition <?php if($com=='phu-tung') echo 'active'; ?>" href="phu-tung" title="Phụ tùng"><span>Phụ tùng</span></a></li>
                    <li class="line"></li>

                    <!-- <li><a class="transition <?php if($com=='tin-tuc') echo 'active'; ?>" href="tin-tuc" title="Tin tức"><span>Tin tức</span></a></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>