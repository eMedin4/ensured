

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
			if (data.state) {
				t.removeClass('launch-votepost').addClass('idle-votepost');	
				t.find('.fa').removeClass('fa-triangle-up').addClass('fa-check-bts');
				t.find('.count-votes').text(data.count);
			} else {
				var html = "<div>Error</div><p>" + data.message + "</p>";
				$('.popup').html(html);
				$('.popup, .popup-back').fadeIn(300);
			}
		});

	});

	$('.popup-back').on('click', function() {
		$('.popup, .popup-back').fadeOut(300);
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
console.log('hola');


/*
	MOSTRAR MENÚ LISTAS EN POSTS
*/

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

				var html = "<tr class='launch-save-collection' data-id=" + val.id + ">" +
					"<td class='td-icon icon-collection relative'>" + icon1 + "</td>" +
					"<td>" + val.title + "</td>" +
					"<td class='td-icon permission-collection relative'>" + icon2 + "</td>" +
					"</tr>";
				$('.table-collection tbody').append(html);
			});

		});

	});


/* 
	GUARDAR POST EN UNA LISTA 
*/


	$('.table-collection').on('click', '.launch-save-collection',  function() {
		
		var t = $(this);
		var row = t.parent().parent();
		var url = row.data('url');
		var post_id = row.data('post-id');
		var collection_id = t.data('id');
		var actualIcon = t.find('.icon-collection i').attr('class');

		$.ajax({
			url: url,
			type: 'POST',
			data: { 'post_id': post_id, 'collection_id': collection_id },
			beforeSend: function() { t.find('.icon-collection i').removeClass().addClass('fa fa-spin fa-circular-graph'); }
		})
		.done(function(data) {
			t.find('.icon-collection i').removeClass().addClass('fa fa-check-bts');
			t.removeClass('launch-save-collection').addClass('done-collection');
		})
		.fail(function() {
			alert('ha fallado');
		})
		.always(function() {

		});

	});

/*
	AÑADIR UNA NUEVA LISTA
*/

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
	MOSTAR SUB-MENU LISTAS EN HEADER
*/

$('.launch-menu-collections').on('click', function() {

	var t = $(this);
	var url = t.data('url');

	$.ajax({
		url: url,
		type: 'POST'
	})
	.done(function(data) {

		$('.header-collections').html('');

		$.each(data.collections, function(key, val) {
			if (val.title == 'favoritos') {
				var icon1 = "<i class='fa fa-favorite-border'></i>";
			} else {
				var icon1 = "<i class='fa fa-folder-open'></i>";
			}
			var html = "<a href='http://localhost/ensured/public/listas/" + val.id + "/" + val.title +"'>" + icon1 + val.title + "</a>";
			$('.header-collections').append(html);
		});
	})
	.fail(function(data) {

	});

});







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


/*
	RESPONSIVE DESIGN
*/

	$('.nav-responsive').on("click", function(e){
        e.preventDefault();
        $(this).toggleClass('nav-show');
        $('.primary-menu').toggleClass('open');
        $('.home-wrap').toggleClass('home-wrap-toggle');
    });

/*	$('.map-responsive').on('click', function(e){
		e.preventDefault();
		$('.map-wrap').toggleClass('map-wrap-toggle');
		var text = $(this).text();
		$(this).text(text == 'Ver en mapa' ? 'Ocultar mapa' : 'Ver en mapa');
	});*/



/*NEW SCRIPTS*/

/*
	MENU HEADER
*/

  	$('.launch-dd-menu').on('click', function() {
  		$('.launch-dd-menu').removeClass('open');
      	$('.dd-menu').removeClass('open-menu');
  		var t = $(this);
  		t.toggleClass('open');
  		t.siblings('.dd-menu').toggleClass('open-menu');
  	});

  	$('body').on('click', '.launch-dd-menu, .dd-menu', function(e) {
  		e.stopPropagation();
  	});

  	$('.content').on('click', function(){
      	$('.launch-dd-menu').removeClass('open');
      	$('.dd-menu').removeClass('open-menu');
  	});

