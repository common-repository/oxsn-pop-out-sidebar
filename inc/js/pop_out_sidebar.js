(function($) {

    var clickHandler = ('ontouchstart' in document.documentElement ? 'touchstart' : 'click');

    if ($('.oxsn_pop_out_sidebar_nav_link').attr('side') == 'left') {
        $('.toggle_pop_out').addClass('toggle_pop_out_left');
        $('.oxsn_pop_out_sidebar').addClass('oxsn_pop_out_sidebar_left');
    }

    $('.toggle_pop_out_left').bind(clickHandler, function() {
        if( $('.oxsn_pop_out_sidebar').is(':visible') ) {
            $('.oxsn_pop_out_sidebar').animate({ 'left': '-260px' }, function(){
                $('.oxsn_pop_out_sidebar').hide();
            });
            $('body').removeClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeOut();
            $('body').off('touchmove');
        }
        else {
            $('.oxsn_pop_out_sidebar').show();
            $('.oxsn_pop_out_sidebar').animate({ 'left': '0px' });
            $('body').addClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeIn();
            $('body.oxsn_body_fixed').on('touchmove',function(e){
                if(!$('.oxsn_pop_out_sidebar').has($(e.target)).length) {
                    e.preventDefault();
                }
            });
        }
    });
    
    if ($('.oxsn_pop_out_sidebar_nav_link').attr('side') == 'right') {
        $('.toggle_pop_out').addClass('toggle_pop_out_right');
        $('.oxsn_pop_out_sidebar').addClass('oxsn_pop_out_sidebar_right');
    }

    $('.toggle_pop_out_right').bind(clickHandler, function() {
        if( $('.oxsn_pop_out_sidebar').is(':visible') ) {
            $('.oxsn_pop_out_sidebar').animate({ 'right': '-260px' }, function(){
                $('.oxsn_pop_out_sidebar').hide();
            });
            $('body').removeClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeOut();
            $('body').off('touchmove');
        }
        else {
            $('.oxsn_pop_out_sidebar').show();
            $('.oxsn_pop_out_sidebar').animate({ 'right': '0px' });
            $('body').addClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeIn();
            $('body.oxsn_body_fixed').on('touchmove',function(e){
                if(!$('.oxsn_pop_out_sidebar').has($(e.target)).length) {
                    e.preventDefault();
                }
            });
        }
    });

    $('.oxsn_pop_out_sidebar_body_bg').bind(clickHandler, function() {
        if ($('.oxsn_pop_out_sidebar_nav_link').attr('side') == 'left') {
            $('.oxsn_pop_out_sidebar').animate({ 'left': '-260px' }, function(){
                $('.oxsn_pop_out_sidebar').hide();
            });
            $('body').removeClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeOut();
            $('body').off('touchmove');
        }
        else if ($('.oxsn_pop_out_sidebar_nav_link').attr('side') == 'right') {
            $('.oxsn_pop_out_sidebar').animate({ 'right': '-260px' }, function(){
                $('.oxsn_pop_out_sidebar').hide();
            });
            $('body').removeClass('oxsn_body_fixed');
            $('.oxsn_pop_out_sidebar_body_bg').fadeOut();
            $('body').off('touchmove');
        }
    });

	$('.oxsn_pop_out_sidebar ul li.menu-item-has-children > a').before('<div class="oxsn_pop_out_sidebar_down_arrow">▸</div>');

	$('.oxsn_pop_out_sidebar_down_arrow').bind(clickHandler, function() {
		$(this).parent().toggleClass('active');
		var txt = $(this).parent().children('ul.sub-menu').is(':visible') ? '▸' : '▾';
		$(this).text(txt);
		$(this).parent().children('ul.sub-menu').slideToggle();
	});

})(jQuery);