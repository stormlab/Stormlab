	
	<h3 id="<?php echo url_title($item->name); ?>"><span><?php echo $item->types; ?></span><?php echo $item->name; ?><?php echo $this->user->check_level('1','','strm') ? '<em>'.anchor('portfolio/edit/'.$item->id,'Edit').' | '.anchor('portfolio/remove/'.$item->id,'Remove',array('onclick'=>'return confirm(\'Are you sure you wish to remove this item?\')')).'</em>' : ''; ?></h3>
	<div class="image_column">
		<?php echo $item->snippet; ?>
	</div>
	<div class="text_column">
		<?php echo $item->blurb; ?>
		<?php echo $item->image_list; ?>
		<?php echo $item->anchor; ?>
	</div>