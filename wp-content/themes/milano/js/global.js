/*-------------------------------------------------------------------------------------------------------------------------------*/
/*This is main JS file that contains custom style rules used in this template*/
/*-------------------------------------------------------------------------------------------------------------------------------*/
/* Template Name: "Modesto"*/
/* Version: 1.0 Initial Release*/
/* Build Date: 06-02-2016*/
/* Author: LionStyle*/
/* Website: http://moonart.net.ua/modesto/ 
 /* Copyright: (C) 2016 */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/
/* 01 - VARIABLES */
/* 02 - page calculations */
/* 03 - function on document ready */
/* 04 - function on page load */
/* 05 - function on page resize */
/* 06 - function on page scroll */
/* 07 - swiper sliders */
/* 08 - buttons, clicks, hovers */


jQuery(function ($) {

    "use strict";

    /*================*/
    /* 01 - VARIABLES */
    /*================*/
    var swipers, winW, header_bar, headH, winH, winScr, footerTop, _isresponsive, _ismobile, header_height  = 0;
    swipers = [];
    _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);

    /*========================*/
    /* 02 - page calculations */
    /*========================*/
    function pageCalculations() {
        winW = $(window).width();
        winH = $(window).height();
        footerTop = ($('footer').length) ? $('footer').offset().top : 0;
        headH = ($('header.fixed').length) ? $('header.fixed').height() : 0;
        if ($('.portfolio-detail-related-entry').length) footerTop = $('.portfolio-detail-related-entry').offset().top;
        _isresponsive = !!$('.menu-button').is(':visible');
        header_bar = jQuery('body').hasClass('admin-bar') ? jQuery('#wpadminbar').height() : 0;
        header_height = (jQuery('header').siblings('.header-empty-space').length) ? jQuery('header').siblings('.header-empty-space').height() : 0;

        if ($('.page-height').parents('section').is('.js-header-margin-bottom')){
            $('.page-height').css({'min-height': (winH < 480) ? 480 : winH - header_bar - header_height * 2});
        }else if ($('.page-height').closest('.overlay').hasClass('frame')){
            $('.page-height').css({'height': winH - header_bar - header_height - 60, 'min-height': (winH < 480) ? 480 : winH - header_bar - header_height - 60});
        }else{
            $('.page-height').css({'height': winH - header_bar - header_height, 'min-height': (winH < 480) ? 480 : winH - header_bar - header_height});
        }

        if (winH <= 600) $('body').addClass('min-height');
        else $('body').removeClass('min-height');
        
        $('.rotate').each(function () {
            var $this = $(this);
            if ($this.is(':visible')){
                $this.css({'width': $this.parent().height()});     
            }
        });
        
    }

    /*=================================*/
    /* 03 - function on document ready */
    /*=================================*/
    $(document).ready(function () {
        if ($('#no-menu-fallback').length) {
            $('body').addClass('no-menu');
            $('.open-overlay').hide();
        }

        $("select").wrap("<div class='select-wrapper'></div>");

        $('.input').each(function () {
            if ($(this).val() !== '') $(this).parent().addClass('focus');
        });
        var $body_inline_styles = $('.move-inline-styles'),
            css = $body_inline_styles.text(),
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        if(jQuery('#toppanel').length){
            jQuery('#toppanel').siblings('.header-empty-space').first().remove();
        }

        head.appendChild(style);
        $body_inline_styles.remove();

        if (_ismobile) $('body').addClass('mobile');

        pageCalculations();

        plyr.setup('.plyr');
    });
    /*============================*/
    /* 04 - function on page load */
    /*============================*/
    $(window).load(function () {
        initSwiper();
        $('body').addClass('loaded');
        $('#loader-wrapper').fadeOut();
        setTimeout(function () {
            pageCalculations();
            scrollCall();
        }, 0);
        $(function () {
            $('.js-equal-height').matchHeight({property: 'min-height'});
        });
    });

    /*==============================*/
    /* 05 - function on page resize */
    /*==============================*/
    function resizeCall() {
        pageCalculations();
    }

    if (!_ismobile) {
        $(window).resize(function () {
            resizeCall();
        });
    } else {
        window.addEventListener("orientationchange", function () {
            resizeCall();
        }, false);
    }

    /*==============================*/
    /* 06 - function on page scroll */
    /*==============================*/
    $(window).scroll(function () {
        scrollCall();
    });

    function scrollCall() {
        winScr = $(window).scrollTop();
        if (winScr > ((winW >= 992) ? 90 - header_bar : 50)) $('header.fixed').addClass('scrolled');
        else $('header.fixed').removeClass('scrolled');
        if ($('.homepage-4-slider-navigation').length) {
            if (winScr + winH - 115 >= footerTop) $('.homepage-4-slider-navigation .rotate').css({'margin-top': (-1) * (winScr + winH - footerTop - 115)});
            else $('.homepage-4-slider-navigation .rotate').css({'margin-top': '0px'});
        }
    }

    /*=====================*/
    /* 07 - swiper sliders */
    /*=====================*/

    function initSwiper() {
        var initIterator = 0;
        $('.swiper-container').each(function () {
            var $t = $(this);

            var index = 'swiper-unique-id-' + initIterator;

            $t.addClass('swiper-' + index + ' initialized').attr('id', index);
            $t.find('.swiper-pagination').addClass('swiper-pagination-' + index);
            $t.find('.swiper-button-prev').addClass('swiper-button-prev-' + index);
            $t.find('.swiper-button-next').addClass('swiper-button-next-' + index);
            if ($t.find('.swiper-slide').length <= 1) $('.slider-click[data-pagination-rel="' + $t.data('pagination-rel') + '"]').addClass('disabled');

            var slidesPerViewVar = ($t.data('slides-per-view')) ? $t.data('slides-per-view') : 1,
                loopVar = ($t.data('loop')) ? parseInt($t.data('loop'), 10) : 0;
            if (slidesPerViewVar != 'auto') slidesPerViewVar = parseInt(slidesPerViewVar, 10);

            swipers['swiper-' + index] = new Swiper('.swiper-' + index, {
                pagination: '.swiper-pagination-' + index,
                paginationClickable: true,
                nextButton: '.swiper-button-next-' + index,
                prevButton: '.swiper-button-prev-' + index,
                slidesPerView: slidesPerViewVar,
                autoHeight: ($t.data('auto-height')) ? parseInt($t.data('auto-height'), 10) : 0,
                loop: loopVar,
                autoplay: ($t.data('autoplay')) ? parseInt($t.data('autoplay'), 10) : 0,
                centeredSlides: ($t.data('center')) ? parseInt($t.data('center'), 10) : 0,
                breakpoints: ($t.data('breakpoints')) ? {
                    767: {slidesPerView: parseInt($t.attr('data-xs-slides'), 10)},
                    991: {slidesPerView: parseInt($t.attr('data-sm-slides'), 10)},
                    1199: {slidesPerView: parseInt($t.attr('data-md-slides'), 10)}
                } : {},
                initialSlide: ($t.data('ini')) ? parseInt($t.data('ini'), 10) : 0,
                watchSlidesProgress: true,
                speed: ($t.data('speed')) ? parseInt($t.data('speed'), 10) : 500,
                parallax: ($t.data('parallax')) ? parseInt($t.data('parallax'), 10) : 0,
                slideToClickedSlide: true,
                keyboardControl: true,
                mousewheelControl: ($t.data('mousewheel')) ? parseInt($t.data('mousewheel'), 10) : 0,
                mousewheelReleaseOnEdges: true,
                direction: ($t.data('direction'))?$t.data('direction'):'horizontal',
                onProgress: function (swiper, progress) {
                    var activeIndex = (loopVar == 1) ? $(swiper.slides[swiper.activeIndex]).data('swiper-slide-index') : swiper.activeIndex;
                    watchSwiperProgress($t, swiper, activeIndex);
                },
                onSlideChangeStart: function (swiper) {
                    var activeIndex = (loopVar == 1) ? $(swiper.slides[swiper.activeIndex]).data('swiper-slide-index') : swiper.activeIndex;
                    watchSwiperProgress($t, swiper, activeIndex);
                },
                onTransitionEnd: function (swiper) {
                    var activeIndex = (loopVar == 1) ? $(swiper.slides[swiper.activeIndex]).data('swiper-slide-index') : swiper.activeIndex;
                    //var activeIndex = (loopVar==1)?swiper.activeLoopIndex:swiper.activeIndex;
                    if ($('.slider-click[data-pagination-rel="' + $t.data('pagination-rel') + '"]').length) {
                        var updateLeftNum = $('.slider-click.left[data-pagination-rel="' + $t.data('pagination-rel') + '"]'),
                            updateRightNum = $('.slider-click.right[data-pagination-rel="' + $t.data('pagination-rel') + '"]');
                        var totalSlides = parseInt(updateRightNum.find('.right').text());
                        var left_number,
                            right_number;
                        if (loopVar != 1) {
                            if (activeIndex < 1) updateLeftNum.addClass('disabled');
                            else updateLeftNum.removeClass('disabled').find('.left').text(activeIndex);
                            if (activeIndex + 2 > swiper.slides.length) updateRightNum.addClass('disabled');
                            else updateRightNum.removeClass('disabled').find('.left').text(activeIndex + 2);

                            updateLeftNum.find('.preview-entry.active').removeClass('active');
                            updateLeftNum.find('.preview-entry[data-rel="' + (activeIndex - 1) + '"]').addClass('active');
                            updateRightNum.find('.preview-entry.active').removeClass('active');
                            updateRightNum.find('.preview-entry[data-rel="' + (activeIndex + 1) + '"]').addClass('active');
                        } else if (true != $t.data('hidecount')) {
                            left_number = ( 0 == activeIndex) ? totalSlides : activeIndex;
                            right_number = ((activeIndex + 2) > totalSlides) ? '1' : activeIndex + 2;
                            updateLeftNum.find('.left').text(left_number);
                            updateRightNum.find('.left').text(right_number);
                        } else {
                            updateLeftNum.addClass('disabled');
                            updateRightNum.addClass('disabled');
                        }
                    }
                }
            });
            swipers['swiper-' + index].update();
            initIterator++;
        });

    }

    function watchSwiperProgress(container, swiper, index) {
        if ($('.homepage-1-backgrounds[data-pagination-rel="' + container.data('pagination-rel') + '"]').length) {
            $('.homepage-1-backgrounds .entry.active').removeClass('active');
            $('.homepage-1-backgrounds .entry[data-rel=' + index + ']').addClass('active');
        }
        if ($('.slider-click-label[data-pagination-rel="' + container.data('pagination-rel') + '"]').length) {
            $('.slider-click-label[data-pagination-rel="' + container.data('pagination-rel') + '"]').removeClass('active prev next');
            $('.slider-click-label[data-pagination-rel="' + container.data('pagination-rel') + '"][data-slide-to="' + index + '"]').addClass('active');
        }
        if ($('.pagination-slider-wrapper[data-pagination-rel="' + container.data('pagination-rel') + '"]').length) {
            var foo = $('.pagination-slider-wrapper[data-pagination-rel="' + container.data('pagination-rel') + '"]');
            foo.css({'top': (-1) * parseInt(foo.find('.active').attr('data-slide-to'), 10) * foo.parent().height()});
        }
    }

    $('.slider-click.left').on('click', function () {
        if ($(this)[0].hasAttribute('data-pagination-rel')) {
            swipers['swiper-' + $('.swiper-container[data-pagination-rel="' + $(this).data('pagination-rel') + '"]').attr('id')].slidePrev();
            $(this).find('.preview-entry').removeClass('active');
        }
    });

    $('.slider-click.right').on('click', function () {
        if ($(this)[0].hasAttribute('data-pagination-rel')) {
            swipers['swiper-' + $('.swiper-container[data-pagination-rel="' + $(this).data('pagination-rel') + '"]').attr('id')].slideNext();
            $(this).find('.preview-entry').removeClass('active');
        }
    });

    $('.slider-click-label').on('click', function () {
        swipers['swiper-' + $('.swiper-container[data-pagination-rel="' + $(this).data('pagination-rel') + '"]').attr('id')].slideTo($(this).data('slide-to'));
    });


    /*==============================*/
    /* 08 - buttons, clicks, hovers */
    /*==============================*/

    //open overlay popup
    $('.open-overlay').on('click', function () {
        var $this = $(this);
        $('.overlay[data-rel="' + $(this).data('rel') + '"]').addClass('active');
        if (_ismobile) setTimeout(function () {
            $('html').addClass('overflow-hidden');
        }, 500);
    });

    //close overlay popup
    $('.overlay .button-close').on('click', function () {
        $(this).closest('.video-popup').find('iframe').attr('src', '');
        if ($('.overlay.active').length == 1) $('html').removeClass('overflow-hidden');
        $(this).closest('.overlay').removeClass('active');
    });

    //toggle side navigation
    $('.open-navigation, header .close-layer').on('click', function () {
        $('body').toggleClass('open-menu');
        $('header .close-layer').toggleClass('active');
    });

    //responsive menu nested lists
    $('.toggle-icon').on('click', function () {
        $(this).toggleClass('active').next().slideToggle().prev().prev().toggleClass('selected');
    });

    //input animations on focus
    $('.input-wrapper').on('click', function () {
        $(this).addClass('focus');
        $(this).find('.input').focus();
    });

    $('.input').on('blur', function () {
        if ($(this).val() === '') $(this).parent().removeClass('focus');
    });

    //index 6 mousewheel event on slider captions
    $('.pagination-slider-wrapper').on('mousewheel', function (event) {
        if (event.deltaY > 0) {
            swipers['swiper-' + $('.swiper-container[data-pagination-rel="' + $(this).find('.slider-click-label').data('pagination-rel') + '"]').attr('id')].slidePrev();
        }
        else {
            swipers['swiper-' + $('.swiper-container[data-pagination-rel="' + $(this).find('.slider-click-label').data('pagination-rel') + '"]').attr('id')].slideNext();
        }
    });

    //index 9 mousewheel event on slider
    $('.boxgallery').on('mousewheel', function (event) {
        event.preventDefault();
        if (event.deltaY > 0) {
            $(this).find('.slider-click.left').click();
        }
        else {
            $(this).find('.slider-click.right').click();
        }
    });

    //click on button, that scrolls page
    $('.scroll-button').on('click', function () {
        var $CurrentSection = $(this).parents('.page-height');
        var $scrollPosition = $CurrentSection.offset().top + $CurrentSection.outerHeight(true);
        $('body, html').animate({'scrollTop': $scrollPosition + header_bar - headH});
        return false;
    });

    //responsive filtration block
    $('.responsive-filtration-title').on('click', function () {
        $(this).toggleClass('active');
    });

    //article likes click
    $('.article-likes-title').on('click', function () {
        $(this).toggleClass('active');
    });

    //tabulation
    $('.tab-menu').on('click', function() {
        if($(this).hasClass('active')) return false;
        var $this = $(this);
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).closest('.sorting-menu').find('.responsive-filtration-title .text').text($(this).text());
        $('.tab-entry[data-tab-menu="'+$this.data('tab-menu')+'"]:visible').animate({'opacity':'0'}, function(){
            $(this).hide();
            var tab = $('.tab-entry[data-tab-menu="'+$this.data('tab-menu')+'"][data-tab="'+$this.data('tab')+'"]');
            tab.show();
            tab.animate({'opacity':'1'});
            if (tab.find('.swiper-container').length){
                swipers['swiper-'+tab.find('.swiper-container').attr('id')].update();
            }
        });
    });


    $('.open-video').magnificPopup({
        type: 'inline',
        mainClass: 'inline--media-content overlay active animation-wrapper', // this class is for CSS animation below
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out' // CSS transition easing function
        },
        callbacks: {
            open: function () {
                var player = $(this.content).find('.plyr');
                if ('oembed' != player.data('source')) {
                    player[0].plyr.play();
                }
            },
            close: function () {
                var player = $(this.content).find('.plyr');
                if ('oembed' != player.data('source')) {
                    player[0].plyr.restart();
                    player[0].plyr.pause();
                }
            }
        }
    });

    // Image popups
    jQuery('.zoom').magnificPopup({
        type: 'image',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function () {
                // just a hack that adds mfp-anim class to markup
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = 'mfp-zoom-in';
            }
        },
        closeOnContentClick: true,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    jQuery('.gallery').each(function () {
        jQuery(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            callbacks: {
                beforeOpen: function () {
                    // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'mfp-zoom-in';
                }
            },
            removalDelay: 500
        });
    });


    jQuery(document).ready(function () {
        if ($('.fw_form_fw_form').length) {
            fwForm.initAjaxSubmit({
                selector: 'form[data-fw-ext-forms-type="contact-forms"]'

                // Open the script code and check the `opts` variable
                // to see all options that you can overwrite/customize.
            });
        }

        //Add class to tables
        jQuery('table').addClass('table').addClass('table-bordered');

        $(".fw-accordion").each(function () {
            $(this).accordion({
                heightStyle: "content"
            });
        });

        jQuery('.countdown').each(function () {
            var $this = jQuery(this);
            setTimer($this);
            setInterval(function () {
                setTimer($this)
            }, 1000);

        });

        function setTimer($this) {
            var today = new Date();
            var finalTime = new Date($this.data('finaltime'));
            var interval = finalTime - today;
            if (interval < 0) interval = 0;
            var days = parseInt(interval / (1000 * 60 * 60 * 24));
            var daysLeft = interval % (1000 * 60 * 60 * 24);
            var hours = parseInt(daysLeft / (1000 * 60 * 60));
            var hoursLeft = daysLeft % (1000 * 60 * 60);
            var minutes = parseInt(hoursLeft / (1000 * 60));
            var minutesLeft = hoursLeft % (1000 * 60);
            var seconds = parseInt(minutesLeft / (1000));
            $this.find('.days').text(days);
            $this.find('.hours').text(hours);
            $this.find('.minutes').text(minutes);
            $this.find('.seconds').text((seconds < 10) ? '0' + seconds : seconds);
        }

        // Target your .container, .wrapper, .post, etc.
        $(".post").fitVids({ ignore: '.plyr'});
    });

    /*isitope for portfolio*/
    jQuery(document).ready(function ($) {
        var $container = $('.sorting-container');
        $container.each(function () {
            var $current = $(this);
            $current.isotope({
                itemSelector: '.sorting-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                },
                percentPosition: true
            });

            $current.imagesLoaded().progress(function () {
                $current.isotope('layout');
            });

            var $sorting_buttons = $current.parent().find('.sorting-menu a');

            $sorting_buttons.each(function () {
                var selector = $(this).data('category');
                var count = $container.find(selector).length;
                if (count == 0) {
                    $(this).closest('li').css('display', 'none');
                }
            });
            if ($sorting_buttons.filter(':visible').length < 3 ){
                $container.siblings('.sorting-menu').hide();
            }

            $sorting_buttons.click(function () {
                if ($(this).hasClass('active')) return false;
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).addClass('active');
                $(this).closest('.sorting-menu').find('.responsive-filtration-title .text').text($(this).text());
                var filterValue = $(this).data('filter');
                if (typeof filterValue != "undefined") {
                    $current.isotope({filter: filterValue});
                    return false;
                }
            });

        });
    });

    var posters3d = jQuery('.poster-3d');
    if (posters3d.length) {
        posters3d.parallax({
            shadow: true,
            shine: true
        });
    }
});
    /*!
     * FitVids 1.1
     *
     * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
     * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
     * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
     *
     */
    !function(t){"use strict";t.fn.fitVids=function(e){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){var r=document.head||document.getElementsByTagName("head")[0],a=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",d=document.createElement("div");d.innerHTML='<p>x</p><style id="fit-vids-style">'+a+"</style>",r.appendChild(d.childNodes[1])}return e&&t.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var r=".fitvidsignore";i.ignore&&(r=r+", "+i.ignore);var a=t(this).find(e.join(","));a=a.not("object object"),a=a.not(r),a.each(function(){var e=t(this);if(!(e.parents(r).length>0||"embed"===this.tagName.toLowerCase()&&e.parent("object").length||e.parent(".fluid-width-video-wrapper").length)){e.css("height")||e.css("width")||!isNaN(e.attr("height"))&&!isNaN(e.attr("width"))||(e.attr("height",9),e.attr("width",16));var i="object"===this.tagName.toLowerCase()||e.attr("height")&&!isNaN(parseInt(e.attr("height"),10))?parseInt(e.attr("height"),10):e.height(),a=isNaN(parseInt(e.attr("width"),10))?e.width():parseInt(e.attr("width"),10),d=i/a;if(!e.attr("name")){var o="fitvid"+t.fn.fitVids._count;e.attr("name",o),t.fn.fitVids._count++}e.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*d+"%"),e.removeAttr("height").removeAttr("width")}})})},t.fn.fitVids._count=0}(window.jQuery||window.Zepto);
