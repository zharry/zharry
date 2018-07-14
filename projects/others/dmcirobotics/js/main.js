function main() {

(function () {
   'use strict';

    $('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });
    
    // Navbar
    $(window).bind('scroll', function() {
        var navHeight = 1;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('col');
        } else {
            $('.navbar-default').removeClass('col');
        }
    });
    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 80
    })

    // Gallery
    $(window).load(function() {
        var $container = $('#ga-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });



}());


}
main();