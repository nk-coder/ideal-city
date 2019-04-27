$(document).ready(function() {
    "use strict";


    /*-------------------*/
    /*  01. STICKY HEADER
    /*-------------------*/
    if ($(".navbar").length) {
        var options = {
            offset: 350,
            offsetSide: 'top',
            classes: {
                clone: 'banner--clone fixed',
                stick: 'banner--stick',
                unstick: 'banner--unstick'
            },
            onStick: function() {
                $($.SmartMenus.Bootstrap.init);
            },
            onUnstick: function() {
                $('.navbar .btn-group').removeClass('open');
            }
        };
        var banner = new Headhesive('.navbar', options);
    }
    /*-----------------------*/
    /*  02. HAMBURGER MENU ICON
    /*-----------------------*/
    $(".nav-bars").on("click", function() {
        $(".nav-bars").toggleClass("is-active");
    });
    
    /*----------------*/
    /*  03. DROPDOWN MENU
    /*----------------*/
    $('.navbar .nav .btn-group .dropdown-menu').on('click', function(e) {
        e.stopPropagation();
    }); 

    /*----------------*/
    /*  04. Scroll To Top
    /*----------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
});