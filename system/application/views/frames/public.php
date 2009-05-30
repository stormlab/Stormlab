<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title><?php echo isset($area_title) ? $area_title.' : ' : ''; echo isset($site_title) ? $site_title : ''; ?></title>
		<?php echo css_link('base'); ?>
		<meta name="author" content="<?php echo $this->config->item('author_meta'); ?>" />
		<meta name="description" content="<?php echo $this->config->item('desc_meta'); ?>" />
		<meta name="keywords" content="<?php echo $this->config->item('keywords_meta'); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
		<script src="/mint/?js" type="text/javascript"></script>
		<?php echo isset($head) ? $head : ''; ?>
	</head>

	<body<?php echo isset($body_id) ? ' id="'.$body_id.'"' : ''; ?>>
		
		<div id="container">
			
			<div class="liner">
			
				<div id="header">
					<h1><?php echo anchor('','<span>'.(isset($site_title) ? $site_title : '').'</span>',array('title'=>(isset($site_title) ? $site_title : ''))); ?></h1>
					<?php echo isset($area_title) ? '<h2>'.$area_title.'</h2>' : ''; ?>
				</div>
			
				<div id="content">
					<?php echo isset($content) ? $content : ''; ?><br clear="all" />
				</div>
			
				<div id="main_nav">
					<ul>
						<li id="nav_services"><?php echo anchor('statics/services','Services'); ?></li
						><li id="nav_wordpress"><?php echo anchor('statics/wordpress','Wordpress'); ?></li
						><li id="nav_tools"><?php echo anchor('statics/tools','Tools'); ?></li
						><li id="nav_method"><?php echo anchor('statics/method','Method'); ?></li
						><li id="nav_portfolio"><?php echo anchor('portfolio','Portfolio'); ?></li
						><li id="nav_about"><?php echo anchor('statics/about','About'); ?></li
						><li id="nav_contact"><?php echo anchor('contact','Contact'); ?></li>
					</ul>
				</div>
				
			</div>
			
		</div>
		
		<div id="footer" class="liner">
			<ul>
				<li id="first">&#169;1999-<?php echo date('Y'); ?> Stormlab Creative Design</li>
				<?php if($this->user->check_level('1','','strm')) { ?>
				<li><?php echo anchor('portfolio/add','Add Portfolio Item'); ?></li
				><li><?php echo anchor('portfolio/rearrange','Rearrange Portfolio Items'); ?></li>
				<?php } else { ?>
				<li><?php echo anchor('statics/services','Services'); ?></li
				><li><?php echo anchor('statics/wordpress','Wordpress'); ?></li
				><li><?php echo anchor('statics/tools','Tools'); ?></li
				><li><?php echo anchor('statics/method','Method'); ?></li
				><li><?php echo anchor('portfolio','Portfolio'); ?></li
				><li><?php echo anchor('statics/about','About'); ?></li
				><li><?php echo anchor('contact','Contact'); ?></li>
				<?php } ?>
			</ul>
			<br clear="all" />
		</div>
		
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-4277821-1");
		pageTracker._initData();
		pageTracker._trackPageview();
		</script>
		
	</body>

</html>