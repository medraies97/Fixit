;(function($) {
    "use strict";
    
    /*Blog Page Sidebar Section Height Fix*/
    function sidebarHeight(){
        if( $('.sidebar_section').length ){
            var $sidebarHeight = $('.blog_section').innerHeight();
            $('.sidebar_section').css("min-height", $sidebarHeight + 45)
        }
    }
    /*Footer Widget Height*/
    function footerWidgetHeight(){
        if( $('.footer_sidebar > .widget').length ){
            $('.footer_sidebar .widget').css( "min-height", function(){
                return Math.max( $('.footer_sidebar .widget1').height(), $('.footer_sidebar .widget2').height(), $('.footer_sidebar .widget3').height(), $('.footer_sidebar .widget4').height() )
            })
        }
    }
    function selectMenu () {
        if ($('.select-menu').length) {
            $('.select-menu').selectmenu();
        };
    }
    /*Project Filter*/
    function projectsIsotopeFilter(){
        if( $('#projects').length ){
            $('#projects').imagesLoaded(function(){
                $('#projects').isotope({
                    itemSelector: '.project',
                    layoutMode: 'masonry',
                    filter: '.indoor',
                    masonry: {
                        columnWidth: '.project-sizer',
                        gutter: 0
                    }
                })
            });

            $('#project_filter li').on( 'click', function() {
                $('#project_filter').find('.active').removeClass('active');
                $(this).addClass('active');
                var $filterValue = $(this).data('filter');
                $('#projects').isotope({ filter: $filterValue })
            })
        }
    }
    
    /*Project Filter 2*/
    function projectsIsotopeFilter_2(){
        if( $('#projects2').length ){
            $('#projects2').imagesLoaded(function(){
                $('#projects2').isotope({
                    itemSelector: '.project',
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: 1,
                        gutter: 0
                    }
                })
            });

            $('#project_filter2 li').on( 'click', function() {
                $('#project_filter2').find('.active').removeClass('active');
                $(this).addClass('active');
                var $filterValue = $(this).data('filter');
                $('#projects2').isotope({ filter: $filterValue })
            })
        }
    }
    
    function services_carousel(){
        if( $('.services_carousel').length ){
            $('.services_carousel').owlCarousel({
                loop:true,
                margin:0,
                autoplay: true,
                nav: false,
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                navContainer: '.services_carousel',
                center: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav: true,                        
                        dots: false
                    },
                    992:{
                        items:3
                    }
                }
            })
        }
    }
    
    /*Team Member Carousel*/    
    function team_members_carousel(){
        if( $('.team_members_carousel').length ){
            $('.team_members_carousel').owlCarousel({
                loop:true,
                margin:0,
                autoplay: true,
                nav: true,
                navText: ['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
                navContainer: '.team_carousel_nav',
                responsive:{
                    0:{
                        items:1
                    },
                    992:{
                        items:4
                    }
                }
            })
        }
    }
    /*client logo Carousel*/    
    function client_logo_carousel(){
        if( $('.owl-carousel.clients-logos').length ){
            $('.owl-carousel.clients-logos').owlCarousel({
                loop:true,
                margin:30,
                autoplay: true,
                nav: false,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:6
                    }
                }
            })
        }
    }
    
    /*Recent Project Carousel*/
    function recentProjectsCarousel(){
        if( $('.recent-projects').length ){
            $('.recent-projects').owlCarousel({
                loop:false,
                margin:0,
                autoplay: true,
                nav: false,
                items: 1
            })
        }
    }    
    
    /*Counter*/
    function counting_data(){
        if ( $('.counter').length ){
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            })
        }
    }    
    
    /*Project Image Popup*/
    function imagePopup(){
        if ($('.test-popup-link').length) {            
            $('.test-popup-link').magnificPopup({
                type: 'image'
            })
        }
    }
    
    /*RS*/
    function revolutionSliderActiver () {
        if ($('.bannercontainer #rev_slider').length ) {
            $("#rev_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                delay:5000,
                navigation: {
                    arrows:{enable:true} 
                }, 
                gridwidth:1170,
                gridheight:740 
            })
        }
    }
    
    /*Smooth Scroll*/
    function smoothScrollActivator () {
        if ($('#main_nav.smooth_scroll').length ) {
            $('#main_nav ul li a[href*="#"]').on('click', function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    var offset_top4scroll = $('#main_nav').height();
                    if ( $(window).width() < 768 ){
                        offset_top4scroll = 34
                    }
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top - offset_top4scroll
                        }, 1000);
                        return false
                    }
                }
                return false
            })
        }
    }
    
    /*Affix*/
    function affix_header () {
        if ($('#main_nav').length ) {
            $('#main_navbar').affix({
                offset: {
                    top: 118,
                    bottom: function () {
                        return (this.bottom = $('footer').outerHeight(true))
                    }
                }
            })
        }
    }
    
    /*Scroll Spy*/
    function scrollSpyActivator () {
        if ($('#main_nav.smooth_scroll').length ) {
            $('body').scrollspy({ 
                target: '#main_nav', 
                offset: 55
            })
        }
    }
    function countDownTimer () {
        if ($('.countdown-box').length) {

            $('.countdown-box').each(function () {
                var Self = $(this);
                var countDate = Self.data('countdown-time'); // getting date

                Self.countdown(countDate, function(event) {                    

                    $(this).html('<li> <div class="box"> <h4>'+ event.strftime('%D') +'</h4> <span>Days</span> </div> </li> <li> <div class="box"> <h4>'+ event.strftime('%H') +'</h4> <span>Hours</span> </div> </li> <li> <div class="box"> <h4>'+ event.strftime('%M') +'</h4> <span>Minutes</span> </div> </li> <li> <div class="box"> <h4>'+ event.strftime('%S') +'</h4> <span>Seconds</span> </div> </li> ');


                });
            });

            

        };
    }
    
    
    /*----------------------------------------------------*/
    /*Function Calling*/
    /*----------------------------------------------------*/
    services_carousel();
    sidebarHeight();
    footerWidgetHeight()
    projectsIsotopeFilter();
    projectsIsotopeFilter_2();
    recentProjectsCarousel();
    counting_data();
    imagePopup();
    revolutionSliderActiver();
    selectMenu();
    team_members_carousel();
    smoothScrollActivator();
    affix_header();
    client_logo_carousel();
    countDownTimer();
    scrollSpyActivator()
    
})(jQuery)