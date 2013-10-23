<script type="text/javascript">
	var wu = '<?php bloginfo('wpurl'); ?>';
	var wut = '<?php bloginfo('template_directory'); ?>';
</script>
<script type="text/javascript">
    var wp_url = "<?php bloginfo('wpurl'); ?>";
    var tp_url = "<?php bloginfo('template_directory'); ?>";
    var b = "<?php echo get_permalink(); ?>";
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/carrusel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/premiar.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/single.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/titulos.js"></script>
<script type="text/javascript">
	function caragr_frame_estadisticas(url)
	{
    	$("#frame").attr("src", url).css( {"height": "750px"} );
	}
</script>
<?php wp_footer(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		/* Si la nota es muy pequeña oculta ´parte del sidebar */
		var the = $('.cajaNotaInterna').css('height');
		var lo = the.length;
		lo = lo - 2;
		the = the.substring(0, lo);
		if(the >= 450){
			$('.notasColumnaReciente').slideDown();
		}
		if(the >= 850){
			$('.comoHoyInterna').slideDown();
		}
		if(the >= 1400){
			$('.lineUpSubUno').slideDown();
		}
	});
	</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-44570211-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>