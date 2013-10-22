<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php $meta = get_post_custom(get_the_ID()); ?>

    <?php $update_readed = $meta['readed'][0] + 1; ?>
	
	<?php add_post_meta(get_the_ID(), '_readed', 1, true) or update_post_meta(get_the_ID(), 'readed', $update_readed); ?>

	<div class="notaInternaDemas">
		<div class="todoNotaInterna">
				<?php
					$custom_fields = get_post_custom();
					$videoLink = $custom_fields['video'][0];
				?>
			<section class="cuadroUno">
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
						 the_post_thumbnail(); 
					}
				?>
				<div class="cuadroUnoFondo" <?php echo($videoLink) ? 'onmouseover="desaparecer_titulo();"' : '' ?>></div>
		        <a href="<?php echo get_permalink(); ?>" title="Leer más sobre <?php the_title(); ?>" class="cuadroUnoA">
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
						<?php the_author_posts_link(); ?>
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
					<?php $meta = get_post_custom(); ?>
					<div class="cajaHit" onclick="premiar(<?php echo get_the_ID(); ?>);">
						<?php echo ($meta['prize'][0]) ? $meta['prize'][0] : 0; ?>
					</div>
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
					<?php get_template_part('category/radio', 'reproductor'); ?>
				<?php } ?>
				<!-- Termina cajaReproductorRadioPimienta -->
				<div class="textoNota">
					<?php the_content(); ?>
				</div>
				<!-- Termina textoNota-->
				
				<div class="seccionCompartir">
				<?php $imagen = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full'); ?>
				<?php $ruta_imagen = $imagen[0]; ?>
	            <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo get_permalink( get_the_ID() ); ?>&p[title]=<?php echo get_the_title(get_the_ID()); ?>&p[summary]=<?php echo (!empty($entrada)) ? $entrada : entradas(the_excerpt(), 1); ?>&p[images][0]=<?php echo $ruta_imagen; ?>" target="_blank" title="Compartelo en Facebook">
					<div class="compartirFace"></div>
				</a>
					<div class="compartirHit">
						<div id="hit-<?php echo get_the_ID(); ?>" data-premio="f" class="numeroHits" onclick="premiar(<?php echo get_the_ID(); ?>);">
							
							<h2>
								<?php echo $meta['prize'][0]; ?>
							</h2>
							<h3>
								<?php echo ($meta['prize'][0] == 1) ? 'HIT' : 'HITS'; ?>
							</h3>

						</div>
					</div>
	            <?php $title = cuenta_recorta(get_the_title(get_the_ID())); ?>
	            <?php $twitter_url = $title.'+'.urlencode(get_permalink(get_the_ID()).' via @Pelotapimienta'); ?>
    	        <a class="left-sidebar-share-floating-icon twitter" target="_blank" href="http://twitter.com/home?status=<?php echo $twitter_url ?>" title="Compartelo en Twitter">
					<div class="compartirtwit"></div>
				</a>
				</div>
				
				<!-- Termina seccionCompartir-->
			</section>
			<!-- Termina cajaNotaInterna-->
		</div>
<!--
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
				-->
					<!-- Termina imagenTiki -->
					<!--
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
				-->
					<!-- Termina imagenTikiDos -->
					<!--
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
				-->
					<!-- Termina imagenTikiTres -->
					<!--
					<div class="flechaDerecha">
					</div>
				</div>
			-->
				<!-- Termina imagenesTiki -->
	<!--	</section> -->
	
		<!-- Termina tikiTaka-->
		<section id="c" class="cajaFacebook">
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