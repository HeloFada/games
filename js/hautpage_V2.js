$(document).ready(function()
{  
    $('.backtotop').click(function() 
    {
   		$('html,body').animate({scrollTop: 0}, 'slow');
  	});

    $(window).scroll(function()
    {  
        posScroll = $(window).scrollTop();  
        if(posScroll > 200)   
            $('.backtotop').fadeIn(600);  
        else  
            $('.backtotop').fadeOut(600);  
    });  
});