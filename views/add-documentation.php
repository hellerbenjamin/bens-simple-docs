<h1>Add Documentation</h1>

<form action="" method="POST">

	<p>
		<label><strong>Name</strong></label><br>
		<input type="text" name="name" required />
	</p>

	<label><strong>Content</strong></label><br>
	<textarea rows="20" cols="150" name="content" required></textarea>

	<?php submit_button(); ?>

</form>