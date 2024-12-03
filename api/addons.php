<?php
	include "config.php";
	
	$type = (!empty($_GET["type"])) ? htmlspecialchars($_GET["type"]) : '';
?>
<?php if($type == 'video-fotorama') {
	$video_home = $d->rawQuery("select link_video, id, name$lang from #_photo where type = ? and act <> ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb, id desc",array('video','photo_static')); if(count($video_home)) { ?>
	<div id="fotorama-videos" data-width="100%" data-thumbmargin="10" data-height="270" data-fit="cover" data-thumbwidth="130" data-thumbheight="93" data-allowfullscreen="true" data-nav="thumbs">
	    <?php foreach($video_home as $k => $v) { ?>
	        <a href="https://youtube.com/watch?v=<?=$func->getYoutube($v['link_video'])?>" title="<?=$v['name'.$lang]?>"></a>
	    <?php } ?>
	</div>
<?php } } ?>

<?php if($type == 'video-select') {
	$video_home = $d->rawQuery("select link_video, id, name$lang from #_photo where type = ? and act <> ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb, id desc",array('video','photo_static')); if(count($video_home)) { ?>
	<div class="video-main height-video-d">
        <iframe width="100%" height="100%" src="//www.youtube.com/embed/<?=$func->getYoutube($video_home[0]['link_video'])?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <select class="listvideos custom-video-list-d">
        <?php foreach($video_home as $k => $v) { ?>
            <option value="<?=$v['id']?>"><?=$v['name'.$lang]?></option>
        <?php } ?>
    </select>
<?php } } ?>

<?=($type == 'footer-map') ? htmlspecialchars_decode($optsetting['coords_iframe']) : ''; ?>