/*
	MENU SELECTABLE (SEARCH)
*/

  	$('.launch-selectable').on('click', function() {
  		var t = $(this);
  		t.toggleClass('open');
  		t.siblings('.selectable').toggleClass('open-menu');  		
  	});

  	$('.selectable span').on('click', function() {
  		var t = $(this);
  		var select = t.text();
  		$('.launch-selectable').html(select + '<i class="fa fa-triangle-down"></i>').removeClass('open');
  		t.parent('.selectable').removeClass('open-menu');
  	});




/*
	LIVE SEARCH NEW POST
*/

    $('#post-title').bind('change paste keyup', function() {


        var string = $(this).val();
        var ilength = string.length;
        var controller = $(this).data('url');

        if (ilength > 4) {

            $.ajax({
                url: controller,
                type: 'POST',
                data: { 'string': string }
            })
            .done(function(data) {
            	if (data.count) {
            		$('.livesearch').html('<div class="inner"><div class="livesearch-head">Comprueba si tu contenido está repetido:</div><ul></ul></div>');
                    $.each(data.posts, function(key,val){
                    var html = "<li><a href='http://localhost/enlivener/public/evento/" + val.id + "'>" + val.title + "</a></li>";
                    $('.livesearch ul').append(html);
                });
            	} else {
            		$('.livesearch').html('');
            	}

            })
            .fail(function() {
            	console.log('fail');
            });
        }
    });



    $('#post-title').focus(function() {
    	$('.livesearch').show();
    });
 
     $('#post-title').blur(function() {
     	$('.livesearch').hide();
    	var string = $(this).val();
        var ilength = string.length;
        var controller = $('#myTags').data('url');

        if (ilength > 3) {

            $.ajax({
                url: controller,
                type: 'POST',
                data: { 'string': string }
            })
            .done(function(data) {
            	$('.tagsearch').html('<span>Sugeridas:</span>');
            	$.each(data, function(key,val){
            		var html='<span class="tag">' + val + '</span>';
            		$('.tagsearch').append(html);
            	});

            })
            .fail(function() {
            	console.log('fail');
            });
        }
    });


     $('.input-tags').focus(function() {
     	if($(this).text() == 'Etiquetas') {
     		$(this).text('');
     	}
     	$(this).addClass('focus');
     });

     $('.input-tags').blur(function() {
     	if($(this).text() === "") {
     		$(this).text('Etiquetas');
     	}
     	$(this).removeClass('focus');
     });


    





    if($('body').is('.createpage')) {

	    $("#myTags").tagit({
	     	fieldName: "tags[]",
		    availableTags: tags,
		    removeConfirmation:true,
	    	placeholderText:"Etiquetas"
		});

	    /* Rellenar tags automáticamente cuando el forumlario crear devuelve error */
	    var oldtagslength = oldtags.length;
	    if (oldtagslength > 0) {
	    	for (var i=0; i<oldtagslength; i++) {
	    		$("#myTags").tagit("createTag", oldtags[i]);
	    	}
	    }

	     $('.tagsearch').on('click', '.tag', function(e) {
	     	var tag = $(this).text();
	     	$("#myTags").tagit("createTag", tag);
	     });    	
    	
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
	        $('.js-datestype').hide();
	        $('.content-'+selected).show();
	    }); 

	    if($('#radio-interval-dates').is(':checked')) {
	        $('.js-datestype').hide();
	        $('.content-interval-dates').show();
	    }

	    if($('#radio-multi-dates').is(':checked')) {
	        $('.js-datestype').hide();
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

/* POPUP DE CONFIRMACIÓN PARA VOTOS NEGATIVOS */

$('.report').on('change', function() {
	var option = $(this).val();
	var html = "<div>¿Desdeas votar " + option + "?</div><button class='btn launch-votepost-report'>Si</button><button class='btn'>No</button>";
	$('.popup').html(html);
	$('.popup, .popup-back').fadeIn(300);
});

$('.popup').one('click', '.launch-votepost-report', function() {

	var report = $('.report');
	var id = report.data('id');
	var url = report.data('url');
	var option = report.val();

	$.ajax({
		url: url,
		type: 'POST',
		data: { 'post_id': id, 'option': option }
	})
	.done(function(data) {
		console.log('echo');
	});

});



}); /*document ready*/



