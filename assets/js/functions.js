$(document).ready(function () {
	if($('body').is('.pg-home')) {
		$.get('http://webservice.enfoque.com.br/wsHORUSGGR/Cotacoes.asmx/CotacaoOnLineXML', { 
			login: "HORUSGGR", 
			senha: "Quotes2018" 
		}, function(response){
			var tpl = '';
			var cotacoes = [];

	        tpl += '<div>';

			$(response).find("AtivoEGS").each(function () {
				var DATA = $(this).attr('DATA');
				var COD = $(this).attr('COD');
				var ULT = $(this).attr('ULT');
				var HOR = $(this).attr('HOR');
				var VAR = $(this).attr('VAR');
				var MAX = $(this).attr('MAX');
				var MIN = $(this).attr('MIN');
				var FEC = $(this).attr('FEC');
				var ABE = $(this).attr('ABE');
				var NEG = $(this).attr('neg');
				var MED = $(this).attr('med');
				var QTT = $(this).attr('QTT');

				cotacoes.push({
					DATA: DATA,
					COD: COD,
					ULT: ULT,
					HOR: HOR,
					VAR: VAR,
					MAX: MAX,
					MIN: MIN,
					FEC: FEC,
					ABE: ABE,
					NEG: NEG,
					MED: MED,
					QTT: QTT,
				});
			});

	        $.each(cotacoes, function(index, value){
	        	if(index === cotacoes.length - 1) {
	        		tpl += '<div><span>Última Atualização</span> <small>'+value.DATA + ' - ' + value.HOR +'</small></div>';
	        	}
	        });	

	        tpl += '<div>';
		        $.each(cotacoes, function(index, value){
		        	tpl += '<div>';
		        		tpl += '<span>'+value.COD+'</span>';
		        		tpl += '<span>R$ '+value.MAX+' <small class="'+( (value.VAR.slice(0,1) === '+') ? 'pos' : 'neg' )+'">'+value.VAR+'</small></span>';
		        	tpl += '</div>';
		        });	
	        tpl += '</div>';	
	        
	        tpl += '</div>';

	        $('#footer').children().append(tpl);
		});	
	}
});
      
