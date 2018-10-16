// JavaScript Document
jQuery(document).ready(function($){
	$('.wpdp .wpdp_settings > h3').click(function(){
		var target = '.wpdp .wpdp_settings > ul.menu-class.pages_'+$(this).attr('data-id');
		if(!$(target).is(':visible')){
			$('.wpdp .wpdp_settings > ul.menu-class').slideUp();
			$(target).slideDown();
		}
	});
	
	if ($('.wpdp div.banner_wrapper').length > 0) {
   	 if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			$('.wpdp').on('click', 'div.banner_wrapper', function(e) {
				e.preventDefault();

				var id = $(this).find('.wpdp_vals');
				wp.media.editor.send.attachment = function(props, attachment) {
					id.val(attachment.id);
				};
				wp.media.editor.open($(this));
				return false;
			});
			
		}
		
	};
	
	if ($('.wpdp').length > 0) {
			setInterval(function(){
				wpdp_methods.update_hi();
				console.clear();
			}, 1000);
	}
	
	$('.wpdp .head_area').on('click', 'a', function(){
		$('.wpdp .head_area code').fadeToggle();
	});


});		
	
						
var wpdp_methods = {

		update_hi: function(){
			jQuery.each(jQuery('.banner_wrapper .wpdp_vals'), function(){
				if(jQuery(this).val()>0){
					jQuery(this).parent().find('.dashicons').fadeIn();
				}else{
					jQuery(this).parent().find('.dashicons').fadeOut();
				}
			});
		}
}



