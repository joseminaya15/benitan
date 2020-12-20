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
 	var anchor = $(".jm-select--section[id='" + strip + "']");
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
				$('.m-input').find('.form-control').val('');
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
const openReserved = (element) => {
	const product = element.attr('data-product');
	$('#ModalReserved').attr('data-product',product);
	$('#ModalReserved').modal('show');
}
const sendReserved = () => {
	const product    = $('#ModalReserved').attr('data-product');
	const firstname  = $('#firstname').val();
	const lastname   = $('#lastname').val();
	const email      = $('#email').val();
	const phone      = $('#phone').val();
	console.log(product);
	if(firstname == null || firstname == '') {
		msj('error', 'First Name must be completed');
		return;
	}
	if(lastname == null || lastname == '') {
		msj('error', 'Last Name must be completed');
		return;
	}
	if(email == null || email == '') {
		msj('error', 'Email Address must be completed');
		return;
	}
	if(phone == null || phone == '') {
		msj('error', 'Phone must be completed');
		return;
	}
	$.ajax({
		data : {Product   : product,
				FirstName : firstname,
			    LastName  : lastname,
				Email 	  : email,
				Phone 	  : phone},
		url  : 'home/registerReserved',
		type : 'POST'
	}).done(function(data){
		try {
			data = JSON.parse(data);
			if(data.error == 0){
				$('.m-input').find('.form-control').val('');
				$('#ModalReserved').modal('hide');
				msj('success', 'Successful reserve');
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