/* global WOW */
/* jshint quotmark:false */

var wow;

(function ($) {
    
    // Init Wow
    wow = new WOW( {
        animateClass: 'animated',
        offset:       100
    });
    wow.init();
    
    // Navigation scrolls
    $('.navbar-nav li a').bind('click', function(event) {
        $('.navbar-nav li').removeClass('active');
        $(this).closest('li').addClass('active');
        var $anchor = $(this);
        var nav = $($anchor.attr('href'));
        if (nav.length) {
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');

            event.preventDefault();
        }
    });

    // About section scroll
    $(".overlay-detail a").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });
    
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".navbar-default").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });
    
    // Testimonials Slider
    $('.bxslider').bxSlider({
      adaptiveHeight: true,
      mode: 'fade'
    });
    
    // Theme manager: dark mode + accent picker
    var THEME_KEY = 'appThemeMode'; // 'dark' | 'light'
    var ACCENT_KEY = 'appAccentColor';

    function isValidHexColor(val) {
        return /^#([0-9A-F]{3}){1,2}$/i.test(val);
    }

    // On DOM ready: initialize controls
    $(function(){
        var $swatches = $('.theme-swatch');

        function applyAccent(color) {
            if (!color || !isValidHexColor(color)) {
                return;
            }
            document.documentElement.style.setProperty('--accent', color);
            // update selected swatch
            $swatches.removeClass('selected');
            $swatches.each(function(){
                if ($(this).data('color').toLowerCase() === color.toLowerCase()) {
                    $(this).addClass('selected');
                }
            });
        }

        function applyTheme(mode) {
            var html = document.documentElement;
            if (mode === 'dark') {
                html.classList.add('theme-dark');
                $('#themeToggle i').removeClass('fa-moon-o').addClass('fa-sun-o');
                $('#themeToggle').attr('title','Switch to light mode');
            } else {
                html.classList.remove('theme-dark');
                $('#themeToggle i').removeClass('fa-sun-o').addClass('fa-moon-o');
                $('#themeToggle').attr('title','Switch to dark mode');
            }
        }

        function saveTheme(mode) {
            try { localStorage.setItem(THEME_KEY, mode); } catch(e){}
        }
        function saveAccent(color) {
            try { localStorage.setItem(ACCENT_KEY, color); } catch(e){}
        }

        // read preferences
        var mode = null;
        try {
            mode = localStorage.getItem(THEME_KEY);
        } catch(e) { mode = null; }

        // If there's no stored preference, inherit the OS/browser preference
        if (!mode) {
            try {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    mode = 'dark';
                } else {
                    mode = 'light';
                }
            } catch(e) {
                mode = 'light';
            }
        }

        var accent = '#be9e21';
        try {
            var storedAccent = localStorage.getItem(ACCENT_KEY);
            if (storedAccent && isValidHexColor(storedAccent)) {
                accent = storedAccent;
            }
        } catch(e){}

        applyTheme(mode);
        applyAccent(accent);

        // Wire toggle
        $('#themeToggle').on('click', function(e){
            e.preventDefault();
            var current = (document.documentElement.classList.contains('theme-dark')) ? 'dark' : 'light';
            var next = (current === 'dark') ? 'light' : 'dark';
            applyTheme(next);
            saveTheme(next);
        });

        // Wire swatches
        $swatches.on('click', function(){
            var color = $(this).data('color');
            if (!isValidHexColor(color)) {
                return;
            }
            applyAccent(color);
            saveAccent(color);
        });

        // Accessibility: allow keyboard selection of swatches
        $swatches.attr('tabindex', 0).on('keydown', function(e){
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); $(this).trigger('click'); }
        });
    });

})(jQuery);