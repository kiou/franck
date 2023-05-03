$( document ).ready(function() {
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if(scroll >= 50){
            $(".navigation").addClass("fixed");
            $('.mobilemenucontent').removeClass('active');
        }

        if(scroll <= 50){
            $(".navigation").removeClass("fixed");
        }
    });

    $(document).on('click','.btnPlay', function(){
        var btn = $(this);
        var video = $('.videoElement')[0];
        var hover = $('.section1Hover');
        var content = $('.section1Play');

        content.delay(100).css({
            'left':'100%',
            'opacity': '0'
        });
        hover.delay(350).css({
            'opacity': '0'
        });
        btn.delay(500).css({
            'left':'100%',
            'opacity': '0'
        });

        setTimeout(function() {
            hover.hide();
        }, 500);
        
        video.play();
    });

    var video = $('.videoElement');
    video.on('pause', function() {
        
        setTimeout(function() {
            if (video[0].paused) {
                var btn = $('.btnPlay');
                var hover = $('.section1Hover');
                var content = $('.section1Play');

                hover.show();

                content.delay(100).css({
                    'left':'0px',
                    'opacity': '1'
                });
                hover.delay(350).css({
                    'opacity': '1'
                });
                btn.delay(500).css({
                    'left':'calc(50% - 60px)',
                    'opacity': '1'
                });
            }
        }, 100);
    });

    $('.linknav').on('click', function(e){
        e.preventDefault();
        
        var button = $(this);
        var url = button.attr('data-url');
        var nav = button.attr('data-nav');
        var blank = button.attr('data-blank');

        if(url != undefined){
            if(blank == undefined) window.open(url, '_blank');
            else location.href = url;
        }

        if(nav != undefined){
            $('html, body').stop().animate({
                scrollTop: $(nav).offset().top
            }, 600); 
        }
    });

    $('.fa-bars').on('click', function(e){
        e.preventDefault();
        $('.mobilemenucontent').toggleClass('active');
    });

});


