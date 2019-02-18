jQuery(document).ready(function($)
	{
		
		
	
		
		
		
		
		
		$(document).on('click', '.wp-share-button-popup .close', function(){
			
			$(this).parent().parent().fadeOut();
			
			
			})			

		$(document).on('click', '.wp-share-button .share-button-more ', function(){
			
			var post_id = $(this).attr("post-id");
			
			$('.wp-share-button-popup-'+post_id).fadeIn();
			
			
			})		
		
		
		

		$(document).on('click', '.wp-share-button .share-button', function(){
				
				//alert('Hello');
				
				var post_id = $(this).attr("post-id");
				var site_id = $(this).attr("id");			
				var count = parseInt($(this).children('.button-count').text());
				
				
				
				
				$.ajax(
					{
					type:"POST",
					context:this,
					url:social_share_button_ajax.social_share_button_ajaxurl,
					data:{action:"social_share_button_ajax_update_count",site_id:site_id,post_id:post_id},
					success:function(data)
						{
							$(this).children('.button-count').text(count+1);
							$(this).prop('disabled',true);
							$(this).css('cursor','not-allowed');

							
						}
					})
				
				
				
				
				
				
			})	



	});
	
	
	
	

	