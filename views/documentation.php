<h1>Documentation</h1>

<?php if ( isset( $docs ) ) : ?>


<div id="contents-table">
	<h2>Table of Contents</h2>
	<ul>

		<?php foreach ( $docs as $doc ) : ?>
			<li>
				<a href="#<?php echo $doc->name; ?>"><?php echo $doc->name; ?></a>
			</li>
		<?php endforeach; ?>

	</ul>
</div>

<div class="docs">

	<?php foreach ( $docs as $doc ) : ?>
		<h3 id="<?php echo $doc->name; ?>"><?php echo $doc->name; ?></h3>
		<p><?php echo $parse->text( $doc->content ); ?></p>
        <hr>
	<?php endforeach; ?>


    </div>
<?php endif; ?>