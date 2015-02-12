jQuery(document).ready(function($) {
	
	var viewport = $(window),
		landingPage = $('#landing-page'),
		adminBar = ($('body').hasClass('admin-bar')) ? 32 : 0;

	viewport.on('load resize', function(e) {
		landingPage.css('height', (viewport.height()-adminBar) + 'px');
	});

});