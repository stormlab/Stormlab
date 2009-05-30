	
	<h3>Add Portfolio Item</h3>
	
	<?php echo form_open('portfolio/add',array('id'=>'add_item','name'=>'add_item')); ?>
		
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
				<li><label>File</label><input type="text" name="images[]" id="image_1" /><?php echo img_tag('browse.gif',array('id'=>'browse_1')); ?><br /><label>Title</label><input type="text" name="titles[]" id="title_1" /></li>
			</ol>
		</fieldset>
		
		<fieldset>
			<legend>Item Types</legend>
			<p><input type="checkbox" name="types[]" value="1" /> Web Site <input type="checkbox" name="types[]" value="2" /> Web App <input type="checkbox" name="types[]" value="3" /> Logo</p>
		</fieldset>
		
		<p class="submit"><input type="submit" value="Add Item" /></p>
		
	</form>