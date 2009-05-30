
<h3>Contact</h3>

<h4>Office</h4>
<p>3680 Conifer Court, Boulder, CO 80304 [ <a href="http://maps.google.com/maps?q=3680+Conifer+Court,+Boulder,+CO+80304&amp;iwloc=A&amp;hl=en" title="Google Map">Google Map</a> ]<br />Phone: 720.222.3125<br />Fax: 720.222.3126<br />Email: info [at] stormlab [dot] com</p>
<p>Phone: 720.222.3125<br />Fax: 720.222.3126</p>

<?php echo !empty($message) ? '<h4>'.$message.'</h4>' : ''; ?>
	
<?php echo form_open('contact',array('id'=>'contact_form')); ?>
	
	<fieldset>
		<ol>
			<li><label>First Name</label><?php echo form_input($inputs['first_name']); ?></li>
			<li><label>Last Name</label><?php echo form_input($inputs['last_name']); ?></li>
			<li><label>Email Address</label><?php echo form_input($inputs['email']); ?></li>
			<li><label>Company Name</label><?php echo form_input($inputs['company']); ?></li>
			<li><label>URL</label><?php echo form_input($inputs['url']); ?></li>
			<li><label>Phone Number</label><?php echo form_input($inputs['phone']); ?></li>
		</ol>
	</fieldset>
	<fieldset>
		<ol>
			<li><label>Reason for Inquiry</label><?php echo form_dropdown('reason',$inputs['reason']); ?></li>
			<li><label>How did you hear about us?</label><?php echo form_dropdown('how',$inputs['how']); ?></li>
		</ol>
	</fieldset>
	<fieldset>
		<ol>
			<li><label>Comments</label><?php echo form_textarea($inputs['blurb']); ?></li>
			<li class="submit"><?php echo form_submit($inputs['submit']); ?></li>
		</ol>
	</fieldset>
	
	<input type="text" name="email_address" style="display:none" />
	
</form>