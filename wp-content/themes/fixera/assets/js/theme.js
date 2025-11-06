;(function ($) {
    "use strict";
    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    $(window).on('load', function () {
        $(".pxl-loader").fadeOut("slow");
        pxl_window_width = $(window).width();
        fixera_header_sticky();
        fixera_scroll_to_top();
        fixera_quantity_icon();
        fixera_footer_fixed();
        fixera_blog_post_gallery();
        fixera_panel_anchor_toggle();

        fixera_document_click();
        fixera_product_single_variations_att();
    });

    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        fixera_header_sticky();
        fixera_scroll_to_top();
        fixera_footer_fixed();
    });

    $(document).ready(function () {
        /* Menu Responsive Dropdown */
        var $fixera_menu = $('.pxl-header-elementor-main');
        $fixera_menu.find('.pxl-menu-primary li').each(function () {
            var $fixera_submenu = $(this).find('> ul.sub-menu');
            if ($fixera_submenu.length == 1) {
                $(this).on('mouseover', function () {
                    if ($fixera_submenu.offset().left + $fixera_submenu.width() > $(window).width()) {
                        $fixera_submenu.addClass('pxl-sub-reverse');
                    } else if ($fixera_submenu.offset().left < 0) {
                        $fixera_submenu.addClass('pxl-sub-reverse');
                    }
                }, function () {
                    $fixera_submenu.removeClass('pxl-sub-reverse');
                });
            }
        });
        // preloader - start
        // --------------------------------------------------
        $(window).on('load', function(){
            $('#preloader').fadeOut('slow',function(){$(this).remove();});
        });
        /* Start Menu Mobile */
        $('.pxl-nav-hidden li.menu-item-has-children > a').append('<span class="pxl-menu-toggle"></span>');
        $('.pxl-header-menu li.menu-item-has-children, .pxl-menu-primary li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
        $('.pxl-menu-toggle').on('click', function () {
            if( !$(this).hasClass('active')){
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            }
            $(this).toggleClass('active');
            $(this).closest('.menu-item').find('> .sub-menu').toggleClass('active');
            $(this).closest('.menu-item').find('> .sub-menu').slideToggle();    
        });
         
        $('.pxl-nav-hidden li.menu-item-has-children > a').on('click', function(e) {
            var target = $(e.target);
            if($(this).attr('href') === '#' && !(target.is('.pxl-menu-toggle')) ){
                e.stopPropagation();
                if( !$(this).find('.pxl-menu-toggle').hasClass('active')){
                    $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                    $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                }
                $(this).find('.pxl-menu-toggle').toggleClass('active');
                $(this).closest('.menu-item').find('> .sub-menu').toggleClass('active');
                $(this).closest('.menu-item').find('> .sub-menu').slideToggle();   
            }
        });
        $("#pxl-nav-mobile").on('click', function () {
            $(this).toggleClass('active');
            $('.pxl-header-menu').toggleClass('active');
        });

        $(".pxl-menu-close, .pxl-header-menu-backdrop").on('click', function () {
            $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
            $('#pxl-nav-mobile').removeClass('active');
        });
        /* End Menu Mobile */

        /* Elementor Header */
        $('.pxl-type-header-clip > .elementor-container').append('<div class="pxl-header-shape"><span></span></div>');

        /* Scroll To Top */
        $('.pxl-scroll-top').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* Animate Time Delay */
        $('.pxl-grid-masonry').each(function () {
            var eltime = 100;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 100;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 60;
                }
            });
        });

        $('.pxl-item--text').each(function () {
            var pxl_time = 0;
            var pxl_item_inner = $(this).children().length;
            var _elt = pxl_item_inner - 1;
            $(this).find('> .pxl-text--slide > .wow').each(function (index, obj) {
                $(this).css('transition-delay', pxl_time + 'ms');
                if (_elt === index) {
                    pxl_time = 0;
                    _elt = _elt + pxl_item_inner;
                } else {
                    pxl_time = pxl_time + 80;
                }
            });
        });

        /* Lightbox Popup */
        $('.btn-video, .pxl-video-popup, .pxl--link-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.images-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.light-box',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });

        /* Search Popup */
        $(".pxl-search-popup-button").on('click', function () {
            $('body').addClass('body-overflow');
            $('#pxl-search-popup').addClass('active');
            $('#pxl-search-popup .search-field').focus();
        });
        $("#pxl-search-popup .pxl-item--overlay, #pxl-search-popup .pxl-item--close").on('click', function () {
            $('body').removeClass('body-overflow');
            $('#pxl-search-popup').removeClass('active');
        });

        /* Comment Reply */
        $('.comment-reply a').append( '<i class="common icon-arrow-forward-ne1"></i>' );

        /* Parallax */
        if($('#pxl-page-title-default').hasClass('pxl--parallax')) {
            $(this).stellar();
        }
        /* Animate Time */
        $('.btn-nina').each(function () {
            var eltime = 0.045;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl--btn-text > span').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 's');
                eltime = eltime + 0.045;
            });
        });
        $(".pxl-title-extra").parents('.pxl-wapper').addClass('hidden-demo-bar');

        /* Hover Active Widget pxl-dupble-button */
        $('.btn').each(function () {
            $(this).on('mouseover', function () {
                $(this).parents('.pxl-dupble-button').find('.btn').removeClass('active');
                $(this).addClass('active');
            });
        });
        
        /* Hover Active Item */
        $('.pxl--widget-hover').each(function () {
            $(this).on('mouseover', function () {
                $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).addClass('pxl--item-active');
            });
        });

        /* Hover Active Icon Box List */
        $('.pxl-iconbox-list .pxl-boxlist-item').on('mouseover', function () {
            $(this).siblings('.pxl-boxlist-item').removeClass('active');
            $(this).addClass('active');
        });

        /* Hover Button */
        $('.btn-plus-text').on('mouseover', function () {
            $(this).find('span').toggle(300);
        });

        /* Showcase */
        $('.btn-hover').each(function () {
            $(this).hover(function () {
                $(this).parents('.item-feature').find('.btn-hover').removeClass('active');
                $(this).addClass('active');
            });
        });

        /* Nav Logo */
        $(".pxl-nav-button").on('click', function () {
            $(this).toggleClass('active');
            $(this).parent().find('.pxl-nav-wrap').toggle(400);
        });

        /* Start Icon Bounce */
        var boxEls = $('.el-bounce, .pxl-image-effect1');
        $.each(boxEls, function(boxIndex, boxEl) {
            loopToggleClass(boxEl, 'bounce-active');
        });
        /* End Icon Bounce */

        $(document).on('change', 'select[name="show_per_page"]', function(e) {
            e.preventDefault();
            var current_url = $(this).closest('.show-per-page').attr('data-current-url');
            var url = fixera_add_url_param( current_url, 'per-page', $( this ).val() ); 
             
        });

        $(document).on('change', 'select[name="filter_cat"]', function(e) {
            e.preventDefault();
            var current_url = $(this).closest('.filter-cats').attr('data-current-url');
            var url = fixera_add_url_param( current_url, 'filter_cat', $( this ).val() );  
             
        });


        /* End package achive */

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(function () {
                    counter++;
                    return counter == 2;
                }, function () {
                    counter = 0;
                    el.removeClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Deactivate', 1000);
            } else {
                waitFor(function () {
                    counter++;
                    return counter == 3;
                }, function () {
                    counter = 0;
                    el.addClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Activate', 1000);
            }
        }

        function waitFor(condition, callback, message, time) {
            if (message == null || message == '' || typeof message == 'undefined') {
                message = 'Timeout';
            }
            if (time == null || time == '' || typeof time == 'undefined') {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function() {
                    console.log(message);
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */
        
        /* Image Effect */
        if($('.pxl-image-tilt').length){
            $('.pxl-image-tilt').parents('.elementor-top-section').addClass('pxl-image-tilt-active');
            $('.pxl-image-tilt').each(function () {
                var pxl_maxtilt = $(this).data('maxtilt'),
                pxl_speedtilt = $(this).data('speedtilt'),
                pxl_perspectivetilt = $(this).data('perspectivetilt');
                VanillaTilt.init(this, {
                    max: pxl_maxtilt,
                    speed: pxl_speedtilt,
                    perspective: pxl_perspectivetilt
                });
            });
        }
        /* Nice Select */
        $( 'form:not(.wpcf7-form) select, .woocommerce-ordering .orderby, #pxl-sidebar-area select, .nice-select' ).each(function () {
            $(this).niceSelect();
        });
        /* Select Theme Style */
        $('.wpcf7-select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;
          
            $this.addClass('pxl-select-hidden'); 
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next('div.pxl-select-higthlight');
            $styledSelect.text($this.children('option').eq(0).text());
          
            var $list = $('<ul />', {
                'class': 'pxl-select-options'
            }).insertAfter($styledSelect);
          
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }
          
            var $listItems = $list.children('li');
          
            $styledSelect.on('click', function(e) {
                e.stopPropagation();
                $('div.pxl-select-higthlight.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
                });
                $(this).toggleClass('active');
            });
          
            $listItems.on('click', function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
            });
          
            $(document).on('click', function() {
                $styledSelect.removeClass('active');
            });

        });

        $('#pxl-sidebar-area select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;
          
            $this.addClass('pxl-select-hidden'); 
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next('div.pxl-select-higthlight');
            $styledSelect.text($this.children('option').eq(0).text());
          
            var $list = $('<ul />', {
                'class': 'pxl-select-options'
            }).insertAfter($styledSelect);
          
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }
          
            var $listItems = $list.children('li');
          
            $styledSelect.on('click', function(e) {
                e.stopPropagation();
                $('div.pxl-select-higthlight.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
                });
                $(this).toggleClass('active');
            });
          
            $listItems.on('click', function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
            });
          
            $(document).click(function() {
                $styledSelect.removeClass('active');
            });

        });

        /* Arrow Custom */
        $('.pxl-tabs').parents('.pxl-item-tab--title').addClass('pxl--hide-arrow');
        var section_tab = $('.pxl-navigation-tab').parents('.elementor-section').addClass('pxl--hide-arrow');
        setTimeout(function() {
            var target = section_tab.find('.pxl-tabs .pxl-tabs--title');
            var target_clone = target.clone()
            var target_tab = target.parents('.elementor-section.pxl--hide-arrow').find('.pxl-navigation-tab');
            target_tab.append(target_clone);
            target_tab.find('.pxl-item-tab--title').on('click', function () {    
                $(this).parents('.elementor-section.pxl--hide-arrow').find('.pxl-navigation-tab .pxl-item-tab--title').toggleClass('active');
                $(this).parents('.elementor-section.pxl--hide-arrow').find('.pxl-tabs .pxl-item-tab--title').toggleClass('active');
                $(this).parents('.elementor-section.pxl--hide-arrow').find('.pxl-tabs .pxl-item-tab--title.active').trigger('click');
            });
        }, 300);

        /* Slider - Group align center */
        setTimeout(function(){
            $('.md-align-center').parents('.rs-parallax-wrap').addClass('pxl-group-center');
        }, 300);

    });

    function fixera_blog_post_gallery(){
        if($('.post.format-gallery').length <= 0) return;
        var swiper = new Swiper(".post-gallery-slider .pxl-swiper-container", {
            navigation: {
                nextEl: ".pxl-swiper-arrow-next",
                prevEl: ".pxl-swiper-arrow-prev",
            },
        });
    }

    function fixera_panel_anchor_toggle(){
        'use strict';
        $(document).on('click','.pxl-anchor.side-panel',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(this).toggleClass('cliked');
            $(target).toggleClass('open');
            $('body').toggleClass('side-panel-open');
            setTimeout(function(){
                $(document).find('.pxl-search-form input[name="s"]').focus();
                $(document).find('.search-form input[name="s"]').focus();
            },1000);
        });
        
        //* Menu Dropdown
        $('.pxl-menu-primary li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).on('mouseover', function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });
        //* Hidden Panel
        $(".pxl-hidden-template .pxl-popup--overlay").on('click', function () {
            $('body').removeClass('side-panel-open');
            $('.pxl-hidden-template').removeClass('open');
            $('.pxl-panel-content .wow').addClass('aniOut').removeClass('animated');
            $('.pxl-panel-content .fadeInPopup').addClass('aniOut');
        });
    }

    function fixera_document_click(){
        $(document).on('click',function (e) {
            var target = $(e.target);
            var check = '.btn-nav-mobile';
            
            if (!(target.is(check)) && target.closest('.pxl-hidden-template').length <= 0 && $('body').hasClass('side-panel-open')) { 
                $('.btn-nav-mobile').removeClass('cliked');
              
                $('.pxl-hidden-template').removeClass('open');
                $('body').removeClass('side-panel-open');
            }
        });
        $(document).on('click','.pxl-close',function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).closest('.pxl-hidden-template').toggleClass('open');
            $('.btn-nav-mobile').removeClass('cliked');
            $('.pxl-anchor.side-panel').removeClass('cliked');
            $('body').toggleClass('side-panel-open');
        });
    }

    /* Custom Loader Clone from Binh*/
    function fixera_loader() {
        if( $('#pxl-loadding').hasClass('style-text')) {
            $('#pxl-loadding').addClass('hide');
        } else {
            $(".pxl-loader").fadeOut("slow");
        }
    }
    
    /* Header Sticky */
    function fixera_header_sticky() {
        if($('#pxl-header-elementor').hasClass('is-sticky')) {
            if (pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');   
            }

            if (pxl_scroll_status == 'up' && pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
            }
        }

        $('.pxl-header-elementor-sticky').parents('body').addClass('pxl-header-sticky');
    }

    /* Scroll To Top */
    function fixera_scroll_to_top() {
        if (pxl_scroll_top < pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-off').removeClass('pxl-on');
        }
        if (pxl_scroll_top > pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-on').removeClass('pxl-off');
        }
    }

    /* Footer Fixed */
    function fixera_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
            $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
        }, 600);
    }
    /* ====================
     WooComerce Quantity
     ====================== */
    function fixera_quantity_icon() {
        $('#pxl-main .quantity').append('<span class="quantity-icon"><i class="quantity-down">-</i><i class="quantity-up">+</i></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }
    
    function fixera_product_single_variations_att(){
        $(document).on('mousedown', '.pro-variation-select', function (e) {
            e.preventDefault();
            var $this_var = $(this).closest('.variations'),
                this_closest = $(this).closest('.pxl-variation-att-terms'),
                target_hidden = $this_var.find('#'+this_closest.attr('data-id'));
            var $this = $(this);
            if (!$this.hasClass('custom-vari-enabled'))
                return;
            var target = $this.attr('data-value');
            if (!target)
                return;
            target_hidden.val(target).change();
            this_closest.find('li.pxl-vari-item').removeClass('active');
            $this.parent('li').addClass('active');
        });
    }
    $( document ).ajaxComplete(function() {
       fixera_quantity_icon();
    });

    function fixera_add_url_param( url, key, val ) {
        key = encodeURI( key );
        val = encodeURI( val );

        if ( '' !== val ) {
            var re = new RegExp( "([?&])" + key + "=.*?(&|$)", "i" );
            var separator = url.indexOf( '?' ) !== - 1 ? "&" : "?";

            // Update value if key exist.
            if ( url.match( re ) ) {
                url = url.replace( re, '$1' + key + "=" + val + '$2' );
            } else {
                url += separator + key + '=' + val;
            }
        } else {
            fixera_remove_url_param( url, key );
        }

        return url;
    }
    function fixera_remove_url_param( url, key ) {
        const params = new URLSearchParams( url );
        params.delete( key );
        return url;
    }
})(jQuery);