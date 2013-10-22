<section class="autorNota">
	<h4 class="autorNotaHeader">
		AUTOR DE LA NOTA
	</h4>
	<div class="autorNotaImg">
		<?php the_author_image(); ?>
	</div>
	<div class="autorNotaNombre">
		<?php the_author('nicename'); ?>
	</div>
	<div class="autorNotaTwitter">
		<?php $autor_tn = get_the_author_meta( 'twitter' ); ?>
		<?php if($autor_tn){?>
			<a href="https://twitter.com/<?php echo $autor_tn; ?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Seguir @<?php echo $autor_tn; ?></a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		<?php } ?>
	</div>
<!--	<div class="autorNotaTitulo">
		<p>MÁS SOBRE EL AUTOR</p>
	</div>
-->
	<div class="autorNotaDescripcion">
		<?php the_author_meta('user_description'); ?>
	</div>
</section>