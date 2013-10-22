$(document).ready(function(){
	var hit = $.cookie("hit");
	if(hit == 'true'){
        $('.numeroHits h2, .numeroHits h3, .compartirtwit, .compartirFace').show();
    	$('.numeroHits').attr('data-premio', 'v');
    	$('.numeroHits').css('background-position', '0px');
        $('.compartirHit').css('margin', '0');
	}
});

function premiar(id_post){
	var h = $('#hit-' + id_post).attr('data-premio');
	if(h == 'f'){
		var json_to_send = {action : 'premialo', post_id : id_post};
        var uri = wu + '/wp-admin/admin-ajax.php';
        $.ajax({
            url : uri,
            type : 'POST',
            data : json_to_send,
            success : function(data){
            	$('.numeroHits').css('background-position', '0px');
            	$('.numeroHits h2, .cajaHit').html(data);
            	var word = 'HITS';
            	if(data == 1){
            		word = 'HIT';
            	}
            	$('.numeroHits h3').html(word);
                $('.numeroHits').css('background-position', '0px');
                $('.compartirHit').css('margin', '0');
                $('.numeroHits h2, .numeroHits h3, .compartirtwit, .compartirFace').show('fade', 3000);
            	$.cookie('hit', 'true', { expires: 30 });
    	    	$('.numeroHits').attr('data-premio', 'v');
                $().css('display', 'block')
            }
        });
	}
}