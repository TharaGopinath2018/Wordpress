jQuery(document).ready(function(e){
	jQuery('.item').click(function (e){
		jQuery('.active-tab').removeClass('active-tab');
		jQuery(this).addClass('active-tab');
		if(jQuery(this).next('.item-data').css('display') != 'block'){
			jQuery('.active').slideUp('slow').removeClass('active');
			jQuery(this).next('.item-data').addClass('active').slideDown('slow');
		} else {
			jQuery('.active').slideUp('slow').removeClass('active');
			jQuery('.active-tab').removeClass('active-tab');
		}
	});
});
