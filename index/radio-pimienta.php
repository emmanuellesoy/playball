<section id="radioPimienta" class="radioPimienta">
<?php query_posts('category_name=radio-pimienta&posts_per_page=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
		<?php
			$custom_fields = get_post_custom();
		?>
			<h2>Radio Pimienta</h2>
    		<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				| <?php the_title(); ?>
			</a>
			<div id="play-pause" class="play"></div>
			<div class="lifeTime">
				<div class="duration"></div>
				<div class="position"></div>
			</div>
			<div class="timeUpdate">00:00</div>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/audio5.min.js"></script>
			<object width="0" height="0">
				<param name="movie" value="<?php bloginfo('template_directory'); ?>/swf/audio5js.swf">
				<embed src="<?php bloginfo('template_directory'); ?>/swf/audio5js.swf" width="0" height="0">
				</embed>
			</object>
			<script>
				$('#play-pause').click(function(){
					var c = $(this).attr('class');
					if(c == 'play'){
						$(this).attr({class: 'pause'});
					} else {
						$(this).attr({class: 'play'});
					}
				});
				var loaded = false;

				var playPause = function () {
					if (!loaded) {
						this.on('canplay', function () {
							loaded = true;
							this.play();
						}, this);
							this.load('<?php echo $custom_fields['audio'][0]; ?>');
						} else {
							this.playPause();
					}
					this.on('timeupdate', function (position, duration) {
						$('.timeUpdate').html(position);
						
						duration = duration.split(':');
						duration = (parseFloat(duration[0]) * 60) + (parseFloat(duration[1]));
						
						position = position.split(':');

						position = (((parseFloat(position[0]) * 60) + (parseFloat(position[1]))) * 100) / duration;
						
						position = Math.floor(position * 4.41);

						$('.position').css({width: position});
				  	
				  	}, this);

					this.on('progress', function (load_percent) {

						cargado = load_percent * 4.41;

						$('.duration').css({width: cargado});

					}, this);

					this.on('ended', function () { console.log('ended'); $(this).attr({class: 'play'}); }, this);
					
					
					
				}

				var audio5js = new Audio5js({
					swf_path: '<?php bloginfo('template_directory'); ?>/swf/audio5js.swf',
					format_time: true,
					ready: function () {
						var btn = document.getElementById('play-pause');
						btn.addEventListener('click', playPause.bind(this), false);
					}
				});
			</script>
	<?php endwhile; ?>
</section>