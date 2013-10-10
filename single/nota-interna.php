<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="notaInternaDemas">
		<div class="todoNotaInterna">
			<section class="cuadroUno">
				<?php
					$custom_fields = get_post_custom();
					$videoLink = $custom_fields['video'][0];
				?>
				<?php
					if($videoLink){
						if($custom_fields['mlb'][0] == 'Si'){
							$pos = strpos($videoLink, '&width=');
							$videoLink = substr_replace($videoLink, '&width=728', $pos, 10);
							$pos = strpos($videoLink, '&height=');
							$videoLink = substr_replace($videoLink, '&height=395', $pos, 11);
						}
						echo $videoLink;
					} elseif ( has_post_thumbnail() ){
						echo '<div class="cuadroUnoFondo"></div>';
						 the_post_thumbnail(); 
					}
				?>
		        <a href="<?php echo get_permalink(); ?>" title="Leer más sobre <?php the_title(); ?>" class="cuadroUnoA" >
					<?php the_title(); ?>
				</a>
				<!--Termina cuadroUnoA -->
			</section>
			<!-- Termina cuadroUno-->
			<section class="cajaNotaInterna">
				<div class="autorNotaInterna">
					<h4>
						POR
					</h4>
					<?php $autor_tn = get_the_author_meta( 'twitter' ); ?>
					<div class="cajaTwiterAutor">
						<a href="http://twitter.com/<?php echo $autor_tn; ?>" title="<?php the_author(); ?>" target="_blank">
							<?php the_author(); ?>
						</a>
					</div>
							<a href="http://twitter.com/<?php echo $autor_tn; ?>" title="<?php the_author(); ?>" target="_blank">
								<div class="twit"></div>
							</a>
						<div class="cajaFechaNotaInterna">
							| <?php the_date(); ?>
						</div>
						
				</div>
				<!-- Termina cajaNotaInterna -->
				<div class="cajaRedesSocial">
					<div class="cajaRedesFace">
				        <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&amp;send=false&amp;layout=button_count&amp;width=70&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=90&amp;appId=279290438845254" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:90px;" allowTransparency="true"></iframe>
					</div>
					<!-- Termina cajaRedesFace -->
					<div class="cajaRedesTwit">
				        <a href="https://twitter.com/share" class="twitter-share-button" data-via="Pelotapimienta" data-lang="es">Twittear</a>
				        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
					<!-- Termina cajaRedesTwit -->
					<div class="cajaRedesGoo">
						<div class="g-plusone" data-size="medium"></div>
					    <script type="text/javascript">
					      window.___gcfg = {lang: 'es'};

					      (function() {
					        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					        po.src = 'https://apis.google.com/js/plusone.js';
					        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					      })();
					    </script>
					</div>
					<!-- Termina cajaRedesGoo -->
					<!--
					<div class="cajaHit">
						<img src="<?php bloginfo('template_url'); ?>/img/btnpegahitminiclic.png" alt="#" title="#">
					</div>
					-->
					<!-- Termina cajaHit -->
					<?php $adjacent_post = get_adjacent_post(false, '', true) ; ?>
				    <?php $post_id = $adjacent_post->ID; ?>
						<a href="<?php echo get_permalink($post_id); ?>">
							<div class="cajaNotaAnterios">
							</div>
						</a>
						<?php $adjacent_post = get_adjacent_post(false, '', false) ; ?>
					    <?php $post_id = $adjacent_post->ID; ?>
						<a href="<?php echo get_permalink($post_id); ?>">
							<div class="cajaNotaSiguente">
							</div>
						</a>
				</div>
				<!-- Termina cajaRedesSociales -->
				<?php if($custom_fields['audio'][0]){ ?>
				<section id="radioPimienta" class="radioPimienta radioPimientaInterna">
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
				</section>
				</script>
				<?php } ?>
				<!-- Termina cajaReproductorRadioPimienta -->
				<div class="textoNota">
					<?php the_content(); ?>
				</div>
				<!-- Termina textoNota-->
				<!--
				<div class="seccionCompartir">
					<div class="compartirFace">
					
					</div>
					<div class="compartirHit">
						<img src="<?php bloginfo('template_url'); ?>/img/btnhit.png" alt="#" title="#">
					</div>
					<div class="compartirtwit">
					</div>
				</div>
				-->
				<!-- Termina seccionCompartir-->
			</section>
			<!-- Termina cajaNotaInterna-->
		</div>
		<section class="tikiTaca">
				<h4>
					TIKI TAKA SPORTS NETWORK
				</h4>
				<div class="imagenesTiki">
					<div class="flechaIzquierda">
					</div>
					<div class="imagenTiki">
						<a href="#" alt="#" title="#">
						<img src="<?php bloginfo('template_url'); ?>/img/beisbol.jpg" alt="#" title="#">
						</a>
						<div class="notaTikiUno">
							<a href="#" alt="#" title="#">
							La estrategia Götze-Nike habría sido una venganza
							</a>
						</div>
					</div>
					<!-- Termina imagenTiki -->
					<div class="imagenTikiDos">
						<a href="#" alt="#" title="#">
						<img src="<?php bloginfo('template_url'); ?>/img/beisbol.jpg" alt="#" title="#">
						</a>
						<div class="notaTikiDos">
							<a href="#" alt="#" title="#">
								El muendial en invierno retoma fuerza
							</a>
						</div>
					</div>
					<!-- Termina imagenTikiDos -->
					<div class="imagenTikiTres">
						<a href="#" alt="#" title="#">
						<img src="<?php bloginfo('template_url'); ?>/img/beisbol.jpg" alt="#" title="#">
						</a>
						<div class="notaTikiTres">
							<a href="#" alt="#" title="#">
							Gamaliel Diaz, listo para defnder su corona
							</a>
						</div>
					</div>
					<!-- Termina imagenTikiTres -->
					<div class="flechaDerecha">
					</div>
				</div>
				<!-- Termina imagenesTiki -->
		</section>
		<!-- Termina tikiTaka-->
		<section class="cajaFacebook">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_MX/all.js#xfbml=1&appId=366667626772412";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<?php $permalink = get_permalink(); ?>
			<div class="fb-comments" data-href="<?php echo $permalink; ?>" data-width="728" data-num-posts="50"></div>
		</section>
		<!-- Termina cajaFacebook -->
	</div>
	<!-- Termina notaInternaDemas-->
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_template_part('single/single', 'sidebar');