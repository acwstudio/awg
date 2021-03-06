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

    let webhookClick = $('#wh-products a');
    let urlProducts = webhookClick.attr('href');

    // Catalog download
    catalogClick.on('click', function (e) {
        catalogClick.css("pointer-events", "none");
        e.preventDefault();

        let evtSource = new EventSource("/admin/stream/product", {withCredentials: true});
        $('#amt-catalog-items .progress').html('<div class="progress-bar" style="width:0%"></div>');
        $('#amt-catalog-items h1').html(0);
        evtSource.onmessage = function (e) {
            let data = JSON.parse(e.data);
            console.log(e.data);
            $('#amt-catalog-items .progress').html('<div class="progress-bar" style="width:' + data.product.message + '%"></div>');
            $('#amt-catalog-items h1').html(data.product.offset);
        };

        $.ajax({

            url: urlCatalog,
            type: 'get',

        }).done(function (result) {

            console.log(result);
            catalogClick.css("pointer-events", "auto");
            $('#amt-catalog-items .progress').html('<div class="progress-bar" style="width:100%"></div>');
            $('#amt-catalog-items h1').html(result.offset);
            evtSource.close();

        });
    });

    // Category download
    categoryClick.on('click', function (e) {
        e.preventDefault();
        categoryClick.css("pointer-events", "none");

        let evtSource = new EventSource("/admin/stream/category", {withCredentials: true});
        $('#amt-category-items .progress').html('<div class="progress-bar" style="width:0"></div>');
        $('#amt-category-items h1').html(0);
        evtSource.onmessage = function (e) {
            let data = JSON.parse(e.data);
            console.log(urlCategory);
            $('#amt-category-items .progress').html('<div class="progress-bar" style="width:' + data.category.message + '%"></div>');
            $('#amt-category-items h1').html(data.category.offset);
        };

        $.ajax({

            url: urlCategory,
            type: 'get',

        }).done(function (result) {
            console.log(result);
            categoryClick.css("pointer-events", "auto");
            $('#amt-category-items .progress').html('<div class="progress-bar" style="width:100%"></div>');
            $('#amt-category-items h1').html(result.offset);
            evtSource.close();

        });
    });

    // Image download
    imageClick.on('click', function (e) {
        e.preventDefault();
        imageClick.css("pointer-events", "none");
        let evtSource = new EventSource("/admin/stream/image", {withCredentials: true});
        evtSource.onmessage = function (e) {
            let data = JSON.parse(e.data);
            console.log(urlImage);
            $('#amt-image-items .progress').html('<div class="progress-bar" style="width:' + data.image.message + '%"></div>');
            $('#amt-image-items h1').html(data.image.offset);
        };

        $.ajax({

            url: urlImage,
            type: 'get',

        }).done(function (result) {
            console.log(result);
            imageClick.css("pointer-events", "auto");
            $('#amt-image-items .progress').html('<div class="progress-bar" style="width:100%"></div>');
            $('#amt-image-items h1').html(result.offset);
            evtSource.close();

        });
    });

    webhookClick.on('click', function (e) {
        e.preventDefault();
        console.log(urlProducts);
        $.ajax({

            url: urlProducts,
            type: 'get',
            data: {entity: 'product'},
            error: function (request, status, error) {
                console.log(request.responseText);
            },
            success: function (result) {
                console.log(result);
            }
        }).done(function (result) {
            console.log(result);
        })
    });

})(jQuery); // End of use strict
