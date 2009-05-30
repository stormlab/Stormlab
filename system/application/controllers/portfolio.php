<?php

	class Portfolio extends Controller {

		function Portfolio() {
			parent::Controller();
			$this->load->model('portfolio_model');
		}

		function index() {
			
			/*  Load Textile  */
			$this->load->plugin('textile');
			
			/*  Load Javascripts  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('scriptaculous.js?load=effects');
			$head[] = js_tags('lightbox');
			$head[] = css_link('lightbox');
			
			/*  Add the sort options to the content area.  */
			$content[] = $this->load->view('partials/portfolio/sort_options',array('sort_nav'=>'recent'),TRUE);
			
			/*  Get all portfolio entries.  */
			$entries = $this->portfolio_model->get_arranged();
			
			if($entries->num_rows()>0) {
			
				/*  Loop through them. Get some additional data, build the content view.  */
				foreach($entries->result() as $item) {
					
					$temp_types = array();
					$image_list = array();
					$item->snippet = '';
				
					/*  Get portfolio images.  */
					$images = $this->portfolio_model->get_images($item->id);
					
					/*  We need at least one item in the list & one snippet.  */
					if($images->num_rows()>=2) {
						
						/*  Start the list.  */
						$image_list[] = '<ul>';
						
						$num = 0;
						$snippet_link = '';
						$snippet_title = '';
						
						/*  Loop through the images.  */
						foreach($images->result() as $image) {
							
							/*  If it's a snippet we set the snippet property.  */
							if($image->type!='snippet') {
								
								/*  Add item to the list array.  */
								$image_list[] = '<li><a href="'.$image->src.'" rel="lightbox['.$item->id.']" title="'.(!empty($image->title) ? $image->title : 'Additional Screenshot').'">'.(!empty($image->title) ? $image->title : 'Additional Screenshot').'</a></li>';
								
								if($num==0) { $snippet_link=$image->src; $snippet_title=$image->title; }
								
								$num++;
								
							}
					
						}
						
						foreach($images->result() as $image) {
							
							if($image->type=='snippet'&&$snippet_link!='') {
								
								/*  Set snippet.  */
								$item->snippet = '<a href="'.$snippet_link.'" rel="lightbox['.$item->id.']" title="'.(!empty($snippet_title) ? $snippet_title : 'Additional Screenshot').'"><img src="'.$image->src.'" /></a>';
								
							}
							
						}
						
						/*  Close the list.  */
						$image_list[] = '</ul>';
					
					}
					
					/*  Build final image list.  */
					$item->image_list = implode("\n",$image_list);
				
					/*  Get item types.  */
					$types = $this->portfolio_model->get_types($item->id);
					
					/*  Loop through the types and get only the names.  */
					foreach($types->result() as $type) {
						$temp_types[] = $type->name;
					}
					
					/*  Create Pipe Separated List of Types  */
					$item->types = implode(' | ',$temp_types);
					
					/*  Link to the site if applicable.  */
					$item->anchor = !empty($item->uri) ? '<p><a href="'.$item->uri.'" target="new">Visit Site</a></p>' : '';
					
					/*  TEXTILE  */
					$textile = new Textile;
					$item->blurb = $textile->process($item->blurb);
					
					/*  View Content  */
					$entry = array(
						'item' => $item
						);
				
					/*  Load view.  */
					$content[] = $this->load->view('partials/portfolio/item',$entry,TRUE);
				
				}
			
			}
			
			/*  Frame Data  */
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode('',$head),
				'area_title' => 'Portfolio',
				'body_id'    => 'portfolio',
				'content'    => implode("\n",$content)
				);
			
			/*  Load the Frame View  */
			$this->load->view('frames/public',$frame);
			
		}
		
		function sort($sort='') {
			
			/*  Load Textile  */
			$this->load->plugin('textile');
			
			/*  Load Javascripts  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('scriptaculous.js?load=effects');
			$head[] = js_tags('lightbox');
			$head[] = css_link('lightbox');
			
			/*  Add the sort options to the content area.  */
			$content[] = $this->load->view('partials/portfolio/sort_options',array('sort_nav'=>$sort),TRUE);
			
			/*  Get all portfolio entries.  */
			switch($sort) {
				case 'sites':
					$entries = $this->portfolio_model->get_type('1');
				break;
				case 'apps':
					$entries = $this->portfolio_model->get_type('2');
				break;
				case 'logos':
					$entries = $this->portfolio_model->get_type('3');
				break;
				case 'all':
					$entries = $this->portfolio_model->get_alpha();
				break;
				default:
					$entries = $this->portfolio_model->get_recent();
			}
			
			if($entries->num_rows()>0) {
			
				/*  Loop through them. Get some additional data, build the content view.  */
				foreach($entries->result() as $item) {
					
					$temp_types = array();
					$image_list = array();
					$item->snippet = '';
				
					/*  Get portfolio images.  */
					$images = $this->portfolio_model->get_images($item->id);
					
					/*  We need at least one item in the list & one snippet.  */
					if($images->num_rows()>=2) {
						
						/*  Start the list.  */
						$image_list[] = '<ul>';
						
						$num = 0;
						$snippet_link = '';
						$snippet_title = '';
						
						/*  Loop through the images.  */
						foreach($images->result() as $image) {
							
							/*  If it's a snippet we set the snippet property.  */
							if($image->type!='snippet') {
								
								/*  Add item to the list array.  */
								$image_list[] = '<li><a href="'.$image->src.'" rel="lightbox['.$item->id.']" title="'.(!empty($image->title) ? $image->title : 'Additional Screenshot').'">'.(!empty($image->title) ? $image->title : 'Additional Screenshot').'</a></li>';
								
								if($num==0) { $snippet_link=$image->src; $snippet_title=$image->title; }
								
								$num++;
								
							}
					
						}
						
						foreach($images->result() as $image) {
							
							if($image->type=='snippet'&&$snippet_link!='') {
								
								/*  Set snippet.  */
								$item->snippet = '<a href="'.$snippet_link.'" rel="lightbox['.$item->id.']" title="'.(!empty($snippet_title) ? $snippet_title : 'Additional Screenshot').'"><img src="'.$image->src.'" /></a>';
								
							}
							
						}
						
						/*  Close the list.  */
						$image_list[] = '</ul>';
					
					}
					
					/*  Build final image list.  */
					$item->image_list = implode("\n",$image_list);
				
					/*  Get item types.  */
					$types = $this->portfolio_model->get_types($item->id);
					
					/*  Loop through the types and get only the names.  */
					foreach($types->result() as $type) {
						$temp_types[] = $type->name;
					}
					
					/*  Create Pipe Separated List of Types  */
					$item->types = implode(' | ',$temp_types);
					
					/*  Link to the site if applicable.  */
					$item->anchor = !empty($item->uri) ? '<p><a href="'.$item->uri.'" target="new">Visit Site</a></p>' : '';
					
					/*  TEXTILE  */
					$textile = new Textile;
					$item->blurb = $textile->process($item->blurb);
					
					/*  View Content  */
					$entry = array(
						'item' => $item
						);
				
					/*  Load view.  */
					$content[] = $this->load->view('partials/portfolio/item',$entry,TRUE);
				
				}
			
			}
			
			/*  Frame Data  */
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode('',$head),
				'area_title' => 'Portfolio',
				'body_id'    => 'portfolio',
				'content'    => implode("\n",$content)
				);
			
			/*  Load the Frame View  */
			$this->load->view('frames/public',$frame);
			
		}
		
		/*  Add a new portfolio item.  */
		function add() {
			
			/*  Redirect if not logged in.  */
			$this->user->check_level('1','portfolio','strm');
			
			/*  Helpers  */
			$this->load->helper('form');
			
			/*  Form submit branch  */
			if($this->input->post('item')) {
				
				/*  Add the item, get the new id.  */
				$id = $this->portfolio_model->add_item($this->input->post('item'));
				
				/*  Add the images, if any.  */
				if($this->input->post('images')) {
					
					$this->portfolio_model->add_images($this->input->post('images'),$this->input->post('titles'),$id);
					
				}
				
				/*  Add the type relationships.  */
				$this->portfolio_model->add_relationships($this->input->post('types'),$id);
				
				/*  Clear Type Relationships  */
				unset($_POST['types']);
				
			}
			
			/*  Head Data  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('imagemanager/jscripts/mcimagemanager');
			$head[] = js_tags('add_item');
			
			$form = array(
				'inputs' => $this->_add_form_inputs()
				);
			
			/*  Content Data  */
			$content[] = $this->load->view('partials/portfolio/add_form',$form,TRUE);
			
			/*  Frame Data  */
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode("\n",$head),
				'area_title' => 'Portfolio',
				'body_id'    => 'portfolio',
				'content'    => implode("\n",$content)
				);
			
			/*  Load the Frame View  */
			$this->load->view('frames/public',$frame);
			
		}
		
		/*  Edit a portfolio item.  */
		function edit($id='') {
			
			/*  No id, bye.  */
			if($id=='') { redirect('portfolio'); }
			
			/*  Redirect if not logged in.  */
			$this->user->check_level('1','portfolio','strm');
			
			/*  Helpers  */
			$this->load->helper('form');
			
			/*  Form submit branch  */
			if($this->input->post('item')) {
				
				/*  Add the item, get the new id.  */
				$this->portfolio_model->update_item($this->input->post('item'),$id);
				
				/*  Remove images.  */
				$this->portfolio_model->clear_images($id);
				
				/*  Add the images, if any.  */
				if($this->input->post('images')) {
					
					$this->portfolio_model->add_images($this->input->post('images'),$this->input->post('titles'),$id);
					
				}
				
				/*  Clear existing relationships.  */
				$this->portfolio_model->clear_relationships($id);
				
				/*  Add the type relationships.  */
				$this->portfolio_model->add_relationships($this->input->post('types'),$id);
				
				/*  Clear Type Relationships  */
				unset($_POST['types']);
				
				/*  Redirect  */
				redirect('portfolio');
				
			}
			
			/*  Head Data  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('imagemanager/jscripts/mcimagemanager');
			$head[] = js_tags('add_item');
			
			/*  Get the single item.  */
			$item = $this->portfolio_model->get_item($id);
			
			$form = array(
				'id'     => $id,
				'inputs' => $this->_edit_form_inputs($item),
				'images' => $this->portfolio_model->get_images($id),
				'types'  => $this->portfolio_model->get_types($id)
				);
			
			/*  Content Data  */
			$content[] = $this->load->view('partials/portfolio/edit_form',$form,TRUE);
			
			/*  Frame Data  */
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode("\n",$head),
				'area_title' => 'Portfolio',
				'body_id'    => 'portfolio',
				'content'    => implode("\n",$content)
				);
			
			/*  Load the Frame View  */
			$this->load->view('frames/public',$frame);
			
		}
		
		/*  Remove a portfolio item from the list.  */
		function remove($id='') {
			
			/*  Redirect if not logged in.  */
			$this->user->check_level('1','portfolio','strm');
			
			/*  Redirect if there is no id supplied.  */
			if($id=='') { redirect('portfolio'); }
			
			/*  Remove the item  */
			$this->portfolio_model->remove_item($id);
			
			/*  Redirect anyway.  */
			redirect('portfolio');
			
		}
		
		function update_order() {
			
			if($this->input->post('arrange_list')) {
				
				$items = $this->input->post('arrange_list');
				
				/*  Clear all the current order information.  */
				$this->portfolio_model->clear_arrange();
				
				/*  Add all the new order information.  */
				foreach($items as $id) {
					$this->portfolio_model->add_arrange($id);
				}
				
			}
			
		}
		
		function rearrange() {
			
			/*  Load Textile  */
			$this->load->plugin('textile');
			
			/*  Load Javascripts  */
			$head[] = js_tags('prototype');
			$head[] = js_tags('scriptaculous.js');
			$head[] = js_tags('arrange');
			
			/*  Get all portfolio entries.  */
			$entries = $this->portfolio_model->get_sorted();
			
			if($entries->num_rows()>0) {
			
				/*  Loop through them. Get some additional data, build the content view.  */
				foreach($entries->result() as $item) {
					
					if($item->item!='') {
						$arrange_list[] = $this->load->view('partials/portfolio/arrange_item',array('item'=>$item),TRUE);
					} else {
						$limbo_list[]   = $this->load->view('partials/portfolio/arrange_item',array('item'=>$item),TRUE);
					}
				
				}
			
			}
			
			$list = array(
				'arrange' => implode('',$arrange_list),
				'limbo'   => implode('',$limbo_list)
				);
			
			$content[] = $this->load->view('partials/portfolio/arrange_list',$list,TRUE);
			
			/*  Frame Data  */
			$frame = array(
				'site_title' => $this->config->item('title'),
				'head'       => implode('',$head),
				'area_title' => 'Portfolio',
				'body_id'    => 'portfolio',
				'content'    => implode("\n",$content)
				);
			
			/*  Load the Frame View  */
			$this->load->view('frames/public',$frame);
			
		}
		
		function _add_form_inputs() {
			
			return array(
				'name'  => array(
					'name'      => 'item[name]',
					'id'        => 'item_name',
					'value'     => '',
					'size'      => '35',
					'maxlength' => '128'
					), 
				'uri'   => array(
					'name'      => 'item[uri]',
					'id'        => 'item_uri',
					'value'     => '',
					'size'      => '35',
					'maxlength' => '128'
					),
				'blurb' => array(
					'name'      => 'item[blurb]',
					'id'        => 'item_blurb',
					'value'     => '',
					'rows'      => '20',
					'cols'      => '45'
					)
				);
			
		}
		
		function _edit_form_inputs($item='') {
			
			return array(
				'name'  => array(
					'name'      => 'item[name]',
					'id'        => 'item_name',
					'value'     => $item->name,
					'size'      => '35',
					'maxlength' => '128'
					), 
				'uri'   => array(
					'name'      => 'item[uri]',
					'id'        => 'item_uri',
					'value'     => $item->uri,
					'size'      => '35',
					'maxlength' => '128'
					),
				'blurb' => array(
					'name'      => 'item[blurb]',
					'id'        => 'item_blurb',
					'value'     => $item->blurb,
					'rows'      => '20',
					'cols'      => '45'
					)
				);
			
		}

	}

?>