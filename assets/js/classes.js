var Util = {
    _newsletter: function (e) {
    	$('#newsletter').addClass('toggle');
    },     
    _closeModal: function(e) {
        if($('.toggle').length) {
            $('.toggle').removeClass('toggle');
            
            $('.tab-nav').children().each(function () {
                if(window.outerWidth <= 1180) {
                    $(this).removeClass();
                }
            });            
        }
    }
};