<?php
	
	class Login extends Controller {
		
		function Login() {
			parent::Controller();
		}
		
		/*  Login Main Page : Allows logging in as an admin.  */
		function index() {
			
			/*  Form Helper  */
			$this->load->helper('form');
			
			/*  Default Message  */
			$message = '';
			
			/*  Form submit code branch.  */
			if($this->input->post('login')) {
				
				$check = $this->input->post('login');
				
				if($check['username']=='stormlab'&&$check['password']=='basement') {
					
					/*  Set the user level cookie.  */
					$this->user->set_level('1','31536000','strm');
					
					/*  Redirect  */
					redirect();
					
				} else {
					
					$message = 'Something was incorrect.';
					
				}
				
			}
			
			/*  Form Variables  */
			$login = array(
				'message' => $message,
				'inputs'  => $this->_login_form_inputs()
				);
			
			/*  Create Content  */
			$content[] = $this->load->view('partials/login_form',$login,TRUE);
			
			$frame = array(
				'site_title' => $this->config->item('title'),
				'area_title' => 'Login',
				'body_id'    => 'login',
				'content'    => implode("\n",$content)
				);
			
			$this->load->view('frames/public',$frame);
			
		}
		
		/*  ====  PRIVATE FUNCTIONS  ====  */
		
		/*  Returns the input fields for the login form.  */
		function _login_form_inputs() {
			
			return array(
				'username' => array(
					'name'      => 'login[username]',
					'id'        => 'login_username',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'password' => array(
					'name'      => 'login[password]',
					'id'        => 'login_password',
					'value'     => '',
					'size'      => '30',
					'maxlength' => '128'
					),
				'submit'   => array(
					'name'      => 'login[submit]',
					'id'        => 'login_submit',
					'value'     => 'Login'
					)
				);
			
		}
		
	}
	
?>