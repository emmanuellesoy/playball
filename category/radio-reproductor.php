<!-- Comienza Audio Aqui -->
<?php $misCampos = get_post_custom(); ?>
<?php $audioFile = $misCampos['audio'][0]; ?> 
<script type="text/javascript"> 
	var af_<?php echo get_the_ID(); ?> = '<?php echo $audioFile; ?>'; 
	</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/audio5.min.js"></script>
<div class="cajaReproductorRadioPimienta">
	<div id="play-pause-<?php echo get_the_ID(); ?>" class="cajaReproductorImagen">
	</div>
	<div id="moveleft-<?php echo get_the_ID(); ?>" class="cajaAdelantarImagen">
	</div>
	<div id="fordward-<?php echo get_the_ID(); ?>" class="cajaRegresarImagen">
	</div>
	<div class="cajaDuracion">
		<div class="cajaPosition"></div>
	</div>
	<div id="tiempoTranscurrido-<?php echo get_the_ID(); ?>" class="tiempoTranscurrido">
		00:00
	</div>
	<div id="duracionTransmision-<?php echo get_the_ID(); ?>" class="duracionTransmision">
		00:00
	</div>
</div>
<!-- Termina cajaReproductorRadioPimienta -->

<object width="0" height="0">
	<param name="movie" value="<?php bloginfo('template_directory'); ?>/swf/audio5js.swf">
	<embed src="<?php bloginfo('template_directory'); ?>/swf/audio5js.swf" width="0" height="0">
	</embed>
</object>
<script>
	$('#play-pause-<?php echo get_the_ID(); ?>').click(function(){
		var c = $(this).attr('class');
		if(c == 'cajaReproductorImagen'){
			$(this).attr({class: 'cajaReproductorImagenActivo'});
		} else {
			$(this).attr({class: 'cajaReproductorImagen'});
		}
		$('.cajaDuracion').css('background-color', '#071A38');
	});
	var loaded_<?php echo get_the_ID(); ?> = false;

	var playPause_<?php echo get_the_ID(); ?> = function () {
		if (!loaded_<?php echo get_the_ID(); ?>) {
			this.on('canplay', function () {
				loaded_<?php echo get_the_ID(); ?> = true;
				this.play();
			}, this);
				this.load(af_<?php echo get_the_ID(); ?>);
			} else {
				this.playPause();
		}
		this.on('timeupdate', function (position, duration) {
			$('#tiempoTranscurrido-<?php echo get_the_ID(); ?>').html(position);
			$('#duracionTransmision-<?php echo get_the_ID(); ?>').html(duration);
			
			duration = duration.split(':');
			
			duration = (parseFloat(duration[0]) * 60) + (parseFloat(duration[1]));
			
			position = position.split(':');

			position = (((parseFloat(position[0]) * 60) + (parseFloat(position[1]))) * 100) / duration;
			
			position = Math.floor(position * 5.4);

			$('.cajaPosition').css({width: position});
	  	
	  	}, this);

		this.on('progress', function (load_percent) {

			cargado = load_percent * 5.4;

			$('.cajaDuracion').css({width: cargado});

		}, this);

		this.on('ended', function () { $(this).attr({class: 'play'}); }, this);
		
	}

 	var moveToStart_<?php echo get_the_ID(); ?> = function () {
			
 		var position = this.position;

		position = position.split(':');

		position = (parseFloat(position[0]) * 60) + (parseFloat(position[1]));

		position = parseInt(position) + parseInt(15) ;

		this.seek(position);
  	
  	}

  	var moveleft_<?php echo get_the_ID(); ?> = function () {
			
 		var position = this.position;

		position = position.split(':');

		position = (parseFloat(position[0]) * 60) + (parseFloat(position[1]));

		position = parseInt(position) - parseInt(15) ;

		this.seek(position);
  	
  	}

	var audio5js_<?php echo get_the_ID(); ?> = new Audio5js({
		swf_path: '<?php bloginfo('template_directory'); ?>/swf/audio5js.swf',
		format_time: true,
		ready: function () {
			var ply = document.getElementById('play-pause-<?php echo get_the_ID(); ?>');
			ply.addEventListener('click', playPause_<?php echo get_the_ID(); ?>.bind(this), false);
			var fwd = document.getElementById('fordward-<?php echo get_the_ID(); ?>');
			fwd.addEventListener('click', moveToStart_<?php echo get_the_ID(); ?>.bind(this), false);
			var rwd = document.getElementById('moveleft-<?php echo get_the_ID(); ?>');
			rwd.addEventListener('click', moveleft_<?php echo get_the_ID(); ?>.bind(this), false);

		}
	});
</script>