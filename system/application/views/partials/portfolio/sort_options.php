	
	<div id="sort_options">
		<p>Show</p>
		<ul<?php echo isset($sort_nav) ? ' id="'.$sort_nav.'"' : ''; ?>>
			<li id="sort_recent"><?php echo anchor('portfolio','<span>Most Recent</span>',array('title'=>'Most Recent')); ?></li>
			<li id="sort_sites"><?php echo anchor('portfolio/sort/sites','<span>Web Sites</span>',array('title'=>'Web Sites')); ?></li>
			<li id="sort_apps"><?php echo anchor('portfolio/sort/apps','<span>Web Apps</span>',array('title'=>'Web Apps')); ?></li>
			<li id="sort_logos"><?php echo anchor('portfolio/sort/logos','<span>Logos</span>',array('title'=>'Logos')); ?></li>
			<li id="sort_all"><?php echo anchor('portfolio/sort/all','<span>All (A-Z)</span>',array('title'=>'All (A-Z)')); ?></li>
		</ul>
	</div>