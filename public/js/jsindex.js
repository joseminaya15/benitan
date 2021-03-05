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
const validateEmail = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
const sendContact = () => {
	var nameContact    = $('#nameContact').val();
	var emailContact   = $('#emailContact').val();
	var phoneContact   = $('#phoneContact').val();
	var messageContact = $('#messageContact').val();
	if(nameContact == null || nameContact == '') {
		$('#nameContact').parent().find('label').addClass('active');
		$('#nameContact').parent().find('label').text('Name must be completed');
		return;
	}
	if(emailContact == null || emailContact == '') {
		$('#emailContact').parent().find('label').addClass('active');
		$('#emailContact').parent().find('label').text('Email must be completed');
		return;
	}
	if(!validateEmail(emailContact)){
		$('#emailContact').parent().find('label').addClass('active');
		$('#emailContact').parent().find('label').text('The mail format is not correct');
		return;
	}
	if(messageContact == null || messageContact == '') {
		$('#messageContact').parent().find('label').addClass('active');
		$('#messageContact').parent().find('label').text('Message must be completed');
		return;
	}
	$('.m-loading').addClass('active');
	$.ajax({
		data : {NameContact	    : nameContact,
			    EmailContact	: emailContact,
			    PhoneContact	: phoneContact,
			    MessageContact 	: messageContact},
		url  : 'home/registerContact',
		type : 'POST'
	}).done(function(data){
		try {
			data = JSON.parse(data);
			if(data.error == 0){
				$('.m-loading').removeClass('active');
				$('.m-input').find('.form-control').val('');
				$('.m-input').find('label').removeClass('active');
				msj('success', data.msj);
        	}else{
				$('.m-loading').removeClass('active');
        		msj('error', data.msj);
        		return;
        	}
		} catch (err) {
			$('.m-loading').removeClass('active');
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
		$('#firstname').parent().find('label').addClass('active');
		$('#firstname').parent().find('label').text('First Name must be completed');
		return;
	}
	if(lastname == null || lastname == '') {
		$('#lastname').parent().find('label').addClass('active');
		$('#lastname').parent().find('label').text('Last Name must be completed');
		return;
	}
	if(email == null || email == '') {
		$('#email').parent().find('label').addClass('active');
		$('#email').parent().find('label').text('Email Address must be completed');
		return;
	}
	if(!validateEmail(email)){
		$('#email').parent().find('label').addClass('active');
		$('#email').parent().find('label').text('The mail format is not correct');
		return;
	}
	$('.m-loading').addClass('active');
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
				$('.m-loading').removeClass('active');
				$('.m-input').find('.form-control').val('');
				$('.m-input').find('label').removeClass('active');
				$('#ModalReserved').modal('hide');
				msj('success', 'Successful reserve');
        	}else{
				$('.m-loading').removeClass('active');
        		msj('error', data.msj);
        		return;
        	}
		} catch (err) {
			$('.m-loading').removeClass('active');
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