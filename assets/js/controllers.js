var Controller = {
    getController: function () {
        if ($('body').attr('data-controller')) {
            eval('Controller.' + $('body').attr('data-controller') + '();');
        }
    },
    global: function () {
        $(document).mouseup(function (e)
        {
            var container = $('.modal-inner');

            if (!container.is(e.target) 
                && container.has(e.target).length === 0)
            {
                if($('.modal').is('.toggle')) {
                    $('.modal').removeClass('toggle');
                }
            }
        });
    },   
    home: function () {
        $.get('http://webservice.enfoque.com.br/wsHORUSGGR/Cotacoes.asmx/CotacaoOnLineXML', { 
            login: "HORUSGGR", 
            senha: "Quotes2018" 
        }, function(response){
            var tpl = '';
            var cotacoes = [];

            tpl += '<div class="cotacoes">';

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

            $( (window.innerWidth > 1280) ? '#footer' : '#header' ).children().append(tpl);

            $( window ).resize(function() {
                if(window.innerWidth > 1280) {
                    if(!$('#footer .cotacoes').length) {
                        $( '#footer' ).children().append(tpl);
                    }
                    $( '#header' ).children().find('.cotacoes').remove();
                } else {
                    if(!$('#header .cotacoes').length) {
                        $( '#header' ).children().append(tpl);
                    }                   
                    $( '#footer' ).children().find('.cotacoes').remove();
                }
            });         
        });        
    },   
    ativos_imobiliarios: function () {
        $('.tab-nav').children().each(function () {
            $(this).on( "click", function() {
                
                $(this).removeClass('inactive').addClass('active');
                $(this).parent().children().not($(this)).addClass('inactive').removeClass('active');

                if(window.outerWidth <= 1180) {
                    $('.ativos-imobiliarios .container>:last-child').addClass('toggle');
                }
                $($(this).children()[0].attributes).each(function( index ) {
                    if($(this)[0].nodeName !== 'data-img') {
                        if($('.' + $(this)[0].nodeName).length) {
                            $('.' + $(this)[0].nodeName).text($(this)[0].nodeValue);
                        }
                    } else {
                        if($('.data-img').length) {
                            $('.data-img').attr('src', $(this)[0].nodeValue);
                        }
                    }
                });                 
            });     
        }); 

        $(document).mouseup(function (e)
        {
            var container = $('.tab-content');

            if (!container.is(e.target) 
                && container.has(e.target).length === 0)
            {
                if($('.toggle').length) {
                    $('.toggle').removeClass('toggle');
                }
            }
        });

        $( window ).resize(function() {
            $('.tab-nav').children().each(function () {
                if(window.outerWidth <= 1180) {
                    $(this).removeClass();
                }
            });
        });                 
    },
    politica_de_investimentos: function () {
        
    },    
    central_de_downloads: function () {
        $('#filtro').on( "focus", function() {
            $('body').addClass('focused');         
        }).on( "blur", function() {
            $('body').removeClass('focused');                
        });
    },     
    contato: function () {

    },              
};

$(document).ready(function (){
    Controller.getController(); 
    Controller.global();    
});