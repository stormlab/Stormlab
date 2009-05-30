<?php
	
	class Statics extends Controller {
		
		function Statics() {
			parent::Controller();
		}
		
		function index() {}
		
		function _remap($page='') {
			
			/*  Create Head  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('scriptaculous.js?load-effects');
			
			if($page=='index') {
				$head[] = js_tags('swfobject');
				$head[] = js_tags('slideshow');
				$head[] = js_tags('sifr');
			}
			
			/*  Create Content  */
			$content[] = $this->load->view('statics/'.$page,'',TRUE);
			
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode("\n",$head),
				'body_id'    => $page,
				'content'    => implode("\n",$content)
				);
				
			if($page!='index') {
				$frame['area_title'] = ucwords($page);
			} else {
				$frame['site_title'] = 'Boulder Web Design, Web Development and Web Apps from Stormlab';
			}
			
			$this->load->view('frames/public',$frame);
			
		}
		
	}
	
?>