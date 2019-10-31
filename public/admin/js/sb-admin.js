(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle").on('click', function (e) {
        e.preventDefault();
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });

    // Admin dashboard
    let catalogClick = $('#amt-catalog-items a');
    let categoryClick = $('#amt-category-items a');
    let imageClick = $('#amt-image-items a');

    let urlCatalog = catalogClick.attr('href');
    let urlCategory = categoryClick.attr('href');
    let urlImage = imageClick.attr('href');

    // Catalog download
    catalogClick.on('click', function (e) {
        e.preventDefault();
        let evtSource = new EventSource("/admin/stream", {withCredentials: true});
        let size = 0;
        evtSource.onmessage = function (e) {
            let data = JSON.parse(e.data);
            console.log(data);
            $('#amt-catalog-items .progress').html('<div class="progress-bar" style="width:' + data.message + '%"></div>');
            $('#amt-catalog-items h1').html(data.offset);
            size = data.size;
        };

        $.ajax({

            url: urlCatalog,
            type: 'get',

        }).done(function (result) {

            console.log(result);
            $('#amt-catalog-items .progress').html('<div class="progress-bar" style="width:100%"></div>');
            $('#amt-catalog-items h1').html(size);
            evtSource.close();

        });
    });

    // Category download
    categoryClick.on('click', function (e) {
        e.preventDefault();
        let evtSource = new EventSource("/admin/stream", {withCredentials: true});
        let size = 0;
        evtSource.onmessage = function (e) {
            let data = JSON.parse(e.data);
            console.log(data);
            $('#amt-category-items .progress').html('<div class="progress-bar" style="width:' + data.message + '%"></div>');
            $('#amt-category-items h1').html(data.offset);
            size = data.size;
        };

        $.ajax({

            url: urlCategory,
            type: 'get',

        }).done(function (result) {

            console.log(result);
            $('#amt-category-items .progress').html('<div class="progress-bar" style="width:100%"></div>');
            $('#amt-category-items h1').html(size);
            evtSource.close();

        });
    });

    // Category download
    imageClick.on('click', function (e) {
        e.preventDefault();
    });

})(jQuery); // End of use strict
