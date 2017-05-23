$(document).ready(function(){
	var selectedChampion = '';
	var currentChampion = $('#AshkaInfo');

	/*
	if ($(".index").length > 0) {
    	$('.headerIndex').addClass('headerSelected');
    	$selected = $('.headerIndex');
	}

	if ($(".catalog").length > 0) {
    	$('.headerCatalog').addClass('headerSelected');
    	$selected = $('.headerCatalog');
	}

	if ($(".new").length > 0) {
    	$('.headerNew').addClass('headerSelected');
    	$selected = $('.headerNew');
	}

	if ($(".list").length > 0) {
    	$('.headerNew').addClass('headerSelected');
    	$selected = $('.headerList');
	}*/

	$('.headerItem').on('mouseenter', function(){
		$(this).addClass('headerSelected');
	});

	$('.headerItem').on('mouseleave', function(){
		//if($(this)!==$selected){
			$(this).removeClass('headerSelected');
		//}
	});

	currentChampion.removeClass('hidden');
	currentChampion.removeClass('visuallyHidden');

	$('#Ruh_KaanInfo h2').each(function() {
    var $this = $(this);

    $this.text($this.text().replace(/_/g, ' '));
	});

	$('h3').each(function() {
    var $this = $(this);

    $this.text($this.text().replace(/_/g, ' '));
	});

	$('.imagen_videojuego').on('click', function(){
		selectedChampion = $('#' + $(this).attr('id') + 'Info');

		if(selectedChampion !== currentChampion){
			currentChampion.addClass('visuallyHidden');

			currentChampion.on('transitionend', function(e) {
				
				currentChampion.addClass('hidden');

				selectedChampion.removeClass('hidden');

				setTimeout(function(){
					selectedChampion.removeClass('visuallyHidden');
				}, 8);

				currentChampion = selectedChampion;
			});
		}
	});
});