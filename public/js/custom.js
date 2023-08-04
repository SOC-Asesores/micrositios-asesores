$('.social-sharing-container').on('mouseenter',function() {
	$(this).addClass('hover');
}).on('mouseleave',function() {
	$(this).removeClass('hover');
}).on('click',function(e) {
	e.preventDefault();
	e.stopPropagation();

	let item = $(this);
	if($(item).hasClass('hover') && $(window).width() < 768){
		$(item).removeClass('hover');
	} else if($(window).width() < 768){
		$(item).addClass('hover');
	}
});

$('#register_btn').on('click',function(e) {
	e.preventDefault();
	let cont_h = $('#toggle_container').outerHeight();
	$('#toggle_container').addClass('clicked').css('max-height',cont_h);
});

$('#back_btn').on('click',function(e) {
	e.preventDefault();
	let cont_h = $('#toggle_container').outerHeight();
	// $('#toggle_container').css('min-height',cont_h+'px');
	$('#toggle_container').removeClass('clicked');
	setTimeout(function() {
		// $('#toggle_container').animate({minHeight:'0px'},600);
	},500);
});

setInterval(function() {
	$('[data-date]').each(function(){
		var item = $(this);

		var arregloFecha = $(item).data('date').split("/");
		var anio = arregloFecha[2];
		var mes = arregloFecha[1] - 1;
		var dia = arregloFecha[0];

			endTime = new Date(anio, mes, dia, 12);
			// endTime = (Date.parse(endTime) / 1000);

			var now = new Date();
			// now = (Date.parse(now) / 1000);

			var timeLeft = endTime.getTime() - now.getTime();
			var timeLeft = timeLeft / 1000;

			var days = Math.floor(timeLeft / 86400); 
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
  
			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }

			$(item).find('.timer-days').html(days);
			$(item).find('.timer-hours').html(hours);
			$(item).find('.timer-min').html(minutes);
	});
}, 1000);