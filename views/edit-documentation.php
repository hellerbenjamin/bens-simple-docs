<h1>Edit Documentation</h1>

<form action="" method="POST">

	<p>
		<label><strong>Name</strong></label><br>
		<input type="text" name="name" required value="<?php echo $doc->name; ?>"/>
	</p>

	<label><strong>Content</strong></label><br>
	<textarea rows="20" cols="150" name="content" required><?php echo $doc->content; ?></textarea>

	<input type="hidden" name="id" value="<?php echo $doc->id; ?>" />

	<?php submit_button( 'Update'); ?>

</form>