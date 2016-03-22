

$(document).ready(function() {
/*
	AJAX ZONE
*/

	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});

/*VOTOS*/
	$('.launch-votepost').one('click', function() {

		var t = $(this);
		var id = t.data('id');
		var url = t.data('url');

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'post_id': id }
		})
		.done(function(data) {
			t.removeClass('launch-votepost').addClass('idle-votepost');	
			var oldcount = t.find('.vote-count').text();
			var newcount = parseInt(oldcount) + 1;
			var html = newcount + "<i class='fa fa-check'></i>";
			t.find('.vote-count').html(html);
		});

	});

	$('.vote-comment span').on('click', function() {
		var t = $(this);
		var id = t.parent().data('id');
		var direction = t.data('direction');
		var url = t.parent().data('url');

		$.ajax({
			url:url,
			type: 'POST',
			data: { 'comment_id': id, 'direction': direction }
		})
		.done(function(data) {
			var html = data.count + "<i class='fa fa-check'></i>";
			t.html(html);
		})
		.fail(function() {
			alert('ha fallado');
		});

	});

/*COLECCIONES*/
	$('.launch-collections').on('click', function() {

		var t = $(this);
		var id = t.data('post-id');
		var url = t.data('url');

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'post_id': id }
		})

		.done(function(data) {

			$('.table-collection tbody').html('');

			if(data.count >= 5) {
				html = "<span class='disable-add-collection'>Nueva lista</span>";
				$('.footer-collection').html(html);
			}

			console.log(data);
			
			$.each(data.collections, function(key, val) {

				if (val.title == 'favoritos') {
					var icon1 = "<i class='fa fa-favorite-border'></i>";
				} else {
					var icon1 = "<i class='fa fa-folder-open'></i>";
				}

				if (val.permissions == 0) {
					var icon2 = "<i class='fa fa-earth'></i>";
				} else {
					var icon2 = "<i class='fa fa-lock'></i>";
				}

				var html = "<tr class='launch-save-collection'>" +
					"<td class='td-icon icon-collection relative'>" + icon1 + "</td>" +
					"<td>" + val.title + "</td>" +
					"<td class='td-icon permission-collection relative'>" + icon2 + "</td>" +
					"</tr>";
				$('.table-collection tbody').append(html);
			});

		});

	});

	$('.table-collection').on('click', '.launch-save-collection',  function() {

		var row = $(this).parent().parent();
		var id = row.data('post-id');
		var url = row.data('url');

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'post_id': id }
		})
		.done(function(data) {
			alert(data.name);
		})
		.fail(function() {
			alert('ha fallado');
		})
		.always(function() {

		});

	});

	//parsear desde json, de stackoverflow, muy fiable:
	//var json = '{"result":true,"count":1}',
    //obj = JSON.parse(json);
    //alert(obj.count);

	$('.launch-new-collection').on('submit', function(event) {

		event.preventDefault();

		var t = $(this);
		var url = t.attr('action');
		var title = t.find('.inputcollection').val();
		var permissions = t.find('.permissions').val();

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'title': title, 'permissions': permissions }
		})
		.done(function(data) {
			alert('aceptado');
			$('.dropdown').parent().removeClass('open');
			t.parent('.form-add-collection').hide().siblings('.btn-add-collection').show();

		})
		.fail(function(data) {

			t.find('.errors-collection').html('');
			var errors = data.responseJSON;
			console.log(errors);
			$.each(errors, function(key, val) {
				var html = "<div><i class='fa fa-frown-btm'></i>" + val + "</div>";
				t.find('.errors-collection').append(html);
			});

		})
		.always(function() {

		});
	});


/*
	DROPDOWN MENU
*/

	$('.dropdown').on('click', function(e) {
  		e.stopPropagation();
  		$('.dropdown').parent().removeClass('open');
  		$('.dropdown').removeClass('white');
		$(this).parent().toggleClass('open');
		$(this).toggleClass('white');
	});
  
  	$('html').on('click', '.dropdown-menu', function(e) {
  		e.stopPropagation();
  	});
  
  	$('html').on('click', function(){
      	$('.dropdown').parent().removeClass('open');
      	$('.dropdown').removeClass('white');
  	});




/*
	DATEPICKER & SELECT DATES
*/

    if($('body').is('.createpage')) {
		/*traduccion*/
		$.datepicker.regional['es'] = {
			 closeText: 'Cerrar',
			 prevText: 'Ant',
			 nextText: 'Sig',
			 currentText: 'Hoy',
			 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			 weekHeader: 'Sm',
			 dateFormat: 'dd/mm/y',
			 firstDay: 1,
			 isRTL: false,
			 showMonthAfterYear: false,
			 yearSuffix: ''
		 };
		 $.datepicker.setDefaults($.datepicker.regional['es']);

		/*ocultando o mostrando el single, interval o multi datepicker*/
	    $("input[name$='datestype']").click(function() {
	        var selected = $(this).val();
	        $('.content-box-date').hide();
	        $('.content-'+selected).show();
	    }); 

	    if($('#radio-interval-dates').is(':checked')) {
	        $('.content-box-date').hide();
	        $('.content-interval-dates').show();
	    }

	    if($('#radio-multi-dates').is(':checked')) {
	        $('.content-box-date').hide();
	        $('.content-multi-dates').show();
	    }

	    /*funciones de los datepickers*/
	    var dateToday = new Date();

	    $('#input-single-date').datepicker({
	    	minDate:dateToday
	    });

	    $('#input-from-date').datepicker({
	    	minDate:dateToday,
	    	onClose: function(selectedDate) {
	    		$('#input-to-date').datepicker('option', 'minDate', selectedDate);
	    	}
	    });

	    $('#input-to-date').datepicker({
	    	minDate:dateToday,
	    	onClose: function(selectedDate) {
	    		$('#input-from-date').datepicker('option', 'maxDate', selectedDate);
	    	}
	    });

	    $('.pick-multi-dates').multiDatesPicker({
	    	minDate: 0,
	    	altField: '#input-multi-dates',
	    	onSelect: function() {
	            var text = document.getElementById('input-multi-dates');
	            text.style.height = 'auto';
	            text.style.height = text.scrollHeight+'px';
	    	}
	    });



	};

/*
	MODAL BOX
*/

	$(function(){
	    $(".modal-launcher, .modal-background, .modal-close").click(function() {
	        $(".modal-content, .modal-background").toggleClass("active");
	    });
	});

/*
	SELECT TAGS
*/

	$(function(){
	    $(".disable-tag").click(function() {
	        $(this).toggleClass("disable-tag enable-tag");
	    });
	});

/*
	SHOW INPUT COLLECTIONS
*/

	$('.btn-add-collection').on('click', function() {
		var t = $(this);
		t.hide();
		t.siblings('.form-add-collection').show().find('.inputcollection').focus();
	});


/*
	AUTO RESIZE COMMENT TEXTAREA
*/
	$('.input-comment').focus(function() {
		$(this).animate({height:100}, 'normal');
	}).blur(function() {
		if( !$(this).val() ) {
			$(this).animate({height:62}, 'normal');
		}
	});

/*
	FLASH MESSAGES
*/

	$(function() {
	    setTimeout(function() {
	        $('.flash-message').fadeOut('slow');
	    }, 5000);
	});






}); /*document ready*/