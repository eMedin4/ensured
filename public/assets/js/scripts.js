

$(document).ready(function() {

	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});

	$('.btn-vote').on('click', function() {

		var t = $(this);
		var id = t.data('id');
		var url = t.data('url');

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'post_id': id }
		})
		.done(function(data) {
			var oldcount = t.find('.vote-count').text();
			var newcount = parseInt(oldcount) + 1;
			t.find('.vote-count').text(newcount);
		});

	});

/*
	DROPDOWN MENU
*/
	$('html').click(function() {
		$('.dropdown').removeClass('open');
	});
	
	$('.dropdown').on('click', function(event) {
		event.stopPropagation();
		$(this).toggleClass('open');
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
			 dateFormat: 'dd/mm/yy',
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

	    $('#pick-multi-dates').multiDatesPicker({
	    	minDate: 2
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

}); /*document ready*/