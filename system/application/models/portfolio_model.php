<?php
	
	class Portfolio_model extends Model {
		
		function Portfolio_model() {
			parent::Model();
		}
		
		/*  ====  GET QUERIES  ====  */
		
		/*  Get snippet images for the silver slideshow.  */
		function xml_images() {
			$this->db->select('*')->from('images')->where('images.type','snippet');
			return $this->db->get();
		}
		
		/*  Get only items that exist in a sorted state.  */
		function get_arranged() {
			$this->db->select('*')->from('arrange')->orderby('arrange.id asc');
			$this->db->join('items','arrange.item=items.id');
			return $this->db->get();
		}
		
		/*  Get all portfolio items, sorted with those in the 'recent list' first.  */
		function get_sorted() {
			$this->db->select('*,items.id as real_id')->from('items')->orderby('arrange.id asc,items.name asc');
			$this->db->join('arrange','items.id=arrange.item','left');
			return $this->db->get();
		}
		
		/*  Get all portfolio items, sorted by most recent first.  */
		function get_recent() {
			$this->db->select('*')->from('items')->orderby('items.posted','desc');
			return $this->db->get();
		}
		
		/*  Get portfolio items sorted by type.  */
		function get_type($type='') {
			$this->db->select('*')->from('rels')->where('rels.secondary',$type);
			$this->db->join('items','items.id=rels.primary');
			return $this->db->get();
		}
		
		/*  Get all portfolio items, sorted alphabetically.  */
		function get_alpha() {
			$this->db->select('*')->from('items')->orderby('items.name','asc');
			return $this->db->get();
		}
		
		/*  Get all images that are associated with an item.  */
		function get_images($id='') {
			$this->db->select('*')->from('images')->where('images.item',$id)->orderby('id','asc');
			return $this->db->get();
		}
		
		/*  Get the types that this item is associated with.  */
		function get_types($id='') {
			$this->db->select('types.name,types.id')->from('rels')->where('rels.primary',$id);
			$this->db->join('types','types.id=rels.secondary');
			return $this->db->get();
		}
		
		/*  Get a single portfolio item.  */
		function get_item($id='') {
			$this->db->select('*')->from('items')->where('items.id',$id);
			$rows = $this->db->get();
			if($rows->num_rows()>0) {
				$return = $rows->result();
				return $return[0];
			}
		}
		
		/*  ====  COUNT QUERIES  ====  */
		
		/*  ====  INSERT QUERIES  ====  */
		
		/*  Adds an item to the items table.  */
		function add_item($item='') {
			$item = array_merge($item,array('posted'=>time()));
			$this->db->insert('items',$item);
			return $this->db->insert_id();
		}
		
		/*  Adds multiple images to the images table.  */
		function add_images($images='',$titles='',$id='') {
			foreach($images as $key => $src) {
				if(!empty($src)) {
					$insert = array(
						'src'   => $src,
						'type'  => (intval($key)==0) ? 'snippet' : 'full',
						'item'  => $id,
						'title' => $titles[$key]
						);
					$this->db->insert('images',$insert);
				}
			}
		}
		
		/*  Adds type relationships to the rels table.  */
		function add_relationships($types='',$id='') {
			foreach($types as $type) {
				$sql = 'INSERT INTO rels (rels.primary,rels.secondary) VALUES (\''.$id.'\',\''.$type.'\')';
				$this->db->query($sql);
			}
		}
		
		/*  Add a new item to the arrange table.  */
		function add_arrange($id='') {
			$this->db->insert('arrange',array('item'=>$id));
		}
		
		/*  ====  UPDATE QUERIES  ==== */
		
		/*  Update an existing item.  */
		function update_item($item='',$id='') {
			$this->db->update('items',$item,array('id'=>$id));
		}
		
		/*  ====  DELETE QUERIES  ====  */
		
		/*  Clear related images.  */
		function clear_images($id='') {
			$sql = 'DELETE FROM images WHERE images.item=\''.$id.'\'';
			$this->db->query($sql);
		}
		
		/*  Clear relationships.  */
		function clear_relationships($id='') {
			$sql = 'DELETE FROM rels WHERE rels.primary=\''.$id.'\'';
			$this->db->query($sql);
		}
		
		/*  Clear all arrange data.  */
		function clear_arrange() {
			$this->db->query('truncate table arrange');
		}
		
		/*  Remove the selected item.  */
		function remove_item($id='') {
			$this->db->delete('items',array('items.id'=>$id));
		}
		
		/*  ====  MISC & COMBINATION FUNCTIONS  ====  */
		
	}
	
?>