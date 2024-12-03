<?php if(!empty($params['replies'])) { foreach($params['replies'] as $v_reply) { ?>
	<div class="comment-replies-item">
		<div class="comment-replies-letter <?=$v_reply['poster']?>">
			<?php //$this->subName($v_reply['fullname'])?>
			<img onerror="this.src='<?=THUMBS?>/45x45x1/assets/images/noimage.png';" src="<?=THUMBS?>/45x45x1/<?=UPLOAD_PHOTO_L.$params['favicon']?>"/>

		</div>
		<div class="comment-replies-info">
			<div class="comment-replies-name mb-1"><?=$v_reply['fullname']?><span class="font-weight-normal small text-muted pl-2"><?=$this->timeAgo($v_reply['date_posted'])?></span><?=($v_reply['poster'] == 'admin') ? '<span class="font-weight-normal text-info ml-2">(Phản hồi bởi Ban Quản Trị)</span>' : ''?></div>
			<div class="comment-replies-content"><?=nl2br(htmlspecialchars_decode($v_reply['content']))?></div>
		</div>
	</div>
<?php } } ?>