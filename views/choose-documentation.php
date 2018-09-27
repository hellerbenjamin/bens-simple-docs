<h1>Edit Documentation</h1>

<?php if ( !empty( $docs ) ) : // todo javascript autochange ?>

    <form action="" method="POST">

        <select name="doc">
		    <?php foreach ( $docs as $doc ) : ?>
                <option name="<?php echo $doc->name; ?>"><?php echo $doc->name; ?></option>
		    <?php endforeach; ?>
        </select>

	    <?php submit_button( 'Go'); ?>

    </form>


<?php endif; ?>
