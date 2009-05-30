<?php
	
	class Contact extends Controller {
		
		function Contact() {
			parent::Controller();
		}
		
		/*  Contact page  */
		function index() {
			
			/*  Form Helper  */
			$this->load->helper('form');
			
			/*  Default Message  */
			$message = '';
			
			/*  Form submit code branch.  */
			if($this->input->post('contact')) {
				
				$info = $this->input->post('contact');
				
				$message[] = 'Name : '.$info['first_name'].' '.$info['last_name'];
				$message[] = 'Email : '.$info['email'];
				$message[] = 'Company : '.$info['company'];
				$message[] = 'URL : '.$info['url'];
				$message[] = 'Phone : '.$info['phone'];
				$message[] = "\n".'Reason for inquiry : '.$info['reason'];
				$message[] = 'How they heard of us : '.$info['how']."\n";
				$message[] = 'Message : '.$info['blurb'];
				
				$this->load->library('email');

				$this->email->from($info['email'],$info['name']);
				$this->email->to('design@stormlab.com');
				$this->email->subject('Stormlab Contact Submission');
				$this->email->message(implode("\n",$message));
				
				if(empty($info['email_address'])) { $this->email->send(); }
				
				$message = 'Thank you for contacting us.';
				
			}
			
			/*  Form Variables  */
			$contact = array(
				'message' => $message,
				'inputs'  => $this->_contact_form_inputs()
				);
			
			/*  Create Content  */
			$content[] = $this->load->view('partials/contact_form',$contact,TRUE);
			
			$frame = array(
				'site_title' => $this->config->item('title'),
				'area_title' => 'Contact',
				'body_id'    => 'contact',
				'content'    => implode("\n",$content)
				);
			
			$this->load->view('frames/public',$frame);
			
		}
		
		/*  ====  PRIVATE FUNCTIONS  ====  */
		
		/*  Returns the input fields for the login form.  */
		function _contact_form_inputs() {
			
			return array(
				'first_name' => array(
					'name'      => 'contact[first_name]',
					'id'        => 'contact_first_name',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'last_name' => array(
					'name'      => 'contact[last_name]',
					'id'        => 'contact_last_name',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'email' => array(
					'name'      => 'contact[email]',
					'id'        => 'contact_email',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'company' => array(
					'name'      => 'contact[company]',
					'id'        => 'contact_company',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'url' => array(
					'name'      => 'contact[url]',
					'id'        => 'contact_url',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'phone' => array(
					'name'      => 'contact[phone]',
					'id'        => 'contact_phone',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'blurb' => array(
					'name'      => 'contact[blurb]',
					'id'        => 'contact_blurb',
					'value'     => '',
					'rows'      => '15',
					'cols'      => '45'
					),
				'submit'   => array(
					'name'      => 'contact[submit]',
					'id'        => 'contact_submit',
					'value'     => 'Contact Us'
					),
				'reason' => array(
					'' => 'Please Select',
					'web design' => 'Regarding web design',
					'web apps' => 'Regarding web apps',
					'cms tools' => 'Regarding CMS tools',
					'logo design' => 'Regarding logo design',
					'general' => 'General inquiry',
					'stormlab team' => 'Becoming part of the Stormlab team'
					),
				'how' => array(
					'' => 'Please Select',
					'referral' => 'Referral',
					'listing' => 'Website or Directory listing',
					'google' => 'Search Engine: Google',
					'other search' => 'Search Engine: Other',
					'other' => 'Other'
					)
				);
			
		}
		
	}
	
?>