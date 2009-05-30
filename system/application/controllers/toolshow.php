<?php
	
	class Toolshow extends Controller {
		
		function Toolshow() {
			parent::Controller();
			$this->load->model('portfolio_model');
		}
		
		function index() {}
		
		/*  XML Feed:  */
		function xml() {
			
			/*  Get the data for the slideshow.  */
			$p_data = array(
				'images' => $this->portfolio_model->xml_images()
				);
			
			/*  Display the xml file.  */
			@header("Content-Type: text/xml");
			$this->load->view('partials/toolshow',$p_data);
			
		}
		
	}
	
?>