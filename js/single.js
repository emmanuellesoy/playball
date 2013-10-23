$(document).ready(function()
{
	var h = parseInt($('.cuadroUno a').css('height'));
	var mar = 385 - h;
	$('.cuadroUno a').css('margin-top', mar);
});

function desaparecer_titulo(){
	$('.cuadroUno a, .cuadroUnoFondo').hide('fade');
}
function desaparecer_titulo_id(id){
	$('#titulo_' + id + ', #fondo_' + id).hide('fade');
}

/* Traer más post en listados por categoria */

function traer_mas(query)
{
	var pg = $('.verMasResultados').attr('data-paged');
	var ps = $('.verMasResultados').attr('data-pages');
    //$('.verMasResultados').html('Cargando...');
    //$('.verMasResultados').attr('disabled', 'disabled');
	query = query + '&paged=' + pg;
	pg = parseInt(pg) + parseInt(1);
	var json_to_send = {action : 'traer_mas', query : query};
    var uri = wp_url+'/wp-admin/admin-ajax.php';
	$.ajax({
	    url : uri,
	    type : 'POST',
	    data : json_to_send,
	    success : function(data){
	        $('#resultadosElementos').append(data);
	        $('.verMasResultados').attr('data-paged', pg);
        	ps = parseInt(ps) - parseInt(1);
            if(ps > 0){
		        $('.verMasResultados').attr('data-pages', ps);
		        //$('.verMasResultados').html('Ver más resultados');
	            //$('.verMasResultados').removeAttr('disabled');
    	    } else {
		        $('.verMasResultados').hide();
		    }
	    }
	});
}

$(document).ready(function(){var e=$(".entry_author_image").html();if(e==""){$(".autorNota").hide();}});