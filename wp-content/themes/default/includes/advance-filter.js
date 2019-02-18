(function($){    
    $('.filter-form input[type="checkbox"]').click(function(){
    
           $('#result').html('<div class="text-center"><span class="loading"></span></div>');
           var formdata = $('.filter-form').serialize();
           $.post(ajaxurl, formdata, function(data){
               $('#result').html(data);
           });
       
    });
    // $('#huyen').change(function(){
    //        $('.#result').html('<div class="text-center"><span class="loading"></span></div>');
    //        var formdata = $('.filter-form').serialize();
    //        $.post(ajaxurl, formdata, function(data){
    //            $('.#result').html(data);
    //        });       
    // });
    
})(jQuery);
