$(function () {
//fancybox jquery intilizing
    /* This is basic - uses default settings */
  
  $("a#single_image").fancybox();
  
    /* Using custom settings */
  
  $("a#inline").fancybox({
    'hideOnContentClick': false
  });

    /* Apply fancybox to multiple items */
  
  $("a.group").fancybox({
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'speedIn'   : 600, 
    'speedOut'    : 200, 
    'overlayShow' : false
  });

// fancy box in action 
$("#fancy-box").fancybox({
    afterClose: function() {
        $("#fancy-box").show();
    }
  });

// boostrap tooltip initilize  
  $('[data-toggle="tooltip"]').tooltip()
  
//On click active class
var rwlButton = $('div.rwl-buttons > a');
  rwlButton.click(function() {
    if($(this).hasClass('active')){
      $(this).removeClass('active');
    }
    else {
      $(this).addClass('active'); 
    }
    /* Act on the event */
  });


//onClick scroll to 

  $('#read').click(function(){
      $('htm,body').stop().animate({
          scrollTop: $('#row-read').offset().top,        
        },1000
      );
  });

  $('#watch').click(function(){
      $('htm,body').stop().animate({
          scrollTop: $('#row-watch').offset().top,        
        },1000
      );
  });

  $('#listen').click(function(){
      $('htm,body').stop().animate({
          scrollTop: $('#row-listen').offset().top,        
        },1000
      );
  });
});


//fadeIn elements 

var docVar = $(document);
var windowVar = $(window);
var fadeVar = $('.fade-out');
var infoRow = $('row-infographic');
docVar.ready( function() {
  windowVar.scroll(function() {
        $('.fade-out').each(function(i) {
          var bottomOfObject = $(this).offset().top + $(this).outerHeight();
          if(   $(this).hasClass('row-infographic') == true ) {
            bottomOfObject = $(this).offset().top + $(this).outerHeight() - 500; 
          }

          if( $(this).hasClass('city-information') == true )
          {
          
            bottomOfObject = $(this).offset().top + $(this).outerHeight() - 500; 

          }

          var bottomOfWindow = windowVar.scrollTop() + windowVar.height();
          if( bottomOfWindow > bottomOfObject ){
            $(this).animate({'opacity':'1',
                              easing: "swing"}, 500);    
          }
    });
  });
});