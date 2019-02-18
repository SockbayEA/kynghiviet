jQuery(document).ready(function($)
	{

		$(document).on('click', '#social_share_button_sites .remove', function(){
				if (confirm('Do you really want to delete this field ?')) {
					
					$(this).parent().parent().remove();
				}
			})


		$(document).on('click', '.add-site', function(){
				
				var site_name = prompt("Site name ?","");
				
				if(site_name != '' && site_name != null){
					
					$.ajax(
						{
						type:"POST",
						context:this,
						url:social_share_button_ajax.social_share_button_ajaxurl,
						data:{action:"social_share_button_add_site",site_name:site_name},
						success:function(data)
							{
								$("#social_share_button_sites tbody").append(data);
	
							}
						})
					
					}

				
				
			})

        $(document).on('click', '.reset-site', function(){


        	$(this).text('Wait..');

			$.ajax(
				{
					type:"POST",
					context:this,
					url:social_share_button_ajax.social_share_button_ajaxurl,
					data:{action:"social_share_button_reset_site"},
					success:function(data){

						$(this).text('Reset');

						$("#social_share_button_sites tbody").html(data);

					}
				})





        })








		$(document).on('click', '.add-display-filter', function()
			{	
				

				var time = $.now();
				$.ajax(
					{
					type:"POST",
					context:this,
					url:social_share_button_ajax.social_share_button_ajaxurl,
					data:{action:"social_share_button_add_display_filter",time:time},
					success:function(data)
						{
							$("#social_share_button_display").append(data);

						}
					})
				
				
			})


		$(document).on('click', '#social_share_button_display .remove', function()
			{	
				if (confirm('Do you really want to delete this field ?')) {
					
					$(this).parent().parent().remove();
				}
			})





	});