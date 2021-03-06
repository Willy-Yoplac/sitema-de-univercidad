/* Spanish translation for the jQuery Timepicker Addon */
/* Written by Ianaré Sévi */
/* Modified by Carlos Martínez */
(function($) {
	$.timepicker.regional['es'] = {

		timeOnlyTitle: 'Elegir una hora',
		timeText: 'Hora',
		hourText: 'Horas',
		minuteText: 'Minutos',
		secondText: 'Segundos',
		millisecText: 'Milisegundos',
		microsecText: 'Microsegundos',
		timezoneText: 'Uso horario',
		currentText: 'Hoy',
		closeText: 'Cerrar',
		prevText: 'Atras',
    	nextText: 'Siguiente',
		timeFormat: 'HH:mm',
		timeSuffix: '',
		amNames: ['a.m.', 'AM', 'A'],
		pmNames: ['p.m.', 'PM', 'P'],		
    	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    	dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
    	dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
    	dayNamesMin: ['D','L','M','M','J','V','S'],
		isRTL: false
	};
	$.timepicker.setDefaults($.timepicker.regional['es']);
})(jQuery);
