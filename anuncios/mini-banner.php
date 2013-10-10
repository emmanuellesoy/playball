<aside class="miniBanner">
	<?php
		$anuncio = array(
			array('opc' => 'lac', 'liga' => 'http://www.laciudaddeportiva.com/'),
			array('opc' => 'izq', 'liga' => 'http://izquierdazo.com/')
		);
	?>
	<?php $choose = rand(0, (count($anuncio) - 1)); ?>
	<a href="<?php echo $anuncio[$choose]['liga']; ?>"></a>
	<object width="300" height="100" data="<?php bloginfo('template_directory'); ?>/swf/<?php echo $anuncio[$choose]['opc']; ?>.swf"></object>
</aside>