<?php wp_footer(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		/*
		var he = $('.cuadroUnoA').css('height');
		var lo = he.length;
		lo = lo - 2;
		he = he.substring(0, lo);
		var m = 290 - he;
		m = m + 'px';
		$('.cuadroUnoA').css('margin-top', m);
		*/
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
	  _gaq.push(['_setAccount', 'UA-41663141-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>