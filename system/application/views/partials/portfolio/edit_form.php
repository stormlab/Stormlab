	
	<h3>Edit Portfolio Item</h3>
	
	<?php echo form_open('portfolio/edit/'.$id,array('id'=>'add_item','name'=>'add_item')); ?>
		
		<fieldset>
			<legend>Item Information</legend>
			<ol>
				<li><label>Name</label><?php echo form_input($inputs['name']); ?></li>
				<li><label>URI</label><?php echo form_input($inputs['uri']); ?></li>
				<li><label>Blurb</label><?php echo form_textarea($inputs['blurb']); ?></li>
			</ol>
		</fieldset>
		
		<fieldset>
			<legend>Item Images <a href="javascript:void(0);" id="add_image">Add Another Image <?php echo img_tag('add.png'); ?></a></legend>
			<ol id="images_list">
				<?php
					
					$num = 1;
					
					/*  Loop through the images.  */
					foreach($images->result() as $image) {
						echo '<li><label>File</label><input type="text" name="images[]" id="image_'.$num.'" value="'.$image->src.'" />'.img_tag('browse.gif',array('id'=>'browse_'.$num)).'<br /><label>Title</label><input type="text" name="titles[]" id="title_'.$num.'" value="'.$image->title.'" /></li>';
						$num=$num+1;
					}
				
				?>
			</ol>
		</fieldset>
		
		<fieldset>
			<legend>Item Types</legend>
			<?php
			
				foreach($types->result() as $type) {
					$temp_types[] = intval($type->id);
				}
			
			?>
			<p><input type="checkbox" name="types[]" value="1"<?php echo in_array(1,$temp_types) ? ' checked="checked"' : ''; ?> /> Web Site <input type="checkbox" name="types[]" value="2"<?php echo in_array(2,$temp_types) ? ' checked="checked"' : ''; ?> /> Web App <input type="checkbox" name="types[]" value="3"<?php echo in_array(3,$temp_types) ? ' checked="checked"' : ''; ?> /> Logo</p>
		</fieldset>
		
		<p class="submit"><input type="submit" value="Add Item" /></p>
		
	</form>