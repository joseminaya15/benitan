var $win = $(window);
$win.scroll(function () {
	if ($win.scrollTop() > 45) {
		$(".navbar-default").addClass("navbarcolor");
	} else {
		$(".navbar-default").removeClass("navbarcolor");
	}
});
$('a.link[href^="#"]').click(function(e) {
 	var target = $(this).attr('href');
 	var strip = target.slice(1);
 	var anchor = $("section[id='" + strip + "']");
 	e.preventDefault();
 	y = (anchor.offset() || {
 		"top" : NaN
 	}).top;
 	$('html, body').animate({
 		scrollTop : (y - 40)
 	}, 'slow');
});
function sendContact(){
	var nameContact    = $('#nameContact').val();
	var reachContact   = $('#reachContact').val();
	var messageContact = $('#messageContact').val();
	if(nameContact == null || nameContact == '') {
		msj('error', 'Name must be completed');
		return;
	}
	if(reachContact == null || reachContact == '') {
		msj('error', 'Reach must be completed');
		return;
	}
	if(messageContact == null || messageContact == '') {
		msj('error', 'Message must be completed');
		return;
	}
	$.ajax({
		data : {NameContact	    : nameContact,
			    ReachContact	: reachContact,
			    MessageContact 	: messageContact},
		url  : 'home/registerContact',
		type : 'POST'
	}).done(function(data){
		try {
			data = JSON.parse(data);
			if(data.error == 0){
				$('.jm-input').find('.form-control').val('');
				msj('success', data.msj);
        	}else{
        		msj('error', data.msj);
        		return;
        	}
		} catch (err) {
			msj('error', err.message);
		}
	});
}
function sendShared(){
	var nameShared     = $('#nameShared').val();
	var locationShared = $('#locationShared').val();
	var socialShared   = $('#socialShared').val();
	var messageShared  = $('#messageShared').val();
	if(nameShared == null || nameShared == '') {
		msj('error', 'Name must be completed');
		return;
	}
	if(locationShared == null || locationShared == '') {
		msj('error', 'Location must be completed');
		return;
	}
	if(socialShared == null || socialShared == '') {
		msj('error', 'Social must be completed');
		return;
	}
	if(messageShared == null || messageShared == '') {
		msj('error', 'Message must be completed');
		return;
	}
	$.ajax({
		data : {NameShared	    : nameShared,
			    LocationShared	: locationShared,
				SocialShared 	: socialShared,
				MessageShared 	: messageShared},
		url  : 'home/registerShared',
		type : 'POST'
	}).done(function(data){
		try {
			data = JSON.parse(data);
			if(data.error == 0){
				$('.jm-input').find('.form-control').val('');
				msj('success', data.msj);
        	}else{
        		msj('error', data.msj);
        		return;
        	}
		} catch (err) {
			msj('error', err.message);
		}
	});
}
function verificarDatos(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		ingresar();
    }
}