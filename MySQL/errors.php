<?php if(count($errors) > 0): ?>
	<div class="error">
		<?php foreach ($errors as $error): ?>
			<P><?php echo $error; ?></P>
		<?php endforeach ?>		
	</div>
<?php endif ?>