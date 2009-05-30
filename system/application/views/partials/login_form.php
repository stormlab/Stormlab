
<h3>Login</h3>

<?php echo !empty($message) ? '<h4>'.$message.'</h4>' : ''; ?>
	
<?php echo form_open('login',array('id'=>'login_form')); ?>
	
	<ol>
		<li><label>Username</label><?php echo form_input($inputs['username']); ?></li>
		<li><label>Password</label><?php echo form_password($inputs['password']); ?></li>
		<li class="submit"><?php echo form_submit($inputs['submit']); ?></li>
	</ol>
	
</form>